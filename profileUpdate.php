<?php

$con=mysqli_connect("localhost","root", "");
$db= mysqli_select_db($con,'onefarm');

if(isset($_POST['submit']))
{
   
    $customerID = $_POST['customerID'];
    $customerName = $_POST['customerName'];
    $customerPhoneNum = $_POST['customerPhoneNum'];
    $customerAddress = $_POST['customerAddress'];

    $que="UPDATE customer SET customerName='$customerName',customerPhoneNum='$customerPhoneNum',customerAddress='$customerAddress' WHERE customerID='$customerID'";
    $que_run=mysqli_query($con, $que);

    if($que_run)
    {

        echo "<script>alert('Profile Updated');
     document.location='profile.php'</script>";
    }

    else
    {
        echo '<script>alert ("Data Not Updated"); <script>';
    }

}
?>