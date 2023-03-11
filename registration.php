<?php 

include 'connection.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $Cphonenum=$_POST['Cphonenum'];
   $Csecurity=md5($_POST['Csecurity']);
   $Caddress=$_POST['Caddress'];

   $uppercase = preg_match('@[A-Z]@', $password);
   $lowercase = preg_match('@[a-z]@', $password);
   $number    = preg_match('@[0-9]@', $password);
   $specialChars = preg_match('@[^\w]@', $password);
   
if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
   
    echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. Please Try Again!')</script>";
     header("refresh:1;url=registration.php");
}else{
      if ($password == $cpassword) {
      $password1 = md5($password);
      $sql = "SELECT * FROM customer WHERE customerEmail='$email'";
      $result = mysqli_query($conn, $sql);
      if (!$result->num_rows > 0) {
         $sql = "INSERT INTO customer (customerName, customerEmail, customerPassword, customerPhoneNum, customerSecurity, customerAddress)
               VALUES ('$username', '$email', '$password1', '$Cphonenum', '$Csecurity','$Caddress')";
         $result = mysqli_query($conn, $sql);
         if ($result) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
             header("refresh:1;url=login.php");
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
            $_POST['Cphonenum'] = "";
            $_POST['Csecurity'] = "";
            $_POST['Caddress'] = "";

         } else {
            echo "<script>alert('Woops! Something Went Wrong.')</script>";

         }
      } else {
         echo "<script>alert('Woops! Email Already Exists.')</script>";
      }
      
   } else {
      echo "<script>alert('Password Not Matched.')</script>";
   }
}

}

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" type="text/css" href="style.css">

   <title>Registration</title>
</head>
<body>
   <div class="container">
      <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register.</p>
         <div class="input-group">
            <input type="text" placeholder="name" name="username" value="<?php echo $username; ?>" required>
         </div>
         <div class="input-group">
            <input type="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
         </div>
         <div class="input-group">
            <input pattern="(?=\S*[\W])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="password" name="password" title="Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character"value="<?php echo $_POST['password']; ?>" required>
</div>
                     
            <div class="input-group">
            <input pattern="(?=\S*[\W])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="confirm password" name="cpassword" title="Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character"value="<?php echo $_POST['cpassword']; ?>" required>
         </div>
          <div class="input-group">
            <input type="text" placeholder="phone number" name="Cphonenum" value="<?php echo $Cphonenum; ?>" required>
         </div>
          <div class="input-group">
            <input type="text" placeholder="security" name="Csecurity" value="<?php echo $Csecurity; ?>" required>
         </div>
          <div class="input-group">
            <input type="text" placeholder="address" name="Caddress" value="<?php echo $Caddress; ?>" required>
         </div>
         <div class="input-group">
            <button name="submit" class="btn">Register</button>
         </div>
         <p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
      </form>
   </div>
</body>
</html>