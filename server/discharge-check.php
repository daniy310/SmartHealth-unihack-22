<?php session_start(); 
include "includes/db-conn.php";

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['CNP'])){
      function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
      }
      $firstname = validate($_POST['firstname']);
      $lastname = validate($_POST['lastname']);
      $CNP = validate($_POST['CNP']);
      $dataout = date("m/d/Y");

      if(empty($firstname)){
            header("Location: discharge.php?error=Firstname is required!");
            exit();
      }else if(empty($lastname)){
            header("Location: discharge.php?error=Lastname is required!");
            exit();
      }else if(empty($CNP)){
            header("Location: discharge.php?error=CNP is required!");
            exit();
      }else{
            $sql = "SELECT * FROM users WHERE firstname='$firstname' AND lastname='$lastname' AND CNP='$CNP'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                  $row = mysqli_fetch_assoc($result);
                  if($row['firstname'] === $firstname && $row['lastname'] === $lastname && $row['CNP'] === $CNP){
                        $delete = "DELETE FROM users WHERE diagnostic, treatment, roomnumber, timeadmin, dataint";
                        $result2 = mysqli_query($conn, $delete);
                        if($result2){
                              header("Location: discharge.php?success=Delete successfully!");
                              exit();
                        }else{
                              header("Location: discharge.php?error=unknown error occurred");
                              exit();
                        }
                  }else {
                        header("Location: discharge.php?error=Incorect data");
                        exit();
                  }
            }else{
                  header("Location: discharge.php?error=Incorect data");
                  exit();
            }
      }

}
else{
      header("Location: discharge.php");
      exit();
}

?>

