const db = require('./config/db.js');

const updates = [
    "UPDATE `bhp` SET `nama_bhp` = 'Konektor RJ45 Cat6 (Isi 50 pcs)', `stok` = 5, `tgl_penerimaan` = '2026-03-15', `id_detail` = 24, `id_kategori` = 3, `satuan` = 'Pack' WHERE `id_bhp` = 1;",
    "UPDATE `bhp` SET `nama_bhp` = 'Thermal Paste Deepcool Z5', `stok` = 10, `tgl_penerimaan` = '2026-03-15', `id_detail` = 25, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 2;",
    "UPDATE `bhp` SET `nama_bhp` = 'Baterai CMOS CR2032 Maxell', `stok` = 30, `tgl_penerimaan` = '2026-03-16', `id_detail` = 26, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 3;",
    "UPDATE `bhp` SET `nama_bhp` = 'Cairan Pembersih Layar (Screen Cleaner)', `stok` = 12, `tgl_penerimaan` = '2026-03-16', `id_detail` = 27, `id_kategori` = 3, `satuan` = 'Botol' WHERE `id_bhp` = 4;",
    "UPDATE `bhp` SET `nama_bhp` = 'Kain Lap Microfiber', `stok` = 15, `tgl_penerimaan` = '2026-03-16', `id_detail` = 28, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 5;",
    "UPDATE `bhp` SET `nama_bhp` = 'Cable Ties / Pengikat Kabel (100 pcs)', `stok` = 8, `tgl_penerimaan` = '2026-03-17', `id_detail` = 29, `id_kategori` = 3, `satuan` = 'Pack' WHERE `id_bhp` = 11;",
    "UPDATE `bhp` SET `nama_bhp` = 'Isolatif Listrik Nitto (Electrical Tape)', `stok` = 10, `tgl_penerimaan` = '2026-03-17', `id_detail` = 30, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 12;",
    "UPDATE `bhp` SET `nama_bhp` = 'Timah Solder Paragon 10 meter', `stok` = 5, `tgl_penerimaan` = '2026-03-18', `id_detail` = 31, `id_kategori` = 3, `satuan` = 'Roll' WHERE `id_bhp` = 13;",
    "UPDATE `bhp` SET `nama_bhp` = 'Pasta Solder (Flux)', `stok` = 5, `tgl_penerimaan` = '2026-03-18', `id_detail` = 32, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 14;",
    "UPDATE `bhp` SET `nama_bhp` = 'Alkohol Swab 70% (Pembersih Pin RAM)', `stok` = 3, `tgl_penerimaan` = '2026-03-19', `id_detail` = 33, `id_kategori` = 3, `satuan` = 'Box' WHERE `id_bhp` = 15;",
    "UPDATE `bhp` SET `nama_bhp` = 'CD-R Blank Verbatim (Isi 50)', `stok` = 2, `tgl_penerimaan` = '2026-03-20', `id_detail` = 34, `id_kategori` = 3, `satuan` = 'Pack' WHERE `id_bhp` = 16;",
    "UPDATE `bhp` SET `nama_bhp` = 'Desinfektan Spray untuk Keyboard/Mouse', `stok` = 6, `tgl_penerimaan` = '2026-03-20', `id_detail` = 35, `id_kategori` = 3, `satuan` = 'Botol' WHERE `id_bhp` = 17;",
    "UPDATE `bhp` SET `nama_bhp` = 'Catridge Printer Canon PG-745 Black', `stok` = 4, `tgl_penerimaan` = '2026-03-22', `id_detail` = 36, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 19;",
    "UPDATE `bhp` SET `nama_bhp` = 'Kertas Label Barcode Thermal', `stok` = 10, `tgl_penerimaan` = '2026-03-22', `id_detail` = 37, `id_kategori` = 2, `satuan` = 'Roll' WHERE `id_bhp` = 20;",
    "UPDATE `bhp` SET `nama_bhp` = 'Baterai AA Alkaline (Untuk Mouse Wireless)', `stok` = 40, `tgl_penerimaan` = '2026-03-23', `id_detail` = 38, `id_kategori` = 3, `satuan` = 'Pcs' WHERE `id_bhp` = 21;"
];

async function run() {
    for (const sql of updates) {
        try {
            await db.query(sql);
            console.log("Executed:", sql);
        } catch (e) {
            console.error("Error on:", sql, e.message);
        }
    }
    console.log("Done");
    process.exit(0);
}

run();
