<?php require('header.php'); ?>
	<section>
		<div class="container">
			<div class="row">
					<?php require('category.php'); ?>

				<div class="col-sm-9 padding-right">
					<?php
	 			 if(isset($_GET['costId'])){
	 		 	 $getCat = $_GET['costId'];
	 			 $stmt_select = "SELECT
	 								 tc.id,
	 								 tc.c_name,
	 								 tc.c_image,
	 								 tc.c_category_id,
	 								 tc.c_size,
	 								 tc.c_availability,
	 								 tc.c_price,
	 								 tc.c_stock,
	 								 tc.c_description,
	 								 tcc.cat_name
	 								 FROM tbl_costume tc
	 								 JOIN tbl_costume_categories tcc ON tc.c_category_id=tcc.id WHERE tc.id=?";
	 			 $stmt = $con->prepare($stmt_select);
	 			 $stmt->bind_param('s', $getCat);
	 			 echo $con->error;
	 			 $stmt->execute();
	 			 $result = $stmt->get_result();
	 				 while ($row1 = $result->fetch_assoc()){
	 			 ?>
															<div class="product-details"><!--product-details-->
														<div class="col-sm-5">
															<div class="view-product">
																<img src="data:image/jpeg;base64,<?php echo base64_encode($row1['c_image'] )?>" alt="" />
																<!-- <h3>ZOOM</h3> -->
															</div>
															<div id="similar-product" class="carousel slide" data-ride="carousel">

																<div class="carousel-inner">
																	<div class="item active">
																		<a href=""><img src="assets/images/product-details/similar1.jpg" alt=""></a>
																		<a href=""><img src="assets/images/product-details/similar2.jpg" alt=""></a>
																		<a href=""><img src="assets/images/product-details/similar3.jpg" alt=""></a>
																	</div>
																	<div class="item">
																		<a href=""><img src="assets/images/product-details/similar1.jpg" alt=""></a>
																		<a href=""><img src="assets/images/product-details/similar2.jpg" alt=""></a>
																		<a href=""><img src="assets/images/product-details/similar3.jpg" alt=""></a>
																	</div>
																	<div class="item">
																		<a href=""><img src="assets/images/product-details/similar1.jpg" alt=""></a>
																		<a href=""><img src="assets/images/product-details/similar2.jpg" alt=""></a>
																		<a href=""><img src="assets/images/product-details/similar3.jpg" alt=""></a>
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
																										<h2><?php echo $row1['c_name'] ?></h2>
																										<p><?php echo $row1['c_description'] ?></p>
																										<img src="assets/images/product-details/rating.png" alt="" />
																										<span>
																											<form>
																												<span>Php <?php echo $row1['c_price'] ?></span>
																												<label>Quantity:</label>
																												<input type="text" value="1" name="qty"/>
																												<button type="submit" class="btn btn-fefault cart">
																													<i class="fa fa-shopping-cart"></i>
																													Add to cart
																												</button>

																											</form>
																										</span>
																										<p><b>Availability:</b>
																											<?php echo $row1['c_availability'] ?>
																										</p>
																										<!-- <p><b>Condition:</b> New</p> -->
																										<p><b>Category:</b> <?php echo $row1['cat_name'] ?></p>
																										<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
																									</div><!--/product-information-->
																					</div>
																					<!-- end of product div information -->
																			</div>
																		<?php } ?>
																	<?php } ?>
																		<?php $stmt->close(); ?>
				</div>
			</div>
		</div>
	</section>

<?php require('footer.php'); ?>
