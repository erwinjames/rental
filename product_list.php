<?php
session_start(); //start session
include("modules/config.php"); //include config file
include "header.php";
?>
<body>

<?php

$results = $con->query("SELECT * FROM tbl_costume");
if (!$results){
    printf("Error: %s\n", $con->error);
    exit;
}
while($row = $results->fetch_assoc()) {
$products_list .= <<<EOT
<li>
<form class="form-item">
<div class="col-md-3">
<div class="product-image-wrapper">
<div class="single-products">
	<div class="productinfo text-center">
		<img src="assets/images/shop/product8.jpg" width="268px" height="249px" alt="" />
		<h2>PHP&nbsp{$row['c_price']}</h2>
		<p>{$row['c_description']}</p>
	</div>
	<div class="product-overlay">
		<div class="overlay-content">
				<h2>Php {$row['c_price']} </h2><!--This is under form because style factor when product price move to form then style is not formating-->
				<p>{$row['c_description']}</p>
				<a href="product_details.php?costId={$row['id']}" class="btn btn-default add-to-cart">Details</a>
		</div>
	</div>
</div>
<div class="choose">
<ul class="nav nav-pills nav-justified">

<input name="product_size" type="hidden" value="1">
<input name="product_size" type="hidden" value="{$row["c_size"]}">
<input name="product_code" type="hidden" value="{$row["id"]}">
<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
<li><button type="submit"><i class="fa fa-plus-square"></i>&nbspAdd to Rent</button></li>
                       
</ul>
</div>
</form>
</div>
</div>
EOT;
}


echo $products_list;
?>
</body>
</html>