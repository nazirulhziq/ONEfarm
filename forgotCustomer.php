<?php
include('connection.php');

if (isset($_POST['submit'])) 
{
    $customerEmail = $_POST['customerEmail'];
    $customerSecurity = md5($_POST['customerSecurity']);


    $query = "SELECT * FROM customer WHERE customerEmail='$customerEmail' AND customerSecurity='$customerSecurity'";
    $check_val = mysqli_query($conn,$query);

    if (mysqli_num_rows($check_val)==1) 
    {
        header('location:resetCustomer.php?customerEmail='.$customerEmail);
    }
    else
    {
      echo "<script>alert('Email and Secret Word do not match!');
            document.location='login.php'</script>";
    }

}
?>

