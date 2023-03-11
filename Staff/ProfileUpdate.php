<!doctype html>
<html class="no-js" lang="en">

<head>
<?php include("includes/head.php"); ?>

</head>

<body>
    <!-- Start Left menu area -->
<?php
if($_SESSION["username"]) {
//include('includes/navbar.php');
include('includes/topbar.php');
include('includes/mobile.php');
?>

<?php
include ("connect.php");

$result=$con->prepare("SELECT * FROM staff WHERE staffEmail = '".$_SESSION["username"]."'");
$result->execute();
$fetch = $result->fetchall(); 

foreach ($fetch as $key => $row) {
        
    $staffID = $row['staffID']; 
    $staffName = $row['staffName'];
    $staffEmail = $row['staffEmail'];
    $staffPhoneNo = $row['staffPhoneNo'];
?>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">

                                        </div>
                                    </div>
                                    <!-- PATH -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Edit Staff</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Basic Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="profileQuery.php" method="POST">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <div>ID</div>
                                                                    <input name="staffID" type="text" class="form-control" placeholder="Pharmacist's ID"  value="<?php echo $row['staffID']; ?> " readonly>
                                                                </div>
                                                             
                                                                <div class="form-group">
                                                                    <div>Email</div>
                                                                    <input name="staffEmail" type="text" class="form-control" placeholder="E-mail" value="<?php echo $row['staffEmail']; ?> " readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>Name</div>
                                                                    <input type="text" class="form-control" name="staffName" placeholder="Name . . ." value="<?php echo $row['staffName']; ?> " required="true" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>Phone Number</div>
                                                                    <input name="staffPhoneNo" id="staffPhoneNo" type="text" class="form-control" placeholder="Phone Number" value="<?php echo $row['staffPhoneNo']; ?> " required="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-info" name="submit" value="Submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
                <?php } ?>
<?php
include('includes/footer.php');
include('includes/js.php');
}else {

    echo "<script>alert('Please login first');
          document.location='../index.php'</script>";
}
?>
    </div>
</body>

</html>