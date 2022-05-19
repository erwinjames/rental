<?php
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
}
?>