//* user login costumer/owner/admin
$(document).ready(function() {
    $('#user_login-form').validate();
    $('#user_login-btn').click(function(e) {
        if (document.querySelector('#user_login-form').checkValidity()) {
            e.preventDefault();
            $(':input[type="submit"]').prop('disabled', true);
            $.ajax({
                url: './modules/create-account/login/process.php',
                method: 'post',
                data: $('#user_login-form').serialize() + '&action=user_login-form',
                success: function(res) {
                    alert(res);
                    $('#user_login-button').attr('disabled', false);
                    if (res == "Login Successfully!") {
                        setTimeout(function() {
                            //for costumer
                            window.location = 'http://localhost/rental/';
                        }, 100);
                    }
                    if (res == "Owner login Successfully!") {
                        setTimeout(function() {
                            //for onwer
                            window.location = 'http://localhost/rental/onwer';
                        }, 100);
                    }
                    if (res == "Admin login Successfully!") {
                        setTimeout(function() {
                            //for admin
                            window.location = 'http://localhost/rental/admin';
                        }, 100);
                    }
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
        }
    });
});
