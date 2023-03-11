<?php
include('connection.php');
  if (isset($_POST['addWord'])) 
  {
      $staffEmail = $_GET['staffEmail'];
      $staffSecret = $_POST['staffSecret'];
      $staffSecret1 = $_POST['staffSecret1'];
      $password1 = $_POST['password1'];
      $password2 = $_POST['password2'];


      if ($staffSecret == $staffSecret1) 
      {
        if ($password1 == $password2) 
        {
          $sendSecret = md5($_POST['staffSecret']);
          $sendPass = md5($_POST['password1']);
          $query = "UPDATE staff SET staffSecret='$sendSecret', staffPass='$sendPass',staffActivate=1 WHERE staffEmail='$staffEmail'";
          $check_val = mysqli_query($conn,$query);

          if ($check_val) 
          {
              echo "<script>alert('Add Secret Word and Password Success');
                   document.location='index.php'</script>";
          }
          else
          {
              echo '<script>alert("ERROR.")</script>';
          }
        }
        else
        {
          echo '<script>alert("Passwords do not match.")</script>';
        } 
      }
      else
      {
          echo '<script>alert("Secret Words do not match.")</script>';
      }

  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <title>Password Reset</title> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #E0F9FF; /* Used if the image is unavailable */

    }
    </style>

<body >      

<div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
               

    <div class="admin-box-login">
    <h4 style="margin-top: 20px; text-align: center;"><strong>Set Secret Word and Password</strong></h4>
    <p>Please enter your secret word and password for your activation.</p><br>

 <div class="alert alert-danger text text-dark col-lg-12 ">REMINDER: Please remember your <b>   Secret Word</b></div><br>
<form action="" id="loginForm" role="form" method="POST">
                      <!-- SECRET WORD -->
                      <div>Secret Word</div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
                          <input name="staffSecret" id="staffSecret" placeholder="Secret Word" class="form-control" type="password" required="true">
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
                          <input name="staffSecret1" id="staffSecret1" placeholder="Retype Secret Word" class="form-control" type="password" required="true">
                        </div>
                      </div>
                      <!-- PASSWORD -->
                      <div>Password</div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
                          <input pattern="(?=\S*[\W])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character" name="password1" id="password1" placeholder="New Password..." class="form-control" type="password" required="true">
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
                          <input pattern="(?=\S*[\W])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character" name="password2" id="password2" placeholder="Confirm Password..."  class="form-control" type="password" required="true">
                        </div>
                      </div>
                        <div class="form-group">
                          <input name="addWord" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                        </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>

    <a href="index.php" class="loginHome">Home</a>

<br>
<input type="checkbox" style="float: left;" onclick="Toggle()"> 
   <p style="float: left; margin-left: 5px;"> Show</p><br>



</form>
<br><br>
       </div>
         </div>

          <div class="col-md-4"></div>
    </div>  
       
   </div> 
      </section>    
</body>
 <script> 
    // Change the type of input to password or text
    function Toggle(){
var pass = document.getElementById("password1");
var pass2 = document.getElementById("password2");
  if (pass.type === "password") {
    pass.type = "text";
  }
    if (pass2.type === "password") {
    pass2.type = "text";
  }
  else{
    pass.type = "password";
   pass2.type = "password";

  }


    } 
  
</script> 

</html>

