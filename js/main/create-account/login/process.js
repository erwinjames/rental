//* user login costumer/owner/admin
$(document).ready(function() {
    $('#user_login-form').validate();
    $('#user_login-button').click(function(e) {
        if (document.querySelector('#user_login-form').checkValidity()) {
            e.preventDefault();
            $(':input[type="submit"]').prop('disabled', true);
            $.ajax({
                url: './modules/create-account/login/process.php',
                method: 'post',
                data: $('#user_login-form').serialize() + '&action=user_login',
                success: function(res) {
                   alert(res);
                   
                    if (res == "Login Successfully!") {
                        setTimeout(function() {
                            //for costumer
                            window.location = 'http://localhost/rental/';
                        }, 100);
                    }
                    else if (res == "Owner login Successfully!") {
                        setTimeout(function() {
                            //for onwer
                            //window.location = 'http://localhost/rental/onwer';
                            console.log(res);
                        }, 100);
                    }
                    else if (res == "Admin login Successfully!") {
                        setTimeout(function() {
                            //for admin
                            //window.location = 'http://localhost/rental/admin';
                            console.log(res);
                        }, 100);
                    }
                    $('#user_login-button').attr('disabled', false);
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
        }
    });
});
