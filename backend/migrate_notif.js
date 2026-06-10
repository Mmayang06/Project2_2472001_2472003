const mysql = require('mysql2/promise');

async function migrate() {
    const db = await mysql.createConnection({
        host: 'localhost',
        user: 'root',
        database: 'inventoris'
    });

    await db.query(`
        CREATE TABLE IF NOT EXISTS notifikasi (
            id_notifikasi INT AUTO_INCREMENT PRIMARY KEY,
            role_target VARCHAR(50) NOT NULL,
            pesan TEXT NOT NULL,
            tipe VARCHAR(20) DEFAULT 'info',
            link VARCHAR(255) DEFAULT '#',
            is_read BOOLEAN DEFAULT FALSE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    `);

    console.log('Table notifikasi created');
    process.exit(0);
}

migrate();
