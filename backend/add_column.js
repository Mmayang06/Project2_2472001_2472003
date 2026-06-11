const db = require('./config/db');

async function addColumn() {
    try {
        await db.query("ALTER TABLE user ADD COLUMN tahun_jabatan VARCHAR(50) NULL;");
        console.log("Column added successfully.");
    } catch (err) {
        // Ignored if column already exists
        if (err.code === 'ER_DUP_FIELDNAME') {
            console.log("Column already exists.");
        } else {
            console.error("Error:", err.message);
        }
    } finally {
        process.exit();
    }
}

addColumn();
