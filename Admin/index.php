<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
<head>
<?php
include('includes/head.php');
?>


<style type="text/css">
     
     .textSuccess{
        color: green;
     }

    .textDanger{
        color: red;
     }

th{
    background-color:       #E3CAA5;
}

.breadcome-area{

    background-color:       #E3CAA5;
    }

.data-table-area {

    background-color:       #E3CAA5;
    }



 </style> 

     	  <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="includes/boostrap.min2.css"> 


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
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!----------------------START--------------------------------->


 <!--All total Staff-->

<div class="col-lg-3 col-md-4 col-sm-6 mb-5">

  <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 text-light shadow bg-dark " style="margin-top:-10px; height:40px;">Total All Staff</div>
                <h5></h5><div class="card-body p-0 pb-2">
            <p class="ml-3">
            <?php
            require 'conn.php';

            $query = "SELECT * FROM staff WHERE staffType = 'Staff'";
            $query_run = mysqli_query($db, $query);
            $row = mysqli_num_rows($query_run);

            echo '<span class="h4 font-weight-light ml-4"> '.$row.' </span>';
            ?><small class="h6 font-weight-light ml-4">Staffs</small ></p>
                   <hr>
                    <a href="pharAll.php"  class="ml-3 text-info">View Details</a>
                </div>
            </div>
        </div>

 <!--All total CATEGORY-->

    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">

            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 text-light shadow bg-dark " style="margin-top:-10px; height:40px;">Total All Breeds</div>
                <h5></h5><div class="card-body p-0 pb-2">
            <p class="ml-3">
            <?php
            require 'conn.php';

            $query = "SELECT * FROM breed";
            $query_run = mysqli_query($db, $query);
            $row = mysqli_num_rows($query_run);

            echo '<span class="h4 font-weight-light ml-4"> '.$row.' </span>';
            ?><small class="h6 font-weight-light ml-4">Breeds</small ></p>
                   <hr>
                    <a href="breedAll.php"  class="ml-3 text-info">View Details</a>
                </div>
            </div>
        </div>



 <!--All total PRODUCT-->

  <div class="col-lg-3 col-md-4 col-sm-6 mb-5">

            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 text-light shadow bg-dark " style="margin-top:-10px; height:40px;">Total All Animals</div>
                <h5></h5><div class="card-body p-0 pb-2">
            <p class="ml-3">
            <?php
            require 'conn.php';

            $query = "SELECT * FROM animal";
            $query_run = mysqli_query($db, $query);
            $row = mysqli_num_rows($query_run);

            echo '<span class="h4 font-weight-light ml-4"> '.$row.' </span>';
            ?><small class="h6 font-weight-light ml-4">Animals</small ></p>
                   <hr>
                    <a href="animalAll.php"  class="ml-3 text-info">View Details</a>
                </div>
            </div>
        </div>

  

                </div>
            </div>

 <!--All total Customer-->

  <div class="col-lg-3 col-md-4 col-sm-6 mb-5">

            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 text-light shadow bg-dark " style="margin-top:-10px; height:40px;">Total All Customer</div>
                <h5></h5><div class="card-body p-0 pb-2">
            <p class="ml-3">
            <?php
            require 'conn.php';

            $query = "SELECT * FROM customer";
            $query_run = mysqli_query($db, $query);
            $row = mysqli_num_rows($query_run);

            echo '<span class="h4 font-weight-light ml-4"> '.$row.' </span>';
            ?><small class="h6 font-weight-light ml-4">Customer</small ></p>
                   <hr>
                    <a href="custAll.php"  class="ml-3 text-info">View Details</a>
                </div>
            </div>
        </div>

  

                </div>
            </div>

 <!--Total Low Stocks-->

<div class="col-lg-3 col-md-4 col-sm-6 mb-5">

  <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 text-light shadow bg-dark " style="margin-top:-10px; height:40px;">Total Low Stocks</div>
                <h5></h5><div class="card-body p-0 pb-2">
            <p class="ml-3">
            <?php
            require 'conn.php';

            $query = "SELECT p.*, c.breedName FROM animal AS p LEFT JOIN breed c ON p.breedID=c.breedID where p.animalQuantity<100";
            $query_run = mysqli_query($db, $query);
            $row = mysqli_num_rows($query_run);

            echo '<span class="h4 font-weight-light ml-4"> '.$row.' </span>';
            ?><small class="h6 font-weight-light ml-4">Animal's Type</small ></p>
                   <hr>
                    <a href="lowStock.php"  class="ml-3 text-info">View Details</a>
                </div>
            </div>
        </div>


        <!--Order 3 Day-->

<div class="col-lg-3 col-md-4 col-sm-6 mb-5">

  <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 text-light shadow bg-dark " style="margin-top:-10px; height:40px;">Orders 3 Day</div>
                <h5></h5><div class="card-body p-0 pb-2">
            <p class="ml-3">
            <?php
            require 'conn.php';

            $query = "SELECT invoice.*, customer.* FROM (invoice INNER JOIN customer ON invoice.CustomerID = customer.CustomerID)Where invoiceDate > now() - INTERVAL 3 day";
            $query_run = mysqli_query($db, $query);
            $row = mysqli_num_rows($query_run);

            echo '<span class="h4 font-weight-light ml-4"> '.$row.' </span>';
            ?><small class="h6 font-weight-light ml-4">Orders</small ></p>
                   <hr>
                    <a href="custOrder.php"  class="ml-3 text-info">View Details</a>
                </div>
            </div>
        </div>

    <!-- BAR CHART -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Animals', 'Animal Left'],
          
          <?php
          $sql="SELECT * FROM animal ORDER BY animalQuantity ASC";
          $fire=mysqli_query($db,$sql);

            while ($row=mysqli_fetch_assoc($fire)) 
            {

              echo "['".$row['animalName']."',".$row['animalQuantity']."],";  
            }
   
          ?>
      
        ]);

         var options = {
          title: 'Animals Stock',
          is3D: true,
        
        };

       var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options); // Required for Material Bar Charts.
      }

    </script>

<style type="text/css">
     

.breadcome-area{

    background-color:       #E3CAA5;
    }


 </style> 
</head>

<body>

    <div class="breadcome-area">

       
        <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Pie Chart Stock View<span class="table-project-n"></span> </h1>
                                    <!-- BAR CHART -->
                                    <div id="piechart_3d" style="margin: -10px;width: 900px; height: 500px;"></div>
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
include('includes/footer.php');
include('includes/js.php');
}else {

    echo "<script>alert('Please login first');
          document.location='../index.php'</script>";
}
?>
</body>

</html>