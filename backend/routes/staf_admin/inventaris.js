const express = require('express');
const router = express.Router();
const db = require('../../config/db');

router.get('/', async (req, res) => {
    try {
        const query = `
            SELECT 
                r.id_ruangan, r.nama_ruangan, r.lokasi, 
                dp.id_detail, dp.nama_barang, dp.jenis_barang,
                bi.id_inventaris, bi.nomor_label, bi.kondisi
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
                    barang: []
                };
            }
            if (row.id_inventaris) {
                rooms[row.id_ruangan].barang.push({
                    id_inventaris: row.id_inventaris,
                    id_detail: row.id_detail,
                    nama_barang: row.nama_barang,
                    jenis_barang: row.jenis_barang,
                    nomor_label: row.nomor_label,
                    kondisi: row.kondisi
                });
                rooms[row.id_ruangan].total_alat++;
            }
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
                dp.nama_barang,
                dp.jenis_barang,
                r.nama_ruangan,
                r.lokasi
            FROM barang_inventaris bi
            JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
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
        const { nomor_label, qr_univ } = req.body;
        
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
                dp.id_detail, dp.nama_barang, dp.jenis_barang, dp.harga,
                MAX(dr.tahun_pengadaan) as tahun_pengadaan,
                GROUP_CONCAT(DISTINCT r.nama_ruangan SEPARATOR ', ') as lokasi_ruangan,
                GROUP_CONCAT(DISTINCT r.lokasi SEPARATOR ', ') as lokasi_detail,
                COUNT(bi.id_inventaris) as total_stok,
                SUM(CASE WHEN bi.kondisi = 'baik' THEN 1 ELSE 0 END) as stok_baik,
                SUM(CASE WHEN bi.kondisi IN ('rusak_ringan', 'rusak_berat') THEN 1 ELSE 0 END) as stok_rusak,
                MAX(bi.nomor_label) as contoh_kode,
                MAX(bi.qr_code) as contoh_qr
            FROM detail_pengadaan dp
            LEFT JOIN barang_inventaris bi ON dp.id_detail = bi.id_penggunaan
            LEFT JOIN ruangan r ON bi.id_ruangan = r.id_ruangan
            LEFT JOIN draft_pengadaan dr ON dp.id_draft = dr.id_draft
            WHERE dp.id_detail = ?
            GROUP BY dp.id_detail
        `;
        
        const [rows] = await db.query(query, [id]);
        
        if (rows.length === 0) {
            return res.status(404).json({ success: false, message: 'Barang tidak ditemukan.' });
        }
        
        const [items] = await db.query(`
            SELECT id_inventaris, nomor_label, kondisi, qr_code
            FROM barang_inventaris
            WHERE id_penggunaan = ? AND nomor_label IS NOT NULL
            ORDER BY nomor_label ASC
        `, [id]);
        
        rows[0].items = items;
        
        return res.json({ success: true, data: rows[0] });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

module.exports = router;
