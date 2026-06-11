const express = require('express');
const cors = require('cors');
require('dotenv').config();

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.get('/', (req, res) => {
    res.json({ 
        success: true,
        message: 'Welcome to Node.js Backend with Express and MySQL!' 
    });
});

const db = require('./config/db');

// Reset all users to offline on server startup
db.query('UPDATE user SET is_online = 0').then(() => {
    console.log('Semua status online pengguna berhasil direset.');
}).catch(e => {
    console.error('Gagal mereset status online:', e);
});

const jwt = require('jsonwebtoken');
const nodemailer = require('nodemailer');

const transporter = nodemailer.createTransport({
    service: process.env.EMAIL_SERVICE || 'gmail',
    auth: {
        user: process.env.EMAIL_USER,
        pass: process.env.EMAIL_PASS
    }
});

// Forgot Password API
app.post('/api/forgot-password', async (req, res) => {
    const { username } = req.body;
    try {
        // Verify user exists
        const [users] = await db.query('SELECT * FROM user WHERE nama = ? OR email = ? LIMIT 1', [username, username]);
        if (users.length === 0) {
            return res.status(404).json({ success: false, message: 'Akun tidak ditemukan dalam sistem.' });
        }
        
        const user = users[0];

        // Set reset_requested = 1 in database
        await db.query('UPDATE user SET reset_requested = 1 WHERE id_user = ?', [user.id_user]);

        res.json({ success: true, message: `Permintaan berhasil dikirim. Nanti pembaruan password akan dikirim ke email terdaftar yaitu ${user.email}` });
    } catch (error) {
        console.error('Error in forgot-password:', error);
        res.status(500).json({ success: false, message: 'Gagal mengirim permintaan.' });
    }
});


// Login API
app.post('/api/login', async (req, res) => {
    const { username, password } = req.body;
    
    try {
        const [rows] = await db.query('SELECT * FROM user WHERE nama = ? OR email = ? LIMIT 1', [username, username]);
        
        if (rows.length > 0) {
            const user = rows[0];
            if (user.password === password) {
                // Set is_online = 1
                await db.query('UPDATE user SET is_online = 1 WHERE id_user = ?', [user.id_user]);

                // Generate JWT Token
                const token = jwt.sign(
                    { id: user.id_user, username: user.nama, role: user.role },
                    process.env.JWT_SECRET || 'secret_key',
                    { expiresIn: '1d' }
                );
                
                return res.json({ 
                    success: true, 
                    token: token,
                    user: { id: user.id_user, username: user.nama, role: user.role } 
                });
            } else {
                return res.status(401).json({ success: false, message: 'Password salah.' });
            }
        }
        
        return res.status(404).json({ success: false, message: 'User tidak ditemukan.' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

// Register API
app.post('/api/register', async (req, res) => {
    const { nama, email, password, role, tahun_jabatan } = req.body;
    try {
        const [existing] = await db.query('SELECT id_user FROM user WHERE email = ? OR nama = ?', [email, nama]);
        if (existing.length > 0) {
            return res.status(400).json({ success: false, message: 'Email atau username sudah terdaftar.' });
        }
        
        await db.query(
            'INSERT INTO user (nama, email, password, role, tahun_jabatan) VALUES (?, ?, ?, ?, ?)',
            [nama, email, password, role, tahun_jabatan || null]
        );
        res.json({ success: true, message: 'Registrasi berhasil' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

// Logout API
app.post('/api/logout', async (req, res) => {
    const { id_user } = req.body;
    try {
        if (id_user) {
            await db.query('UPDATE user SET is_online = 0 WHERE id_user = ?', [id_user]);
        }
        return res.json({ success: true, message: 'Berhasil logout' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

// Routes Administrator
app.use('/api/administrator/users', require('./routes/administrator/users'));
app.use('/api/administrator/rooms', require('./routes/administrator/rooms'));

// Routes Staf Admin
const inventarisRoute = require('./routes/staf_admin/inventaris');
app.use('/api/staf_admin/inventaris', inventarisRoute);

const drafPengadaanRoute = require('./routes/staf_admin/draf_pengadaan');
app.use('/api/staf_admin/draf_pengadaan', drafPengadaanRoute);
app.use('/api/staf_admin/dashboard', require('./routes/staf_admin/dashboard'));
app.use('/api/staf_admin/notifikasi', require('./routes/staf_admin/notifikasi'));

// Routes Staf Lab
const stafLabDashboardRoute = require('./routes/staf_lab/dashboard');
app.use('/api/staf_lab/dashboard', stafLabDashboardRoute);

const stafLabBhpRoute = require('./routes/staf_lab/bhp');
app.use('/api/staf_lab/bhp', stafLabBhpRoute);

const stafLabMaintenanceRoute = require('./routes/staf_lab/maintenance');
app.use('/api/staf_lab/maintenance', stafLabMaintenanceRoute);

// Routes Kaprodi
const kaprodiRoute = require('./routes/kaprodi');
app.use('/api/kaprodi', kaprodiRoute);

// Routes Kalab
const kalabDrafPengadaanRoute = require('./routes/kalab/draf_pengadaan');
app.use('/api/kalab/draf_pengadaan', kalabDrafPengadaanRoute);

const kalabInventarisRoute = require('./routes/kalab/inventaris');
app.use('/api/kalab/inventaris', kalabInventarisRoute);

const kalabDashboardRoute = require('./routes/kalab/dashboard');
app.use('/api/kalab/dashboard', kalabDashboardRoute);

app.use('/api/kalab/notifikasi', require('./routes/kalab/notifikasi'));

// Routes Profil (Semua Role)
app.use('/api/profile', require('./routes/profile'));

// Jalankan Server
app.listen(PORT, () => {
    console.log(`Server backend telah berjalan di http://localhost:${PORT}`);
});
