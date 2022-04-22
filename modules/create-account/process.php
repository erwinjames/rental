<?php
require "../config.php";

function ship_register($con) {
    $scn = check_input($_POST['scn']);
    $email = check_input($_POST['email-shipping']);
    $uname = check_input($_POST['uname-shipping']);
    $pass = check_input(sha1($_POST['pass']));
    $cpass = check_input(sha1($_POST['cpass']));
    $timestamp = date("Y-m-d H:i:s");

    if($pass != $cpass){
        echo 'Password did not match!';
        exit();
    }else{
        $q1 = $con->prepare("SELECT email FROM tbl_ship_detail WHERE email=?");
        $q1->bind_param('s',$email);
        $q1->execute();
        $res = $q1->get_result();
        $r = $res->fetch_array(MYSQLI_ASSOC);

        if($r['email'] == $scn){
            echo 'The email is already exist! Please try another.';
        } else {
            $q2 = $con->prepare("INSERT INTO tbl_ship_detail (ship_name,email) VALUES (?,?)");
            $q2->bind_param('ss', $scn,$email);
            $q2->execute();

            $q3 = $con->prepare("INSERT INTO tbl_ship_account (username,password) VALUES (?,?)");
            $q3->bind_param('ss', $uname,$pass);
            $q3->execute();

            $q4 = $con->prepare("INSERT INTO tbl_ship_reset_password (token_expire) VALUES (?)");
            $q4->bind_param('s', $timestamp);
            $q4->execute();
            
            echo 'Registered Successfully.';
            $q1->close();
            $q2->close();
            $q3->close();
            $q4->close();
        }
    }
}

?>