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

// GET /api/kalab/notifikasi
router.get('/', authMiddleware, async (req, res) => {
    try {
        const role_target = req.user.role; 
        
        // Cek jika role bukan kalab, tolak atau kembalikan kosong
        if (role_target !== 'kalab') {
            return res.json({ success: true, data: [] });
        }

        // Ambil notifikasi dari database
        const [dbNotifs] = await db.query(
            `SELECT id_notifikasi, pesan, tipe, link, is_read, created_at
             FROM notifikasi
             WHERE role_target = ?
             ORDER BY created_at DESC
             LIMIT 20`,
            [role_target]
        );

        // Map data agar boolean terformat benar
        const results = dbNotifs.map(n => ({
            ...n,
            is_read: !!n.is_read
        }));

        res.json({ success: true, data: results });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

// PUT /api/kalab/notifikasi/:id/read
router.put('/:id/read', authMiddleware, async (req, res) => {
    try {
        const { id } = req.params;
        const role_target = req.user.role;

        if (role_target !== 'kalab') {
            return res.status(403).json({ success: false, message: 'Forbidden' });
        }

        await db.query(
            `UPDATE notifikasi SET is_read = 1 WHERE id_notifikasi = ? AND role_target = ?`,
            [id, role_target]
        );
        res.json({ success: true, message: 'Notifikasi ditandai dibaca' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
