<?php
	session_start();
  	include('conn.php');

	// Add products into the cart table
	if (isset($_POST['pID'])) {
	  $pID = $_POST['pID'];
	  $pName = $_POST['pName'];
	  $pPrice = $_POST['pPrice'];
	  $qty = $_POST['qty'];
	  $realQty = $_POST['pQuantity'];
	  $total_price = $pPrice * $qty;
	  $empID = $_SESSION['eID'];

	  $stmt = $db->prepare('SELECT pID FROM cart WHERE pID=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['pID'] ?? '';

	  if ($qty <= $realQty) 
	  {
	  	if (!$code) {
		    $query = $db->prepare('INSERT INTO cart (pID,product_name,product_price,qty,total_price) VALUES (?,?,?,?,?)');
		    $query->bind_param('isdid',$pID,$pName,$pPrice,$qty,$total_price);
		    $query->execute();

		    $query1="UPDATE product SET pQuantity=pQuantity-$qty where pID=$pID";
	        mysqli_query($db, $query1);

	        $query2 = $db->prepare('INSERT INTO orders (pID,eID,oQuantity,oPrice) VALUES (?,?,?,?)');
		    $query2->bind_param('iiid',$pID,$empID,$qty,$total_price);
		    $query2->execute();

		    echo '<div class="alert alert-success alert-dismissible mt-2">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  <strong>Item added to your cart!</strong>
							</div>';
		  } else {
		    echo '<div class="alert alert-danger alert-dismissible mt-2">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  <strong>Item already added to your cart!</strong>
							</div>';
		  }
	  }
	  else
	  {
	  	echo '<script>alert("Cannot empty")</script>';
	  }
	  
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $db->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {

	  $qty = $_GET['qty'];
	  $empID = $_SESSION['eID'];
	  $id = $_GET['remove'];
	  $oPrice = $_GET['total_price'];

	  $stmt = $db->prepare('DELETE FROM cart WHERE pID=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $query1="UPDATE product SET pQuantity=pQuantity+$qty where pID=$id";
      mysqli_query($db, $query1);

      $stmt1 = $db->prepare('DELETE FROM orders WHERE pID=? AND eID=? AND oQuantity=? AND oPrice=?');
	  $stmt1->bind_param('iiid',$id,$empID,$qty,$oPrice);
	  $stmt1->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:bought_add.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $db->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:bought_add.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pID = $_POST['pID'];
	  $pPrice = $_POST['pPrice'];

	  $tprice = $qty * $pPrice;

	  $stmt = $db->prepare('UPDATE cart SET qty=?, total_price=? WHERE pID=?');
	  $stmt->bind_param('idi',$qty,$tprice,$pID);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $empID = $_SESSION['eID'];
	  $data = '';

	  $stmt = $db->prepare('INSERT INTO ordersdetails (eID,odName,odProducts,odPaid)VALUES(?,?,?,?)');
	 // $stmt = $db->prepare('UPDATE order SET custName=?');
	  $stmt->bind_param('issd',$empID,$name,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $db->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  // delete
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
						  </div>';
						  // delete
	echo "<script>alert('Order Success');
 	          document.location='bought_add.php'</script>";
	// echo $data;
	}
?>