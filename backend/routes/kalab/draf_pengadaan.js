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



// GET /api/kalab/draf_pengadaan/permintaan_bhp
router.get('/permintaan_bhp', authMiddleware, async (req, res) => {
    try {
        const [rows] = await db.query(`
            SELECT pesan FROM notifikasi 
            WHERE role_target = 'kalab' 
            AND (pesan LIKE 'Anggota Staf Lab mengajukan permintaan stok untuk%'
                 OR pesan LIKE 'Staf Lab mengajukan penggantian inventaris untuk%')
            ORDER BY created_at DESC
        `);
        
        const permintaan = [];
        const regexBhp = /untuk (.+?) sebanyak (\d+)\./;
        const regexInv = /untuk (.+?) \(Label: (.+?)\) yang rusak dan perlu diganti\./;
        const regexInv2 = /untuk (.+?) sebanyak (\d+)\./;

        for (const row of rows) {
            let match = row.pesan.match(regexBhp);
            if (match && row.pesan.includes('permintaan stok')) {
                permintaan.push({
                    nama_barang: match[1],
                    jumlah: parseInt(match[2], 10),
                    tipe: 'BHP'
                });
            } else {
                match = row.pesan.match(regexInv);
                if (match) {
                    permintaan.push({
                        nama_barang: match[1],
                        jumlah: 1,
                        tipe: 'Inventaris',
                        no_label: match[2]
                    });
                } else {
                    match = row.pesan.match(regexInv2);
                    if (match && row.pesan.includes('penggantian inventaris')) {
                        permintaan.push({
                            nama_barang: match[1],
                            jumlah: parseInt(match[2], 10),
                            tipe: 'Inventaris'
                        });
                    }
                }
            }
        }
        
        // Buang duplikat, ambil permintaan terbaru saja per nama_barang + tipe
        const uniquePermintaan = [];
        const seen = new Set();
        for (const p of permintaan) {
            const key = p.nama_barang + '_' + p.tipe;
            if (!seen.has(key)) {
                seen.add(key);
                uniquePermintaan.push(p);
            }
        }

        // Fetch current stock from bhp table or find id_inventaris
        for (const p of uniquePermintaan) {
            if (p.tipe === 'BHP') {
                const [bhpRows] = await db.query('SELECT stok FROM bhp WHERE nama_bhp = ?', [p.nama_barang]);
                p.stok_sekarang = bhpRows.length > 0 ? bhpRows[0].stok : 0;
            } else if (p.tipe === 'Inventaris') {
                if (p.no_label) {
                    const [invRows] = await db.query('SELECT id_inventaris FROM barang_inventaris WHERE nomor_label = ?', [p.no_label]);
                    p.id_inventaris = invRows.length > 0 ? invRows[0].id_inventaris : null;
                } else {
                    p.id_inventaris = null;
                }
            }
        }
        
        res.json({ success: true, data: uniquePermintaan });
    } catch (error) {
        console.error(error);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});

// POST /api/kalab/draf_pengadaan
router.post('/', authMiddleware, async (req, res) => {
    const conn = await db.getConnection();
    try {
        await conn.beginTransaction();

        const { tahun_pengadaan, items, action } = req.body; 
        let status = action === 'simpan_draft' ? 'draft' : 'diajukan';
        let draftId;

        // Check for existing un-finalized draft for this year
        const [existingDrafts] = await conn.query(
            "SELECT id_draft, status FROM draft_pengadaan WHERE id_user = ? AND tahun_pengadaan = ? AND status IN ('draft', 'diajukan') ORDER BY id_draft DESC LIMIT 1",
            [req.user.id, tahun_pengadaan]
        );

        if (existingDrafts.length > 0) {
            draftId = existingDrafts[0].id_draft;
            // If the user clicked 'Ajukan Langsung' but the existing draft was 'draft', update it
            if (action === 'ajukan' && existingDrafts[0].status === 'draft') {
                await conn.query('UPDATE draft_pengadaan SET status = ? WHERE id_draft = ?', ['diajukan', draftId]);
            }
        } else {
            // Create new draft
            const [draftResult] = await conn.query(
                'INSERT INTO draft_pengadaan (tahun_pengadaan, status, id_user) VALUES (?, ?, ?)',
                [tahun_pengadaan, status, req.user.id]
            );
            draftId = draftResult.insertId;
        }

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

// PUT /api/kalab/draf_pengadaan/item/:id_detail
router.put('/item/:id_detail', authMiddleware, async (req, res) => {
    try {
        const { id_detail } = req.params;
        const { nama_barang, jenis_barang, jumlah, harga, link_pembelian } = req.body;

        // Cek status draf
        const [draftRows] = await db.query(`
            SELECT dp.status, dp.id_user 
            FROM detail_pengadaan detail
            JOIN draft_pengadaan dp ON detail.id_draft = dp.id_draft
            WHERE detail.id_detail = ?
        `, [id_detail]);

        if (!draftRows.length) {
            return res.status(404).json({ success: false, message: 'Item tidak ditemukan' });
        }

        if (draftRows[0].id_user !== req.user.id) {
            return res.status(403).json({ success: false, message: 'Akses ditolak' });
        }

        if (draftRows[0].status === 'disetujui' || draftRows[0].status === 'ditolak') {
            return res.status(400).json({ success: false, message: 'Draf sudah difinalisasi, tidak dapat diubah' });
        }

        await db.query(`
            UPDATE detail_pengadaan 
            SET nama_barang = ?, jenis_barang = ?, jumlah = ?, harga = ?, link_pembelian = ?
            WHERE id_detail = ?
        `, [nama_barang, jenis_barang, jumlah, harga, link_pembelian || null, id_detail]);

        return res.json({ success: true, message: 'Barang berhasil diubah' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

// DELETE /api/kalab/draf_pengadaan/item/:id_detail
router.delete('/item/:id_detail', authMiddleware, async (req, res) => {
    try {
        const { id_detail } = req.params;

        // Cek status draf
        const [draftRows] = await db.query(`
            SELECT dp.status, dp.id_user 
            FROM detail_pengadaan detail
            JOIN draft_pengadaan dp ON detail.id_draft = dp.id_draft
            WHERE detail.id_detail = ?
        `, [id_detail]);

        if (!draftRows.length) {
            return res.status(404).json({ success: false, message: 'Item tidak ditemukan' });
        }

        if (draftRows[0].id_user !== req.user.id) {
            return res.status(403).json({ success: false, message: 'Akses ditolak' });
        }

        if (draftRows[0].status === 'disetujui' || draftRows[0].status === 'ditolak') {
            return res.status(400).json({ success: false, message: 'Draf sudah difinalisasi, tidak dapat dihapus' });
        }

        await db.query('DELETE FROM detail_pengadaan WHERE id_detail = ?', [id_detail]);

        return res.json({ success: true, message: 'Barang berhasil dihapus' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ success: false, message: 'Server error' });
    }
});

module.exports = router;
