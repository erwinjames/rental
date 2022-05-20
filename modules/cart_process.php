<?php
	require 'config.php';
	session_start();

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $id = $_POST['cids'];


	  $stmt = $con->prepare('SELECT product_code FROM cart WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  echo $con->error;
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';
	  $total_price = $pprice * $pqty;
	  if (!$code){
	    $querys = $con->prepare('INSERT INTO cart (cid,product_name,product_price,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
	    $querys->bind_param('ssssss',$id,$pname,$pprice,$pqty,$total_price,$pcode);
	    $querys->execute();
		$querys->close();
        echo 'Rent Successfully.';
	  }
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    
  		$stmt = $con->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;
	  echo $rows;
	
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $con->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:../view_cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $con->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:../view_cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $con->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
		$pdate = date('Y-m-d', strtotime($_POST['p_date']));
		$rdate = date('Y-m-d', strtotime($_POST['r_date']));
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  ///$pmode = $_POST['pmode'];
		$stat = 0;
	  $data = '';
	  $stmt = $con->prepare('INSERT INTO orders (names,email,phone,aaddress,products,amount_paid,paid_status)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$name,$email,$phone,$address,$products,$grand_total,$stat);
	  if($stmt->execute()){
		$id = $_SESSION['c_id'];
		  $lastid = $con->insert_id;
		  $stmts = $con->prepare('INSERT INTO user_rent (ord_id,costumer_id,pickup_date,return_date)VALUES(?,?,?,?)');
		  $stmts->bind_param('ssss',$lastid,$id,$pdate,$rdate);
    if($stmts->execute()){
		$id = $_SESSION['c_id'];
	  $stmt2 = $con->prepare('DELETE FROM cart WHERE cid=?');
	  $stmt2 -> bind_param('s',$id);
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>

						  </div>';
	  echo $data;
	}
}
}
?>
