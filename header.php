<?php
include "modules/cart_process.php";

$minimum_range = 50;
$maximum_range = 400;
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="assets/css/datePicker.css">
<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.js"></script><![endif]-->
<!-- jquery.datePicker.js -->

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.datePicker.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/process.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript">
     $(document).ready(function () {

         $( ".no_of_days" ).change(function() {
            var periodval=$(".no_of_days").val();
            var startDate = $('.start_date');
            var endDate = $('.end_date');
            endDate.setDate(endDate.getDate() + periodval);
          });

            $( '.start_date' ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                showAnim: 'slideDown',
                duration: 'fast',
                minDate: +1,
        });

            $( '.end_date' ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                showAnim: 'slideDown',
                duration: 'fast',
                minDate: +1,
                yearRange: new Date().getFullYear() + ':' + new Date().getFullYear(),
                enableOnReadonly: true,
            });
    });
</script>
	<script type="text/javascript">
  $(document).ready(function() {
    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var cid = $form.find(".cid").val();
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'modules/cart_process.php',
        method: 'post',
        data: {
          cids:cid,
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
						console.log(response);
								setTimeout(function() {
										alert(response);
								}, 100);
								setTimeout(function() {
									window.scrollTo(0, 0);
									load_cart_item_number();
								}, 100);
								setTimeout(function() {
								      window.location = "http://localhost/rental/view_cart.php";
								}, 100);
        }
      });
    });
    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'modules/cart_process.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
	<script type="text/javascript">
   $(document).ready(function() {
     // Change the item quantity
     $(".itemQty").on('change', function() {
       var $el = $(this).closest('tr');
       var pid = $el.find(".pid").val();
       var pprice = $el.find(".pprice").val();
       var qty = $el.find(".itemQty").val();
       location.reload(true);
       $.ajax({
        url: 'modules/cart_process.php',
         method: 'post',
         cache: false,
         data: {
           qty: qty,
           pid: pid,
           pprice: pprice
         },
         success: function(response) {
           console.log(response);
         }
       });
     });

     // Load total no.of items added in the cart and display in the navbar
     load_cart_item_number();

     function load_cart_item_number() {
       $.ajax({
        url: 'modules/cart_process.php',
         method: 'get',
         data: {
           cartItem: "cart_item"
         },
         success: function(response) {
           $("#cart-item").html(response);
         }
       });
     }
   });
   </script>
	 <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
      	url: 'modules/cart_process.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          console.log(response);
          window.location=response;
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
    	url: 'modules/cart_process.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
  <style>
	progress-label-left
	{
	    float: left;
	    margin-right: 0.5em;
	    line-height: 1em;
	}
	.progress-label-right
	{
	    float: right;
	    margin-left: 0.3em;
	    line-height: 1em;
	}
	.star-light
	{
		color:#e9ecef;
	}
	  a.dp-choose-date {
	float: left;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 3px 0;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(calendar.png) no-repeat;
}
a.dp-choose-date.dp-disabled {
	background-position: 0 -20px;
	cursor: default;
}
/* makes the input field shorter once the date picker code
 * has run (to allow space for the calendar icon
 */
input.dp-applied {
	width: 140px;
	float: left;
}
  </style>
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
								if(isset($_SESSION['c_name'])){?>
								<li><a href="product_list.php">Shop</a></li>
								<li><a href="items.php">My Items</a></li>
								<li><a  href="view_cart.php" class="cart-box" title="View Cart"><i class="fa fa-shopping-cart"></i>
									</a>
									<span id="cart-item"></span>
								</li>

								<li>
								<form id="sign_out">
								<button class="ml-auto" type="button" id="btn-su" title="Click to Signout">
								<a id="session_name"><i class="fa fa-card"></i> <?php echo $_SESSION['c_name']; ?></a>
								</button>
								</form>
								</li>
								<?php }else{?>
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
