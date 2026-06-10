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

// GET /api/kalab/inventaris/rusak
router.get('/rusak', authMiddleware, async (req, res) => {
    try {
        const [items] = await db.query(`
            SELECT bi.id_inventaris, bi.nomor_label, bi.kondisi, r.nama_ruangan, dp.nama_barang
            FROM barang_inventaris bi
            LEFT JOIN ruangan r ON bi.id_ruangan = r.id_ruangan
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            WHERE bi.kondisi != 'baik'
            ORDER BY bi.id_inventaris DESC
        `);
        return res.json({ success: true, data: items });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
