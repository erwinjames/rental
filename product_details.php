<?php require('header.php'); ?>
	<section>
		<div class="container">
			<div class="row">
					<?php require('category.php'); ?>

				<div class="col-sm-9 padding-right">
					<?php
					if(isset($_GET['costId'])){
					$getCat = $_GET['costId'];
					$results = $con->query("SELECT tc.id,
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
											 	 								 JOIN tbl_costume_categories tcc ON tc.c_category_id=tcc.id WHERE tc.id=$getCat");
					if (!$results){
						printf("Error: %s\n", $con->error);
						exit;
					}

					while($row1 = $results->fetch_assoc()) {
					$picture = base64_encode($row1['c_image']);
					$products_list=<<<EOT
					<form class="form-item">
					<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
					<div class="view-product">
						<img src="data:image/jpeg;base64,{$picture}" alt="" />
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
																<h2>{$row1['c_name']}</h2>
																<p>{$row1['c_description']}</p>
																<img src="assets/images/product-details/rating.png" alt="" />
																<span>
																		<span>Php {$row1['c_price']}</span>
																		<label>Quantity:</label>
																		<input type="text" value="1" name="product_qty"/>
																		<input name="product_size" type="hidden" value="{$row1["c_size"]}">
																		<input name="product_code" type="hidden" value="{$row1["id"]}">
																		<button type="submit" class="btn btn-fefault cart add-to-cart">
																			<i class="fa fa-shopping-cart"></i>
																			Add to cart
																		</button>
																</span>
																<p><b>Availability:</b>
																	{$row1['c_availability']}
																</p>
																<!-- <p><b>Condition:</b> New</p> -->
																<p><b>Category:</b> {$row1['cat_name']}</p>
																<a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
															</div><!--/product-information-->
											</div>
											<!-- end of product div information -->
									</div>
					</form>
					EOT;
					echo $products_list;
					}
				}
?>
				</div>
			</div>
		</div>
	</section>

<?php require('footer.php'); ?>
