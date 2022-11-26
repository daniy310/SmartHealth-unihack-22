<?php session_start(); 
include "includes/db-conn.php";

if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['CNP']) && isset($_POST['comment'])){
      function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
      }
      $firstname = validate($_SESSION['firstname']);
      $lastname = validate($_SESSION['lastname']);
      $CNP =validate($_SESSION['CNP']);
      $comment = validate($_POST['comment']);

      if(empty($comment)){
            header("Location: assistp.php?error=Comment is required!");
            exit();
      }else{
            $sql = "SELECT * FROM users WHERE firstname='$firstname' AND lastname='$lastname' AND CNP='$CNP'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                  $row = mysqli_fetch_assoc($result);
                  if($row['firstname'] === $firstname && $row['lastname'] === $lastname && $row['CNP'] === $CNP){
                        $sql2 = "UPDATE users SET comment = '$comment' WHERE CNP = $CNP ";
                        $result2 = mysqli_query($conn, $sql2);
                        if($result2){
                              header("Location: assistp.php?success=Registered successfully!");
                              exit();
                        }else{
                              header("Location: assistp.php?error=unknown error occurred");
                              exit();
                        }
                  }else {
                        header("Location: assistp.php?error=Incorect data");
                        exit();
                  }
            }else{
                  header("Location: assistp.php?error=Incorect data");
                  exit();
            }
      }

}
else{
      header("Location: assistp.php");
      exit();
}

?>

