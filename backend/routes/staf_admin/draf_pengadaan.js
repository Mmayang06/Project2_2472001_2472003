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
                    (SELECT COUNT(*) FROM barang_inventaris bi WHERE bi.id_penggunaan = dp.id_detail) as jumlah_diterima
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

        let qtyRemaining = parseInt(input_qty) || 1;
        const qr_univ = 'UNIV-' + Math.random().toString(36).substring(2, 8).toUpperCase();
        
        // Find ALL labs with broken items of this type (excluding Storage)
        const [brokenLabs] = await connection.query(`
            SELECT r.id_ruangan, COUNT(bi.id_inventaris) as broken_count
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            WHERE bi.kondisi != 'baik' AND r.id_ruangan != ?
              AND dp.nama_barang = (SELECT nama_barang FROM detail_pengadaan WHERE id_detail = ?)
            GROUP BY r.id_ruangan
        `, [storage_id, id_detail]);

        // First, allocate to the explicitly selected room (if any, up to its broken count)
        if (id_ruangan && id_ruangan != storage_id) {
            const selectedLabData = brokenLabs.find(l => l.id_ruangan == id_ruangan);
            const selectedBrokenCount = selectedLabData ? selectedLabData.broken_count : 0;
            // If the user selected a lab that has no broken items, we still allocate all of it to that lab 
            // ONLY if there are no other broken labs, OR if they explicitly chose it despite the warning.
            // Wait, the requirement says "utamain leb lain ya, kl di lab lain ngga ada barang dengan nama itu yang rusak baru dimasukin ke storage".
            // So we give to the selected lab ONLY up to its broken count, or if there's no broken count but they chose it, we allocate everything.
            // Let's stick to the popup logic: the selected lab gets UP TO its broken count. 
            // If the lab has 0 broken count, it gets 0 (since it shouldn't replace anything), UNLESS they chose Storage.
            // Actually, if they chose a lab, they want items there. If there are 0 broken items, they want to ADD items to the lab.
            // So the selected lab gets the items. BUT if they exceed broken count, the EXCESS goes to other labs/storage.
            const allocateToSelected = (selectedBrokenCount > 0) ? Math.min(qtyRemaining, selectedBrokenCount) : qtyRemaining;
            
            for (let i = 0; i < allocateToSelected; i++) {
                await connection.query(
                    'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan) VALUES (?, ?, ?, ?, ?, ?)',
                    [null, qr_univ, 'baik', id_ruangan, id_detail, tanggal_penerimaan]
                );
            }
            qtyRemaining -= allocateToSelected;
            
            if (selectedLabData) {
                selectedLabData.broken_count = 0; // Mark as fulfilled
            }
        }

        // Second, allocate remaining to OTHER labs with broken items
        for (const lab of brokenLabs) {
            if (qtyRemaining <= 0) break;
            if (lab.broken_count > 0) {
                const allocateToLab = Math.min(qtyRemaining, lab.broken_count);
                for (let i = 0; i < allocateToLab; i++) {
                    await connection.query(
                        'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan) VALUES (?, ?, ?, ?, ?, ?)',
                        [null, qr_univ, 'baik', lab.id_ruangan, id_detail, tanggal_penerimaan]
                    );
                }
                qtyRemaining -= allocateToLab;
            }
        }

        // Third, allocate any absolute remainder to Storage (or fallback to id_ruangan if no storage)
        if (qtyRemaining > 0) {
            for (let i = 0; i < qtyRemaining; i++) {
                await connection.query(
                    'INSERT INTO barang_inventaris (nomor_label, qr_code, kondisi, id_ruangan, id_penggunaan, tanggal_penerimaan) VALUES (?, ?, ?, ?, ?, ?)',
                    [null, qr_univ, 'baik', storage_id || id_ruangan, id_detail, tanggal_penerimaan]
                );
            }
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

        // Get Labs with SPECIFIC broken items of the same id_barang
        const [recommendedLabs] = await db.query(`
            SELECT r.id_ruangan, r.nama_ruangan, COUNT(bi.id_inventaris) as broken_count
            FROM ruangan r 
            JOIN barang_inventaris bi ON r.id_ruangan = bi.id_ruangan 
            JOIN detail_pengadaan dp ON bi.id_penggunaan = dp.id_detail
            WHERE bi.kondisi != 'baik' AND r.nama_ruangan != 'Storage'
              AND dp.nama_barang = (SELECT nama_barang FROM detail_pengadaan WHERE id_detail = ?)
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
