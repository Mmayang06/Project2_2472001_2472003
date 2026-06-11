const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// Ambil semua pengguna
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query('SELECT id_user, nama, email, role, is_online, reset_requested FROM user');
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

const nodemailer = require('nodemailer');

const transporter = nodemailer.createTransport({
    service: process.env.EMAIL_SERVICE || 'gmail',
    auth: {
        user: process.env.EMAIL_USER,
        pass: process.env.EMAIL_PASS
    }
});

function generateRandomPassword(length = 8) {
    const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%';
    let pass = '';
    for (let i = 0; i < length; i++) {
        pass += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return pass;
}

// Reset password by admin
router.post('/:id/reset-password', async (req, res) => {
    const { id } = req.params;
    try {
        const [users] = await db.query('SELECT * FROM user WHERE id_user = ? LIMIT 1', [id]);
        if (users.length === 0) {
            return res.status(404).json({ success: false, message: 'User tidak ditemukan' });
        }
        
        const user = users[0];
        const newPassword = generateRandomPassword();

        await db.query('UPDATE user SET password = ?, reset_requested = 0 WHERE id_user = ?', [newPassword, id]);

        const mailOptions = {
            from: process.env.EMAIL_USER,
            to: user.email,
            subject: 'Password Baru Akun Labventory',
            html: `
                <h3>Reset Password Berhasil</h3>
                <p>Halo ${user.nama},</p>
                <p>Administrator telah mereset password akun Labventory Anda.</p>
                <p>Berikut adalah password baru Anda: <strong>${newPassword}</strong></p>
                <p>Silakan gunakan password tersebut untuk masuk dan disarankan untuk segera mengubahnya melalui halaman Profil Pengguna setelah berhasil masuk.</p>
                <br>
                <p>Terima kasih,<br>Sistem Labventory</p>
            `
        };

        await transporter.sendMail(mailOptions);
        
        res.json({ success: true, message: 'Password berhasil direset dan email telah dikirim.' });
    } catch (e) {
        res.status(500).json({ success: false, message: 'Gagal mereset password atau mengirim email: ' + e.message });
    }
});

module.exports = router;
