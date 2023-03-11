<?php 
include('inc/dbconnect.php');
session_start();

if (isset($_SESSION['user_id'])) {


if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

  function validate($data){
       $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  $op = validate($_POST['op']);
  $np = validate($_POST['np']);
  $c_np = validate($_POST['c_np']);
    
    if(empty($op)){
     echo "<script>alert('Old Password is required');
     document.location='changePassword.php'</script>";
    exit();
    }else if(empty($np)){
      echo "<script>alert('New Password is required');
     document.location='changePassword.php'</script>";
    exit();
    }else if($np !== $c_np){
      echo "<script>alert('The confirmation password  does not match');
     document.location='changePassword.php'</script>";
    exit();
    }else {
      // hashing the password
      $op = md5($op);
      $np = md5($np);
      $username = $_SESSION["user_id"];

        $sql = "SELECT customerPassword FROM customer WHERE customerID='$username' AND customerPassword='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
          
          $sql_2 = "UPDATE customer SET customerPassword='$np' WHERE customerID='$username'";
          mysqli_query($conn, $sql_2);
          echo "<script>alert('Password changed successfully');
     document.location='changePassword.php'</script>";
          exit();

        }else {
         echo "<script>alert('Incorrect Password');
     document.location='changePassword.php'</script>";
          exit();
        }

    }

    
}else{
  header("Location: changePassword.php");
  exit();
}

}else{
     header("Location: index.php");
     exit();
}