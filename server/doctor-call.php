<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && $_SESSION['user'] == '1') {

?>
    <?php require_once('includes/header.php'); ?>

    <body>
        <?php include('includes/navbard.php'); ?>
        <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/doc3.jpg')">
            
            <div class="d-flex justify-content-center align-items-center ">     
                <h1 class="text-center h1-index">Hello <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h1>
            </div>
        </div>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Smart Health Pacient Requests</title>
            <script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
        </head>

        <body>



            <div class="container my-4 py-4">
                <div class="d-flex justify-content-center mb-3">
                    <form class="row g-3 col-lg-6 col-11 shadow-lg signin text-center formHack" action="#">
                        <div class="mb-3 pt-3 px-5">
                            <h1>Call Received</h1>
                        </div>

                        <div class="mb-3 px-5">
                            <button class="btn signinbutton btn-lg" id="lightOff">Received</button>
                        </div>

                    </form>
                </div>
            </div>



            <script>
                var userId = `<?php echo $_SESSION['id'] ?>`;

                document.getElementById('lightOff').onclick = function() {
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open("GET", "http://localhost:3000/patient_lightOff", false); // false for synchronous request
                    xmlHttp.send(null);
                    var response = xmlHttp.responseText;
                }
            </script>
             <?php require_once('includes/footer.php'); ?>
        </body>

        <?php require_once('includes/footer.php'); ?>
    <?php
} else {
    header("Location: signin.php");
    exit();
}

    ?>