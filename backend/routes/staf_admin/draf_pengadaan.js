const express = require('express');
const router = express.Router();
const db = require('../../config/db');

router.get('/', async (req, res) => {
    try {
        const query = `
            SELECT 
                dp.id_detail,
                dp.nama_barang,
                dp.jenis_barang,
                dp.jumlah,
                dp.harga,
                dp.status_persetujuan,
                dp.status_pengadaan,
                dp.link_pembelian,
                dr.id_draft,
                dr.tahun_pengadaan,
                r.nama_ruangan as tujuan_lab,
                (SELECT COUNT(*) FROM barang_inventaris bi WHERE bi.id_penggunaan = dp.id_detail) as jumlah_diterima
            FROM detail_pengadaan dp
            JOIN draft_pengadaan dr ON dp.id_draft = dr.id_draft
            LEFT JOIN ruangan r ON dp.id_ruangan = r.id_ruangan
            WHERE dr.status = 'disetujui'
            ORDER BY dr.tahun_pengadaan DESC, dr.id_draft DESC
        `;
        
        const [rows] = await db.query(query);
        
        return res.json({ success: true, data: rows });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

// Update Status Pengadaan
router.put('/:id/status', async (req, res) => {
    try {
        const { id } = req.params;
        const { status_pengadaan } = req.body;
        
        await db.query('UPDATE detail_pengadaan SET status_pengadaan = ? WHERE id_detail = ?', [status_pengadaan, id]);
        return res.json({ success: true, message: 'Status berhasil diperbarui' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Gagal memperbarui status.' });
    }
});

// Cek Nomor Label
router.post('/cek-label', async (req, res) => {
    try {
        const { labels } = req.body; // Array of string labels
        if (!labels || labels.length === 0) return res.json({ success: true, valid: true });

        const placeholders = labels.map(() => '?').join(',');
        const [rows] = await db.query(`SELECT nomor_label FROM barang_inventaris WHERE nomor_label IN (${placeholders})`, labels);

        if (rows.length > 0) {
            const existingLabels = rows.map(r => r.nomor_label);
            return res.json({ success: true, valid: false, existing: existingLabels });
        }
        return res.json({ success: true, valid: true });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Gagal mengecek label.' });
    }
});

// Proses Terima Barang
router.post('/terima', async (req, res) => {
    const connection = await db.getConnection();
    try {
        const { id_detail, tanggal_penerimaan, id_ruangan, input_qty } = req.body;
        
        await connection.beginTransaction();

        // 1. Get Storage ID
        const [storage] = await connection.query('SELECT id_ruangan FROM ruangan WHERE nama_ruangan = "Storage" LIMIT 1');
        const storage_id = storage[0] ? storage[0].id_ruangan : null;

        // 2. Update ruangan di detail pengadaan jika ada
        if (id_ruangan) {
            await connection.query('UPDATE detail_pengadaan SET id_ruangan = ? WHERE id_detail = ?', [id_ruangan, id_detail]);
        }

        const qty = parseInt(input_qty) || 1;
        const qr_univ = 'UNIV-' + Math.random().toString(36).substring(2, 8).toUpperCase();
        
        let allocateToRoom = 0;
        let allocateToStorage = 0;
        
        if (id_ruangan && id_ruangan != storage_id) {
            const [brokenCheck] = await connection.query("SELECT COUNT(*) as c FROM barang_inventaris WHERE id_ruangan = ? AND id_penggunaan = ? AND kondisi != 'baik'", [id_ruangan, id_detail]);
            const brokenCount = brokenCheck[0].c;
            
            allocateToRoom = Math.min(qty, brokenCount);
            allocateToStorage = qty - allocateToRoom;
        } else {
            allocateToStorage = qty;
        }
        
        // Insert for selected room
        for (let i = 0; i < allocateToRoom; i++) {
            await connection.query(
                'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan) VALUES (?, ?, ?, ?, ?, ?)',
                [null, qr_univ, 'baik', id_ruangan, id_detail, tanggal_penerimaan]
            );
        }
        
        // Insert for storage
        for (let i = 0; i < allocateToStorage; i++) {
            await connection.query(
                'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan) VALUES (?, ?, ?, ?, ?, ?)',
                [null, qr_univ, 'baik', storage_id, id_detail, tanggal_penerimaan]
            );
        }

        // 3. Cek jumlah total yang diterima vs jumlah dipesan
        const [detailRows] = await connection.query('SELECT jumlah FROM detail_pengadaan WHERE id_detail = ?', [id_detail]);
        const jumlah_total = detailRows[0].jumlah;
        
        const [countRows] = await connection.query('SELECT COUNT(*) as count FROM barang_inventaris WHERE id_penggunaan = ?', [id_detail]);
        const jumlah_diterima = countRows[0].count;

        let newStatus = 'penerimaan_sebagian';
        if (jumlah_diterima >= jumlah_total) {
            newStatus = 'telah_diterima';
        }

        await connection.query('UPDATE detail_pengadaan SET status_pengadaan = ? WHERE id_detail = ?', [newStatus, id_detail]);

        await connection.commit();
        return res.json({ success: true, message: 'Barang berhasil diterima', qr_univ: qr_univ });
    } catch (error) {
        await connection.rollback();
        console.error(error);
        return res.status(500).json({ success: false, message: 'Gagal memproses penerimaan.' });
    } finally {
        connection.release();
    }
});

router.get('/ruangan-rekomendasi/:id_detail', async (req, res) => {
    try {
        const { id_detail } = req.params;

        // Get Storage room
        const [storage] = await db.query('SELECT id_ruangan, nama_ruangan FROM ruangan WHERE nama_ruangan = "Storage" LIMIT 1');
        
        // Get Labs with ANY broken items (excluding Storage)
        const [labsWithBroken] = await db.query(`
            SELECT DISTINCT r.id_ruangan, r.nama_ruangan 
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            WHERE bi.kondisi != 'baik' AND r.nama_ruangan != 'Storage'
        `);

        // Get Labs with SPECIFIC broken items of this id_detail
        const [recommendedLabs] = await db.query(`
            SELECT DISTINCT r.id_ruangan, r.nama_ruangan 
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            WHERE bi.kondisi != 'baik' AND bi.id_penggunaan = ? AND r.nama_ruangan != 'Storage'
        `, [id_detail]);

        return res.json({
            success: true,
            storage_room: storage[0] || null,
            labs_with_broken: labsWithBroken,
            recommended_labs: recommendedLabs
        });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Gagal memuat rekomendasi ruangan' });
    }
});

module.exports = router;
