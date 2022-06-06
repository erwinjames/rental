<?php require('header.php'); ?>
	<section>
		<div class="container">
			<div class="alert alert-success lead" role="alert" id="alert">
				<span id="res-icon"></span>
				<span id="res-message"></span>
				 </div>
			<div class="row">
					<?php require('category.php'); ?>
					<?php
					if(isset($_GET['costId'])){
						if(isset($_SESSION['id'])){
					$getCat = $_GET['costId'];
					$stmt = $con->prepare("SELECT tc.id,
												tc.c_name,
												tc.c_image,
												tc.c_category_id,
												tc.c_size,
												tc.c_availability,
												tc.c_price,
												tc.c_stock,
												tc.c_description,
												tcc.cat_name,
												tci.images
												FROM tbl_costume tc
												JOIN tbl_costume_image tci ON tc.id = tci.cost_id
												JOIN tbl_costume_categories tcc  ON tc.c_category_id=tcc.id
												WHERE tc.id=? LIMIT 1");
					$stmt->bind_param('s', $getCat);
					$stmt->execute();
					$result = $stmt->get_result();
				   $row = $result->fetch_array();
				   $picture=base64_encode($row['c_image']);

				   $pictures = base64_encode($row['images']);
						$output= '<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						<div class="view-product">
							<img src="data:image/jpeg;base64,'.$picture.'" alt="" />
							<!-- <h3>ZOOM</h3> -->
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">

							<div class="carousel-inner">
							<div class="item active">
									<a href="">	<img width="100%" src="data:image/jpeg;base64,'.$pictures.'" alt="" /></a>
							</div>
							<div class="item">
							<a href="">	<img width="100%" height="100%" src="data:image/jpeg;base64,'.$pictures.'" alt="" /></a>
							</div>
							</div>
									<a class="left item-control" href="#similar-product" data-slide="prev">
										<i class="fa fa-angle-left"></i>
									</a>
									<a class="right item-control" href="#similar-product" data-slide="next">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>

										</div>
										<!-- product div information -->
														<div class="col-sm-7">
																		<div class="product-information"><!--/product-information-->
																			<h2>'.$row['c_name'].'</h2>
																			<p>'.$row['c_description'].'</p>
																			<img src="assets/images/product-details/rating.png" alt="" />
																		<form class="form-submit">
																			<span>
																					<span>Php '.$row['c_price'].'</span>

																					<label>Quantity:</label>
																					<input type="text" value="1" class="pqty"/>
																					<input type="hidden" class="cid" value="'.$_SESSION['id'].'">
																					<input type="hidden" class="pid" value="'.$row['id'].'">
																					<input type="hidden" class="cstock" value="'.$row['c_stock'].'">
																					<input type="hidden" class="pname" value="'.$row['c_name'].'">
																					<input type="hidden" class="pprice" value="'.$row['c_price'].'">
																					<input type="hidden" class="pcode" value="'.$getCat.'">
																			</span>
																			<hr>

																			<button type="submit" class="btn btn-fefault addItemBtn cart add-to-cart">
																			<i class="fa fa-shopping-cart"></i>
																			Rent
																			</button>

																		</form>
																		<hr>

																			<p><b>Availability:</b>
																				'.$row['c_availability'].'
																			</p>
																			<p><b>Stock:</b>'.$row['c_stock'].'</p>
																			<p><b>Category:</b> '.$row['cat_name'].'</p>
																			<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
																		</div><!--/product-information-->
														</div>
														<!-- end of product div information -->
												</div>
									';
									echo $output;
				   $stmt->close();
				}else{

					$getCat = $_GET['costId'];
					$stmt = $con->prepare("SELECT tc.id,
												tc.c_name,
												tc.c_image,
												tc.c_category_id,
												tc.c_size,
												tc.c_availability,
												tc.c_price,
												tc.c_stock,
												tc.c_description,
												tcc.cat_name,
												tci.images
												FROM tbl_costume tc
												JOIN tbl_costume_image tci ON tc.id = tci.cost_id
												JOIN tbl_costume_categories tcc  ON tc.c_category_id=tcc.id
												WHERE tc.id=? LIMIT 1");
					$stmt->bind_param('s', $getCat);
					$stmt->execute();
					$result = $stmt->get_result();
				   $row = $result->fetch_array();
				   $picture=base64_encode($row['c_image']);

				   $pictures = base64_encode($row['images']);
						$output= '<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						<div class="view-product">
							<img src="data:image/jpeg;base64,'.$picture.'" alt="" />
							<!-- <h3>ZOOM</h3> -->
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">

							<div class="carousel-inner">
							<div class="item active">
									<a href="">	<img width="100%" src="data:image/jpeg;base64,'.$pictures.'" alt="" /></a>
							</div>
							<div class="item">
							<a href="">	<img width="100%" height="100%" src="data:image/jpeg;base64,'.$pictures.'" alt="" /></a>
							</div>
							</div>
									<a class="left item-control" href="#similar-product" data-slide="prev">
										<i class="fa fa-angle-left"></i>
									</a>
									<a class="right item-control" href="#similar-product" data-slide="next">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>

										</div>
										<!-- product div information -->
														<div class="col-sm-7">
																		<div class="product-information"><!--/product-information-->
																			<h2>'.$row['c_name'].'</h2>
																			<p>'.$row['c_description'].'</p>

																		<form class="form-submit">
																			<span>
																					<span>Php '.$row['c_price'].'</span>
																			</span>
																			<hr>

																		 <p>Please <a href="login.php" ><b>Sign In</b></a> to rent.</p>

																		</form>
																		<hr>

																			<p><b>Availability:</b>
																				'.$row['c_availability'].'
																			</p>
																			<!-- <p><b>Condition:</b> New</p> -->
																			<p><b>Category:</b> '.$row['cat_name'].'</p>
																			<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
																		</div><!--/product-information-->
														</div>
														<!-- end of product div information -->
												</div>
									';
									echo $output;
						$stmt->close();
				}
			}
?>

				</div>


			</div>
		</div>
		<div class="container">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-4 text-center">
							<h1 class="text-warning mt-4 mb-4">
								<b><span id="average_rating">0.0</span> / 5</b>
							</h1>
							<div class="mb-3">
								<i class="fas fa-star star-light mr-1 main_star"></i>
														<i class="fas fa-star star-light mr-1 main_star"></i>
														<i class="fas fa-star star-light mr-1 main_star"></i>
														<i class="fas fa-star star-light mr-1 main_star"></i>
														<i class="fas fa-star star-light mr-1 main_star"></i>
							</div>
							<h3><span id="total_review">0</span> Review</h3>
						</div>
						<div class="col-sm-4">
							<p>
														<div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

														<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
														<div class="progress">
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
														</div>
												</p>
							<p>
														<div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

														<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
														<div class="progress">
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
														</div>
												</p>
							<p>
														<div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

														<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
														<div class="progress">
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
														</div>
												</p>
							<p>
														<div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

														<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
														<div class="progress">
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
														</div>
												</p>
							<p>
														<div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

														<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
														<div class="progress">
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
														</div>
												</p>
						</div>
						<!-- <div class="col-sm-4 text-center">
							<h3 class="mt-4 mb-3">Write Review Here</h3>
							<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
						</div> -->
					</div>
				</div>
			</div>
			<div class="mt-5" id="review_content"></div>
		</div>
		<!-- <div id="review_modal" class="modal" tabindex="-1" role="dialog">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
			      	<div class="modal-header">
			        	<h5 class="modal-title">Submit Review</h5>
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
		</div> -->
	</section>
<?php require('footer.php'); ?>
