const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// GET /api/staf_admin/dashboard
router.get('/', async (req, res) => {
    try {
        const currentDate = new Date();
        const currentMonth = currentDate.getMonth() + 1;
        const currentYear = currentDate.getFullYear();

        // 1. Total Draf Disetujui (semua waktu atau bulan ini, mari ambil semua waktu yang belum beres)
        const [drafDisetujui] = await db.query(
            `SELECT COUNT(DISTINCT d.id_draft) as total 
             FROM draft_pengadaan d
             WHERE d.status = 'disetujui'`
        );

        // 2. Pesanan Dalam Pengiriman
        const [pesananDikirim] = await db.query(
            `SELECT COUNT(*) as total 
             FROM detail_pengadaan 
             WHERE status_pengadaan IN ('sedang_dikirim', 'penerimaan_sebagian')`
        );

        // 3. Total Inventaris Keseluruhan
        const [totalInventaris] = await db.query(
            `SELECT COUNT(*) as total FROM barang_inventaris`
        );

        // 4. Barang Baru (Bulan Ini)
        const [barangBaru] = await db.query(
            `SELECT COUNT(*) as total 
             FROM barang_inventaris 
             WHERE MONTH(tanggal_penerimaan) = ? AND YEAR(tanggal_penerimaan) = ?`,
            [currentMonth, currentYear]
        );

        // 5. Aktivitas Terkini (Riwayat Penerimaan 5 Barang Terakhir)
        const [aktivitas] = await db.query(
            `SELECT b.nomor_label, b.tanggal_penerimaan, b.kondisi, d.nama_barang, d.jenis_barang, r.nama_ruangan as lab
             FROM barang_inventaris b
             JOIN detail_pengadaan d ON b.id_penggunaan = d.id_detail
             LEFT JOIN ruangan r ON b.id_ruangan = r.id_ruangan
             ORDER BY b.tanggal_penerimaan DESC, b.id_barang DESC
             LIMIT 5`
        );

        res.json({
            success: true,
            data: {
                total_draf_disetujui: drafDisetujui[0].total,
                pesanan_dikirim: pesananDikirim[0].total,
                total_inventaris: totalInventaris[0].total,
                barang_baru_bulan_ini: barangBaru[0].total,
                aktivitas_terkini: aktivitas
            }
        });
    } catch (error) {
        console.error('Error fetching staf admin dashboard:', error);
        res.status(500).json({ success: false, message: 'Server error', error: error.message });
    }
});

module.exports = router;
