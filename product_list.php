				<?php require('header.php'); ?>
				<section>
					<div class="container">
						<div class="row">
								<?php require('category.php'); ?>
							
							<div class="col-sm-9 padding-right">
							<div class="features_items"><!--features_items-->
								<a href="#" class="cart-box" id="cart-info" title="View Cart">
													<?php 
													if(isset($_SESSION["products"])){
														echo count($_SESSION["products"]); 
													}else{
														echo 0; 
													}
													?>
													</a>

													<div class="shopping-cart-box">
													<a href="#" class="close-shopping-cart-box" >Close</a>
													<h3>Your Shopping Cart</h3>
														<div id="shopping-cart-results">
														</div>
													</div>
						<br>
						<br>
						<br>
						<br>
									<h2 class="title text-center">all custumes</h2>
								
										<?php
										require "modules/config.php";
										 $stmt = $con->prepare("SELECT * FROM tbl_costume");
										 $stmt->execute();
										 $result = $stmt->get_result();
										 while($row = $result->fetch_assoc()){
										?>
										<!--  -->
										<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/shop/product8.jpg" width="268px" height="249px" alt="" />
													<h2>PHP&nbsp<?php echo $row['c_price']?></h2>
													<p><?php echo $row['c_description']?></p>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
													<form>
															<h2>Php <?php echo $row['c_price']?></h2><!--This is under form because style factor when product price move to form then style is not formating-->
															<p><?php echo $row['c_description']?></p>
															<a href="product_details.php?costId=<?php echo $row['id']?>" class="btn btn-default add-to-cart">Details</a>
														</form>
													</div>
												</div>
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
                        <form class="form_submits">
                        <input type="hidden" class="pid" value="<?php echo $row['id']?>">
                        <input type="hidden" class="pname" value="<?php echo $row['c_name']?>">
                        <input type="hidden" class="qty" value="1">
                        <input type="hidden" class="pprice" value="<?php echo $row['c_price']?>">
                        <input type="hidden" class="description" value="<?php echo $row['c_description']?>">
													<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
													<li><button type="submit"><i class="fa fa-plus-square"></i>&nbspAdd to Rent</button></li>
                       							 </form>
                         				 </ul>
											</div>
										</div>
									</div>
										</div>
										<?php }?>
										<!--  -->
									</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<?php require('footer.php'); ?>
