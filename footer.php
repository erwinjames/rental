<footer id="footer">
</footer><!--/Footer-->
<script src="assets/js/jquery.js"></script>
<script src="js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/price-range.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="assets/js/gmaps.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/js/main.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="js/main/create-account/login/process.js"></script>
<script src="js/main/create-account/process.js"></script>
<script>
$(document).ready(function(){
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 1500,
		values: [ <?php echo $minimum_range; ?>, <?php echo $maximum_range; ?> ],
		slide: function( event, ui ) {
			$( "#amount" ).html( "P" + ui.values[ 0 ] + " - P" + ui.values[ 1 ] );
	$( "#minimum" ).val(ui.values[ 0 ]);
	$( "#maximum" ).val(ui.values[ 1 ]);
	load_product(ui.values[0], ui.values[1]);
		}
	});
	$( "#amount" ).html( "P" + $( "#slider-range" ).slider( "values", 0 ) +
	 " - P" + $( "#slider-range" ).slider( "values", 1 ) );

load_product(<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>);

function load_product(minimum, maximum)
{
	$.ajax({
		url:"modules/fetch_slider.php",
		method:"POST",
		data:{minimum:minimum, maximum:maximum},
		cache:false,
		success:function(data)
		{
			console.log(data);
			$('#load_product').fadeIn('slow').html(data);
		}
	});
}
});
</script>
<script>
var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });
    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }
    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });
    $('#save_review').click(function(){
        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();
        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"modules/subrating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });
</script>
</body>
</html>
