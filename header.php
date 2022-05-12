<?php
// require "modules/config.php";

$minimum_range = 50;
$maximum_range = 500;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Renz Costumes</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/prettyPhoto.css" rel="stylesheet">
	<link href="assets/css/price-range.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">

	<!-- <link href="assets/css/sliderprice.css" rel="stylesheet"> -->
	<link href="assets/css/jquery-ui.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/process.js"></script>
	<script>
$(document).ready(function(){
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text

			$.ajax({ //make ajax request to cart_process.php
				url: "modules/cart_process.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add to Cart'); //reset button text to original text
				alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault();
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="assets/images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "modules/cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});

	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault();
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});

	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault();
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "modules/cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});

});
</script>

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0922-509-56-50 / 514-61-35</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> renzcreationsandcostumes@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/RenzCostumesCebu"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://www.renzcostumes.blogspot.com/"><i class="fa fa-globe"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
				<a href="index.php" style="color: #FE980F;font-size: 23px;">[ Renz Costumes ]</a>
 					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">

							<ul class="nav navbar-nav">
							<?php

								if(isset($_SESSION['name'])){?>
								<li><a href="product_list.php">Shop</a></li>
								<li><a href="items.php"> My Items</a></li>
								<li><a href="wishlist.php"> Wishlist</a></li>
								<li><a href="#" class="cart-box" title="View Cart"><i class="fa fa-shopping-cart"></i>
													<?php
													if(isset($_SESSION["products"])){
														echo count($_SESSION["products"]);
													}else{
														echo 0;
													}
													?>
													</a>
													</li>
													<div class="shopping-cart-box">
													<a href="#" class="close-shopping-cart-box" >Close</a>
														<div id="shopping-cart-results">
														</div>
													</div>
												</li>
								<li>
								<form id="sign_out">
								<button class="ml-auto" type="button" id="btn-su" title="Click to Signout">
								<a id="session_name"><i class="fa fa-card"></i> <?php echo $_SESSION['name']; ?></a>
								</button>
								</form>
								</li>
								<?php }else{?>
									      <li><a href="#" class="cart-box" title="View Cart">
													<?php
													if(isset($_SESSION["products"])){
														echo count($_SESSION["products"]);
													}else{
														echo 0;
													}
													?>
													</a>
													</li>
													<?php 	if(isset($_SESSION['name'])){ ?>
													<div class="shopping-cart-box">
													<a href="#" class="close-shopping-cart-box" >Close</a>

														<div id="shopping-cart-results">
														</div>
													</div>
													<?php }else{?>
														<div class="shopping-cart-box">
													<a href="#" class="close-shopping-cart-box" >Close</a>

														<div>
															<p>Please Sign in</p>
														</div>
													</div>
													<?php }?>

									<li><a href="product_list.php">Shop</a></li>
								<li><a href="login.php"><i class="fa fa-card"></i> Login</a>
								</li>
								<?php } ?>
							</ul>



						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li><a href="shop_details.php">Shop Details</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form method="post">
							<input type="text" name="search" placeholder="search" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
