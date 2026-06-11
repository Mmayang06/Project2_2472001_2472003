const db = require('./config/db');

async function check() {
    const [users] = await db.query('SELECT nama, email, reset_requested FROM user');
    console.log(users);
    process.exit();
}
check();
