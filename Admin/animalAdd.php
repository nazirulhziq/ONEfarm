<?php

    //if upload is pressed
    if(isset($_POST['submit']))
    {

        $db = mysqli_connect("localhost","root","","onefarm");


    $animalName = $_POST['animalName'];
    $animalQuantity = $_POST['animalQuantity'];
    $animalCost = $_POST['animalCost'];
    $animalPrice = $_POST['animalPrice'];
    $animalDOB = $_POST['animalDOB'];
    $animalAvail = $_POST['animalAvail'];
    $breedID = $_POST['breedID'];
    $fname = $_FILES['file']['name'];
                                $temp = $_FILES['file']['tmp_name'];
                                $fsize = $_FILES['file']['size'];
                                $extension = explode('.',$fname);
                                $extension = strtolower(end($extension));  
                                $fnew = uniqid().'.'.$extension;
   
                                $store = "../images/".basename($fnew);                      // the path to store the upload image
    
                    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif'||$extension == 'jpeg' )
                    {        
                                    if($fsize>=1000000)
                                        {
        
        
                                                $error =    '<div class="alert alert-danger alert-dismissible fade show">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <strong>Max Image Size is 1024kb!</strong> Try different Image.
                                                            </div>';
       
                                        }
                                        else
                                        {

    $sql = "SELECT * FROM animal WHERE animalName='$animalName'";
        $result = mysqli_query($db, $sql);
        if (!$result->num_rows > 0) {
        $sql = "INSERT INTO animal (animalName, animalQuantity, animalCost, animalPrice, animalDOB, animalAvail, animalimg, breedID ) VALUES ( '$animalName', '$animalQuantity', '$animalCost', '$animalPrice', '$animalDOB','$animalAvail','$fnew', '$breedID')";
        mysqli_query($db, $sql);
        move_uploaded_file($temp, $store);
        echo "<script>alert('Data Animal Inserted');
            document.location='animalAll.php'</script>";
            } else {
            echo "<script>alert('Woops! Animal Name Already Exists.')</script>";
        }
  }
                    }
                    elseif($extension == '')
                    {
                        $error =    '<div class="alert alert-danger alert-dismissible fade show">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <strong>select image</strong>
                                                            </div>';
                    }
                    else{
                    
                                            $error =    '<div class="alert alert-danger alert-dismissible fade show">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <strong>invalid extension!</strong>png, jpg, Gif are accepted.
                                                            </div>';
                        }
       
                        } 
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
<?php
include('includes/head.php');
if($_SESSION["username"]) {

?>
<title>One-Farm</title>
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
                                            <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Add Animals</span>
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
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               
                                                                <div class="form-group">
                                                                    <div>Animal Name</div>
                                                                    <input name="animalName" required="true" type="text" class="form-control" placeholder="Animal's Name">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <div>Stock</div>
                                                                    <input name="animalQuantity" required="true" type="number" class="form-control" placeholder="Stock" pattern=" 0+\.[0-9]*[1-9][0-9]*$" min="0" oninput="validity.valid||(value='');">
                                                                </div>                                                               
                                                                <div class="form-group">
                                                                    <div>Cost Price (RM)</div>
                                                                    <input name="animalCost" required="true" type="text" class="form-control" placeholder="CostPrice">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <div>Sell Price (RM)</div>
                                                                    <input name="animalPrice" required="true" type="text" class="form-control" placeholder="Sell Price">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <div>Date of birth</div>
                                                                    <input name="animalDOB" required="true" type="date" class="form-control" placeholder="Manufatured Date">
                                                                </div>
                                                           

                                                                 <div class="form-group">
                                                                    <div>Breed</div>
                                                                    <select class="form-control show-tick" name="breedID" >
                                                                    <?php
                                                                    include("connect.php"); 
                                                                    $categories = $con->prepare("SELECT * FROM breed WHERE breedAvail=0 ORDER BY breedName");
                                                                    $categories->execute();
                                                                    while($row1 = $categories->fetch()) {
                                                                            $breedName = $row1['breedName'];
                                                                    ?>
                                                                        <option value="<?php echo $row1['breedID']; ?>"><?php echo $row1['breedName']; ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input name="animalAvail" id="animalAvail" type="hidden" class="form-control" value="0" required="true">
                                                                </div>
                                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                            </div>
                                                            
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit" value="submit">Submit</button>
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