<?php
include('connection.php'); 

if (isset($_POST['submit'])) 
{
    $staffEmail = $_GET['staffEmail'];
    $custPassword = $_POST['custPassword'];
    $custPassword1 = $_POST['custPassword1'];

    if ($custPassword == $custPassword1) 
    {
        $custPasswordreal = md5($_POST['custPassword']);
        $query = "UPDATE customer SET staffPass='$custPasswordreal' WHERE staffEmail='$staffEmail'";
        $check_val = mysqli_query($conn,$query);

        if ($check_val) 
        {

            echo "<script>alert('Change password succeed');
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
    <h4 style="margin-top: 20px; text-align: center;"><strong>FORGOT PASSWORD ?</strong></h4>
    <p>You can reset your password here.</p><br>

<form  id="loginForm" role="form" action="" method="POST">
<input name="custPassword" id="custPassword" placeholder="New Password..." class="form-control" type="password" required="true">
<br>
<input name="custPassword1" id="custPassword1" placeholder="Confirm Password..." class="form-control" type="password" required="true">   
<br>
<input type="checkbox" style="float: left;" onclick="Toggle()"> 
   <p style="float: left; margin-left: 5px;"> Show</p><br>

    
    <button class="btn admin-reg-btn btn-block text-light" style="background-color:#0000FF" name="submit" type="submit">Submit</button><br>

 <input type="hidden" class="hide" name="token" id="token" value=""> 

    <a href="index.php" class="loginHome">Home</a>

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
var pass = document.getElementById("custPassword");
var pass2 = document.getElementById("custPassword1");
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