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
                                    <h5>Breed <span class="table-project-n">Data</span> Table</h5>
                                    <div class="add-product">
                                        <a href="breedAdd.php">Add Breed</a>
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
                                                <th data-field="type">Type</th>
                                                 <th data-field="availibility">Availibility</th>
                                           

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        include('connect.php');

                                        // $display = $con->prepare("SELECT * FROM product ORDER BY pID ASC");
                                        $display = $con->prepare("SELECT * FROM breed ");
                                        $display->execute();
                                        $fetch = $display->fetchAll();
                                        $data=array();
                                        $filtered_rows = $display->rowCount();


                                        foreach($fetch as $key => $row) {
                                                                                    

                                    ?>
                                        <tr>
                                            <td ><?php echo $row['breedID']; ?></td>
                                            <td><?php echo $row['breedName']; ?></td>
                                            <td><?php echo $row['breedType']; ?></td>
                                            <td><?php if($row['breedAvail'] == "0"): ?>
<p  class="textSuccess">Available</p>
                   
                <?php elseif ($row['breedAvail'] == "1"): ?>
<p  class="textDanger">Unavailable</p>



                     <?php else:  ?><?php endif;  ?></td>
                                 </td>

                                            <td>
                                               
                  
                                                 <button type="button" class="pd-setting-ed editbtn2" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o" ></i></button>


                                                <a href="breedDelete.php?breedID=<?php echo $row['breedID']?>" onclick="return confirm('Are you sure you want to delete this ?');">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit breed Data</h5>
       
      </div>

        <form action="breedEdit.php" method="POST">
      <div class="modal-body">

        <div class="form group">
            <label>Breed ID</label>
            <input type="text" name="breedID" id="breedID" class="form-control" readonly>
        </div>

          <div class="form group">
            <label>Name</label>
            <input type="text" name="breedName" id="breedName" class="form-control" placeholder= "Enter Name">
        </div>

<div class="form group">
            <label>Type</label>
            <input type="text" name="breedType" id="breedType" class="form-control" placeholder= "Enter Breed">
        </div>
        <div class="form group">
            <label>Current Activation</label>
            <input  type="text" id="breedAvail" class="form-control" style="background-color: #CAFDFF;"readonly><br>

             <div class="alert alert-warning text text-dark col-lg-12 "> <b>CHOOSE</b> the availibility below <b>if want to update the details</b> :</div><br>

             <select name="breedAvail" id="breedAvail" class="form-control form-control-sm"  required/>
          
                <option value="0">Available</option>
                <option value="1">Non-Available</option>
            </select>
        </div>


<br>

 <!--     <div class="form group">
       <label>Activation</label>
        
            <?php

            if($row['breedAvail'] == "1" ){ ?>

            <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder= "Enter Name">
             <select name="categoryAvail" id="categoryAvail" class="form-control form-control-sm"  required/>
          
                <option value="0">Activate</option>
                

            </select>

        <?php 
    }
            else if ($row['breedAvail'] == "0" ){ ?>
              
        

                     <?php } else {}  ?>


       </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="return confirm('Are you sure you want to update this ?')" type="submit" name="updatedata" class="btn btn-primary">Save Data</button>
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
            $('#breedID').val(data[0]);
            $('#breedName').val(data[1]);
            $('#breedType').val(data[2]);
            $('#breedAvail').val(data[3]);

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