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

  


</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"></a><span class="splash-description"style="font-size: 2rem; font-weight: 800;">Login.</span></div>

            <div class="card-body">
            <form action="loginstaff.php" id="loginForm" role="form" method="POST">

                    <div class="form-group">
                        <input class="form-control form-control-lg"  name="staffEmail" type="text" required placeholder="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg"  name="staffPass" type="password" required placeholder="password">
                    </div>
                    <?php if(isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <button type="submit" name="submit" class="btn  btn-lg btn-block" style="background-color:   #CEAB93">Login</button>
                </form>

                         <!-- buka modal -->
                         <br>
               <!-- buka modal -->
                <button class="btn  btn-lg btn-block"  name = "forgotpassword" style="background-color:   #CEAB93" href="#portfolioModal1" data-toggle="modal">Forgot Password</button>

                <p class="login-register-text">Customer? <a href="login.php">Click Here</a>.</p>
                </div>
            <!--div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div-->
        </div>

    </div>





        <!-- Modal Forgot Password-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <div class="error-pagewrap">
                                        <div class="error-page-int">
                                            <div class="text-center ps-recovered">
                                                <h3>Password Recovery</h3>
                                                <p>Please fill the form to reset your password</p>
                                            </div>
                                            <div class="content-error">
                                                <div class="hpanel">
                                                    <div class="panel-body poss-recover">
                                                        <p>
                                                            Enter your email address and your Secret Word.
                                                        </p>
                                                        <form action="forgotPassQuery.php" id="loginForm" role="form" method="POST">
                                                            <div class="form-group">
                                                                <input type="email" placeholder="example@gmail.com" title="Please enter your email address" required="true" value="" name="staffEmail" id="staffEmail" class="form-control">
                                                                <br>
                                                                <input type="text" placeholder="Secret Word" title="Please enter your secret password" required="true" value="" name="staffSecret" id="staffSecret" class="form-control">
                                                                <br>
                                                            </div>
                                                            <button class="btn btn-warning btn-block" type="submit" value="submit" name="submit">Reset password</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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