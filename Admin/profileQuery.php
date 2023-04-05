<?php

$con=mysqli_connect("us-cdbr-east-06.cleardb.net","be1e7880320ee9", "63c35bd6");
$db= mysqli_select_db($con,'heroku_8d9f86b3e1930ef');

if(isset($_POST['submit']))
{
   
    $staffID = $_POST['staffID'];
    $staffName = $_POST['staffName'];
    $staffPhoneNo = $_POST['staffPhoneNo'];

    $que="UPDATE staff SET staffName='$staffName',staffPhoneNo='$staffPhoneNo' WHERE staffID='$staffID'";
    $que_run=mysqli_query($con, $que);

    if($que_run)
    {
        echo '<script> alert("Data Updated"); <script>';
        header ('Location:Profile.php');
    }

    else
    {
        echo '<script>alert ("Data Not Updated"); <script>';
    }

}
?>