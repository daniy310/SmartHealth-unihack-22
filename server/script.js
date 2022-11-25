var mockRoom = "17";
var socket = io();

document.getElementById('emergency').onclick = function() {
    var text = document.getElementById('callInput').value;
    socket.emit('call', '1', '1', mockRoom, text) // aprindere bec, urgenta, nr camerei, text
};

document.getElementById('nurse').onclick = function() {
    var text = document.getElementById('callInput').value;
    socket.emit('call', '1', '0', mockRoom, text);
}

document.getElementById('lightOff').onclick = function() {
    socket.emit('stop');
}

console.log("aa");