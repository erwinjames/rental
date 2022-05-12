$(document).ready(function() {
    setTimeout(function() {
        fetch_costume();
    }, 100);

    function fetch_costume() {
        var get_action = "fetch_costume";
        $.ajax({
            url: "./modules/process.php",
            method: "POST",
            data: { action: get_action },
            success: function(response) {
                $("#costume_slider").html(response);
            }
        });
    }

});



