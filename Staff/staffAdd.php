<?php
include('connect.php');
include('conn.php');
if(isset($_POST['submit'])) 
{

    $staffName = $_POST['staffName'];
    $staffEmail = $_POST['staffEmail'];
    $staffPass = $_POST['staffPass'];
    $staffPass1 = $_POST['staffPass1'];
    $staffPhoneNo = $_POST['staffPhoneNo'];
    $staffType = $_POST['staffType'];
    $staffAvail = $_POST['staffAvail'];
    $adminID = $_POST['adminID'];
    $staffActivate = 0;


    if ($staffPass == $staffPass1) 
    {
        $staffPass2 = md5($_POST['staffPass']);
        // check email not yet taken
        $SELECT = "SELECT staffEmail From staff Where staffEmail = ? Limit 1";
        $INSERT = "INSERT INTO staff (staffName , staffEmail , staffPass , staffPhoneNo , staffType,  staffAvail, adminID, staffActivate) values( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                 
        //check
        $stmt = $db->prepare($SELECT);
        $stmt->bind_param("s", $staffEmail);
        $stmt->execute();
        $stmt->bind_result($staffEmail);
        $stmt->store_result();
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;

        if ($rnum==0) 
        {
            // if license number is the same

            

            $stmt = $db->prepare($SELECT1);
            $stmt->bind_param("s", $staffLicense);
            $stmt->execute();
            $stmt->bind_result($staffLicense);
            $stmt->store_result();
            $stmt->store_result();
            $stmt->fetch();
            $rnum1 = $stmt->num_rows;
            
           
                $stmt->close();
                $stmt = $db->prepare($INSERT);
                // s=string, i=int
                $stmt->bind_param("ssssssss", $staffName , $staffEmail , $staffPass2 , $staffPhoneNo , $staffType , $staffAvail ,$adminID, $staffActivate);
                $stmt->execute();

                echo "<script>alert('Record inserted sucessfully');</script>";
            
        } 
        else 
        {
            echo "<script>alert('Someone already register using this email. Please use another email.');</script>";
        }
        $stmt->close();
        $db->close();
    }
    else
    {
        echo '<script>alert("Passwords do not match")</script>';
    }
    
}
?>
<!---------------------------------------------------------------------------- -->


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

.data-table-area {

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
                                        <div class="breadcome-heading">
                                        </div>
                                    </div>
                                    <!-- PATH -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Add Pharmacist</span>
                                            </li>
                                        </ul>
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
                                <!-- <li><a href="#reviews"> Account Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li> -->
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
                                                                    <div>Name</div>
                                                                    <input name="staffName" type="text" class="form-control" placeholder="Full Name" required="true">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>e-Mail</div>
                                                                    <input name="staffEmail" type="email" class="form-control" placeholder="E-mail" required="true">
                                                                </div>
                                                             
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <div>Password</div>
                                                                    <input name="staffPass" id="staffPass" type="password" class="form-control" placeholder="Password" required="true">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>Retype Password</div>
                                                                    <input name="staffPass1" id="staffPass1" type="password" class="form-control" placeholder="Retype Password" required="true">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>Phone Number</div>
                                                                    <input name="staffPhoneNo" id="staffPhoneNo" type="number" class="form-control" placeholder="Phone Number" required="true">
                                                                </div>

                                                                 <div class="form group">
                                                                <input type="hidden" id="adminID" name="adminID" class="form-control form-control-sm"  value="<?php echo $_SESSION['staffID']; ?>" /></div>

                                                                <div class="form-group">
                                                                    <input name="staffType" id="staffType" type="hidden" class="form-control" value="Pharmacist" placeholder="Role" required="true">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="staffAvail" id="staffAvail" type="hidden" class="form-control" value="0" placeholder="Availability" required="true">
                                                                </div>
                                                            </div>
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
