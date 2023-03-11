<?php
    $msg="";

    //if upload is pressed
    if(isset($_POST['submit'])){

        $db = mysqli_connect("localhost","root","","onefarm");

        //get submitted data from the form
        $breedName=$_POST['breedName'];
         $breedType = $_POST['breedType'];
        $breedAvail=$_POST['breedAvail'];

 $sql = "SELECT * FROM breed WHERE breedName='$breedName'";
        $result = mysqli_query($db, $sql);
        if (!$result->num_rows > 0) {
        $sql = "INSERT INTO breed (breedName, breedType, breedAvail) VALUES ('$breedName','$breedType', '$breedAvail')";
        mysqli_query($db, $sql);

        echo "<script>alert('Data Breed Inserted');
                        document.location='breedAll.php'</script>";
     } else {
            echo "<script>alert('Woops! Breed name Already Exists.')</script>";
        }
  }
?>





<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
<head>
<?php
include('includes/head.php');
if($_SESSION["username"]) {

?>

 <style type="text/css">
    

.breadcome-area{

    background-color:       #E3CAA5;
    }



 </style> 
</head>

<body>
    <!-- Start Left menu area -->
<?php
//include('includes/navbar.php');
include('includes/topbar.php');
include('includes/mobile.php');
?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    </div>
                                    <!-- PATH -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Add Breed</span>
                                            </li>
                                        </ul>
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
                                                    <form action="" method="POST">
                                                        <div class="row">
                                                            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <div>Breed's Name</div>
                                                                    <input name="breedName" required="true" type="text" class="form-control" placeholder="Breed's Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>Breed's Type</div>
                                                                    <input name="breedType" required="true" type="text" class="form-control" placeholder="Breed's Type">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="breedAvail" required="true" type="hidden" class="form-control" value="0">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit" value="Submit">Submit</button>
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
    </div>
</div>
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

