<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">For Pick-up Item</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="price">Order Number</td>
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td>Status</td>
							<td>Ratings/Review</td>
						</tr>
					</thead>
					<tbody>
					<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
    $user_id = $_SESSION['id'];
    $stmt_ship_sd = $con->prepare("SELECT *
		    							 FROM user_rent
		    							 JOIN orders ON user_rent.ord_id = orders.id
									 JOIN tbl_costume ON orders.pid = tbl_costume.id
									 JOIN tbl_costume_categories ON tbl_costume.c_category_id = tbl_costume_categories.id WHERE user_rent.costumer_id=?");
    $stmt_ship_sd->bind_param('s',$user_id);
    $stmt_ship_sd->execute();
    $row_ship_sd = $stmt_ship_sd->get_result();
   while($row1 = $row_ship_sd->fetch_assoc()){
   if($row1["paid_status"]==0){
   $sta = "Pending.....";
 }else if($row1["p_return_stat"]==1){
   $sta = "Item Returned";
 }else{
	 $sta = "For Pickup";
 }
    ?>
        <tr>
        						<td class="cart_description">
        						<center><h4>#<?php echo $row1['ord_id'];?></h4></center>
							</td>
							<td class="cart_product">
								<a href="">	<a href="">	<img width="100" src="data:image/jpeg;base64,<?php echo base64_encode($row1['c_image'])?>" alt="" /></a></a>

							</td>
							<td class="cart_description">
								<h4><?php echo $row1['cat_name'];?></h4>
							</td>
							<td class="cart_price">
								<h4>Php <?php echo $row1['amount_paid']?></h4>
							</td>
							<td>
								<h4><?php echo   $sta;?></h4>
							</td>
							<?php if($row1["p_return_stat"]==1){?>
							<td>
									<button type="button" name="add_review" class="button small red add_review" id="<?php echo $row1["pid"]?>" data-toggle="modal" data-target="#review_modal">
										Review
									</button>
							</td>
							<?php }else{?>
							<td>

							</td>
							<?php } ?>
						</tr>

						<div class="modal fade" id="review_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
								</div>
								<div class="modal-body">
									<h4 class="text-center mt-2 mb-4">
													<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
													<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
													<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
													<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
													<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
									</h4>
									<div class="form-group">
									 <?php if(isset($_SESSION['id'])){?>
										<input type="hidden" name="user_name" id="user_name" value="<?php echo $_SESSION['c_name'];?>" class="form-control" placeholder="Enter Your Name" />
									<?php }else{?>
										<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
										<?php } ?>
									</div>
									<div class="form-group">
										<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
									</div>
									<div class="form-group text-center mt-4">
										<input type="hidden" id="costume_id" name="costume_id" value="<?php echo $row1['pid']; ?>"></input>
										<button type="button" class="btn btn-primary" id="save_review">Submit</button>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
								</div>
								</form>
							</div>
						</div>
					</div>

<?php  }?>


					</tbody>
				</table>
			</div>
		</div>

	
	</section>
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
			var userid = $('.add_review').val();
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

