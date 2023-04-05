<?php
    $db = mysqli_connect("us-cdbr-east-06.cleardb.net","be1e7880320ee9","63c35bd6","heroku_8d9f86b3e1930ef");
    $sql = "SELECT * FROM animal";
    $result = mysqli_query($db,$sql);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
<?php
include('includes/head.php');
?>
<!--for modal -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>One-Farm</title>
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
                                            <li><span class="bread-blod">Animals</span>
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
                                    <h5>Animals <span class="table-project-n">Data</span> Table</h5>
                                    <div class="add-product">
                                        <a href="animalAdd.php">Add Animal</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">

                                    <div id="toolbar">
                                </a>
                                    </div>
                                       <table id="table" data-toggle="table"  data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">ID</th>
                                                <th data-field="name">Name</th>
                                                <th data-field="cat">Breed</th>
                                                <th data-field="number">Stock</th>
                                                <th data-field="price">Cost Price (RM)</th>
                                                <th data-field="price2">Sell Price (RM)</th>
                                                <th>Date of birth</th>
                                                <th>Age year(s)</th>
                                                <th data-field="img">Images</th>
                                                <th data-field="avail">Availability</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        include('connect.php');

                                        // $display = $con->prepare("SELECT * FROM product ORDER BY pID ASC");
                                        $display = $con->prepare("SELECT p.*, c.breedName FROM animal AS p LEFT JOIN breed c ON p.breedID=c.breedID");
                                        $display->execute();
                                        $fetch = $display->fetchAll();
                                        $data=array();
                                        $filtered_rows = $display->rowCount();


                                        foreach($fetch as $key => $row) { 

                                            $date1=$row['animalDOB'];
                                            $date2=date("Y-m-d");
                                            $diff=date_diff(date_create($date2), date_create($date1));
                                            $total= $diff->format("%y years");
      

                                    ?>
                                        <tr>
                                            <td><?php echo $row['animalID']; ?></td>
                                            <td><?php echo $row['animalName']; ?></td>
                                            <td><?php echo $row['breedName']; ?></td>
                                            <td><?php echo $row['animalQuantity']; ?></td>
                                            <td><?php echo $row['animalCost']; ?></td>
                                            <td><?php echo $row['animalPrice']; ?></td>
                                            <td id="expDate"><?php echo $row['animalDOB']; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td  ><?php  echo  "<img  src='../images/".$row['animalimg']." ' />";?></td>
                                           
                                            <td><?php if($row['animalAvail'] == "0"): ?>
                                                    <p  class="textSuccess">Available</p>
                   
                                            <?php elseif ($row['animalAvail'] == "1"): ?>
                                            <p  class="textDanger">Non-Available</p>

                                            <?php else:  ?><?php endif;  ?>  </td>
                                            <td>

                                                <button data-toggle="editbtn1" data-target="#book" title="Edit" class="pd-setting-ed editbtn1"><i class="fa fa-pencil-square-o pu" ></i></button>

                                                <a href="animalDelete.php?animalID=<?php echo $row['animalID']?>" onclick="return confirm('Are you sure you want to delete this ?');">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Animal Data</h5>
      </div>

        <form action="animalEdit.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">

        <div class="form group">
            <label>Animal ID</label>
            <input type="text" name="animalID" id="animalID" class="form-control" readonly>
        </div>

          <div class="form group">
            <label>Animal Name</label>
            <input type="text" name="animalName" id="animalName" class="form-control" >
        </div>

        <div class="form group">
            <label>Breed</label>
            <input type="text" name="breedName" id="breedName" class="form-control" readonly>
        </div>

        <div class="form group">
            <label>Stock</label>
            <input type="text" name="animalQuantity" id="animalQuantity" class="form-control">
        </div>


         <div class="form group">
            <label>Cost Price (RM)</label>
            <input type="text" name="animalCost" id="animalCost" class="form-control" >
        </div>

        <div class="form group">
            <label>Sell Price (RM)</label>
            <input type="text" name="animalPrice" id="animalPrice" class="form-control" >
        </div>

      
                                                                <div class="form-group">
                                                                    <label>Date of birth</label>
                                                                    <input type="text" name="animalDOB" id="animalDOB" class="form-control" >
                                                                  </div>
                                                               
          
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="file" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                           


                <div class="form group">
            <label>Current Activation</label>
            <input  type="text" id="animalAvail" class="form-control" style="background-color: #CAFDFF;"readonly><br>

             <div class="alert alert-warning text text-dark col-lg-12 "> <b>CHOOSE</b> the availibility below <b>if want to update the details</b> :</div><br>

             <select name="animalAvail" id="animalAvail" class="form-control form-control-sm"  required/>
          
                <option value="0">Available</option>
                <option value="1">Non-Available</option>
            </select>
        </div>



       
      </div>
      <div class="modal-footer">
        <button  type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
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

        $('.editbtn1').on('click', function() {
            
            $('#editmodal').modal('show');

            
            $tr = $(this).closest('tr');
            
            var data=$tr.children("td").map(function(){
                return $(this).text();
            

            }).get();

            console.log(data);
            $('#animalID').val(data[0]);
            $('#animalName').val(data[1]);
            $('#breedName').val(data[2]);
            $('#animalQuantity').val(data[3]);
            $('#animalCost').val(data[4]);
            $('#animalPrice').val(data[5]);
            $('#animalDOB').val(data[6]);
            $('#file').val(data[8]);
            $('#animalAvail').val(data[9]);



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