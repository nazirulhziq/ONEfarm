<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>One-Farm Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
     <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        background-image: url("assets/images/onefarm.jpg");
        background-color: #cccccc; /* Used if the image is unavailable */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .error {
  background: #F2DEDE;
  color: #A94442;
  padding: 10px;
  width: 100%;
  border-radius: 5px;
  margin: 20px auto;
}

    </style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php
include("connection/connect.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions
if(isset($_POST['submit']))   // if button is submit
{
	$username = $_POST['username'];  //fetch records from login form
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   // if records were not empty
     {
	$loginquery ="SELECT * FROM customer WHERE customerEmail='$username' && customerPassword='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))  // if matching records in the array & if everything is right
								{
                                    	$_SESSION["user_id"] = $row['customerID']; // put user id into temp session
										 header("refresh:1;url=index.php"); // redirect to index.php page
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; // throw error
                                }
	 }
	
	
}
?>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login.</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="username"required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>

			<div class="input-group">
				<button name="submit" id="buttn" name="submit" value="login" class="btn">Login</button>
			</div>
			<div class="input-group">
				<button class="btn"><a href="forgotPassword.php" style="color:#fff;" >Forgot Password</a></button> 
			</div>
			<p class="login-register-text" >Don't have an account? <a href="registration.php" style="color:#f30;">Register Here</a>.</p>
			<p class="login-register-text">Staff? <a href="staff.php">Click Here</a>.</p>
	



  

   



</body>

</html>
