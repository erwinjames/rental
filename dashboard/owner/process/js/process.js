$(document).ready(function() {
    setTimeout(function() {
        fetch_cat();
    }, 100);

    function fetch_cat() {
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
                        //fetch_edit_cotume();
                        $('#add_costume_record')[0].reset();
                        
                    }
                });
            }
        }
    });
});

    