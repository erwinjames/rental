<?php
require "config.php";
if(isset($_POST['actions']) && $_POST['actions'] == 'shits_button') {
    edit_costume_form($con);
}
function edit_costume_form($c){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $pdId= $_POST['pid'];
  $cn= $_POST['costume_name'];
  $labe= $_POST['label_purpose'];
  $size = $_POST['size'];
  $image_filess = file_get_contents($_FILES["imahe"]["tmp_name"]);
  $avail = $_POST['availability'];
  $price =$_POST['price'];
  $stak = $_POST['stock'];
  $des = $_POST['description'];
  $stmt = $c->prepare("UPDATE tbl_costume SET c_name=?,c_image=?,c_category_id=?,c_size=?,c_availability=?,c_price=?,c_stock=?,c_description=? WHERE id=?");
  $stmt->bind_param('sssssssss', $cn,$image_filess,$labe,$size,$avail,$price,$stak,$des,$pdId);
  echo $c->error;
  $stmt->execute();
  echo 'Updated successfully!';
  $stmt->close();
}
?>
