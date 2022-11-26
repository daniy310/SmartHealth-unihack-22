<?php 
include "includes/db-conn.php";
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user']) && $_SESSION['user'] == 1){
      
?>
<?php require_once ('includes/header.php'); ?> 
<body>
      <?php include ('includes/navbard.php');?>
      <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/signin.jpg')"> 
                  <h1 class="text-center">Patients</h1>
      </div>
      <div class="container my-4">
            <table class="table">
                  <thead class="thead-dark">
                        <tr>
                              <th scope="col">#</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">CNP</th>
                              <th scope="col">Diagnostic</th>
                              <th scope="col">Treatment</th>
                              <th scope="col">Room number</th>
                              <th scope="col">Treatment time administration</th>
                              <th scope="col">Date of admission</th>
                        </tr>
                  </thead>
                  <?php 
                  $sql = "SELECT id, firstname, lastname, CNP, diagnostic, treatment, roomnumber, timeadmin, dataint from users";
                  $result = $conn ->query($sql);
                  if($result -> num_rows > 0 )
                        while($row = $result -> fetch_assoc()) if($row['roomnumber']){ ?>
                              <tbody>
                                    <tr>
                                          <th scope="row"><?php echo $row['id']; ?></th>
                                          <td><?php echo $row['firstname']; ?></td>
                                          <td><?php echo $row['lastname']; ?></td>
                                          <td><?php echo $row['CNP']; ?></td>
                                          <td><?php echo $row['diagnostic']; ?></td>
                                          <td><?php echo $row['treatment']; ?></td>
                                          <td><?php echo $row['roomnumber']; ?></td>
                                          <td><?php echo $row['timeadmin']; ?></td>
                                          <td><?php echo $row['dataint']; ?></td>
                                    </tr>
                              </tbody>
                        <?php } ?>
            </table>
      </div>
</body>

<?php require_once ('includes/footer.php'); ?> 

<?php
}else{
      header("Location: signin.php");
      exit();
}

?>