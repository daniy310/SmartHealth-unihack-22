const userModel = require('../models/userModel');
const { logger } = require('../helpers/logger');
const { validateRequest, handleCustomValidationError, handleNotFound, handleSuccess } = require('../helpers/response');
const {
    SerialPort
} = require('serialport');

const moduleLogger = logger.child({ module: 'userController' });

const port = new SerialPort({
    baudRate: 9600,
    dataBits: 8,
    parity: 'none',
    stopBits: 1,
    flowControl: false,
    path: "COM3"
});

const findUserById = async(req, res) => {
    const userId = req.params.userid;
    const userData = await userModel.find(userId);
    return handleSuccess(res, "Data for user", userData);
};

const sendToArduino = async(req, res) => {
    const userId = req.params.userid;
    const text = (req.params.text ? req.params.text : " ");
    const userData = await userModel.find(userId);

    const userRoomNumber = "" + userData.roomnumber;

    port.write("1");
    port.write(" ");
    port.write("0");
    port.write(" ");
    port.write(userRoomNumber);
    port.write(" ");
    port.write(text);
    return handleSuccess(res, "Sent to arduino", "");
};

const sendEmergencyToArduino = async(req, res) => {
    const userId = req.params.userid;
    const text = (req.params.text ? req.params.text : " ");
    const userData = await userModel.find(userId);

    const userRoomNumber = "" + userData.roomnumber;

    port.write("1");
    port.write(" ");
    port.write("1");
    port.write(" ");
    port.write(userRoomNumber);
    port.write(" ");
    port.write(text);
    return handleSuccess(res, "Sent emergency to arduino", "");
};

const lightOffArduino = () => {
    port.write("0");
    return handleSuccess("Sent light off command to arduino", "");
};



const roomLightArduino = () => {
    port.write("0");
    return handleSuccess(res, "Sent room lights command to arduino", "");
};

const roomBlindsArduino = () => {
    port.write("0");
    return handleSuccess(res, "Sent room blinds command to arduino", "");
};

module.exports = {
    findUserById,
    sendToArduino,
    sendEmergencyToArduino,
    lightOffArduino,
    roomLightArduino,
    roomBlindsArduino
};