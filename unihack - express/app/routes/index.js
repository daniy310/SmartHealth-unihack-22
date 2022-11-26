const { checkSchema } = require('express-validator');
const packageJson = require('../../package.json');
const { isAuthenticated } = require('../helpers/authentication');
const usersController = require('../controllers/usersController');

module.exports = app => {
    app.route('/').get((_req, res) =>
        res.send({
            success: true,
            status: 200,
            message: 'OK',
            data: {
                serverStatus: 'online',
                version: packageJson.version
            }
        })
    );

    app.route('/patient_call/:userid/:text').get([], usersController.sendToArduino);
    app.route('/patient_call/:userid').get([], usersController.sendToArduino);
    app.route('/patient_emergency_call/:userid/:text').get([], usersController.sendEmergencyToArduino);
    app.route('/patient_emergency_call/:userid').get([], usersController.sendEmergencyToArduino);
    app.route('/patient_lightOff').get([], usersController.lightOffArduino);
    app.route('/patient_room_lights/:userid').get([], usersController.roomLightArduino);
    app.route('/patient_room_blinds/:userid').get([], usersController.roomBlindsArduino);
    app.route('/get_user/:userid').get([], usersController.findUserById);


    //app.route('/register').post()
};