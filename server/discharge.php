<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && $_SESSION['user'] == 1) {

?>
      <?php require_once('includes/header.php'); ?>

      <body>
            <?php include('includes/navbard.php'); ?>
            <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/doc2.jpg')">
                  <h1 class="text-center">Discharge</h1>
            </div>
            <div class="container my-4 py-4">
                  <div class="d-flex justify-content-center mb-3">
                        <form class="row g-3 col-lg-6 col-11  shadow-lg signin formHack" action="discharge-check.php" method="POST">
                              <?php if (isset($_GET['error'])) { ?>
                                    <div class="px-5">
                                          <div class="alert alert-danger text-center" role="alert">
                                                <?php echo ($_GET['error']); ?>
                                          </div>
                                    </div>
                              <?php } ?>
                              <?php if (isset($_GET['success'])) { ?>
                                    <div class="px-5">
                                          <div class="alert alert-success text-center" role="alert">
                                                <?php echo ($_GET['success']); ?>
                                          </div>
                                    </div>
                              <?php } ?>

                              <div class="row my-3">
                                    <div class="col px-5">
                                          <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname">
                                    </div>
                                    <div class="col pr-4">
                                          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname">
                                    </div>
                              </div>
                              <div class="mb-3 px-5">
                                    <input class="form-control mb-3" type="text" placeholder="CNP" name="CNP" value="">
                              </div>
                              <div class="form-check mx-4 px-5">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" value="gridCheck" required>
                                    <label class="form-check-label" for="gridCheck">
                                          Check me out
                                    </label>
                              </div>
                              <div class="mb-3 px-5">
                                    <button type="submit" class="btn signinbutton">Delete</button>
                              </div>
                        </form>
                  </div>
            </div>
      </body>

      <?php require_once('includes/footer.php'); ?>

<?php
} else {
      header("Location: signin.php");
      exit();
}

?>