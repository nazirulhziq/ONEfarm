<?php

$con=mysqli_connect("us-cdbr-east-06.cleardb.net","be1e7880320ee9", "63c35bd6");
$db= mysqli_select_db($con,'heroku_8d9f86b3e1930ef');

if(isset($_POST['updatedata']))
{
   
    $breedID = $_POST['breedID'];
    $breedName = $_POST['breedName'];
    $breedType = $_POST['breedType'];
    $breedAvail = $_POST['breedAvail'];



    $que="UPDATE breed SET breedID='$breedID',breedName='$breedName',breedType='$breedType', breedAvail='$breedAvail' WHERE breedID='$breedID'";
    $que_run=mysqli_query($con, $que);

    if($que_run)
    {
        echo '<script> alert("Data Updated"); <script>';
        header ('Location:breedAll.php');
    }

    else
    {
        echo '<script>alert ("Data Not Updated"); <script>';
    }

}
?>