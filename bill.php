<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
{
	header('location:login.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>One-Farm</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  /* IE6-9 fallback on horizontal gradient */
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #AD8B73; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}







	</style>

	</head>

<body>
    
        <div class="container">

    <p>Bill no. SW<?php echo str_pad($_GET['id'],"8","0",STR_PAD_LEFT); ?></p>
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center;">ONE-FARM</h1>
            <p style="text-align: center;">Thank You!</p>
            <?php
            
      $sel=mysqli_query($db,"select * from customer where customerID='".$_SESSION['user_id']."'");
      while($row=mysqli_fetch_array($sel))
      {

      ?>
      <div class="row">
        <div class="col-md-6">
        <p>Name: <?php echo $row['customerName'] ?></p>
        <p>Email: <?php echo $row['customerEmail'] ?></p>
        <p>Phone: <?php echo $row['customerPhoneNum'] ?></p>
        <p>Address: <?php echo $row['customerAddress'] ?></p>
      </div>
             
  </div>

      <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
         <?php
            $id=$_GET['id'];
      $sel=mysqli_query($db,"select * from checkout where invoiceID='$id'");
      while($row=mysqli_fetch_array($sel))
      {

      ?>
      <div class="row">
        <div class="col-md-6">
        	<tr>
        <td><?php echo $row['animalName'] ?></td>
      	<td><?php echo $row['quantity'] ?></td>
      	<td><?php echo $row['price'] ?></td>

</tr>
      </div>
             
  </div>
 



        <?php
        $total+=$row['price'];
        $quan+=$row['quantity'];
      }

          } ?>
           <?php
            $id=$_GET['id'];
      $sel=mysqli_query($db,"select * from invoice where invoiceID='$id'");
      while($row=mysqli_fetch_array($sel))
      {

?>
  <tr>
        <td>Subtotal</td>
        <td><?php echo $quan ?></td>
        <td>RM <?php echo $total ?></td>
      
      </tr>
 

      </tbody>
  </table>


  



		
	</div>
</div>
<div class="row" style="margin-top: 100px;">
		<div class="col-md-6">
			<p style="float: left;">Date: <?php echo $row['invoiceDate'] ?></p>
		</div>
		<div class="col-md-6">
			<p style="float: right;">This is computer generated invoice no signature required</p>
		</div>
	</div>
	
</div>
<?php  } ?>
<script>
  window.print();
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/animal.min.js"></script>
</body>

</html>
<?php
}
?>