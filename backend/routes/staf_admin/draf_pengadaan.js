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

        // 1. Update ruangan di detail pengadaan jika ada
        if (id_ruangan) {
            await connection.query('UPDATE detail_pengadaan SET id_ruangan = ? WHERE id_detail = ?', [id_ruangan, id_detail]);
        }

        // 2. Insert tiap item ke barang_inventaris dengan nomor_label NULL
        const qty = parseInt(input_qty) || 1;
        for (let i = 0; i < qty; i++) {
            await connection.query(
                'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan) VALUES (?, ?, ?, ?, ?, ?)',
                [null, null, 'baik', id_ruangan || null, id_detail, tanggal_penerimaan]
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
        return res.json({ success: true, message: 'Barang berhasil diterima' });
    } catch (error) {
        await connection.rollback();
        console.error(error);
        return res.status(500).json({ success: false, message: 'Gagal memproses penerimaan.' });
    } finally {
        connection.release();
    }
});

module.exports = router;
