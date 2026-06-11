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

router.get('/', authMiddleware, async (req, res) => {
    try {
        const user_role = req.user.role; 
        if (user_role !== 'staflab' && user_role !== 'staf_lab') {
            return res.json({ success: true, data: [] });
        }
        
        const role_target = 'staf_lab';
        const [notifikasiDb] = await db.query(
            `SELECT * FROM notifikasi 
             WHERE role_target = ? 
             ORDER BY is_read ASC, created_at DESC 
             LIMIT 20`,
            [role_target]
        );
        res.json({ success: true, data: notifikasiDb });
    } catch (error) {
        console.error('Error fetching notifikasi:', error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

router.put('/:id/read', authMiddleware, async (req, res) => {
    try {
        const { id } = req.params;
        const role_target = 'staf_lab';
        await db.query(
            `UPDATE notifikasi SET is_read = 1 WHERE id_notifikasi = ? AND role_target = ?`,
            [id, role_target]
        );
        res.json({ success: true });
    } catch (error) {
        console.error('Error updating notifikasi:', error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
