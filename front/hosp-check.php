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
      $diagnostic = validate($_POST['diagnostic']);
      $treatment = validate($_POST['treatment']);
      $roomnumber = validate($_POST['roomnumber']);
      $timeadmin = validate($_POST['timeadmin']);
      $dataint = date("m/d/Y");

      if(empty($firstname)){
            header("Location: hospitalization.php?error=Firstname is required!");
            exit();
      }else if(empty($lastname)){
            header("Location: hospitalization.php?error=Lastname is required!");
            exit();
      }else if(empty($CNP)){
            header("Location: hospitalization.php?error=CNP is required!");
            exit();
      }else if(empty($diagnostic)){
            header("Location: hospitalization.php?error=Diagnostic is required!");
            exit();
      }else if(empty($treatment)){
            header("Location: hospitalization.php?error=Treatment is required!");
            exit();
      }else if(empty($roomnumber)){
            header("Location: hospitalization.php?error=Room number is required!");
            exit();
      }else if(empty($timeadmin)){
            header("Location: hospitalization.php?error=Treatment time administration is required!");
            exit();
      }else{
            $sql = "SELECT * FROM users WHERE firstname='$firstname' AND lastname='$lastname' AND CNP='$CNP'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                  $row = mysqli_fetch_assoc($result);
                  if($row['firstname'] === $firstname && $row['lastname'] === $lastname && $row['CNP'] === $CNP){
                        $sql2 = "UPDATE users SET diagnostic = '$diagnostic', treatment = '$treatment', roomnumber = '$roomnumber', timeadmin = '$timeadmin', dataint ='$dataint' WHERE CNP = $CNP";
                        $result2 = mysqli_query($conn, $sql2);
                        if($result2){
                              header("Location: hospitalization.php?success=Register successfully!");
                              exit();
                        }else{
                              header("Location: hospitalization.php?error=unknown error occurred");
                              exit();
                        }
                  }else {
                        header("Location: hospitalization.php?error=Incorect data");
                        exit();
                  }
            }else{
                  header("Location: hospitalization.php?error=Incorect data");
                  exit();
            }
      }

}
else{
      header("Location: hospitalization.php");
      exit();
}

?>

