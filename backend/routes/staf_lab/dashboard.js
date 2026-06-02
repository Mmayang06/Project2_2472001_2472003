const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// GET /api/staf_lab/dashboard
router.get('/', async (req, res) => {
    try {
        // ngitung total jenis barang di lab
        const [bhpCount] = await db.query('SELECT COUNT(*) as count FROM bhp');
        const totalJenisBhp = bhpCount[0].count;

        // ngecek berapa barang yang lagi diservis (kondisi bukan baik)
        const [maintenanceCount] = await db.query('SELECT COUNT(DISTINCT id_inventaris) as count FROM pemeliharaan WHERE kondisi_setelah != "baik"');
        const maintenanceProses = maintenanceCount[0].count;

        // jumlah semua aset komputer
        const [assetCount] = await db.query('SELECT COUNT(*) as count FROM barang_inventaris');
        const totalAset = assetCount[0].count;

        // ambil 3 aktivitas terbaru dari tabel penggunaan bhp
        const [penggunaan] = await db.query(`
            SELECT p.id_penggunaan as id, p.tanggal, p.jumlah_digunakan, b.nama_bhp, 'bhp' as tipe
            FROM penggunaan_bhp p
            JOIN bhp b ON p.id_bhp = b.id_bhp
            ORDER BY p.tanggal DESC LIMIT 3
        `);

        // ambil 3 log servis terbaru
        const [pemeliharaan] = await db.query(`
            SELECT pm.id_pemeliharaan as id, pm.tanggal, pm.keterangan, pm.kondisi_setelah, i.nomor_label, 'maintenance' as tipe
            FROM pemeliharaan pm
            JOIN barang_inventaris i ON pm.id_inventaris = i.id_inventaris
            ORDER BY pm.tanggal DESC LIMIT 3
        `);

        // gabungin log bhp sama servis, terus ambil 3 paling baru
        let activities = [...penggunaan, ...pemeliharaan];
        activities.sort((a, b) => new Date(b.tanggal) - new Date(a.tanggal));
        activities = activities.slice(0, 3);
        // data buat grafik mingguan (total barang kepake seminggu terakhir)
        const [chartDataRaw] = await db.query(`
            SELECT DATE(tanggal) as tgl, SUM(jumlah_digunakan) as total
            FROM penggunaan_bhp
            WHERE tanggal >= DATE(NOW() - INTERVAL 7 DAY)
            GROUP BY DATE(tanggal)
            ORDER BY tgl ASC
        `);

        const chartData = chartDataRaw.map(r => ({
            date: r.tgl,
            total: r.total
        }));

        res.json({
            success: true,
            data: {
                totalJenisBhp,
                maintenanceProses,
                totalAset,
                activities,
                chartData
            }
        });

    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
