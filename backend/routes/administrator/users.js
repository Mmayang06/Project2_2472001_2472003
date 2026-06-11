const express = require('express');
const router = express.Router();
const db = require('../../config/db');
const nodemailer = require('nodemailer');

function generateRandomPassword(length = 10) {
    const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%';
    let pass = '';
    for (let i = 0; i < length; i++) {
        pass += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return pass;
}

function getRoleLabel(role) {
    const labels = {
        administrator: 'Administrator',
        stafadmin: 'Staf Admin',
        staflab: 'Staf Laboratorium',
        kalab: 'Kepala Laboratorium',
        kaprodi: 'Ketua Program Studi',
    };
    return labels[role] || role;
}

// Buat transporter — pakai Gmail jika sudah dikonfigurasi, fallback ke Ethereal
async function createTransporter() {
    if (process.env.EMAIL_USER && process.env.EMAIL_USER !== 'email_gmail_anda@gmail.com') {
        return nodemailer.createTransport({
            service: process.env.EMAIL_SERVICE || 'gmail',
            auth: {
                user: process.env.EMAIL_USER,
                pass: process.env.EMAIL_PASS,
            },
        });
    }
    // Mode simulasi: gunakan Ethereal fake SMTP
    const testAccount = await nodemailer.createTestAccount();
    return nodemailer.createTransport({
        host: 'smtp.ethereal.email',
        port: 587,
        secure: false,
        auth: {
            user: testAccount.user,
            pass: testAccount.pass,
        },
    });
}

// Ambil semua pengguna
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query('SELECT id_user, nama, email, role, is_online, reset_requested FROM user');
        res.json({ success: true, data: rows });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Tambah pengguna baru (password digenerate otomatis & dikirim via email)
router.post('/', async (req, res) => {
    const { nama, email, role } = req.body;
    try {
        // Cek apakah email sudah terdaftar
        const [existing] = await db.query('SELECT id_user FROM user WHERE email = ?', [email]);
        if (existing.length > 0) {
            return res.status(400).json({ success: false, message: 'Email sudah terdaftar.' });
        }

        // Generate password acak otomatis
        const password = generateRandomPassword(10);
        const roleLabel = getRoleLabel(role);

        await db.query(
            'INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)',
            [nama, email, password, role]
        );

        // Kirim email notifikasi pendaftaran
        const mailOptions = {
            from: '"Labventory System" <noreply@labventory.com>',
            to: email,
            subject: 'Selamat! Akun Labventory Anda Telah Berhasil Dibuat',
            html: `
                <div style="font-family: 'Segoe UI', Arial, sans-serif; max-width: 560px; margin: 0 auto; background: #f9f5ed; border-radius: 16px; overflow: hidden; border: 1px solid #c9ccc3;">
                    <!-- Header -->
                    <div style="background: #20394a; padding: 36px 32px; text-align: center;">
                        <h1 style="color: #f9f5ed; margin: 0 0 4px; font-size: 26px; letter-spacing: -0.5px;">
                            Lab<span style="color: #6196aa;">ventory</span>
                        </h1>
                        <p style="color: #c9ccc3; margin: 0; font-size: 13px;">Sistem Manajemen Inventaris Laboratorium</p>
                    </div>

                    <!-- Body -->
                    <div style="padding: 36px 32px;">
                        <p style="color: #6196aa; font-size: 13px; font-weight: 600; margin: 0 0 8px; text-transform: uppercase; letter-spacing: 1px;">Notifikasi Akun</p>
                        <h2 style="color: #20394a; margin: 0 0 16px; font-size: 22px; line-height: 1.3;">
                            Selamat, ${nama}!<br>
                            <span style="font-size: 16px; color: #6196aa; font-weight: 500;">Anda berhasil didaftarkan pada sistem</span>
                        </h2>

                        <p style="color: #555; font-size: 14px; line-height: 1.7; margin: 0 0 24px;">
                            Administrator telah mendaftarkan akun Anda ke sistem <strong>Labventory</strong> 
                            sebagai <strong style="color: #20394a;">${roleLabel}</strong>. 
                            Berikut adalah informasi login Anda:
                        </p>

                        <!-- Credentials Box -->
                        <div style="background: #ffffff; border: 2px solid #e8e4dc; border-radius: 14px; padding: 24px; margin-bottom: 24px;">
                            <p style="margin: 0 0 16px; font-size: 12px; color: #999; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">Informasi Login</p>
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="color: #6196aa; font-weight: 700; padding: 8px 0; font-size: 13px; width: 90px; vertical-align: top;">Email</td>
                                    <td style="color: #030706; font-size: 14px; padding: 8px 0;">${email}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 4px 0;">
                                        <div style="border-top: 1px solid #f0ece4;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #6196aa; font-weight: 700; padding: 8px 0; font-size: 13px; vertical-align: top;">Password</td>
                                    <td style="padding: 8px 0;">
                                        <span style="background: #20394a; color: #f9f5ed; font-family: 'Courier New', monospace; font-size: 18px; font-weight: 700; letter-spacing: 3px; padding: 6px 14px; border-radius: 8px; display: inline-block;">
                                            ${password}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 4px 0;">
                                        <div style="border-top: 1px solid #f0ece4;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #6196aa; font-weight: 700; padding: 8px 0; font-size: 13px;">Role</td>
                                    <td style="padding: 8px 0;">
                                        <span style="background: #6196aa20; color: #20394a; font-size: 13px; font-weight: 700; padding: 4px 12px; border-radius: 20px; border: 1px solid #6196aa40;">
                                            ${roleLabel}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="background: #fff8e7; border: 1px solid #f0d080; border-radius: 10px; padding: 14px 18px; margin-bottom: 24px;">
                            <p style="color: #7a5c00; font-size: 13px; margin: 0; line-height: 1.6;">
                                ⚠️ <strong>Penting:</strong> Segera ubah password Anda setelah berhasil login melalui halaman <strong>Profil</strong> demi keamanan akun.
                            </p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div style="background: #f0ece4; padding: 18px 32px; text-align: center; border-top: 1px solid #e0dbd2;">
                        <p style="color: #aaa; font-size: 12px; margin: 0;">
                            Email ini dikirim otomatis oleh sistem Labventory. Jangan balas email ini.
                        </p>
                    </div>
                </div>
            `
        };

        let emailSent = false;
        let previewUrl = null;
        try {
            const transporter = await createTransporter();
            const info = await transporter.sendMail(mailOptions);
            emailSent = true;
            // Jika pakai Ethereal, cetak link preview ke console
            previewUrl = nodemailer.getTestMessageUrl(info);
            if (previewUrl) {
                console.log('📧 [SIMULASI EMAIL] Preview URL:', previewUrl);
            }
        } catch (mailErr) {
            console.warn('⚠️  Gagal mengirim email ke ' + email + ':', mailErr.message);
        }

        res.json({
            success: true,
            message: emailSent
                ? 'User berhasil ditambahkan dan email notifikasi telah dikirim.'
                : 'User berhasil ditambahkan.',
            ...(previewUrl && { previewUrl }),
            generatedPassword: password  // untuk keperluan simulasi/debug
        });

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

        let emailSent = false;
        let previewUrl = null;
        try {
            const transporter = await createTransporter();
            const info = await transporter.sendMail(mailOptions);
            emailSent = true;
            previewUrl = nodemailer.getTestMessageUrl(info);
            if (previewUrl) {
                console.log('📧 [SIMULASI EMAIL RESET] Preview URL:', previewUrl);
            }
        } catch (mailErr) {
            console.warn('⚠️ Gagal mengirim email reset ke ' + user.email + ':', mailErr.message);
        }

        res.json({ 
            success: true, 
            message: emailSent 
                ? 'Password berhasil direset dan email telah dikirim.' 
                : 'Password berhasil direset.',
            ...(previewUrl && { previewUrl }),
            generatedPassword: newPassword
        });
    } catch (e) {
        res.status(500).json({ success: false, message: 'Gagal mereset password: ' + e.message });
    }
});

module.exports = router;
