
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
            $('#costumer-submit').attr('disabled', true);
            $.ajax({
                url: './module/create-account/process.php',
                method: 'post',
                data: $('#costumer-form').serialize() + '&action=costumer_form',
                success: function(res) {
                    if (res === 'The email is already exist! Please try another.') {
                        $('#res-icon').val("");
                        $('#res-message').html("");
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('#res-icon').html("<i class='fa fa-exclamation-circle'></i>");
                        $('#res-message').html("The email is already exist!");
                        $('.alert').show(80);
                        setTimeout(function() {
                            $('.alert').fadeOut();
                        }, 2000);
                    } else {
                        $('#res-icon').val("");
                        $('#res-message').html("");
                        $('.alert').removeClass('alert-danger');
                        $('.alert').addClass('alert-success');
                        $('#res-icon').html("<i class='fa fa-check-circle'></i>");
                        $('#res-message').html("Registered Successfully!");
                        $('.alert').show(80);
                        setTimeout(function() {
                            $('.alert').fadeOut();
                            $('#tx-name').val('');
                            $('#tx-email').val('');
                            $('#tx-address').val('');
                            $('#tx-cnum').val('');
                            $('#type').val('');
                            $('#tx-pass').val('');
                            $('#tx-cpass').val('');
                        }, 100);
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