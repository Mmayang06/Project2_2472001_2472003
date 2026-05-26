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

module.exports = router;
