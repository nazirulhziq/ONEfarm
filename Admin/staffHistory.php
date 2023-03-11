        
<!doctype html>
<html class="no-js" lang="en">

<head>
<?php
include('includes/head.php');
?>

<style type="text/css">
     
    
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
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">History Bought</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h5>Products Bought by Customer (List handle staff)<span class="table-project-n"></span></h5>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>Receipt Date</th>
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
                                    <?php
                                    include('connect.php');
                                    $display = $con->prepare("SELECT staff.staffID, staff.staffName, receipt.receiptID, receipt.receiptNetTotal,receipt.receiptDiscount, receipt.receiptDate,receipt.receiptProfit,receipt_line.productName,receipt_line.quantity,receipt_line.price FROM staff JOIN receipt ON staff.staffID=receipt.staffID JOIN receipt_line ON receipt_line.receiptID = receipt.receiptID ORDER BY receipt.receiptDate DESC");


                                    $display->execute();
                                    $fetch = $display->fetchAll();

                                    foreach($fetch as $key => $row) { 

                                    ?>
                                    <tr>
                                        <td><?php echo $row['receiptDate']; ?></td>
                                        <td><?php echo $row['receiptID']; ?></td>
                                        <td><?php echo $row['productName']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td>RM <?php echo $row['price']; ?></td>
                                        <td>RM <?php echo $row['receiptNetTotal']; ?></td>
                                        <td><?php echo $row['receiptDiscount']; ?> %</td>
                                        <td>RM <?php echo $row['receiptProfit']; ?></td>
                                        <td><?php echo $row['staffName']; ?></td>
                                    </tr>                                      
                                     <?php 
                                     }?>
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