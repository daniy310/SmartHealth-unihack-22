<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && isset($_SESSION['user']) == '2') {

?>
    <?php require_once('includes/header.php'); ?>

    <body>
        <?php include('includes/navbarp.php'); ?>
        <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/signin.jpg')">
            <h1 class="text-center h1-hack">Hello <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h1>
        </div>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Smart Health Room Control</title>
            <script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
        </head>

        <body>



            <div class="container my-4 py-4">
                <div class="d-flex justify-content-center mb-3">
                    <form class="row g-3 col-lg-6 col-11 shadow-lg signin text-center formHack">
                        <div class="mb-3 pt-3 px-5">
                            <h1>Room Control</h1>
                        </div>

                        <div class="mb-3 px-5">
                            <button class="btn signinbutton" id="roomLights">Turn the Light On/Off</button>
                        </div>
                        <div class="mb-3 px-5">
                            <button class="btn signinbutton" id="blinds">Open/Close the Blinds</button>
                        </div>

                    </form>
                </div>
            </div>



            <script>
                var userId = `<?php echo $_SESSION['id'] ?>`;

                document.getElementById('roomLights').onclick = function() {
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open("GET", `http://localhost:3000/patient_room_lights/${userId}`, false); // false for synchronous request
                    xmlHttp.send(null);
                    var response = xmlHttp.responseText;
                };

                document.getElementById('blinds').onclick = function() {
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open("GET", `http://localhost:3000/patient_room_blinds/${userId}`, false); // false for synchronous request
                    xmlHttp.send(null);
                    var response = xmlHttp.responseText;
                }
            </script>
        </body>

        </html>

    <?php
} else {
    header("Location: signin.php");
    exit();
}

    ?>