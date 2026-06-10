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

// GET /api/staf_admin/notifikasi
router.get('/', authMiddleware, async (req, res) => {
    try {
        const role_target = req.user.role; // Assuming authenticateJWT sets req.user
        
        // Cek jika role bukan staf_admin, tolak atau kembalikan kosong
        if (role_target !== 'staf_admin') {
            return res.json({ success: true, data: [] });
        }

        // Ambil notifikasi dari database
        const [notifikasiDb] = await db.query(
            `SELECT * FROM notifikasi 
             WHERE role_target = ? 
             ORDER BY is_read ASC, created_at DESC 
             LIMIT 20`,
            [role_target]
        );

        const notifications = [...notifikasiDb];

        // Virtual Notification: Pengingat Pelabelan (Khusus Staf Admin)
        if (role_target === 'staf_admin') {
            const [belumDilabeli] = await db.query(
                `SELECT COUNT(*) as total FROM barang_inventaris WHERE nomor_label IS NULL`
            );
            if (belumDilabeli[0].total > 0) {
                notifications.unshift({
                    id_notifikasi: 'virtual_label',
                    role_target: 'staf_admin',
                    pesan: `Pengingat: Ada ${belumDilabeli[0].total} barang yang menunggu untuk dilabeli.`,
                    tipe: 'warning',
                    link: '/stafadmin/daftar-inventaris',
                    is_read: 0,
                    created_at: new Date()
                });
            }
        }

        res.json({
            success: true,
            data: notifications
        });

    } catch (error) {
        console.error('Error fetching notifikasi:', error);
        res.status(500).json({ success: false, message: 'Server error', error: error.message });
    }
});

// PUT /api/notifikasi/:id/read
router.put('/:id/read', authMiddleware, async (req, res) => {
    try {
        const { id } = req.params;
        const role_target = req.user.role;

        // Jika notifikasi virtual, abaikan update DB
        if (id === 'virtual_label') {
            return res.json({ success: true });
        }

        await db.query(
            `UPDATE notifikasi SET is_read = 1 WHERE id_notifikasi = ? AND role_target = ?`,
            [id, role_target]
        );

        res.json({ success: true });
    } catch (error) {
        console.error('Error updating notifikasi:', error);
        res.status(500).json({ success: false, message: 'Server error', error: error.message });
    }
});

module.exports = router;
