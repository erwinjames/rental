<?php
<<<<<<< HEAD
session_start();
require "config.php";

if(isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_POST["pprice"])){
$id = $_POST["pid"];
$name = $_POST["pname"];
$price = $_POST["pprice"];
$code = $_POST["pcode"];
$qtys = $_POST["pqty"];
$size = $_POST["size"];
$total = $price * $qtys;
$stmt = $con -> prepare("SELECT product_id from cart WHERE product_id=?");
$stmt->bind_param('s',$code);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$check_id = $row["id"];
if(!$check_id){
  $sql_rsrtn = "INSERT INTO cart (product_name,product_price,qty,total_price,product_id)
  VALUES (?,?,?,?,?)";
$stmt = $con->prepare($sql_rsrtn);
$stmt->bind_param('sssss',$name,$price, $qtys,$total,$code);
echo "Added to cart!";
$stmt->close();
   
  }
=======
session_start(); //start session
include_once("config.php"); //include config file
############# add products to session #########################
if(isset($_POST["product_code"]))
{
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
	}

	//we need to get product name and price from database.
	$statement = $con->prepare("SELECT c_name,c_price FROM tbl_costume WHERE id=? LIMIT 1");
	$statement->bind_param('s', $new_product['product_code']);
	echo $con->error;
	$statement->execute();
	$statement->bind_result($product_name, $product_price);

	while($statement->fetch()){
		$new_product["c_name"] = $product_name; //fetch product name from database
		$new_product["c_price"] = $product_price;  //fetch product price from database

		if(isset($_SESSION["products"])){  //if session var already exist
			if(isset($_SESSION["products"][$new_product['product_code']])) //check item exist in products array
			{
				unset($_SESSION["products"][$new_product['product_code']]); //unset old item
			}
		}

		$_SESSION["products"][$new_product['product_code']] = $new_product;	//update products with new item array
	}

 	$total_items = count($_SESSION["products"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json

}

// ################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

			//set variables to use them in HTML content below
			if(isset($product["product_qty"])){
				$product_name = $product["c_name"];
				$product_price = $product["c_price"];
				$product_code = $product["product_code"];
				$product_qty = $product["product_qty"];
				$product_size = $product["product_size"];
			}else{
				$product_name = $product["c_name"];
				$product_price = $product["c_price"];
				$product_code = $product["product_code"];
				$product_qty = 1;
				$product_size = $product["product_size"];
			}


			$cart_box .=  "<li> $product_name (Qty : $product_qty | Size: $product_size ) &mdash; PHP ".sprintf("%01.2f", ($product_price * $product_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
			$subtotal = ($product_price * $product_qty);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Total : PHP'.sprintf("%01.2f",$total).' <u><a href="view_cart.php" title="Review Cart and Check-Out">Check-out</a></u></div>';
		die($cart_box); //exit and output content
	}else{
		die("Your Cart is empty"); //we have empty cart
	}
}


// ################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
	$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["products"][$product_code]))
	{
		unset($_SESSION["products"][$product_code]);
	}

 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
>>>>>>> 63df92a315b6484ede2283b1dc697f19b261d2db
}
?>