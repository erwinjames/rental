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

$(document).ready(function(){
  $('#insert_rent').validate();
  $('#insert_rent').submit(function(e) {
    e.preventDefault();
    $(':input[type="submit"]').prop('disabled', true);
    $.ajax({
        url: "./modules/process.php",
        method: 'POST',
        data: $('#insert_rent').serialize() + '&action=rentToPay',
        success: function(response) {
            setTimeout(function() {
                console.log(response);
            }, 100);
            setTimeout(function() {
                $(':input[type="submit"]').prop('disabled', false);
            }, 100);

        }
    });
});

});
