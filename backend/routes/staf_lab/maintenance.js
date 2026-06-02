const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// GET /api/staf_lab/maintenance
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query(`
            SELECT pm.id_pemeliharaan, pm.tanggal, pm.keterangan, pm.kondisi_setelah, 
                   i.nomor_label, i.kondisi as kondisi_sekarang,
                   u.nama as teknisi
            FROM pemeliharaan pm
            JOIN barang_inventaris i ON pm.id_inventaris = i.id_inventaris
            LEFT JOIN user u ON pm.id_user = u.id_user
            ORDER BY pm.tanggal DESC
        `);
        res.json({
            success: true,
            data: rows
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
