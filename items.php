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
							<td>
									<button type="button" name="add_review" id="add_review" class="btn btn-primary review_modal">Review</button>
							</td>
						</tr>

						<div id="review_modal" class="modal " tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
											<div class="modal-header">

												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
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
													<input type="hidden" id="costume_id" name="costume_id" value="<?php echo $_GET['costId']; ?>"></input>
													<button type="button" class="btn btn-primary" id="save_review">Submit</button>
												</div>
											</div>
									</div>
								</div>
						</div>

<?php  }?>


					</tbody>
				</table>
			</div>
		</div>

	</section>
	<?php require('footer.php'); ?>
