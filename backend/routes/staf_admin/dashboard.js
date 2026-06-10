const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// GET /api/staf_admin/dashboard
router.get('/', async (req, res) => {
    try {
        const currentDate = new Date();
        const currentMonth = currentDate.getMonth() + 1;
        const currentYear = currentDate.getFullYear();

        // 1. Barang Belum Dilabeli
        const [belumDilabeli] = await db.query(
            `SELECT COUNT(*) as total FROM barang_inventaris WHERE nomor_label IS NULL`
        );

        // 2. Pesanan Dalam Pengiriman
        const [pesananDikirim] = await db.query(
            `SELECT COUNT(*) as total 
             FROM detail_pengadaan 
             WHERE status_pengadaan IN ('sedang_dikirim', 'penerimaan_sebagian')`
        );

        // 3. Inventaris Rusak
        const [inventarisRusak] = await db.query(
            `SELECT COUNT(*) as total FROM barang_inventaris WHERE kondisi != 'baik'`
        );

        // 4. Total Inventaris Keseluruhan (yang masih bagus)
        const [totalInventaris] = await db.query(
            `SELECT COUNT(*) as total FROM barang_inventaris WHERE kondisi = 'baik'`
        );

        // 5. Aktivitas Terkini (Riwayat Penerimaan 5 Batch Terakhir)
        const [aktivitas] = await db.query(
            `SELECT COUNT(b.id_inventaris) as jumlah, b.tanggal_penerimaan, d.nama_barang, d.jenis_barang
             FROM barang_inventaris b
             JOIN detail_pengadaan d ON b.id_penggunaan = d.id_detail
             GROUP BY b.id_penggunaan, b.tanggal_penerimaan, d.nama_barang, d.jenis_barang
             ORDER BY b.tanggal_penerimaan DESC
             LIMIT 5`
        );

        res.json({
            success: true,
            data: {
                barang_belum_dilabeli: belumDilabeli[0].total,
                pesanan_dikirim: pesananDikirim[0].total,
                inventaris_rusak: inventarisRusak[0].total,
                total_inventaris: totalInventaris[0].total,
                aktivitas_terkini: aktivitas
            }
        });
    } catch (error) {
        console.error('Error fetching staf admin dashboard:', error);
        res.status(500).json({ success: false, message: 'Server error', error: error.message });
    }
});

module.exports = router;
