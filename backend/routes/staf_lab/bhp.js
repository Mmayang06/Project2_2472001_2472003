const express = require('express');
const router = express.Router();
const db = require('../../config/db');

// GET /api/staf_lab/bhp
router.get('/', async (req, res) => {
    try {
        const [bhps] = await db.query('SELECT * FROM bhp');
        
        for (const bhp of bhps) {
            // Get usage logs with room names
            const [usages] = await db.query(`
                SELECT p.jumlah_digunakan, r.nama_ruangan
                FROM penggunaan_bhp p
                LEFT JOIN ruangan r ON p.id_ruangan = r.id_ruangan
                WHERE p.id_bhp = ?
            `, [bhp.id_bhp]);
            bhp.usages = usages;
        }

        res.json({
            success: true,
            data: bhps
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/staf_lab/bhp/consume
router.post('/consume', async (req, res) => {
    const { id_bhp, jumlah, id_ruangan } = req.body;
    try {
        const [rows] = await db.query('SELECT stok FROM bhp WHERE id_bhp = ?', [id_bhp]);
        if (rows.length === 0) return res.status(404).json({ success: false, message: 'BHP tidak ditemukan' });

        const currentStock = rows[0].stok;
        if (currentStock < jumlah) {
            return res.status(400).json({ success: false, message: 'Stok tidak mencukupi' });
        }

        // kurangi stok
        await db.query('UPDATE bhp SET stok = stok - ? WHERE id_bhp = ?', [jumlah, id_bhp]);

        // catat log pemakaian barang dengan id_ruangan
        await db.query(
            'INSERT INTO penggunaan_bhp (id_bhp, jumlah_digunakan, tanggal, id_ruangan) VALUES (?, ?, CURDATE(), ?)', 
            [id_bhp, jumlah, id_ruangan || null]
        );

        res.json({ success: true, message: 'BHP berhasil digunakan' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/staf_lab/bhp/restock
router.post('/restock', async (req, res) => {
    const { id_bhp, jumlah } = req.body;
    try {
        // nambah stok
        await db.query('UPDATE bhp SET stok = stok + ? WHERE id_bhp = ?', [jumlah, id_bhp]);
        
        res.json({ success: true, message: 'Stok BHP berhasil ditambahkan' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
