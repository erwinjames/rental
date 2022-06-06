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

$(document).ready(function(){

	var rating_data = 0;

    $('.add_review').click(function(){

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
				var cost_id = $('#costume_id').val();
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
                data:{rating_data:rating_data, user_name:user_name, costid:cost_id, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
			var load_data = "load_data";
			var userid = '<?php echo $_GET['costId']; ?>';
			console.log(userid);
        $.ajax({
            url:"modules/subrating.php",
            method:"POST",
            data:{action:load_data,getId:userid},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>
</body>
</html>
