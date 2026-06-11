const express = require('express');
const router = express.Router();
const db = require('../config/db');

// Ambil data profil
router.get('/:id', async (req, res) => {
    const { id } = req.params;
    try {
        const [rows] = await db.query('SELECT id_user, nama, email, role, tahun_jabatan FROM user WHERE id_user = ?', [id]);
        if (rows.length > 0) {
            res.json({ success: true, data: rows[0] });
        } else {
            res.status(404).json({ success: false, message: 'User tidak ditemukan' });
        }
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Update data profil
router.put('/:id', async (req, res) => {
    const { id } = req.params;
    const { nama, email, password, tahun_jabatan } = req.body;
    try {
        if (password) {
            await db.query(
                'UPDATE user SET nama = ?, email = ?, password = ?, tahun_jabatan = ? WHERE id_user = ?',
                [nama, email, password, tahun_jabatan || null, id]
            );
        } else {
            await db.query(
                'UPDATE user SET nama = ?, email = ?, tahun_jabatan = ? WHERE id_user = ?',
                [nama, email, tahun_jabatan || null, id]
            );
        }
        res.json({ success: true, message: 'Profil berhasil diperbarui' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

module.exports = router;
