<?php

require "config.php";



if(isset($_POST['action']) && $_POST['action'] == 'user_login') {
    session_start();
    usersLogin($con);
}


function usersLogin($con) {
/// costumer LOGIN ===========================================================================

    $email_sp_ownr = $_POST['cus_email'];
    $hash_password_sh_user = $_POST['cus_password'];
    $stmt = $con->prepare("SELECT * FROM tbl_user_account WHERE email=? AND password=?");
    $stmt->bind_param('ss', $email_sp_ownr,$hash_password_sh_user);
    $stmt->execute();
    $ownr = $stmt->fetch();
    $stmt->close();

    if($ownr != NULL) {

        shipSession($con, $email_sp_ownr);    

    }
    else {
        echo 'Login Failed! Please check your username and password';
    }

}

function shipSession($c, $u) {
    $sql = "SELECT 
            tbl_pd.id,
            tbl_pd.name,
            tbl_pd.address,
            tbl_pd.c_number,
            tbl_pa.email
            FROM tbl_user_details tbl_pd
            INNER JOIN tbl_user_account tbl_pa ON tbl_pa.id = tbl_pd.id
            WHERE tbl_pa.email = ?";
            
    if($stmt = mysqli_prepare($c, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $bind_param_uname);
        $bind_param_uname = $u;
        if(mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id,$name,$address,$number,$email);
                if(mysqli_stmt_fetch($stmt)) {
                    if($id != '' && $name != '' && $address != '' && $number != '' && $email != '') {
                        $_SESSION['id'] = $id;
                        $_SESSION['name'] = $name; 
                        $_SESSION['address'] = $address;
                        $_SESSION['c_number'] = $number;
                        $_SESSION['email'] = $email;
                        echo "Login Successfully!";
                    }
                    else{
                        echo "NONE 1";
                    }
                }
                else{
                    echo "NONE 2";
                }
            }
            else{
                echo "NONE 3";
            }
        }
        mysqli_stmt_close($stmt);
    }else{
        echo 'Login failed!';
    }
}


?>