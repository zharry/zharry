const mysql = require('mysql');
const fs = require('fs');
const path = require('path');

const config = {
    host: process.env.DB_HOST || 'mysql',
    user: process.env.DB_USER || 'root',
    password: process.env.DB_PW || '',
    database: process.env.DB_NAME || 'wsc_t17',
};

const conn = mysql.createConnection({
    ...config,
    multipleStatements: true
});

conn.connect((err) => {
    if (err) {
        console.error('Failed to connect to database');
        console.error('Used configuration:');
        console.error(`DB_HOST='${config.host}'`);
        console.error(`DB_USER='${config.user}'`);
        console.error(`DB_PW=${config.password ? '\'' + config.password.replace(/./g, '*') + '\'' : 'no password'}`);
        console.error(`DB_NAME='${config.database}'`);
        console.error('\n');
        console.error('You can overwrite any of the above configuration by setting them as an environment variable. For example:');
        console.error('npm run cypress -- open --env DB_USER=wsc,DB_PW=mypw');

        process.exit(1);
    }
});

const dumpPath = path.resolve(__dirname, 'data', 'db-dump.sql');
const dump = fs.readFileSync(dumpPath, 'utf8');
conn.query(dump, (err) => {
    if (err) {
        console.error(err);
        throw err;
    }
});

conn.end();
