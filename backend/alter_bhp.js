const db = require('./config/db');

async function run() {
    try {
        await db.query("ALTER TABLE bhp ADD COLUMN kategori VARCHAR(100) DEFAULT 'Tidak Ada'");
        await db.query("ALTER TABLE bhp ADD COLUMN lokasi_rak VARCHAR(100) DEFAULT 'Belum Ditentukan'");
        await db.query("ALTER TABLE bhp ADD COLUMN stok_minimal INT UNSIGNED DEFAULT 5");
        await db.query("ALTER TABLE bhp ADD COLUMN satuan VARCHAR(50) DEFAULT 'Pcs'");
        console.log('Kolom baru berhasil ditambahkan ke tabel bhp');
    } catch(e) {
        console.error('Error alter table:', e.message);
    }
    
    // isi data contoh kalo tabelnya masih kosong
    try {
        const [rows] = await db.query("SELECT COUNT(*) as count FROM bhp");
        if (rows[0].count === 0) {
            await db.query(`
                INSERT INTO bhp (nama_bhp, stok, tgl_penerimaan, id_detail, kategori, lokasi_rak, stok_minimal, satuan) VALUES 
                ('Mouse Optik USB Logitech', 12, CURDATE(), NULL, 'Aksesori PC', 'Rak A-1', 5, 'Pcs'),
                ('Keyboard USB Standar', 8, CURDATE(), NULL, 'Aksesori PC', 'Rak A-2', 6, 'Pcs'),
                ('Konektor RJ-45 Cat6', 75, CURDATE(), NULL, 'Kabel & Jaringan', 'Rak B-1', 25, 'Pcs'),
                ('Kabel LAN UTP Cat6', 150, CURDATE(), NULL, 'Kabel & Jaringan', 'Rak B-2', 50, 'Meter'),
                ('Flashdisk Sandisk 32GB', 6, CURDATE(), NULL, 'Penyimpanan', 'Laci C-1', 3, 'Pcs'),
                ('Thermal Paste Arctic MX-4', 4, CURDATE(), NULL, 'Perawatan CPU', 'Laci C-2', 2, 'Tube')
            `);
            console.log('Data dummy BHP berhasil dimasukkan');
        } else {
            console.log('Tabel BHP sudah ada datanya.');
        }
    } catch(e) {
        console.error('Error insert dummy data:', e.message);
    }
    
    process.exit();
}

run();
