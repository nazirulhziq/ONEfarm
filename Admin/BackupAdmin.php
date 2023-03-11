<html class="no-js" lang="en">

<head>
<?php
include('includes/head.php');
if($_SESSION["username"]) {

?>

<title>One-Farm</title>
 <style type="text/css">
    

.breadcome-area{

    background-color:       #c4daf5;
    }



 </style> 
</head>

<body>
    <!-- Start Left menu area -->
<?php
include('includes/navbar.php');
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <br>
                                    <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                    </li>

                                    <li><span class="bread-blod">Backup and Restore</span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       

        <div class="card border-0">
                        
<div class="col-md-12 mx-auto">
<div class="jumbotron p-2 mt-4">
    <h3></h3>
    <p>
      Backup & Restore the data of One-Farm Pharmacy System
    </p>
</div>

<div class="alert alert-warning text text-dark col-lg-10 ">Click <b>backup button </b> to make a backup and it will be store in cloud.</div><br>
                       


                                                <form action=" " method="POST">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light" name="submit" value="Submit">Backup</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </form>
                                                    
 <br /><br /><br /><br />



</div></div>
   
        </div>
    </div>
<?php
if (isset($_POST['submit']))

{

$cmd="php C:/xampp/htdocs/onefarm/phpbu/phpbu.phar";

if (shell_exec($cmd))
{
    echo "<head><script>alert('Backup Success');</script></head></html>";
}else{
    echo "<head><script>alert('Backup Failed');</script></head></html>";
}
}
?>


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

