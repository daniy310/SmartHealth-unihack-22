<?php
     $host = "localhost";
     $mail = "root"; 
     $password = ""; 
     $dbname = "smart_health"; 
     
     $conn = mysqli_connect($host, $mail, $password, $dbname);
     
     if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
     }
?>