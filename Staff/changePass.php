<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
<head>
<?php
include('includes/head.php');
?>


</head>

<body>
    <!-- Start Left menu area -->
<?php
if($_SESSION["username"]) {
//include('includes/navbar.php');
include('includes/topbar.php');
include('includes/mobile.php');
?>
<!-- ============================================================== -->


                                
            <div class="breadcome-area">
            <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Change Password</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <form action="changePassQuery.php" method="post">

                <?php if (isset($_GET['msg'])) { ?>
                <p class="msg"><?php echo $_GET['msg']; ?></p>
                <?php } ?>
                
              <div class="card-body mt-3">
                <div class="col-lg-10 mx-auto mt-3">

                <div class="form-row mb-3">
                    <label for="" class="col-lg-3">Current Password :</label>
                    <input type="password" name="op" class="col form-control" placeholder="" required>
                </div>
                   <div class="form-row mb-3">
                    <label for="" class="col-lg-3">New Password :</label>
                    <input pattern="(?=\S*[\W])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character" type="password" name="np" class="col form-control" id="typepass" placeholder="" required>
                </div>
                   <div class="form-row mb-3">
                    <label for="" class="col-lg-3">Confirm Password :</label>
                    <input pattern="(?=\S*[\W])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character" type="password" name="c_np" class="col form-control" id="typepass2" placeholder="" required>
                </div>
                 <br>
                 <div class="form-row mb-4">
                   <label for="" class="col-lg"></label>
                   <input type="checkbox" style="float: left; " onclick="Toggle()"> 
                   <p class="col" style="float: left; margin-left: 5px;"> Show</p><br>
               </div>
               
                <center><a href="Profile.php" class="btn btn-info ">Back</a> 
                    <input type="submit" class="btn btn-info "  name="update" value="Change">                  
                    </center>
            </form>

        </div>
                </div>
            </div> 


      <!---------------------------------------start--------------------->
<br>



<!--##################################################################################-->
<script> 
    // Change the type of input to password or text
    function Toggle(){
var pass = document.getElementById("typepass");
var pass2 = document.getElementById("typepass2");
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

<!-- Footer -->
<?php
include('includes/footer.php');
include('includes/js.php');

}else {

    echo "<script>alert('Please login first');
          document.location='../index.php'</script>";
}
?>
</body>

</html>