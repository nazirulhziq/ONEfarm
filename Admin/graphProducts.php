<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
        include('conn.php');
        include('includes/head.php');
    ?>

    <!-- PIE CHART -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Name', 'Quantity'],
          <?php

          // $sql="SELECT pName, pQuantity FROM product";
          $sql="SELECT product.productName, receipt_line.receiptlineID, receipt_line.productID, SUM(receipt_line.quantity) AS total FROM receipt_line JOIN product ON receipt_line.productID=product.productID GROUP BY receipt_line.productID";
          
          $fire=mysqli_query($db,$sql);

            while ($row=mysqli_fetch_assoc($fire)) 
            {
              echo "['".$row['productName']."',".$row['total']."],";  
            }
          ?>
        ]);

        var options = {
          title: 'Frequency of products that bought by customers'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
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
                                <h1>Report View<span class="table-project-n"></span> </h1>
                                    <!-- PIE CHART -->
                                    <div id="piechart" style="width: 1000px; height: 500px;"></div>

                                    <!-- <div id="curve_chart" style="width: 1000px; height: 500px"></div> -->
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <center><a href="monthWise.php" class="btn btn-info btn-lg" >Back</a> </center> 
    <br>
        <!-- Static Table End -->
<!-- Footer -->
<?php
// include('includes/session_end.php');
include('includes/footer.php');
include('includes/js.php');
}else {

    echo "<script>alert('Please login first');
          document.location='../index.php'</script>";
}
?>
</body>

</html>