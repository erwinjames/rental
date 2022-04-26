<?php
require "config.php";

if(isset($_POST['action']) && $_POST['action'] == 'addCostume') {
    //session_start();
    add_costume($con);
}

function add_costume($c) {
    // $d = date('Y-m-d', strtotime($_POST['event-start-date']));
    // $t = date('h:i A', strtotime($_POST['ship_depart_time']));
    $cn= $_POST['costume_name'];
    $file = file_get_contents($_FILES["attachment"]["tmp_name"]);
    $labe= $_POST['label_purpose'];
    $size = $_POST['size'];
    $avail = $_POST['availability'];
    $price =$_POST['price'];
    $stak = $_POST['stock'];
    $des = $_POST['discript'];

    $stmt = $c->prepare("INSERT INTO tbl_costume(c_name,c_image,c_category_id,c_size,c_availability,c_price,c_stock,c_description) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssss', $cn,$file,$labe,$size,$avail,$price,$stak,$des);
    $stmt->execute();
    $stmt->close();

    // $stmt_sb = $c->prepare("INSERT INTO tbl_ship_belong (ship) VALUES (?)");
    // $stmt_sb->bind_param('s', $ship_belong);
    // $stmt_sb->execute();
    // $stmt_sb->close();

    echo 'Schedule added successfully!';
}

?>