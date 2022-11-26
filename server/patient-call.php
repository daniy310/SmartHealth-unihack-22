<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Health Pacient Requests</title>
    <script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
</head>

<body>
    <h1>Test</h1>
    <input id="callInput">
    <button id="nurse">Nurse</button>
    <br><br>
    <button id="emergency">EMERGENCY !!</button>
    <br><br><br><br>
    <button id="lightOff">Light Off</button>


    <script>
        console.log("aaa");
        var userId = `<?php echo $_SESSION['id'] ?>`;
        console.log(userId);

        console.log("a");
        document.getElementById('emergency').onclick = function() {
            var text = document.getElementById('callInput').value;
            // socket.emit('call', '1', '1', mockRoom, text) // aprindere bec, urgenta, nr camerei, text
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", `http://localhost:3000/patient_emergency_call/${userId}/${text}`, false); // false for synchronous request
            xmlHttp.send(null);
            var response = xmlHttp.responseText;
        };

        document.getElementById('nurse').onclick = function() {
            var text = document.getElementById('callInput').value;
            //socket.emit('call', '1', '0', mockRoom, text);

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", `http://localhost:3000/patient_call/${userId}/${text}`, false); // false for synchronous request
            xmlHttp.send(null);
            var response = xmlHttp.responseText;
            // console.log(response);
        }

        document.getElementById('lightOff').onclick = function() {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", "http://localhost:3000/patient_lightOff", false); // false for synchronous request
            xmlHttp.send(null);
            var response = xmlHttp.responseText;
            // console.log(response);
        }

        console.log("aa");
    </script>
</body>

</html>