<?php
include('connection.php');

if (isset($_POST['submit'])) 
{
    $staffEmail = $_POST['staffEmail'];
    $staffSecret = md5($_POST['staffSecret']);


    $query = "SELECT * FROM staff WHERE staffEmail='$staffEmail' AND staffSecret='$staffSecret'";
    $check_val = mysqli_query($conn,$query);

    if (mysqli_num_rows($check_val)==1) 
    {
        header('location:resetPass.php?staffEmail='.$staffEmail);
    }
    else
    {
      echo "<script>alert('Email and Secret Word do not match!');
            document.location='index.php'</script>";
    }

}
?>

