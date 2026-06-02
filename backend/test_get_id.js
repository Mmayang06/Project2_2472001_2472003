const db = require('./config/db');

async function test() {
    try {
        const query = `
            SELECT 
                dp.id_detail, dp.nama_barang, dp.jenis_barang, dp.harga,
                MAX(dr.tahun_pengadaan) as tahun_pengadaan,
                GROUP_CONCAT(DISTINCT r.nama_ruangan SEPARATOR ', ') as lokasi_ruangan,
                GROUP_CONCAT(DISTINCT r.lokasi SEPARATOR ', ') as lokasi_detail,
                COUNT(bi.id_inventaris) as total_stok,
                SUM(CASE WHEN bi.kondisi = 'baik' THEN 1 ELSE 0 END) as stok_baik,
                SUM(CASE WHEN bi.kondisi IN ('rusak_ringan', 'rusak_berat') THEN 1 ELSE 0 END) as stok_rusak,
                MAX(bi.nomor_label) as contoh_kode,
                MAX(bi.qr_code) as contoh_qr
            FROM detail_pengadaan dp
            LEFT JOIN barang_inventaris bi ON dp.id_detail = bi.id_penggunaan
            LEFT JOIN ruangan r ON bi.id_ruangan = r.id_ruangan
            LEFT JOIN draft_pengadaan dr ON dp.id_draft = dr.id_draft
            WHERE dp.id_detail = 19
            GROUP BY dp.id_detail
        `;
        const [rows] = await db.query(query);
        console.log("Success", rows);
    } catch(e) {
        console.error("Error", e);
    }
    process.exit();
}
test();
