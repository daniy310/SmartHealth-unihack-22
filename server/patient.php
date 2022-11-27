<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && $_SESSION['user'] == 2) {

?>
      <?php require_once('includes/header.php'); ?>

      <body>
<<<<<<< Updated upstream
            <?php include('includes/navbarp.php');?>
            <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/signin.jpg')">
                  <h1 class="text-center h1-hack">Hello <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h1>
=======
            <?php include('includes/navbarp.php'); ?>
            <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/doc7.jpg')">
                  
                  <div class="d-flex justify-content-center align-items-center ">     
                        <h1 class="text-center h1-index">Hello <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h1>
                  </div>
            </div>
            <div class="container my-4 py-4">
                  <h2 class="h1title hello"><b><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></b></h2><br><br>
                  <div class="container">
                        <div class="row align-items-center justify-content-center">
                              <div class="card col-lg-7 me-auto mb-5 border-0">
                                    <div class="col-lg-7 card rounded border-0 shadow-lg">
                                          <div class="my-3 mx-3">
                                          <?php if($_SESSION['roomnumber'] != 0) { ?>
                                                <h4>Room Number</h4>
                                                      <p><?php echo $_SESSION['roomnumber'] ?></p>
                                                <h4>Diagnostic</h4>
                                                      <p><?php echo $_SESSION['diagnostic'] ?></p>
                                                <h4>Treatment</h4>
                                                      <p><?php echo $_SESSION['treatment'] ?></p>
                                                <h4>Hospitalization date</h4>
                                                      <p><?php echo $_SESSION['dataint'] ?></p>
                                          <?php }else{ ?>
                                                      <div class="alert alert-danger text-center" role="alert">
                                                            You are not hospitalized
                                                      </div>
                                                      <h4>CNP</h4>
                                                            <p><?php echo $_SESSION['CNP'] ?></p>
                                                      <h4>Phone number</h4>
                                                            <p><?php echo $_SESSION['phone'] ?></p>
                                                      <h4>City</h4>
                                                            <p><?php echo $_SESSION['city'] ?></p>
                                          <?php } ?>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-5">
                                    <div class="card rounded border-0 shadow-lg">
                                          <img class="shadow-lg" src="includes/images/logo.png" alt="Photo">
                                    </div>
                              </div>
                        </div>
                  </div>
>>>>>>> Stashed changes
            </div>
      </body>

      <?php require_once('includes/footer.php'); ?>

<?php
} else {
      header("Location: signin.php");
      exit();
}

?>