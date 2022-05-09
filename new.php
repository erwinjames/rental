
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">new custumes</span></h2>
	<?php
	// require "modules/config.php";
	error_reporting(E_ALL);
  ini_set('display_errors', 1);
	$sql_slct ="SELECT   tc.c_name,
						 tc.c_image,
						 tc.c_category_id,
						 tc.c_size,
						 tc.c_availability,
						 tc.c_price,
						 tc.c_stock,
						 tc.c_description,
						 tcc.cat_name
						 FROM tbl_costume tc
						 JOIN tbl_costume_categories tcc ON tc.c_category_id=tcc.id
						 ORDER BY tc.id DESC";
    $stmt = $con->prepare($sql_slct);
	echo $con->error;
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
	?>
			<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="data:image/jpeg;base64,<?php echo base64_encode($row['c_image']);?>" width="268px" height="249px" alt="" />
					<h2>PHP &nbsp<?php echo $row['c_price'] ?></h2>
					<p><?php echo $row['c_description'];?></p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
					<form>

							<h2>PHP &nbsp<?php echo $row['c_price'] ?></h2><!--This is under form because style factor when product price move to form then style is not formating-->
							<p><?php echo $row['c_description'];?></p>
							<input type="hidden" value="1" name="qty"/>
							<button type="submit" class="btn btn-default add-to-cart">
								<i class="fa fa-shopping-cart"></i>
								Add to cart
							</button>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
						</form>

					</div>
				</div>
			</div>
			<!-- <div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<?php

}?>

</div><!--features_items-->
