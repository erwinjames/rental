<?php

//fetch.php
require "config.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['minimum']) && isset($_POST['maximum'])) {
$results = $con->query("SELECT * FROM tbl_costume WHERE c_price BETWEEN '".$_POST["minimum"]."' AND '".$_POST["maximum"]."' ORDER BY c_price ASC");
echo $con->error;
if (!$results){
    printf("Error: %s\n", $con->error);
    exit;
}
while($row = $results->fetch_assoc()) {
	$picture = base64_encode($row['c_image']);
$products_list= <<<EOT

<div class="col-md-3">
<div class="product-image-wrapper">
<div class="single-products">
	<div class="productinfo text-center">
		<img src="data:image/jpeg;base64,{$picture}" width="268px" height="249px"alt="" />
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

</ul>
</div>
</div>
</div>

EOT;
echo $products_list;
}
}
else{
    echo "Nothing";
}


?>
