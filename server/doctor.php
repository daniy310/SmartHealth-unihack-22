<?php
include "includes/db-conn.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && $_SESSION['user'] == 1) {

?>
      <?php require_once('includes/header.php'); ?>

      <body>
            <?php include('includes/navbard.php'); ?>
            <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/signin.jpg')">
                  <h1 class="text-center h1-hack">Hello <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h1>
            </div>
      </body>


      <?php require_once('includes/footer.php'); ?>

<?php
} else {
      header("Location: signin.php");
      exit();
}

?>