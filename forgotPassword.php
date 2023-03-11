<?php
    include "loginstaff.php";
?>
<!---------------------------------------------------------------------------- -->










<!doctype html>
<html lang="en">
 
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
        background-image: url("assets/images/.jpg");
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

  


</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"></a><span class="splash-description"style="font-size: 2rem; font-weight: 800;">Forgot Password.</span></div>

            <div class="card-body">
          

                                                                        <form action="forgotCustomer.php" id="loginForm" role="form" method="POST">
                                                            <div class="form-group">
                                                                <input type="email" placeholder="example@gmail.com" title="Please enter your email address" required="true" value="" name="customerEmail" id="customerEmail" class="form-control">
                                                                <br>
                                                                <input type="text" placeholder="Secret Word" title="Please enter your secret password" required="true" value="" name="customerSecurity" id="customerSecurity" class="form-control">
                                                                <br>
                                                            </div>
                                                            <button class="btn btn-warning btn-block" type="submit" value="submit" name="submit">Reset password</button>
                                                        </form>
                

        </div>

    </div>


    <!-- ============================================================== -->
    <!-- end modal page  -->

  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>


</body>
 
</html>