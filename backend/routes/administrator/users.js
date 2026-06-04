const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// Ambil semua pengguna
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query('SELECT id_user, nama, email, role, is_online FROM user');
        res.json({ success: true, data: rows });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Tambah pengguna baru
router.post('/', async (req, res) => {
    const { nama, email, password, role } = req.body;
    try {
        await db.query(
            'INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)',
            [nama, email, password, role]
        );
        res.json({ success: true, message: 'User berhasil ditambahkan' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Update data pengguna
router.put('/:id', async (req, res) => {
    const { id } = req.params;
    const { nama, email, password, role } = req.body;
    try {
        if (password) {
            await db.query(
                'UPDATE user SET nama = ?, email = ?, password = ?, role = ? WHERE id_user = ?',
                [nama, email, password, role, id]
            );
        } else {
            await db.query(
                'UPDATE user SET nama = ?, email = ?, role = ? WHERE id_user = ?',
                [nama, email, role, id]
            );
        }
        res.json({ success: true, message: 'User berhasil diperbarui' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Hapus pengguna
router.delete('/:id', async (req, res) => {
    const { id } = req.params;
    try {
        await db.query('DELETE FROM user WHERE id_user = ?', [id]);
        res.json({ success: true, message: 'User berhasil dihapus' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

module.exports = router;
