<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
<head>
    <?php
        include('conn.php');
        include('includes/head.php');
    ?>
    <!-- BAR CHART -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Animal', 'Animal Sold'],
          
          <?php
          $sql="SELECT 
                                                b.price as price, SUM(b.quantity) as quantity, b.animalName
                                                FROM invoice as r JOIN checkout as b 
                                                ON r.invoiceID=b.invoiceID
                                                JOIN animal as p
                                                ON b.animalID=p.animalID
                                                GROUP BY  b.animalName
                                               ";
          $fire=mysqli_query($db,$sql);

            while ($row=mysqli_fetch_assoc($fire)) 
            {

              echo "['".$row['animalName']."',".$row['quantity']."],";  
            }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Quantity Animal Sold',
            subtitle: '',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>



 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Animal', 'RM'],
          
          <?php
          $sql="SELECT 
                                                SUM(b.price) as price, SUM(b.quantity) as quantity, b.animalName
                                                FROM invoice as r JOIN checkout as b 
                                                ON r.invoiceID=b.invoiceID
                                                JOIN animal as p
                                                ON b.animalID=p.animalID
                                                GROUP BY  b.animalName
                                               ";
          $fire=mysqli_query($db,$sql);

            while ($row=mysqli_fetch_assoc($fire)) 
            {

              echo "['".$row['animalName']."',".$row['price']."],";  
            }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Total RM Animal Sold',
            subtitle: '',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('quantitySold'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<style type="text/css">
     

.breadcome-area{

    background-color:       #E3CAA5;
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
                                    <li><span class="bread-blod">Report by Chart </span>
                                </ul>
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
                                    <!-- BAR CHART -->
                                    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
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
                                    <!-- BAR CHART -->
                                    <div id="quantitySold" style="width: 900px; height: 500px;"></div>
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
    
        </div>
    
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