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
        $(document).on('click', '.rl_btn_delete', function() {
        $(this).prop("disabled", true);
        var dlt_role_id = $(this).attr("id");
        var action_dlt = "delete_inventorys";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: action_dlt, delete_invetory_id: dlt_role_id },
            success: function(response) {
                alert(response);
                setTimeout(function() {
                    fetch_cat();
                }, 100);
                setTimeout(function() {
                    $(this).prop("disabled", false);
                }, 100);
            }
        });
    });

    $("#edit_inventory_form").submit(function(e) {
            e.preventDefault();
            $("#edit_inventory_form").validate();
            $("#edit_inventory_btn").prop("disabled", true);
            $.ajax({
                url: "./process/modules/process.php",
                method: "POST",
                data: $(this).serialize() + '&action=edit_inventory_forms',
                success: function(response) {
                    if (response == "Updated successfully!") {
                        console.log(response);
                        $('#edit_costume').val('');
                    }
                    setTimeout(function() {
                        $("#edit_inventory_btn").prop("disabled", false);
                    }, 100);
                    setTimeout(function() {
                                fetch_cat();
                      }, 100);
                      setTimeout(function() {
                                  location.reload();
                        }, 100);
                }
            });
        });


    $(document).on('click', '.delete_costume', function() {
    $(this).prop("disabled", true);
    var dlt_cost_id = $(this).attr("id");
    var action_dlt = "delete_cost";
    $.ajax({
        url: "./process/modules/process.php",
        method: "POST",
        data: { action: action_dlt, delete_cost_id: dlt_cost_id },
        success: function(response) {
            alert(response);
            setTimeout(function() {
                fetch_costume();
            }, 100);
            setTimeout(function() {
                $(this).prop("disabled", false);
            }, 100);
        }
    });
});

    $(document).on('click', '.update_role_btn', function() {
        $("#edit_role_btn").prop("disabled", true);
        var edit_id = $(this).attr("id");
        var edit_action = "assgn_edit_id_form";

        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            dataType: 'json',
            data: { action: edit_action, cost_id: edit_id },
            success: function(response) {
              console.log(response);
                    $('#cost_id_ajax').val(response.id);
                    $('#edit_costume').val(response.cat_name);

          }
        });
    });
    $(document).on('click', '.edit_costume', function() {
        $("#edit_costume").prop("disabled", true);
        var edit_id = $(this).attr("id");
        var edit_cost_action = "costme_edit_id_form";
        console.log(edit_id);
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            dataType: 'json',
            data: { action: edit_cost_action, edit_cost_id: edit_id },
            success: function(data) {
              console.log(data);

                    $('#costume_name').val(data.c_name);
                      $('#attachment').html('<img src="data:image/jpeg;base64,base64'+data.c_image+'" />');;
                        $('#cat').val(data.cat_name);
                          $('#size').val(data.c_size);
                            $('#price').val(data.c_price);
                              $('#stock').val(data.c_stock);
                                $('#description').val(data.c_description);
                                $('#availability').val(data.c_availability);
          }
        });
    });

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
