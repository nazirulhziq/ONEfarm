
<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
<head>
<?php
include('includes/head.php');
?>
<!--for modal -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <style type="text/css">
     
     .textSuccess{
        color: green;
     }

    .textDanger{
        color: red;
     }

th{
    background-color:      #F5F5F5;
}
 </style> 

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
    $staffLicense = $row['staffLicense'];
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
                                            <li><span class="bread-blod">Profile</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
           
                

              <br>
         <!---------------------------------------start table--------------------->
        <div class="col-lg-12  mx-auto">
        <table class="table mx-auto table-bordered ">
            <tr>
                <th>Staff ID</th>
                <td><?= $row['staffID']; ?></td>
            </tr><th>Name</th>
                <td><?= $row['staffName']; ?></td>
            </tr><tr>
                <th>Email</th>
                <td><?= $row['staffEmail']; ?></td>
            </tr><tr>
                <th>Phone Number</th>
                <td><?= $row['staffPhoneNo']; ?></td>
            </tr><tr>
                <th>Position</th>
                <td><?= $row['staffType']; ?></td>
            </tr><tr>
                <th>Status</th>
                <td><?php 

                 if($row['staffAvail'] == "0"): ?>
                 <p  class="textSuccess">  Active</p>
                   
                <?php 
                elseif ($row['staffAvail'] == "1"): ?>
                    <p  class="textDanger">  Deactivated</p>

                     <?php else:  ?><?php endif;  ?></td>
            </tr>
               
            
        </table>
</div>
       <br><br>
       <center>
        <a href="ProfileUpdate.php" class="btn btn-info " >Edit</a> 
        <a href="changePass.php" class="btn btn-info " >Change Password</a>
       </center>
       <br>
        <!---------------------------------------end table--------------------->

        </div>

                </div>
            </div>

<!--##################################################################################-->

<!-- Footer -->
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