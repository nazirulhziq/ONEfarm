<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
<head>
    <?php
        include('conn.php');
        include('includes/head.php');
    ?>
    <!-- BAR CHART -->


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
                                    <li><span class="bread-blod">Month & Year Sales</span>
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
                                <label>Report Between Dates</label>
                                    <!-- Report -->
                                <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                      <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Total Price (RM)</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th>Card</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","onefarm");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT invoice.*, customer.* FROM (invoice
                                                INNER JOIN customer ON invoice.CustomerID = customer.CustomerID)
                                                 WHERE invoiceDate BETWEEN '$from_date' AND '$to_date' 
                                                 Order By invoiceDate desc";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['invoiceID']; ?></td>
                                                <td><?= $row['invoiceDate']; ?></td>
                                                <td><?= $row['invoiceTotal']; ?></td>
                                                <td><?= $row['customerName']; ?></td>
                                                <td><?= $row['invoiceStatus']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
                </div>

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