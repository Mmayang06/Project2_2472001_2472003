const db = require('./config/db');
const fs = require('fs');

async function getSchema() {
    try {
        const [tables] = await db.query('SHOW TABLES');
        const tableNameKey = Object.keys(tables[0])[0];
        
        const schema = {};
        for (const table of tables) {
            const tableName = table[tableNameKey];
            const [columns] = await db.query(`DESCRIBE ${tableName}`);
            schema[tableName] = columns;
        }
        fs.writeFileSync('schema.json', JSON.stringify(schema, null, 2));
        process.exit();
    } catch (error) {
        console.error(error);
        process.exit(1);
    }
}

getSchema();
