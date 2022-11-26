const _ = require('lodash');
const config = require('config');
const { sequelizeDB } = require('../helpers/database');
const { logger } = require('../helpers/logger');
const { DataTypes } = require('sequelize');

const moduleLogger = logger.child({ module: 'userModel' });

// List of enabled
const userEnabled = {
    active: 1,
    disabled: 0
};

// List of status
const userStatus = {
    active: 10,
    deleted: 0,
    pending: -1
};

// List of role
const userRole = {
    administrator: 99,
    staff: 50,
    user: 1
};

const User = sequelizeDB.define('users', {
    city: DataTypes.STRING,
    CNP: DataTypes.INTEGER,
    email: DataTypes.STRING,
    firstname: DataTypes.STRING,
    lastname: DataTypes.STRING,
    password: DataTypes.STRING,
    phone: DataTypes.INTEGER,
    roomnumber: DataTypes.INTEGER,
    user: DataTypes.INTEGER,
    zipcode: DataTypes.INTEGER,
}, {
    updatedAt: false,
    createdAt: false,
    paranoid: false,
    freezeTableName: true,
    timestamps: false,
});

const countAll = async() => {
    return await User.count();
}

const find = async(paramId) => {
    return await User.findByPk(paramId);
}

module.exports = {
    countAll,
    find
};