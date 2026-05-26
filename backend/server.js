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

// Login API
app.post('/api/login', async (req, res) => {
    const { username, password } = req.body;
    
    try {
        const [rows] = await db.query('SELECT * FROM user WHERE nama = ? OR email = ? LIMIT 1', [username, username]);
        
        if (rows.length > 0) {
            const user = rows[0];
            if (user.password === password) {
                return res.json({ success: true, user: { id: user.id_user, username: user.nama, role: user.role } });
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

// Routes Staf Admin
const inventarisRoute = require('./routes/staf_admin/inventaris');
app.use('/api/staf_admin/inventaris', inventarisRoute);

// Jalankan Server
app.listen(PORT, () => {
    console.log(`Server backend telah berjalan di http://localhost:${PORT}`);
});
