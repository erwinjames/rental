
//* add-edit-delete schedule & fetch schedule added
$(document).ready(function() {
    
    // setTimeout(function() {
    //     fetch_depart_detail();
    // }, 100);

    // function fetch_depart_detail() {
    //     var fep_action = "fetch_depart_detail";
    //     $.ajax({
    //         url: "./modules/process.php",
    //         method: "POST",
    //         data: { action: fep_action },
    //         success: function(response) {
    //             $("#ship_depart_data").html(response);
    //         }
    //     });
    // }
    $('#add-costume-record').validate();
    $('#add-costumes-btn').click(function(e) {
        if (document.querySelector('#add-costume-record').checkValidity()) {
            e.preventDefault();
            //$(':button[type="button"]').prop('disabled', true);
            $('#add-costumes-btn').attr('disabled', true);
            $.ajax({
                url: './modules/process.php',
                method: 'post',
                data: $('#add-costume-record').serialize() + '&action=addCostume',
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
});