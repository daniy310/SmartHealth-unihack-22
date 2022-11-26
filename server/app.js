const express = require('express'); //Line 1
const app = express(); //Line 2
var SerialPort = require('serialport');

const http = require('http').Server(app);

const io = require('socket.io')(http);


const parsers = SerialPort.parsers;
const parser = new parsers.Readline({
    delimiter: '/r/n'
});

var port = new SerialPort('COM3', {
    baudRate: 9600,
    databits: 8,
    stopBits: 1,
    parity: 'none',
    flowControl: false
});

port.pipe(parser);

io.on('connection', (socket) => {
    socket.on('call', (arg1, arg2, arg3, arg4) => {
        console.log(arg1);
        console.log(arg2);
        console.log(arg3);
        console.log(arg4);

        port.write(arg1);
        port.write(' ');
        port.write(arg2);
        port.write(' ');
        port.write(arg3);
        port.write(' ');
        port.write(arg4);
    });

    socket.on('stop', () => {
        console.log('0');
        port.write('0');
    })
})

http.listen(8080);