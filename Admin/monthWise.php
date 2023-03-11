<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
        include('conn.php');
        include('includes/head.php');
    ?>
   

<style type="text/css">
     

.breadcome-area{

    background-color:       #c4daf5;
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
                                    <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Month & Year Sales</span>
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
      Month/Year Wise Total Sales Amount Summary
    </p>
</div>

<div class="alert alert-warning text text-dark col-lg-10 ">This summary record be listed by following complete transaction data.
   <a href="graphProducts.php" class="btn btn-info btn-lg" >View Product Bought Chart Summary</a> </div><br>

<?php 
$conn = new mysqli("localhost","root","","onefarm"); 
//sql 
$sql= "SELECT MONTHNAME(r.receiptDate) as mname, YEAR(r.receiptDate) as yname,
b.price as price, SUM(b.quantity) as quantity, b.productName
FROM receipt as r JOIN receipt_line as b 
ON r.receiptID=b.receiptID
JOIN product as p
ON b.productID=p.productID
GROUP BY MONTH(r.receiptDate),YEAR(r.receiptDate), b.productName
ORDER BY YEAR(r.receiptDate) desc,MONTH(r.receiptDate) ";

$result = $conn->query($sql);
$sr= 1; ?>

<?php 
$conn = new mysqli("localhost","root","","onefarm"); 
//sql 
$sql= "SELECT YEAR(receiptDate) as yname, sum(receiptNetTotal) as netprice, sum(receiptProfit) as profit
FROM receipt 
GROUP BY YEAR(receiptDate)
ORDER BY YEAR(receiptDate) desc";

$result2 = $conn->query($sql);
$sr= 1; ?>

 <!---------------------------------------start table--------------------->

<div class="row">
    <div class="col-md-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Month Sales</h3>
            </div>

            <div class="panel-body">   
               <!-- start item -->
               <div class="table-responsive">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                         <thead>
                                <tr>
                                    <th><center>Months</center></th>
                                    <th><center>Years</center></th>
                                    <th><center>Product Name</center></th>
                                    <th><center>Price</center></th>
                                    <th><center>Quantity</center></th>
                                    <th><center>Subtotal</center></th>
                                </tr>
                            </thead>
                            <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)) {
                 ?>
  
<?php if($row['mname'] != ""): ?>
<tr>
   <td><?= $row['mname']; ?></td>
   <td><?= $row['yname']; ?></td>
   <td><?= $row['productName']; ?></td>
    <td>RM <?= $row['price']; ?></td>
    <td><?= $row['quantity']; ?></td>
    <td><?php 
              
              $price = $row['price']; 
              $quantity = $row['quantity']; 
              $totalpay = ($price * $quantity);
              echo "RM $totalpay" ;
              ?></td>
</tr>
<?php else:  ?><?php  endif; ?>
<?php }?>
<?php $sr += 1;?>


</tbody>
</table>
  </div>
 <!---------------------------------------end table--------------------->

 <!---------------------------------------years table--------------------->
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Years Sales
                </h3>

            </div>
            <div class="panel-body">

                <!-- table -->
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead>
                                <tr>
                                    <th><center>Years</center></th>
                                    <th><center>Total Sales</center></th>
                                    <th><center>Total Profits</center></th>
                                    <th><center>Total Overall</center></th>


                                </tr>
                            </thead>
                            <tbody>

                <?php while ($row = mysqli_fetch_assoc($result2)) {
                 ?>
  
<?php if($row['yname'] != ""): ?>
<tr>
   <td><?= $row['yname']; ?></td>
    <td>RM <?= $row['netprice']; ?></td>
     <td>RM <?= $row['profit']; ?></td>
      <td ><?php 
              
              $netprice = $row['netprice']; 
              $profit = $row['profit'];
              $totalOverall = ($netprice + $profit);
              echo " RM $totalOverall" ;
              ?></td>

</tr>
<?php else:  ?><?php  endif; ?>
<?php }?>
<?php $sr += 1;?>
</tbody>

</table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-cart').DataTable();
                    });
                </script>

              <!---------------------------------------end years table--------------------->
            </div>
        </div>
    </div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br />

<br><br>
<br>
</div>

</div></div>
   
        </div>
    </div>
<!-- Footer -->
<?php
// include('includes/session_end.php');
include('includes/footer.php');
include('includes/js.php');
} else {

    echo "<script>alert('Please login first');
          document.location='../index.php'</script>";
}

?>
</body>

</html>