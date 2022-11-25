<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user'])){
      
?>
<?php require_once ('includes/header.php'); ?> 
<body>
      <?php include ('includes/navbar.php'); ?>
      <br><br><br><br>
      <h1>Hello <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></h1>
      <a href="logout.php">Logout</a>
</body>
</html>

<?php
}else{
      header("Location: signin.php");
      exit();
}

?>