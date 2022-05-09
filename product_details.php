<?php require('header.php'); ?>
	<section>
		<div class="container">
			<div class="row">
					<?php require('category.php'); ?>

				<div class="col-sm-9 padding-right">

					<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="assets/images/shop/product8.jpg" alt="" />
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
													<h2>Dress</h2>
													<p>Dress pero pang lalaki</p>
													<img src="assets/images/product-details/rating.png" alt="" />
													<span>
														<form>
															<span>Php 000</span>
															<label>Quantity:</label>
															<input type="text" value="1" name="qty"/>
															<button type="submit" class="btn btn-fefault cart">
																<i class="fa fa-shopping-cart"></i>
																Add to cart
															</button>

														</form>
													</span>
													<p><b>Availability:</b>
														Available
													</p>
													<!-- <p><b>Condition:</b> New</p> -->
													<p><b>Category:</b> Unisex Dress</p>
													<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
												</div><!--/product-information-->
								</div>
								<!-- end of product div information -->
						</div>
				</div>
			</div>
		</div>
	</section>

<?php require('footer.php'); ?>
