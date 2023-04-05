<?php

$con=mysqli_connect("localhost","root", "");
$db= mysqli_select_db($con,'onefarm');

if(isset($_POST['updatedata']))
{
   
    $staffID = $_POST['staffID'];
    $staffName = $_POST['staffName'];
    $staffEmail = $_POST['staffEmail'];
    $staffPhoneNo = $_POST['staffPhoneNo'];
    $staffType = $_POST['staffType'];

    $staffAvail = $_POST['staffAvail'];

    $que="UPDATE staff SET staffName='$staffName',staffEmail='$staffEmail',staffPhoneNo='$staffPhoneNo',staffType='$staffType' ,staffAvail='$staffAvail' WHERE staffID='$staffID'";
    $que_run=mysqli_query($con, $que);

    if($que_run)
    {
        echo '<script> alert("Data Updated"); <script>';
        header ('Location:staffAll.php');
    }

    else
    {
        echo '<script>alert ("Data Not Updated"); <script>';
    }

}
?>