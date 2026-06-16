const express = require('express');
const router = express.Router();
const db = require('../../config/db');

router.get('/', async (req, res) => {
    try {
        const query = `
            SELECT 
                r.id_ruangan, r.nama_ruangan, r.lokasi, 
                bi.id_inventaris, bi.nomor_label, bi.kondisi, 
                COALESCE(bi.nama_barang, dp.nama_barang) AS nama_barang, 
                COALESCE(bi.jenis_barang, dp.jenis_barang) AS jenis_barang
            FROM ruangan r
            LEFT JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan AND bi.nomor_label IS NOT NULL
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            ORDER BY r.id_ruangan ASC, bi.nomor_label ASC
        `;

        const [rows] = await db.query(query);

        // Group rows by room
        const rooms = {};
        for (let row of rows) {
            if (!rooms[row.id_ruangan]) {
                rooms[row.id_ruangan] = {
                    id: row.id_ruangan,
                    nama: row.nama_ruangan,
                    lokasi: row.lokasi,
                    total_alat: 0,
                    barang_map: {}
                };
            }
            if (row.id_inventaris) {
                const r = rooms[row.id_ruangan];
                const key = row.nama_barang || 'Barang';
                if (!r.barang_map[key]) {
                    r.barang_map[key] = {
                        id_detail: key, // Keep using id_detail as key for the frontend to render
                        nama_barang: row.nama_barang,
                        jenis_barang: row.jenis_barang,
                        total_unit: 0,
                        unit_rusak: 0,
                        items: []
                    };
                }
                r.barang_map[key].items.push({
                    id_inventaris: row.id_inventaris,
                    nomor_label: row.nomor_label,
                    kondisi: row.kondisi
                });
                r.barang_map[key].total_unit++;
                if (row.kondisi !== 'baik') {
                    r.barang_map[key].unit_rusak++;
                }
                r.total_alat++;
            }
        }

        // Convert barang_map to barang array
        for (let roomId in rooms) {
            rooms[roomId].barang = Object.values(rooms[roomId].barang_map);
            delete rooms[roomId].barang_map;
        }

        return res.json({ success: true, data: Object.values(rooms) });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

router.get('/belum-dilabeli', async (req, res) => {
    try {
        const query = `
            SELECT 
                bi.id_inventaris,
                bi.tanggal_penerimaan,
                COALESCE(bi.nama_barang, dp.nama_barang) AS nama_barang,
                COALESCE(bi.jenis_barang, dp.jenis_barang) AS jenis_barang,
                r.nama_ruangan,
                r.lokasi
            FROM barang_inventaris bi
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            LEFT JOIN ruangan r ON bi.id_ruangan = r.id_ruangan
            WHERE bi.nomor_label IS NULL
            ORDER BY bi.id_inventaris DESC
        `;
        const [rows] = await db.query(query);
        return res.json({ success: true, data: rows });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan' });
    }
});

router.post('/verify-qr/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const { qr_univ } = req.body;

        const [inv] = await db.query('SELECT qr_code FROM barang_inventaris WHERE id_inventaris = ?', [id]);
        if (inv.length === 0) return res.status(404).json({ success: false, message: 'Barang tidak ditemukan' });

        if (inv[0].qr_code !== qr_univ) {
            return res.json({ success: false, message: 'QR Universitas tidak valid! Pastikan anda memasukkan QR yang benar.' });
        }

        return res.json({ success: true, message: 'QR Valid' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan' });
    }
});

router.put('/update-label/:id', async (req, res) => {
    try {
        const { id } = req.params;
        let { nomor_label, qr_univ } = req.body;

        // Bersihkan label: kapitalisasi dan hapus SEMUA spasi
        nomor_label = (nomor_label || '').replace(/\s+/g, '').toUpperCase();
        if (!nomor_label) {
            return res.json({ success: false, message: 'Nomor label tidak boleh kosong' });
        }

        const [inv] = await db.query('SELECT qr_code FROM barang_inventaris WHERE id_inventaris = ?', [id]);
        if (inv.length === 0) return res.status(404).json({ success: false, message: 'Barang tidak ditemukan' });

        if (inv[0].qr_code !== qr_univ) {
            return res.json({ success: false, message: 'QR Universitas tidak valid! Pastikan anda memasukkan QR yang benar.' });
        }

        // Auto-generate QR code text based on label
        const qr_code = `QR-${nomor_label}`;

        // Check if label exists
        const [existing] = await db.query('SELECT id_inventaris FROM barang_inventaris WHERE nomor_label = ? AND id_inventaris != ?', [nomor_label, id]);
        if (existing.length > 0) {
            // Generate suggestion
            let suggestedLabel = '';
            const match = nomor_label.match(/^(.*?)(\d+)$/);

            if (match) {
                const prefix = match[1];
                let numStr = match[2];
                let numLen = numStr.length;
                let num = parseInt(numStr, 10);

                while (true) {
                    num++;
                    suggestedLabel = prefix + num.toString().padStart(numLen, '0');
                    const [check] = await db.query('SELECT id_inventaris FROM barang_inventaris WHERE nomor_label = ?', [suggestedLabel]);
                    if (check.length === 0) break;
                }
            } else {
                let suffix = 1;
                while (true) {
                    suggestedLabel = `${nomor_label}-${suffix}`;
                    const [check] = await db.query('SELECT id_inventaris FROM barang_inventaris WHERE nomor_label = ?', [suggestedLabel]);
                    if (check.length === 0) break;
                    suffix++;
                }
            }

            return res.json({
                success: false,
                isDuplicate: true,
                suggestion: suggestedLabel,
                message: 'Nomor label sudah digunakan'
            });
        }

        await db.query('UPDATE barang_inventaris SET nomor_label = ?, qr_code = ? WHERE id_inventaris = ?', [nomor_label, qr_code, id]);
        return res.json({ success: true, message: 'Nomor label berhasil disimpan' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Gagal update label' });
    }
});

router.get('/:id', async (req, res) => {
    try {
        const { id } = req.params;

        const query = `
            SELECT 
                bi.id_inventaris, bi.nomor_label, bi.qr_code, bi.kondisi,
                COALESCE(bi.nama_barang, dp.nama_barang) AS nama_barang,
                COALESCE(bi.jenis_barang, dp.jenis_barang) AS jenis_barang,
                r.nama_ruangan as lokasi_ruangan,
                r.lokasi as lokasi_detail
            FROM barang_inventaris bi
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            LEFT JOIN ruangan r ON bi.id_ruangan = r.id_ruangan
            WHERE bi.id_inventaris = ?
        `;

        const [rows] = await db.query(query, [id]);

        if (rows.length === 0) {
            return res.status(404).json({ success: false, message: 'Barang tidak ditemukan.' });
        }

        return res.json({ success: true, data: rows[0] });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

module.exports = router;
