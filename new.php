
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">new custumes</span></h2>
	<?php
$results = $con->query("SELECT tc.c_name,
							   tc.id,
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
							   ORDER BY tc.id DESC ");
if (!$results){
    printf("Error: %s\n", $con->error);
    exit;
}

while($row = $results->fetch_assoc()) {
$picture = base64_encode($row['c_image']);
$products_list=<<<EOT
<<<<<<< HEAD

=======
<div class="form-item">
>>>>>>> 63df92a315b6484ede2283b1dc697f19b261d2db
<div class="col-sm-4">
<div class="product-image-wrapper">
	<div class="single-products">
		<div class="productinfo text-center">
			<img src="data:image/jpeg;base64,{$picture}" width="268px" height="249px" alt="" />
			<h2>PHP &nbsp{$row['c_price']}</h2>
			<p>{$row['c_description']}</p>
		</div>
		<div class="product-overlay">
		<div class="overlay-content">

		<h2>PHP &nbsp{$row['c_price']}</h2><!--This is under form because style factor when product price move to form then style is not formating-->
		<p>{$row['c_description']}</p>
<<<<<<< HEAD
		<form class="form-item" id="form_item">
		<input class="product_qty" type="hidden" value="1">
		<input class="product_id" type="hidden" value="{$row["id"]}">
		<input class="product_name" type="hidden" value="{$row["c_name"]}">
		<input class="product_size" type="hidden" value="{$row["c_size"]}">
		<input class="product_price" type="hidden" value="{$row["c_price"]}">
		<input class="product_code" type="hidden" value="{$row["id"]}">
=======

>>>>>>> 63df92a315b6484ede2283b1dc697f19b261d2db
		<a href="product_details.php?costId={$row['id']}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
		</form>
		</div>
	</div>
</div>

</div>
</div>
<<<<<<< HEAD

=======
</div>
>>>>>>> 63df92a315b6484ede2283b1dc697f19b261d2db
EOT;
echo $products_list;
}

?>

</div><!--features_items-->
