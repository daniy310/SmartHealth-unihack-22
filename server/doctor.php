<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['user'])){
      
?>
<?php require_once ('includes/header.php'); ?> 
<body>
      <h1>Hello <?php echo $_SESSION['firstname']; ?></h1>
      <a href="logout.php">Logout</a>
</body>
</html>

<?php
}else{
      header("Location: login.php");
      exit();
}

?>