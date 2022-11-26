const config = require('config');
const { logger } = require('./logger');
const { Sequelize } = require('sequelize');

const moduleLogger = logger.child({ module: 'database' });

const dbConfig = {
    connectionLimit: config.get('db.connectionLimit'),
    host: config.get('db.host'),
    port: config.get('db.port'),
    user: config.get('db.user'),
    password: config.get('db.password'),
    database: config.get('db.name'),
    debug: config.get('db.debug') === 'true' ? ['ComQueryPacket', 'RowDataPacket'] : false,
    timezone: (new Date().getTimezoneOffset() / 60) * -1
};
moduleLogger.debug({ dbConfig });


const currentTimestamp = {
    toSqlString: () => 'CURRENT_TIMESTAMP()'
};

const sequelizeDB = new Sequelize(dbConfig.database, dbConfig.user, dbConfig.password, {
    host: dbConfig.host,
    dialect: "mysql"
});

module.exports = {
    sequelizeDB,
    currentTimestamp,
};