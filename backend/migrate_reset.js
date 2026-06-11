const db = require('./config/db');

async function migrate() {
    try {
        await db.query('ALTER TABLE user ADD COLUMN reset_requested TINYINT(1) DEFAULT 0');
        console.log("Column added successfully.");
    } catch (e) {
        console.error("Migration failed or column already exists: ", e.message);
    }
    process.exit();
}

migrate();
