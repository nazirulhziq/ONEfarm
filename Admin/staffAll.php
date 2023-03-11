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
                                            <li><span class="bread-blod">Add Staff</span>
                                            </li>
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
                                    <h5>Staff <span class="table-project-n">Data</span> Table</h5>
                                    <div class="add-product">
                                        <a href="staffAdd.php">Add Staff</a>
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
                                            <tr>
                                                <th data-field="id">ID</th>
                                                <th data-field="name">Name</th>
                                                <th data-field="email">Email</th>
                                                <th data-field="Phone">Phone No</th>
                                                <th data-field="Position">Position</th>
                                                <th data-field="Status">Status</th>

                                                <th >Action</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    include('connect.php');

                                    $display = $con->prepare("SELECT * FROM staff WHERE staffType = 'Staff'");
                                    $display->execute();
                                    $fetch = $display->fetchAll();

                                    foreach($fetch as $key => $row) { 

                                    ?>
                                    <tr>
                                        <td><?php echo $row['staffID']; ?></td>
                                        <td><?php echo $row['staffName']; ?></td>
                                        <td><?php echo $row['staffEmail']; ?></td>
                                        <td><?php echo $row['staffPhoneNo']; ?></td>
                                        <td><?php echo $row['staffType']; ?></td>
                                        <td><?php if($row['staffAvail'] == "0"): ?>
<p  class="textSuccess">Active</p>
                   
                <?php elseif ($row['staffAvail'] == "1"): ?>
<p  class="textDanger">Deactivated</p>



                     <?php else:  ?><?php endif;  ?></td>

                                        <td>
                                            
                                              <button type="button" class="pd-setting-ed editbtn2" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o" ></i></button>

                                            <a href="staffDelete.php?staffID=<?php echo $row['staffID']?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Staff Data</h5>
      </div>

        <form action="staffEdit.php" method="POST">
      <div class="modal-body">
        
        <div class="form group">
            <label>ID</label>
            <input type="text" name="staffID" id="staffID" class="form-control" placeholder= "Enter id" readonly="">
        </div>

          <div class="form group">
            <label>Name</label>
            <input type="text" name="staffName" id="staffName" class="form-control" placeholder= "Enter First Name">
        </div>

        <div class="form group">
            <label>Email</label>
            <input type="text" name="staffEmail" id="staffEmail" class="form-control" placeholder= "Enter Last Name">
        </div>

        <div class="form group">
            <label>Phone Number</label>
            <input type="text" name="staffPhoneNo" id="staffPhoneNo" class="form-control" placeholder= "Enter Phone Number">
        </div>

        <div class="form group">
            <label>Type</label>
            <input type="text" name="staffType" id="staffType" class="form-control" placeholder= "Enter Staff Type">
        </div>

 <div class="form group">
            <label>Current Activation</label>
            <input  type="text" id="staffAvail" class="form-control" style="background-color: #CAFDFF;"readonly><br>

             <div class="alert alert-warning text text-dark col-lg-12 "> <b>CHOOSE</b> the activation below <b>if want to update the details</b> :</div><br>

             <select name="staffAvail" id="staffAvail" class="form-control form-control-sm"  required/>
          
                <option value="0">Active</option>
                <option value="1">Deactivated</option>
            </select>
        </div>  
       
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
            $('#staffID').val(data[0]);
            $('#staffName').val(data[1]);
            $('#staffEmail').val(data[2]);
            $('#staffPhoneNo').val(data[3]);
            $('#staffType').val(data[4]);
            $('#staffAvail').val(data[5]);

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