<?php 
include('../inc/dbconnect.php');
session_start();

if (isset($_SESSION['username'])) {


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
      header("Location: changePass.php?msg=<div class='alert alert-warning mx-auto col-lg-10 rounded p-3'>Old Password is required</div>");
    exit();
    }else if(empty($np)){
      header("Location: changePass.php?msg=<div class='alert alert-warning mx-auto col-lg-10 rounded p-3'>New Password is required</div>");
    exit();
    }else if($np !== $c_np){
      header("Location: changePass.php?msg=<div class='alert alert-warning mx-auto col-lg-10 rounded p-3'>The confirmation password  does not match</div>");
    exit();
    }else {
      // hashing the password
      $op = md5($op);
      $np = md5($np);
      $username = $_SESSION['username'];

        $sql = "SELECT staffPass
                FROM staff WHERE 
                staffEmail='$username' AND staffPass='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
          
          $sql_2 = "UPDATE staff
                    SET staffPass='$np'
                    WHERE staffEmail='$username'";
          mysqli_query($conn, $sql_2);
          header("Location: changePass.php?msg=<div class='alert alert-success mx-auto col-lg-10 rounded p-3'>Your password has been changed successfully</div>");
          exit();

        }else {
          header("Location: changePass.php?msg=<div class='alert alert-danger mx-auto col-lg-10 rounded p-3'>Incorrect current password</div>");
          exit();
        }

    }

    
}else{
  header("Location: changePass.php");
  exit();
}

}else{
     header("Location: index.php");
     exit();
}