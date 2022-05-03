
//* passenger register
$(document).ready(function() {
    $('#costumer-form').validate({
        rules: {
            confirm_password: {
                equalTo: '#password'
            }
        }
    });

    $('#tx-constumer-btn').click(function(e) {
        if (document.querySelector('#costumer-form').checkValidity()) {
            e.preventDefault();
            $('#tx-constumer-btn').attr('disabled', true);
            $.ajax({
                url: './modules/create-account/process.php',
                method: 'post',
                data: $('#costumer-form').serialize() + '&action=costumer_form',
                success: function(res) {
                    alert(res);
                    if (res === 'The email is already exist! Please try another.') {
                       
                    } else {
                        setTimeout(function() {
                            window.location = "http://localhost/rental/login.php";
                        }, 100);
                    }
                    $('#passenger-submit').attr('disabled', false);
                }
            });
        }
    });
});

$(document).ready(function() {
    $('#session_name').click(function(e) {
        e.preventDefault();
        $('#session_name').attr('disabled', true);
        $.ajax({
            url: './modules/create-account/login/process.php',
            method: 'post',
            data: $('#sign_out').serialize() + '&action=sign_out',
            success: function(res) {
                if (res == "Signout successfully!") {
                    window.location.reload();
                } else {
                    console.log(res);
                }
                $('#session_name').attr('disabled', false);
            }
        });
    });
});