<?php
require "config.php";

if($_POST['action'] == 'add') {
    //session_start();
    add_costume($con);
}

function add_costume($c) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // $d = date('Y-m-d', strtotime($_POST['event-start-date']));
    // $t = date('h:i A', strtotime($_POST['ship_depart_time']));
    $cn= $_POST['costume_name'];
    $file = file_get_contents($_FILES["image"]["tmp_name"]);
    //$file = move_uploaded_file($_FILES['image']['tmp_name'], '../../image/' . $_FILES['image']['name']);
    $labe= $_POST['label_purpose'];
    $size = $_POST['size'];
    $avail = $_POST['availability'];
    $price =$_POST['price'];
    $stak = $_POST['stock'];
    $des = $_POST['discript'];

    $stmt = $c->prepare("INSERT INTO tbl_costume(c_name,c_image,c_category_id,c_size,c_availability,c_price,c_stock,c_description) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss', $cn,$file,$labe,$size,$avail,$price,$stak,$des);
    $stmt->execute();
    $stmt->close();

    // $stmt_sb = $c->prepare("INSERT INTO tbl_ship_belong (ship) VALUES (?)");
    // $stmt_sb->bind_param('s', $ship_belong);
    // $stmt_sb->execute();
    // $stmt_sb->close();

    echo 'Schedule added successfully!';
}

?>