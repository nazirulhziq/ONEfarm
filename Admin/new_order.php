<!doctype html>
<html class="no-js" lang="en">

<head>
<?php
include_once("database/constants.php");
include('includes/head.php');
if (!isset($_SESSION["staffID"])) {
    header("location:".DOMAIN."/");
}
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "incare";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `member` where memberAvail = '0'";
$result1 = mysqli_query($connect, $query);
?>


      <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="includes/boostrap.min2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    
    <script type="text/javascript" src="js/order.js"></script>


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

.btn-success {

    background-color:       #8EFFCB;
    }

.btn-danger {

    background-color:       #FC933C;
    }

.btn-info {

    background-color:       #B6EBFD;
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
                                            <li><span class="bread-blod">Counter</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
         <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                  <div class="card-header">
                    <h4>Counter Buy</h4>
                  </div>
                  <div class="card-body">
                    <form id="get_order_data" onsubmit="return false">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" align="right">Receipt Date</label>
                <div class="col-sm-6">
                  <input type="text" id="receiptDate" name="receiptDate" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>



              <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                <div class="card-body">

                  <table  style="width:900px;">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">Product Name</th>
                                    <th style="text-align:center;">Total Quantity</th>
                                    <th style="text-align:center;">Quantity Buy</th>
                                    <th style="text-align:center;">Price</th>
                                    <th >Total</th>
                                  </tr>
                                </thead>
                                <tbody id="invoice_item">
    <!--<tr>
        <td><b id="number">1</b></td>
        <td>
            <select name="pid[]" class="form-control form-control-sm" required>
                <option>Washing Machine</option>
            </select>
        </td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
        <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
        <td>Rs.1540</td>
    </tr>-->
                                </tbody>
                            </table> <!--Table Ends-->
                            <center style="padding:10px;">
                              <button id="add" style="width:150px;" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                              <button id="remove" style="width:150px;" class="btn btn-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i> Remove</button>
                            </center>
                </div> <!--Crad Body Ends-->
              </div> <!-- Order List Crad Ends-->

            <p></p>
                    <div class="form-group row">
                      <label for="receiptSubTotal" class="col-sm-3 col-form-label" align="right">Sub Total (RM)</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="receiptSubTotal" class="form-control form-control-sm" id="receiptSubTotal" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="netProfit" class="col-sm-3 col-form-label" align="right">Profits (RM)</label>
                      <div class="col-sm-6">
                        <input oninput="setTwoNumberDecimal(this)" step="0.01" value="0.00" type="number" readonly name="netProfit" class="form-control form-control-sm" id="netProfit" required/>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="receiptTax" class="col-sm-3 col-form-label" align="right">Tax (6%) (RM)</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="receiptTax" class="form-control form-control-sm" id="receiptTax" required/>
                      </div>
                      
                    </div>
                    <center>
                   <div class="alert alert-warning text text-dark col-lg-12 ">If the customer is <b>MEMBER</b>, give discount <b>    ( 3%  )</b>    include in their purchase.</div><br>
                      </center>
                    <div class="form-group row">
                      <label for="receiptDiscount" class="col-sm-3 col-form-label" align="right">Discount (RM)</label>
                      <div class="col-sm-6">
                        
                    <input type="text" name="receiptDiscount" class="form-control form-control-sm" id="receiptDiscount">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="paid" class="col-sm-3 col-form-label" align="right">Paid (RM)</label>
                      <div class="col-sm-6">
                        <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="receiptNetTotal" class="col-sm-3 col-form-label" align="right">Net Total (RM)</label>
                      <div class="col-sm-6">
                        <input type="text" style="background-color: #FDFFC9;" readonly name="receiptNetTotal" class="form-control form-control-sm" id="receiptNetTotal" required/>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="due" class="col-sm-3 col-form-label" align="right">Balance (RM)</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="receiptPayType" class="col-sm-3 col-form-label" align="right">Payment Method</label>
                      <div class="col-sm-6">
                        <select name="receiptPayType" class="form-control form-control-sm" id="receiptPayType" required/>
                          <option>Cash</option>
                          <option>Card</option>
                        </select>
                      </div>
                    </div>

                  <div class="form-group row">
                            <label class="col-sm-3 col-form-label" align="right">Staff ID*</label>
                            <div class="col-sm-6">
                                <input type="text" id="staffID" name="staffID" class="form-control form-control-sm" value="<?php echo $_SESSION['staffID']; ?>" readonly/>
                            </div>
                        </div>


                <div class="form-group row">
                <label class="col-sm-3 col-form-label" align="right">Member ID</label>
                <div class="col-sm-6">
               
                  <select name="memberID" class="form-control form-control-sm" id="memberID" />
                  <option></option>
                         <?php while($row1 = mysqli_fetch_array($result1)):;?>

                          <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>

            <?php endwhile;?>
                  </select>
                </div>
              </div>
                    <center>
                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Submit">
                      <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                    </center>


            </form>


                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
             
<br><br>
<!-- Footer -->

<script>
  
  function setTwoNumberDecimal(el) {
        el.value = parseFloat(el.value).toFixed(2);
    };
</script>
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