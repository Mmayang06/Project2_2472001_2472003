const express = require('express');
const router = express.Router();
const db = require('../config/db');

// GET /api/kaprodi/dashboard — stats overview
router.get('/dashboard', async (req, res) => {
    try {
        const [pending]   = await db.query(`SELECT COUNT(*) as total FROM draft_pengadaan WHERE status = 'diajukan'`);
        const [approved]  = await db.query(`SELECT COUNT(*) as total FROM draft_pengadaan WHERE status = 'disetujui'`);
        const [rejected]  = await db.query(`SELECT COUNT(*) as total FROM draft_pengadaan WHERE status = 'ditolak'`);
        const [recentDrafts] = await db.query(`
            SELECT
                dp.id_draft,
                dp.tahun_pengadaan,
                dp.status,
                u.nama AS nama_pengaju,
                COUNT(det.id_detail) AS jumlah_item,
                SUM(det.jumlah * det.harga) AS total_biaya,
                SUM(CASE WHEN det.status_persetujuan = 'pending' THEN 1 ELSE 0 END) AS pending_items
            FROM draft_pengadaan dp
            LEFT JOIN user u ON dp.id_user = u.id_user
            LEFT JOIN detail_pengadaan det ON dp.id_draft = det.id_draft
            WHERE dp.status != 'draft'
            GROUP BY dp.id_draft
            ORDER BY dp.tahun_pengadaan DESC, dp.id_draft DESC
            LIMIT 10
        `);

        return res.json({
            success: true,
            data: {
                pending_review: pending[0].total,
                total_disetujui: approved[0].total,
                total_ditolak: rejected[0].total,
                recent_drafts: recentDrafts
            }
        });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

// GET /api/kaprodi/draf_pengadaan — all drafts with items
router.get('/draf_pengadaan', async (req, res) => {
    try {
        const [drafts] = await db.query(`
            SELECT
                dp.id_draft,
                dp.tahun_pengadaan,
                dp.status,
                u.nama AS nama_pengaju
            FROM draft_pengadaan dp
            LEFT JOIN user u ON dp.id_user = u.id_user
            WHERE dp.status != 'draft'
            ORDER BY dp.tahun_pengadaan DESC, dp.id_draft DESC
        `);

        for (const draft of drafts) {
            const [items] = await db.query(`
                SELECT
                    id_detail,
                    nama_barang,
                    jenis_barang,
                    jumlah,
                    harga,
                    link_pembelian,
                    status_persetujuan
                FROM detail_pengadaan
                WHERE id_draft = ?
                ORDER BY id_detail ASC
            `, [draft.id_draft]);
            draft.items = items;
        }

        return res.json({ success: true, data: drafts });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

// GET /api/kaprodi/draf_pengadaan/:id — single draft with items
router.get('/draf_pengadaan/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const [draftRows] = await db.query(`
            SELECT
                dp.id_draft,
                dp.tahun_pengadaan,
                dp.status,
                u.nama AS nama_pengaju
            FROM draft_pengadaan dp
            LEFT JOIN user u ON dp.id_user = u.id_user
            WHERE dp.id_draft = ? AND dp.status != 'draft'
        `, [id]);

        if (!draftRows.length) {
            return res.status(404).json({ success: false, message: 'Draft tidak ditemukan' });
        }

        const draft = draftRows[0];
        const [items] = await db.query(`
            SELECT
                id_detail,
                nama_barang,
                jenis_barang,
                jumlah,
                harga,
                link_pembelian,
                status_persetujuan
            FROM detail_pengadaan
            WHERE id_draft = ?
            ORDER BY id_detail ASC
        `, [id]);
        draft.items = items;

        return res.json({ success: true, data: draft });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/kaprodi/draf_pengadaan/review-item — approve or reject a single item
router.post('/draf_pengadaan/review-item', async (req, res) => {
    try {
        const { id_detail, status_persetujuan } = req.body;

        if (!id_detail || !['disetujui', 'ditolak'].includes(status_persetujuan)) {
            return res.status(400).json({ success: false, message: 'Data tidak valid' });
        }

        // Check that the parent draft is still in 'diajukan' status (not finalized)
        const [rows] = await db.query(`
            SELECT dp.status
            FROM draft_pengadaan dp
            JOIN detail_pengadaan det ON dp.id_draft = det.id_draft
            WHERE det.id_detail = ?
        `, [id_detail]);

        if (!rows.length || rows[0].status !== 'diajukan') {
            return res.status(403).json({ success: false, message: 'Draft sudah difinalisasi dan tidak dapat diubah' });
        }

        await db.query(
            `UPDATE detail_pengadaan SET status_persetujuan = ? WHERE id_detail = ?`,
            [status_persetujuan, id_detail]
        );

        return res.json({ success: true, message: 'Status item berhasil diperbarui' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/kaprodi/draf_pengadaan/:id/finalize — finalize draft (lock it)
router.post('/draf_pengadaan/:id/finalize', async (req, res) => {
    const { id } = req.params;
    const conn = await db.getConnection();
    try {
        await conn.beginTransaction();

        // Check current draft status
        const [draftRows] = await conn.query(
            `SELECT status FROM draft_pengadaan WHERE id_draft = ?`, [id]
        );
        if (!draftRows.length) {
            await conn.rollback();
            return res.status(404).json({ success: false, message: 'Draft tidak ditemukan' });
        }
        if (draftRows[0].status !== 'diajukan') {
            await conn.rollback();
            return res.status(403).json({ success: false, message: 'Draft sudah difinalisasi dan tidak dapat diubah' });
        }

        // Check for any still-pending items
        const [pendingItems] = await conn.query(
            `SELECT COUNT(*) as total FROM detail_pengadaan WHERE id_draft = ? AND status_persetujuan = 'pending'`,
            [id]
        );
        if (pendingItems[0].total > 0) {
            await conn.rollback();
            return res.status(400).json({
                success: false,
                message: `Masih ada ${pendingItems[0].total} item yang belum disetujui/ditolak. Harap review semua item sebelum finalisasi.`
            });
        }

        // Determine final draft status: disetujui if at least one item is approved
        const [approvedItems] = await conn.query(
            `SELECT COUNT(*) as total FROM detail_pengadaan WHERE id_draft = ? AND status_persetujuan = 'disetujui'`,
            [id]
        );
        const finalStatus = approvedItems[0].total > 0 ? 'disetujui' : 'ditolak';

        await conn.query(
            `UPDATE draft_pengadaan SET status = ? WHERE id_draft = ?`,
            [finalStatus, id]
        );

        const pesan = `Draf Pengadaan #${id} telah difinalisasi oleh Kaprodi dengan status: ${finalStatus.toUpperCase()}.`;
        const tipe = finalStatus === 'disetujui' ? 'success' : 'warning';
        await conn.query(
            `INSERT INTO notifikasi (role_target, pesan, tipe, link) VALUES (?, ?, ?, ?)`,
            ['staf_admin', pesan, tipe, '/stafadmin/draf-pengadaan']
        );
        // Tambahkan notifikasi untuk Kalab
        await conn.query(
            `INSERT INTO notifikasi (role_target, pesan, tipe, link) VALUES (?, ?, ?, ?)`,
            ['kalab', pesan, tipe, '/kalab/draf-pengadaan']
        );

        await conn.commit();
        return res.json({
            success: true,
            message: `Draft berhasil difinalisasi dengan status: ${finalStatus}`,
            final_status: finalStatus
        });
    } catch (error) {
        await conn.rollback();
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error: ' + error.message });
    } finally {
        conn.release();
    }
});

module.exports = router;
