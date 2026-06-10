const express = require('express');
const router = express.Router();
const db = require('../../config/db');
const jwt = require('jsonwebtoken');

const authMiddleware = (req, res, next) => {
    const authHeader = req.headers.authorization;
    if (authHeader) {
        const token = authHeader.split(' ')[1];
        jwt.verify(token, process.env.JWT_SECRET || 'secret_key', (err, user) => {
            if (err) return res.status(403).json({ success: false, message: 'Token tidak valid' });
            req.user = user;
            next();
        });
    } else {
        res.status(401).json({ success: false, message: 'Tidak ada token' });
    }
};

// GET /api/kalab/dashboard
router.get('/', authMiddleware, async (req, res) => {
    try {
        const userId = req.user.id;
        
        // 1. Total Draf
        const [totalDrafRow] = await db.query('SELECT COUNT(*) AS count FROM draft_pengadaan WHERE id_user = ?', [userId]);
        const totalDraf = totalDrafRow[0].count;

        // 2. Draf Diajukan
        const [drafDiajukanRow] = await db.query('SELECT COUNT(*) AS count FROM draft_pengadaan WHERE id_user = ? AND status = "diajukan"', [userId]);
        const drafDiajukan = drafDiajukanRow[0].count;

        // 3. Draf Disetujui
        const [drafDisetujuiRow] = await db.query('SELECT COUNT(*) AS count FROM draft_pengadaan WHERE id_user = ? AND status = "disetujui"', [userId]);
        const drafDisetujui = drafDisetujuiRow[0].count;

        // 4. Total Inventaris dan Inventaris Rusak
        const [invStatsRow] = await db.query(`
            SELECT 
                COUNT(*) AS total_inventaris,
                SUM(CASE WHEN kondisi != 'baik' THEN 1 ELSE 0 END) AS inventaris_rusak
            FROM barang_inventaris
        `);
        const totalInventaris = invStatsRow[0].total_inventaris || 0;
        const inventarisRusak = invStatsRow[0].inventaris_rusak || 0;

        // 5. Aktivitas Terkini (5 Draf Terakhir)
        const [aktivitasTerkini] = await db.query(`
            SELECT id_draft, tahun_pengadaan, status 
            FROM draft_pengadaan 
            WHERE id_user = ? 
            ORDER BY id_draft DESC 
            LIMIT 5
        `, [userId]);

        // 6. Rincian Inventaris Rusak
        const [rincianRusak] = await db.query(`
            SELECT COALESCE(dp.nama_barang, 'Tidak Diketahui') as kategori, COUNT(bi.id_inventaris) as jumlah
            FROM barang_inventaris bi
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            WHERE bi.kondisi != 'baik'
            GROUP BY kategori
        `);

        // 7. Status BHP
        const [bhpStatus] = await db.query(`
            SELECT b.nama_bhp as nama, b.stok as belum_dipake, COALESCE(SUM(pb.jumlah_digunakan), 0) as dipake
            FROM bhp b
            LEFT JOIN penggunaan_bhp pb ON b.id_bhp = pb.id_bhp
            GROUP BY b.id_bhp, b.nama_bhp
        `);

        return res.json({
            success: true,
            data: {
                total_draf: totalDraf,
                draf_diajukan: drafDiajukan,
                draf_disetujui: drafDisetujui,
                total_inventaris: totalInventaris,
                inventaris_rusak: inventarisRusak,
                aktivitas_terkini: aktivitasTerkini,
                rincian_rusak: rincianRusak,
                bhp_status: bhpStatus
            }
        });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
