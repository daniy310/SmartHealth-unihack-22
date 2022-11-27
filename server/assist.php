<?php 
session_start();
include "includes/db-conn.php";
if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && $_SESSION['user'] == 1){
      
?>
<?php require_once ('includes/header.php'); ?> 
<body>
      <?php include ('includes/navbard.php');?>
      <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/signin.jpg')"> 
                  
                  <div class="d-flex justify-content-center align-items-center ">     
                        <h1 class="text-center h1-index">Assistance</h1>
                  </div>
      </div>
      <div class="container my-4">
            <table class="table">
                  <thead class="thead-dark">
                        <tr>
                              <th scope="col">#</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">CNP</th>
                              <th scope="col">Comment</th>
                        </tr>
                  </thead>
      <?php 
            $sql = "SELECT id, firstname, lastname, CNP, comment from users";
            $result = $conn ->query($sql);
            if($result -> num_rows > 0 )
                  while($row = $result -> fetch_assoc()) if($row['comment']){ ?>
                        <tbody>
                                    <tr>
                                          <th scope="row"><?php echo $row['id']; ?></th>
                                          <td><?php echo $row['firstname']; ?></td>
                                          <td><?php echo $row['lastname']; ?></td>
                                          <td><?php echo $row['CNP']; ?></td>
                                          <td>
                                                <div class="alert alert-danger" role="alert">
                                                      <?php echo $row['comment']; ?>
                                                </div>
                                          </td>
                                    </tr>
                              </tbody>
                       
      <?php } ?>
            </table>
      </div>

      <div class="container my-4 py-4">
            <div class="d-flex justify-content-center mb-3">
                  <form class="row g-3 col-lg-6 col-11  shadow-lg signin" action="assist-check.php" method="POST" >
                        <?php if(isset($_GET['error'])) {?>
                              <div class="px-5">
                                    <div class="alert alert-danger text-center" role="alert">
                                          <?php echo($_GET['error']); ?>
                                    </div>
                              </div>
                        <?php } ?>
                        <?php if(isset($_GET['success'])) {?>
                              <div class="px-5">
                                    <div class="alert alert-success text-center" role="alert">
                                          <?php echo($_GET['success']); ?>
                                    </div>
                              </div>
                        <?php } ?>
                        <div class="form-group">
                              <label for="exampleFormControlTextarea1">Answer to the patient</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                        </div>
                        <div class="form-check mx-4 px-5">
                              <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" value="gridCheck" required>
                              <label class="form-check-label" for="gridCheck">
                                    Check me out
                              </label>
                        </div>
                        <div class="mb-3 px-5">
                              <button type="submit" class="btn signinbutton">Submit</button>
                        </div>
                  </form>
            </div>
      </div>
</body>

<?php require_once ('includes/footer.php'); ?> 

<?php
}else{
      header("Location: signin.php");
      exit();
}

?>