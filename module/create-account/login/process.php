<?php

<!-- connect config database -->




if(isset($_POST['action']) && $_POST['action'] == 'user_login-form') {
    session_start();
    usersLogin($con);
}




function usersLogin($con) {
/// owner LOGIN ===========================================================================

    $email_sp_ownr = $_POST['cus_email'];
    $hash_password_sh_user = sha1($_POST['cus_password']);
    $stmt = $con->prepare("SELECT * FROM tbl_user_account WHERE email=? AND password=?");
    $stmt->bind_param('ss', $email_sp_ownr,$hash_password_sh_user);
    $stmt->execute();
    $ownr = $stmt->fetch();
    $stmt->close();

    if($ownr != NULL) {

        shipSession($con, $email_sp_ownr);    

    }else if($ownr == NULL){

       // ADMIN LOGIN ======================================================================
   
    $email_sp_admin= $_POST['cus_email'];
    $hash_password_sh_admin = sha1($_POST['cus_password']);
    $stmt = $con->prepare("SELECT * FROM tbl_admin WHERE email=? AND password=?");
    $stmt->bind_param('ss', $email_sp_admin,$hash_password_sh_admin);
    $stmt->execute();
    $admin = $stmt->fetch();
    $stmt->close();
        if ($admin != NULL) {
            adminSession($con,$email_sp_admin);
        }

        else if($admin == NULL){
            //////owner LOGIN ==============================================================
            $email_sp_owner = $_POST['cus_email'];
            $hash_password_onwer = sha1($_POST['cus_password']);
            $stmt = $con->prepare("SELECT * FROM tbl_staff_account WHERE email=? AND password=?");
            $stmt->bind_param('ss', $email_sp_owner,$hash_password_onwer);
            $stmt->execute();
            $stff = $stmt->fetch();
            $stmt->close();
            if($stff != NULL) {
                staff_session($con, $email_sp_owner);

            }else {
                    echo 'Login failed! Please check your username and password!';
                
            }
        }
    }
    else {
        echo 'Login Failed! Please check your username and password';
    }

}

?>