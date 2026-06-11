const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// GET /api/staf_lab/maintenance — daftar semua log servis
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query(`
            SELECT
                pm.id_pemeliharaan,
                pm.tanggal,
                pm.keterangan,
                pm.kondisi_sebelum,
                pm.kondisi_setelah,
                pm.status,
                pm.jenis_maintenance,
                i.id_inventaris,
                i.nomor_label,
                i.kondisi AS kondisi_sekarang,
                u.nama AS teknisi
            FROM pemeliharaan pm
            JOIN barang_inventaris i ON pm.id_inventaris = i.id_inventaris
            LEFT JOIN user u ON pm.id_user = u.id_user
            ORDER BY pm.tanggal DESC, pm.id_pemeliharaan DESC
        `);

        for (const row of rows) {
            const [bhpRows] = await db.query(`
                SELECT pb.id_bhp, pb.jumlah_digunakan, b.nama_bhp, b.satuan
                FROM penggunaan_bhp pb
                JOIN bhp b ON pb.id_bhp = b.id_bhp
                WHERE pb.id_pemeliharaan = ?
            `, [row.id_pemeliharaan]);
            row.bhp_digunakan = bhpRows;
        }

        res.json({ success: true, data: rows });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

// GET /api/staf_lab/maintenance/inventaris — daftar aset untuk dropdown form
router.get('/inventaris', async (req, res) => {
    try {
        const [rows] = await db.query(`
            SELECT bi.id_inventaris, bi.nomor_label, bi.kondisi,
                   dp.nama_barang, dp.jenis_barang,
                   r.nama_ruangan
            FROM barang_inventaris bi
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            LEFT JOIN ruangan r ON bi.id_ruangan = r.id_ruangan
            WHERE bi.nomor_label IS NOT NULL
            ORDER BY bi.nomor_label ASC
        `);
        res.json({ success: true, data: rows });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/staf_lab/maintenance — simpan log servis baru + kurangi stok BHP
router.post('/', async (req, res) => {
    const { id_inventaris, id_user, jenis_maintenance, tanggal, kondisi_sebelum, kondisi_setelah, status, keterangan, bhp_digunakan } = req.body;

    if (!id_inventaris || !tanggal || !kondisi_setelah || !status) {
        return res.status(400).json({ success: false, message: 'Field wajib tidak boleh kosong' });
    }

    
    // Mapping frontend values to ENUM values
    let mapped_setelah = 'baik';
    if (kondisi_setelah === 'Rusak Ringan' || kondisi_setelah === 'rusak_ringan' || kondisi_setelah === 'Perlu Perhatian' || kondisi_setelah === 'perlu_perhatian') mapped_setelah = 'rusak_ringan';
    if (kondisi_setelah === 'Rusak Berat' || kondisi_setelah === 'rusak_berat') mapped_setelah = 'rusak_berat';

    let mapped_sebelum = 'baik';
    if (kondisi_sebelum) {
        if (kondisi_sebelum === 'Rusak Ringan' || kondisi_sebelum === 'rusak_ringan' || kondisi_sebelum === 'Perlu Perhatian' || kondisi_sebelum === 'perlu_perhatian') mapped_sebelum = 'rusak_ringan';
        if (kondisi_sebelum === 'Rusak Berat' || kondisi_sebelum === 'rusak_berat') mapped_sebelum = 'rusak_berat';
    }

    const conn = await db.getConnection();
    try {
        await conn.beginTransaction();

        const [mainResult] = await conn.query(
            `INSERT INTO pemeliharaan (id_inventaris, id_user, jenis_maintenance, tanggal, kondisi_sebelum, kondisi_setelah, status, keterangan)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)`,
            [id_inventaris, id_user || null, jenis_maintenance || 'Pemeliharaan', tanggal, mapped_sebelum, mapped_setelah, status, keterangan || null]
        );
        const id_pemeliharaan = mainResult.insertId;

        if (Array.isArray(bhp_digunakan) && bhp_digunakan.length > 0) {
            for (const item of bhp_digunakan) {
                const { id_bhp, jumlah } = item;
                if (!id_bhp || !jumlah || jumlah <= 0) continue;

                const [stokRows] = await conn.query('SELECT stok FROM bhp WHERE id_bhp = ?', [id_bhp]);
                if (stokRows.length === 0) {
                    await conn.rollback();
                    return res.status(404).json({ success: false, message: `BHP id ${id_bhp} tidak ditemukan` });
                }
                if (stokRows[0].stok < jumlah) {
                    await conn.rollback();
                    return res.status(400).json({ success: false, message: `Stok BHP id ${id_bhp} tidak mencukupi (stok: ${stokRows[0].stok})` });
                }

                await conn.query('UPDATE bhp SET stok = stok - ? WHERE id_bhp = ?', [jumlah, id_bhp]);
                await conn.query(
                    'INSERT INTO penggunaan_bhp (id_bhp, jumlah_digunakan, tanggal, id_pemeliharaan) VALUES (?, ?, ?, ?)',
                    [id_bhp, jumlah, tanggal, id_pemeliharaan]
                );
            }
        }

        await conn.query('UPDATE barang_inventaris SET kondisi = ? WHERE id_inventaris = ?', [mapped_setelah, id_inventaris]);

        if (kondisi_setelah === 'rusak' || kondisi_setelah === 'rusak_berat') {
            const [inv] = await conn.query('SELECT nomor_label FROM barang_inventaris WHERE id_inventaris = ?', [id_inventaris]);
            const no_label = inv[0] ? inv[0].nomor_label : id_inventaris;
            const pesan = `Peringatan: Barang dengan label ${no_label} dilaporkan dalam kondisi ${kondisi_setelah.replace('_', ' ').toUpperCase()}.`;
            await conn.query(
                `INSERT INTO notifikasi (role_target, pesan, tipe, link) VALUES (?, ?, ?, ?)`,
                ['kalab', pesan, 'warning', '/kalab/inventaris']
            );
        }

        await conn.commit();
        res.json({ success: true, message: 'Log maintenance berhasil disimpan', id_pemeliharaan });
    } catch (error) {
        await conn.rollback();
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error: ' + error.message });
    } finally {
        conn.release();
    }
});


// POST /api/staf_lab/maintenance/ajukan_pengganti
router.post('/ajukan_pengganti', async (req, res) => {
    try {
        const { nama_barang, jumlah } = req.body;
        if (!nama_barang || !jumlah) {
            return res.status(400).json({ success: false, message: 'Nama barang dan jumlah diperlukan' });
        }
        
        const pesan = `Staf Lab mengajukan penggantian inventaris untuk ${nama_barang} sebanyak ${jumlah}.`;
        
        // Coba insert notifikasi untuk kalab
        await db.query(
            `INSERT INTO notifikasi (role_target, pesan, tipe, link) VALUES (?, ?, ?, ?)`,
            ['kalab', pesan, 'warning', '/kalab/tambah-draf']
        );
        
        res.json({ success: true, message: 'Pengajuan penggantian berhasil dikirim ke Kalab' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;

