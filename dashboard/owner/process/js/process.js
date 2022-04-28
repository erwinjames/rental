$(document).ready(function() {
    setTimeout(function() {
        fetch_cat();
    }, 100);

    function fetch_cat() {
        var get_action = "view_category";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: get_action },
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
                    //     fetch_depart_detail();
                    // }, 1000);
                    setTimeout(function() {
                        $(':button[type="button"]').prop('disabled', false);
                    }, 1000);
                }
            });
        }
    });
});
//* add-edit-delete schedule & fetch schedule added
$(document).ready(function() {
    
    setTimeout(function() {
        fetch_depart_detail();
    }, 100);

    function fetch_depart_detail() {
        var fep_action = "fetch_costume";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: fep_action },
            success: function(response) {
                $("#costume_list").html(response);
            }
        });
    }
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
                        //fetch_edit_profile();
                        $('#add_costume_record')[0].reset();
                        // $('#imageModal').modal('hide');
                    }
                });
            }
        }
    });
});

    //* edit ship sched location
    // $("#edit_ship_sched_form").submit(function(e) {
    //     e.preventDefault();
    //     $("#edit_ship_sched_form").validate();
    //     $("#edit_ship_sched_btn").prop("disabled", true);
    //     $.ajax({
    //         url: './modules/main/process.php',
    //         method: "POST",
    //         data: $(this).serialize() + '&action=edit_ship_sched_form ',
    //         success: function(response) {
    //             alert(response);
    //             if (response == "Updated successfully!") {
    //                 $('#edit_ship_sched_date').val('');
    //                 $('#edit_ship_sched_dt').val('');
    //                 $('#edit_ship_sched_from').val('');
    //                 $('#edit_ship_sched_port_from').val('');
    //                 $('#edit_ship_sched_to').val('');
    //                 $('#edit_ship_sched_port_to').val('');
    //             }
    //             setTimeout(function() {
    //                 fetch_depart_detail();
    //             }, 100);
    //             setTimeout(function() {
    //                 $("#edit_ship_sched_btn").prop("disabled", false);
    //             }, 100);
    //         }
    //     });
    // });
    //* submit edit ship ship sched id
    // $(document).on('click', '.update_ship_sched_btn', function(e) {
    //     e.preventDefault();
    //     var edit_id = $(this).attr("id");
    //     var edit_action = "ship_sched_edit_id_form";
    //     $.ajax({
    //         url: './modules/main/process.php',
    //         method: "POST",
    //         data: { action: edit_action, edit_ship_sched_id: edit_id },
    //         success: function(response) {
    //             console.log(response);
    //         }
    //     });
    // });
    //* delete ship sched
    // $(document).on('click', '.delete_ship_sched_btn', function(e) {
    //     e.preventDefault();
    //     var dlt_sched_id = $(this).attr("id");
    //     var action_dlt = "delete_sched_ship";
    //     $.ajax({
    //         url: './modules/main/process.php',
    //         method: "POST",
    //         data: { action: action_dlt, delete_ship_sched_id: dlt_sched_id },
    //         success: function(response) {
    //             alert(response);
    //             setTimeout(function() {
    //                 fetch_depart_detail();
    //             }, 100);
    //         }
    //     });
    // });
// });