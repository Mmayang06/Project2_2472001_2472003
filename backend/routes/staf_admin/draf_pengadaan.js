const express = require('express');
const router = express.Router();
const db = require('../../config/db');

router.get('/', async (req, res) => {
    try {
        const [drafts] = await db.query(`
            SELECT
                dp.id_draft,
                dp.tahun_pengadaan,
                dp.status AS status_draft,
                u.nama AS nama_pengaju
            FROM draft_pengadaan dp
            LEFT JOIN user u ON dp.id_user = u.id_user
            WHERE dp.status IN ('diajukan', 'disetujui', 'ditolak')
            ORDER BY dp.tahun_pengadaan DESC, dp.id_draft DESC
        `);

        for (const draft of drafts) {
            const [items] = await db.query(`
                SELECT 
                    dp.id_detail,
                    dp.nama_barang,
                    dp.jenis_barang,
                    dp.jumlah,
                    dp.harga,
                    dp.status_persetujuan,
                    dp.status_pengadaan,
                    dp.link_pembelian,
                    r.nama_ruangan as tujuan_lab,
                    (SELECT COUNT(*) FROM barang_inventaris bi WHERE bi.id_penggunaan = dp.id_detail) as jumlah_diterima,
                    (SELECT qr_code FROM barang_inventaris bi WHERE bi.id_penggunaan = dp.id_detail AND bi.nomor_label IS NULL LIMIT 1) as qr_univ
                FROM detail_pengadaan dp
                LEFT JOIN ruangan r ON dp.id_ruangan = r.id_ruangan
                WHERE dp.id_draft = ?
                ORDER BY dp.id_detail ASC
            `, [draft.id_draft]);
            draft.items = items;
        }

        return res.json({ success: true, data: drafts });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Terjadi kesalahan pada server.' });
    }
});

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

router.post('/cek-label', async (req, res) => {
    try {
        const { labels } = req.body;
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

router.post('/terima', async (req, res) => {
    const connection = await db.getConnection();
    try {
        const { id_detail, tanggal_penerimaan, id_ruangan, input_qty } = req.body;
        
        await connection.beginTransaction();

        const [storage] = await connection.query('SELECT id_ruangan FROM ruangan WHERE nama_ruangan = "Storage" LIMIT 1');
        const storage_id = storage[0] ? storage[0].id_ruangan : null;

        const [det] = await connection.query('SELECT nama_barang, jenis_barang FROM detail_pengadaan WHERE id_detail = ?', [id_detail]);
        if (det.length === 0) throw new Error('Detail not found');
        const { nama_barang, jenis_barang } = det[0];

        if (id_ruangan) {
            await connection.query('UPDATE detail_pengadaan SET id_ruangan = ? WHERE id_detail = ?', [id_ruangan, id_detail]);
        }

        let qtyRemaining = parseInt(input_qty) || 1;
        const qr_univ = 'UNIV-' + Math.random().toString(36).substring(2, 8).toUpperCase();
        
        const [brokenLabs] = await connection.query(`
            SELECT r.id_ruangan, COUNT(bi.id_inventaris) as broken_count
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            WHERE bi.kondisi != 'baik' AND r.id_ruangan != ?
              AND COALESCE(bi.nama_barang, dp.nama_barang) = (SELECT nama_barang FROM detail_pengadaan WHERE id_detail = ?)
            GROUP BY r.id_ruangan
        `, [storage_id, id_detail]);

        if (id_ruangan && id_ruangan != storage_id) {
            const selectedLabData = brokenLabs.find(l => l.id_ruangan == id_ruangan);
            const selectedBrokenCount = selectedLabData ? selectedLabData.broken_count : 0;
            const allocateToSelected = (selectedBrokenCount > 0) ? Math.min(qtyRemaining, selectedBrokenCount) : qtyRemaining;
            
            for (let i = 0; i < allocateToSelected; i++) {
                await connection.query(
                    'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan, nama_barang, jenis_barang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
                    [null, qr_univ, 'baik', id_ruangan, id_detail, tanggal_penerimaan, nama_barang, jenis_barang]
                );
            }
            qtyRemaining -= allocateToSelected;
            
            if (selectedLabData) {
                selectedLabData.broken_count = 0;
            }
        }

        // Leftover units go straight to storage instead of distributing to other broken labs
        if (qtyRemaining > 0) {
            for (let i = 0; i < qtyRemaining; i++) {
                await connection.query(
                    'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan, nama_barang, jenis_barang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
                    [null, qr_univ, 'baik', storage_id || id_ruangan, id_detail, tanggal_penerimaan, nama_barang, jenis_barang]
                );
            }
        }

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

        const [storage] = await db.query('SELECT id_ruangan, nama_ruangan FROM ruangan WHERE nama_ruangan = "Storage" LIMIT 1');
        
        const [labsWithBroken] = await db.query(`
            SELECT DISTINCT r.id_ruangan, r.nama_ruangan 
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            WHERE bi.kondisi != 'baik' AND r.nama_ruangan != 'Storage'
        `);

        const [recommendedLabs] = await db.query(`
            SELECT r.id_ruangan, r.nama_ruangan, COUNT(bi.id_inventaris) as broken_count
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            LEFT JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            WHERE bi.kondisi != 'baik' AND r.nama_ruangan != 'Storage'
              AND COALESCE(bi.nama_barang, dp.nama_barang) = (SELECT nama_barang FROM detail_pengadaan WHERE id_detail = ?)
            GROUP BY r.id_ruangan, r.nama_ruangan
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
