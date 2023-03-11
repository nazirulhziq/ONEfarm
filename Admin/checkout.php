<?php
  include('conn.php');

  $grand_total = 0;
  $allItems = '';
  $items = [];

  $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
  }
  $allItems = implode(', ', $items);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
<?php
include('includes/head.php');
?>
</head>

<body>
    <!-- Start Left menu area -->
<?php
if($_SESSION["username"]) {
//include('includes/navbar.php');
include('includes/topbar.php');
include('includes/mobile.php');
?>

        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> <span class="table-project-n"></span> </h1>
                                    <div class="add-product">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <!-- ISI -->
                                <div class="col-lg-6 px-4 pb-4" id="order">
                                    <h4 class="text-center text-info p-2">Complete your order!</h4>
                                    <div class="jumbotron p-3 mb-2 text-center">
                                      <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
                                      <!-- <h6 class="lead"><b>Delivery Charge : </b>Free</h6> -->
                                      <h4><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h4>
                                    </div>
                                    <form action="" method="post" id="placeOrder">
                                      <input type="hidden" name="products" value="<?= $allItems; ?>">
                                      <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                                      <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                      </div>

                                      <div class="form-group">
                                        <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->

          <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
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