<?php
require "../config.php";

if(isset($_POST['action']) && $_POST['action'] == 'costumer_form') {
    passenger_register($con);
} 



function passenger_register($con) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $scn = $_POST['tx-name'];
    $email = $_POST['tx-email'];
    $add = $_POST['tx-address'];
    $num = $_POST['tx-cnum'];
    $pass = sha1($_POST['tx-pass']);
    $cpass = sha1($_POST['tx-cpass']);
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

        if(isset($r['email']) == $email){
            echo 'The email is already exist! Please try another.';
        }
         else {
            $q2 = $con->prepare("INSERT INTO tbl_user_details (name,address,c_number) VALUES (?,?,?)");
            $q2->bind_param('sss', $scn,$add,$num);
            $q2->execute();

            $q3 = $con->prepare("INSERT INTO tbl_user_account (email,password) VALUES (?,?)");
            $q3->bind_param('ss', $email,$pass);
            $q3->execute();
            if($q3){
                echo 'Registered Successfully.';
            }else{
                echo "failed";
            }
            $q1->close();
            $q2->close();
            $q3->close();
           
        }
    }
}

?>