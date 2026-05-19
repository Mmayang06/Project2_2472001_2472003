const express = require('express');
const cors = require('cors');
require('dotenv').config();

const app = express();
const PORT = process.env.PORT || 3000;

// Mengizinkan CORS (agar bisa diakses dari Frontend Laravel)
app.use(cors());
// Mengizinkan parsing body dalam bentuk JSON
app.use(express.json());
// Mengizinkan parsing URL-encoded body
app.use(express.urlencoded({ extended: true }));

// Test koneksi API dasar
app.get('/', (req, res) => {
    res.json({ 
        success: true,
        message: 'Welcome to Node.js Backend with Express and MySQL!' 
    });
});

// Jalankan Server
app.listen(PORT, () => {
    console.log(`Server backend telah berjalan di http://localhost:${PORT}`);
});
