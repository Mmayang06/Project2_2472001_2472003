const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// Ambil semua ruangan
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query('SELECT * FROM ruangan');
        res.json({ success: true, data: rows });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Tambah ruangan baru
router.post('/', async (req, res) => {
    const { nama_ruangan, lokasi } = req.body;
    try {
        await db.query(
            'INSERT INTO ruangan (nama_ruangan, lokasi) VALUES (?, ?)',
            [nama_ruangan, lokasi]
        );
        res.json({ success: true, message: 'Ruangan berhasil ditambahkan' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Update data ruangan
router.put('/:id', async (req, res) => {
    const { id } = req.params;
    const { nama_ruangan, lokasi } = req.body;
    try {
        await db.query(
            'UPDATE ruangan SET nama_ruangan = ?, lokasi = ? WHERE id_ruangan = ?',
            [nama_ruangan, lokasi, id]
        );
        res.json({ success: true, message: 'Ruangan berhasil diperbarui' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

// Hapus ruangan
router.delete('/:id', async (req, res) => {
    const { id } = req.params;
    try {
        await db.query('DELETE FROM ruangan WHERE id_ruangan = ?', [id]);
        res.json({ success: true, message: 'Ruangan berhasil dihapus' });
    } catch (e) {
        res.status(500).json({ success: false, message: e.message });
    }
});

module.exports = router;
