<?php
require "../config.php";

if(isset($_POST['action']) && $_POST['action'] == 'costumer_form') {
    passenger_register($con);
} 



function passenger_register($con) {
    $scn = check_input($_POST['tx-name']);
    $email = check_input($_POST['tx-email']);
    $add = check_input($_POST['tx-address']);
    $num = check_input($_POST['tx-cnum']);
    $pass = check_input(sha1($_POST['tx-pass']));
    $cpass = check_input(sha1($_POST['tx-cpass']));
    // $timestamp = date("Y-m-d H:i:s");

    if($pass != $cpass){
        echo 'Password did not match!';
        exit();
    }else{
        $q1 = $con->prepare("SELECT email FROM tbl_user_account WHERE email=?");
        $q1->bind_param('s',$email);
        $q1->execute();
        $res = $q1->get_result();
        $r = $res->fetch_array(MYSQLI_ASSOC);

        if($r['email'] == $scn){
            echo 'The email is already exist! Please try another.';
        }
         else {
        
            
            echo 'Registered Successfully.';
           
        }
    }
}

?>