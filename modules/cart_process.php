<?php
	require 'config.php';
	session_start();

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
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
	    $querys = $con->prepare('INSERT INTO cart(pid,cid,product_name,product_price,qty,total_price,product_code) VALUES (?,?,?,?,?,?,?)');
	    $querys->bind_param('sssssss',$pid,$id,$pname,$pprice,$pqty,$total_price,$pcode);
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
		$ord_id = $_POST['orderIds'];
		$pisd = $_POST['pids'];
		$pymnt = $_POST['pymnt'];
		$pdate = date('Y-m-d', strtotime($_POST['p_date']));
		$rdate = date('Y-m-d', strtotime($_POST['r_date']));
	  $products = $_POST['products'];
		$qty = $_POST['pqty'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  ///$pmode = $_POST['pmode'];
	 $stat = 0;
	  $data = '';
	  $stmt = $con->prepare('INSERT INTO orders (orderid,pid,names,email,phone,aaddress,products,qty,amount_paid,paid_status,payments)VALUES(?,?,?,?,?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssssssss',$ord_id,$pisd,$name,$email,$phone,$address,$products,$qty,$grand_total,$stat,$pymnt);
	  if($stmt->execute()){
		  $id = $_SESSION['id'];
		  $stat = 0;
		  $lastid = $con->insert_id;
		  $stmts = $con->prepare('INSERT INTO user_rent (ord_id,costumer_id,pickup_date,return_date,p_return_stat)VALUES(?,?,?,?,?)');
		  $stmts->bind_param('sssss',$lastid,$id,$pdate,$rdate,$stat);
    if($stmts->execute()){
    $lastid2=$con->insert_id;
	  $id = $_SESSION['id'];
	  $stmt2 = $con->prepare('DELETE FROM cart WHERE cid=?');
	  $stmt2 -> bind_param('s',$id);
	  if($stmt2->execute()){
			$stmt4 = $con->prepare('UPDATE tbl_costume SET c_stock=c_stock - ? WHERE id=?');
		 $stmt4->bind_param('is',$qty,$pisd);
		 $stmt4->execute();
		  echo "http://localhost/rental/order_success.php?id=$lastid2";
				}


	}
	else{
	echo "NO";
	}
}
else{
echo "NO";
}
}
?>
