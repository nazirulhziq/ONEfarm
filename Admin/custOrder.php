<!doctype html>
<html class="no-js" lang="en">
<title>One-Farm</title>
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

    background-color:       #E3CAA5;
    }

.data-table-area {

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
<!-- ============================================================== -->


                                
            <div class="breadcome-area">
                <div class="container-fluid ">
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
                                            <li><span class="bread-blod">Add Breed</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
<!-- Static Table Start -->
        <div class="data-table-area mg-b-15 ">
            <div class="container-fluid  ">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h5>Customer <span class="table-project-n">Order</span> Table</h5>
                                    <div class="add-product">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">

                                    <div id="toolbar">
                                </a>
                                    </div>
                                       <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr >
                                                <th data-field="id">ID</th>
                                                <th data-field="name">Name</th>
                                                <th data-field="email">Email</th>
                                                 <th data-field="phone">Phone Number</th>
                                                 <th data-field="address">Name Customer</th>
                                           

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                       $con = mysqli_connect("localhost","root","","onefarm");

                                      $query = "SELECT invoice.*, customer.* FROM (invoice
                                                INNER JOIN customer ON invoice.CustomerID = customer.CustomerID)
                                               Where invoiceDate > now() - INTERVAL 3 day";
                                    $query_run = mysqli_query($con, $query);

                                   
                                        foreach($query_run as $row)
                                        {
                                       
                                                                                    

                                    ?>
                                        <tr>
                                            <td ><?php echo $row['invoiceID']; ?></td>
                                            <td><?php echo $row['invoiceDate']; ?></td>
                                            <td><?php echo $row['invoiceTotal']; ?></td>
                                            <td><?php echo $row['invoiceStatus']; ?></td>
                                            <td><?php echo $row['customerName']; ?></td>
                                        </td>

                                            <td>
                                               
                  
                                                 <button type="button" class="pd-setting-ed editbtn2" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o" ></i></button>


                                                <a href="breedDelete.php?breedID=<?php echo $row['customerID']?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </td>
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
           </div>
            </div>

                <!--##############################################################-->
<!--Edit pop up Form-->
<div class="modal fade" id="editmodal"   role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer Data</h5>
       
      </div>

        <form action="breedEdit.php" method="POST">
      <div class="modal-body">

        <div class="form group">
            <label>Customer ID</label>
            <input type="text" name="customerID" id="customerID" class="form-control" readonly>
        </div>

          <div class="form group">
            <label>Name</label>
            <input type="text" name="customerName" id="customerName" class="form-control" placeholder= "Enter Name">
        </div>

<div class="form group">
            <label>Phone Number</label>
            <input type="text" name="customerPhoneNum" id="customerPhoneNum" class="form-control" placeholder= "Enter Breed">
        </div>
        


<br>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--##################################################################################-->

    <!--EDIT-->
<script>

    $(document).ready(function() {

        $('.editbtn2').on('click', function() {
            
            $('#editmodal').modal('show');

            
            $tr = $(this).closest('tr');
            
            var data=$tr.children("td").map(function(){
                return $(this).text();
            

            }).get();

            console.log(data);
            $('#customerID').val(data[0]);
            $('#customerName').val(data[1]);
            $('#customerPhoneNum').val(data[2]);
           

        });
    });
</script>
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