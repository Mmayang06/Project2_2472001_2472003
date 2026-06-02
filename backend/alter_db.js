const db = require('./config/db');

async function run() {
    try {
        await db.query("ALTER TABLE detail_pengadaan ADD COLUMN status_pengadaan ENUM('menunggu_dipesan', 'dipesan', 'sedang_dikirim', 'penerimaan_sebagian', 'telah_diterima') DEFAULT 'menunggu_dipesan'");
        await db.query("ALTER TABLE barang_inventaris ADD COLUMN tanggal_penerimaan DATE DEFAULT NULL");
        console.log('DB Columns added');
    } catch(e) {
        console.log(e);
    }
    process.exit();
}

run();
