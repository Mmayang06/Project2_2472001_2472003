const express = require('express');
const router = express.Router();
const db = require('../../config/db');
const jwt = require('jsonwebtoken');

// Middleware to extract user from token
const authMiddleware = (req, res, next) => {
    const authHeader = req.headers.authorization;
    if (authHeader) {
        const token = authHeader.split(' ')[1];
        jwt.verify(token, process.env.JWT_SECRET || 'secret_key', (err, user) => {
            if (err) return res.status(403).json({ success: false, message: 'Token tidak valid' });
            req.user = user;
            next();
        });
    } else {
        res.status(401).json({ success: false, message: 'Tidak ada token' });
    }
};

// GET /api/kalab/draf_pengadaan
router.get('/', authMiddleware, async (req, res) => {
    try {
        const [drafts] = await db.query(`
            SELECT
                dp.id_draft,
                dp.tahun_pengadaan,
                dp.status,
                u.nama AS nama_pengaju
            FROM draft_pengadaan dp
            LEFT JOIN user u ON dp.id_user = u.id_user
            WHERE dp.id_user = ?
            ORDER BY dp.tahun_pengadaan DESC, dp.id_draft DESC
        `, [req.user.id]);

        for (const draft of drafts) {
            let items = [];
            try {
                const [result] = await db.query(`
                    SELECT
                        id_detail,
                        nama_barang,
                        jenis_barang,
                        jumlah,
                        harga,
                        link_pembelian,
                        status_persetujuan,
                        id_inventaris_ganti
                    FROM detail_pengadaan
                    WHERE id_draft = ?
                    ORDER BY id_detail ASC
                `, [draft.id_draft]);
                items = result;
            } catch (colErr) {
                const [result] = await db.query(`
                    SELECT
                        id_detail,
                        nama_barang,
                        jenis_barang,
                        jumlah,
                        harga,
                        link_pembelian,
                        status_persetujuan,
                        NULL AS id_inventaris_ganti
                    FROM detail_pengadaan
                    WHERE id_draft = ?
                    ORDER BY id_detail ASC
                `, [draft.id_draft]);
                items = result;
            }
            draft.items = items;
        }

        return res.json({ success: true, data: drafts });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/kalab/draf_pengadaan
router.post('/', authMiddleware, async (req, res) => {
    const conn = await db.getConnection();
    try {
        await conn.beginTransaction();

        const { tahun_pengadaan, items, action } = req.body; 
        const status = action === 'simpan_draft' ? 'draft' : 'diajukan';

        const [draftResult] = await conn.query(
            'INSERT INTO draft_pengadaan (tahun_pengadaan, status, id_user) VALUES (?, ?, ?)',
            [tahun_pengadaan, status, req.user.id]
        );
        const draftId = draftResult.insertId;

        if (items && items.length > 0) {
            for (const item of items) {
                const id_inventaris_ganti = item.id_inventaris_ganti || null;

                try {
                    await conn.query(
                        `INSERT INTO detail_pengadaan (id_draft, nama_barang, jenis_barang, jumlah, harga, link_pembelian, status_persetujuan, status_pengadaan, id_inventaris_ganti) 
                        VALUES (?, ?, ?, ?, ?, ?, 'pending', 'pending', ?)`,
                        [draftId, item.nama_barang, item.jenis_barang, item.jumlah, item.harga, item.link_pembelian || null, id_inventaris_ganti]
                    );
                } catch (colErr) {
                    await conn.query(
                        `INSERT INTO detail_pengadaan (id_draft, nama_barang, jenis_barang, jumlah, harga, link_pembelian, status_persetujuan, status_pengadaan) 
                        VALUES (?, ?, ?, ?, ?, ?, 'pending', 'pending')`,
                        [draftId, item.nama_barang, item.jenis_barang, item.jumlah, item.harga, item.link_pembelian || null]
                    );
                }
            }
        }

        await conn.commit();
        return res.json({ success: true, message: 'Draf pengadaan berhasil disimpan' });
    } catch (error) {
        await conn.rollback();
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    } finally {
        conn.release();
    }
});

// GET /api/kalab/draf_pengadaan/:id
router.get('/:id', authMiddleware, async (req, res) => {
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
            WHERE dp.id_draft = ? AND dp.id_user = ?
        `, [id, req.user.id]);

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
                status_persetujuan,
                NULL AS id_inventaris_ganti
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

// POST /api/kalab/draf_pengadaan/:id/ajukan
router.post('/:id/ajukan', authMiddleware, async (req, res) => {
    const conn = await db.getConnection();
    try {
        await conn.beginTransaction();

        const { id } = req.params;
        
        // Cek apakah draft milik user dan statusnya draft
        const [draftRows] = await conn.query(`
            SELECT status FROM draft_pengadaan 
            WHERE id_draft = ? AND id_user = ?
        `, [id, req.user.id]);

        if (!draftRows.length) {
            await conn.rollback();
            return res.status(404).json({ success: false, message: 'Draft tidak ditemukan' });
        }

        if (draftRows[0].status !== 'draft') {
            await conn.rollback();
            return res.status(400).json({ success: false, message: 'Draft sudah diajukan atau dikunci' });
        }

        // Update status menjadi diajukan
        await conn.query(`
            UPDATE draft_pengadaan 
            SET status = 'diajukan' 
            WHERE id_draft = ?
        `, [id]);

        await conn.commit();
        return res.json({ success: true, message: 'Draf berhasil diajukan ke Kaprodi' });
    } catch (error) {
        await conn.rollback();
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    } finally {
        conn.release();
    }
});

module.exports = router;
