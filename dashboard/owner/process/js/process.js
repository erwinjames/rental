$(document).ready(function() {
    setTimeout(function() {
        view_cat();
    }, 100);

    function view_cat() {
        var get_action = "view_category";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: get_action},
            success: function(response) {
                $("#view_category").html(response);
            }
        });
    }

});
$(document).ready(function() {
    setTimeout(function() {
        fetch_cat();
    }, 100);

    function fetch_cat() {
        var fep_action = "fetch_categories";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: fep_action },
            success: function(response) {
                $("#fetch_categories").html(response);
            }
        });
    }
    $('#add_category').validate();
    $('#add_category_btn').click(function(e) {
        if (document.querySelector('#add_category').checkValidity()) {
            e.preventDefault();
            //$(':button[type="button"]').prop('disabled', true);
            $('#add').prop('disabled', true);
            $.ajax({
                url: './process/modules/process.php',
                method: 'post',
                data: $('#add_category').serialize() + '&action=add_category',
                success: function(res) {
                    alert(res);
                    // setTimeout(function() {
                    //     fetch_category_detail();
                    // }, 1000);
                    setTimeout(function() {
                        $(':button[type="button"]').prop('disabled', false);
                    }, 1000);
                }
            });
        }
    });
});
$(document).ready(function(){

    setTimeout(function() {
        fetch_rented_costume();
    }, 100);

    function fetch_rented_costume() {
        var fcr_action = "fetch_costume_rented";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: fcr_action },
            success: function(response) {
                $("#rentedInfo").html(response);
            }
        });
    }
});
$(document).ready(function() {
    setTimeout(function() {
        fetch_costume();
    }, 100);

    function fetch_costume() {
        var f_costume_action = "fetch_costumes";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: f_costume_action },
            success: function(response) {
                $("#costumes_list").html(response);
            }
        });
    }
    });

    $(document).ready(function() {
        setTimeout(function() {
            fetch_user_rental();
        }, 100);

        function fetch_user_rental() {
            var ren_action = "userRental";
            $.ajax({
                url: "./process/modules/process.php",
                method: "POST",
                data: { action: ren_action },
                success: function(response) {
                    $("#userRental").html(response);
                }
            });
        }
        });

    $(document).ready(function() {
    $('form#add_costume_record').submit(function(e){
        e.preventDefault();
        var image_name = $('#image').val();
        if (image_name == '') {
            alert("Please Select Image");
            return false;
        } else {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#image').val('');
                return false;
            } else {
                $.ajax({
                    url: "./process/modules/process.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        //fetch_edit_cotume();
                        $('#add_costume_record')[0].reset();

                    }
                });
            }
        }
    });
        });

        $(document).ready(function() {
            $("#ship_ownr_signout").click(function(event) {
                var signout = "ship_ownr_signout";
                $.ajax({
                    url: "./process/modules/process.php",
                    method: "POST",
                    data: { action: signout },
                    success: function(data) {
                        alert(data);
                        setTimeout(function() {
                            window.location = "http://localhost/rental/";
                        }, 1000);
                }
        });
    });
});
