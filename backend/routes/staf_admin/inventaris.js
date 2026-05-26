const express = require('express');
const router = express.Router();
const db = require('../../config/db');

router.get('/', async (req, res) => {
    try {
        const query = `
            SELECT 
                r.id_ruangan, r.nama_ruangan, r.lokasi, 
                dp.id_detail, dp.nama_barang, dp.jenis_barang,
                COUNT(bi.id_inventaris) as stok,
                MAX(bi.nomor_label) as contoh_kode
            FROM ruangan r
            LEFT JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            GROUP BY r.id_ruangan, dp.id_detail
            ORDER BY r.id_ruangan ASC
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
            if (row.id_detail) {
                rooms[row.id_ruangan].barang.push({
                    id_detail: row.id_detail,
                    nama_barang: row.nama_barang,
                    jenis_barang: row.jenis_barang,
                    stok: row.stok,
                    contoh_kode: row.contoh_kode
                });
                rooms[row.id_ruangan].total_alat += row.stok;
            }
        }
        
        return res.json({ success: true, data: Object.values(rooms) });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
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
        
        return res.json({ success: true, data: rows[0] });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

module.exports = router;
