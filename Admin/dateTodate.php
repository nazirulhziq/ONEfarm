<!doctype html>
<html class="no-js" lang="en">

<head>
<?php
include('includes/head.php');
?>

<!--for modal -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
     
     .textSuccess{
        color: green;
     }

    .textDanger{
        color: red;
     }

th{
    background-color:       #F5F5F5;
}

.breadcome-area{

    background-color:       #c4daf5;
    }

.data-table-area {

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
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Search Report by Date</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
<!-- Static Table Start -->
<!---------------------------------------start--------------------->
     <div class="container my-4">
<!---------------------------------------start form--------------------->
      <center>
          <form action="" class="form-inline" method="GET" >
          <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text rounded-0">From Date :</span>
                 </div>
                 <input type="date" name="date_1" class="form-control rounded-0" placeholder="">        
            </div>

              <div class="input-group ml">
                <div class="input-group-prepend">
                <span class="input-group-text rounded-0">To Date :</span>
                 </div>
                 <input type="date" name="date_2" class="form-control rounded-0" placeholder=""> 
            </div>

            <input type="submit" value="Filter" name="Search" class="btn btn-info rounded-0" style="margin-top: 20px;">
        </form>

    </center>
        <!---------------------------------------end form-------------------->
    </div>
   <?php 
$conn = new mysqli("localhost","root","","onefarm"); 

                if(isset($_GET['Search'])):
                $date_1 = $_GET['date_1'];
                $date_2 = $_GET['date_2'];
                
                $sql= "SELECT staff.staffID, staff.staffName, receipt.receiptID, receipt.receiptNetTotal,receipt.receiptDiscount, receipt.receiptDate,receipt.receiptProfit,receipt_line.productName,receipt_line.quantity,receipt_line.price FROM staff JOIN receipt ON staff.staffID=receipt.staffID JOIN receipt_line ON receipt_line.receiptID = receipt.receiptID WHERE date(receipt.receiptDate) BETWEEN '$date_1' AND '$date_2' ORDER BY receiptDate";
                $result = $conn->query($sql);
                ?>
                <br>
              <center style="margin-left:-120px"><?php  
                echo " Date: $date_1 - $date_2";  ?></center><br><br>
                               
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h5>Report by Date<span class="table-project-n"></span></h5>
                                </div>
                            </div>           
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">Receipt Date</th>
                                                <th>Receipt ID</th>
                                                <th>Products</th>
                                                <th>Quantity Sold</th>
                                                <th>Price</th>
                                                <th>Net Total</th>
                                                <th>Discount</th>
                                                <th>Profits</th>
                                                <th>Updated By</th>

               </tr>
                </thead>
                <tbody>
               
                <?php while ($row = mysqli_fetch_assoc($result)) {
                 ?>
                
                <tr>
                    <td><?= $row['receiptDate']; ?></td>
                    <td><?= $row['receiptID']; ?></td>
                    <td><?= $row['productName']; ?></td>
                    <td><?= $row['quantity']; ?></td>
                    <td>RM <?= $row['price']; ?></td>
                    <td>RM <?= $row['receiptNetTotal']; ?></td>
                    <td><?= $row['receiptDiscount']; ?> %</td>
                    <td>RM <?= $row['receiptProfit']; ?></td>
                    <td><?= $row['staffName']; ?></td>


       

                <?php }?>

           </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static Table End -->
        </div>    
        </div><?php else: endif; ?>

        <!---------------------------------------end table--------------------->
      </div>
</div>
</div>

    
<!--##################################################################################-->


</body>

<!-- Footer -->
<?php
include('includes/footer.php');
include('includes/js.php');
}else {

    echo "<script>alert('Please login first');
          document.location='../index.php'</script>";
}
?>
</body>

</html>