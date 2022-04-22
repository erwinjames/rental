
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
                        alert(res);
                    } else {
                        alert(res);
                        setTimeout(function() {
                            window.location = "http://barkomatic.xyz/login.php";
                        }, 100);
                    }
                    $('#passenger-submit').attr('disabled', false);
                }
            });
        }
    });
});