<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li>Information</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php

										if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
											$taxes = 30;
											$totals 			= 0;
											$list_taxs		= '';
											$cart_boxs = '';


											foreach($_SESSION["products"] as $products){ //Print each item, quantity and price.
												if(isset($products["product_qty"])){
													$product_names = $products["c_name"];
													$product_description = isset($products["c_description"]);
													$product_qtys = $products["product_qty"];
													$product_prices = $products["c_price"];
													$product_codes = isset($products["product_code"]);
													$product_sizes = isset($products["product_size"]);

													$item_prices 	= sprintf("%01.2f",($product_prices * $product_qtys));  // price x qty = total item price
													$cart_boxs 		.= '<tr>';
													$cart_boxs 		.=  "<td class=\"cart_product\"><a><img  width=\"100\" src='assets/images/shop/product8.jpg'></a></td>";
													$cart_boxs 		.=  "<td class=\"cart_description\"> $product_names</td>";
													$cart_boxs 		.=  "<td class=\"cart_price\"> $product_prices</td>";
													$cart_boxs 		.=  "<td class=\"cart_quantity\"> $product_qtys</td>";
													$cart_boxs 		.=  "<td class=\"cart_total\"><p class=\"cart_total_price\"> $item_prices</p></td>";
													//$cart_boxs 		.=  "<td class=\"<td class=\"cart_delete\"><a class=\"cart_quantity_delete remove-item\" data-code=\"$product_codes\"><i class=\"fa fa-times\"></i></a></td>";
													$cart_boxs .= "<tr>";

													$subtotals 		= ($product_prices * $product_qtys); //Multiply item quantity * price
													$totals 			= ($totals + $subtotals); //Add up to total price
												}else{

													$product_names = $products["c_name"];
													$product_description = isset($products["c_description"]);
													$product_qtys = 1;
													$product_prices = $products["c_price"];
													$product_codes = isset($products["product_code"]);
													$product_sizes = isset($products["product_size"]);

													$item_prices 	= sprintf("%01.2f",($product_prices * $product_qtys));  // price x qty = total item price
													$cart_boxs 		.= '<tr>';
													$cart_boxs 		.=  "<td class=\"cart_product\"><a><img  width=\"100\" src='assets/images/shop/product8.jpg'></a></td>";
													$cart_boxs 		.=  "<td class=\"cart_description\"> $product_names</td>";
													$cart_boxs 		.=  "<td class=\"cart_price\"> $product_prices</td>";
													$cart_boxs 		.=  "<td class=\"cart_quantity\"> $product_qtys</td>";
													$cart_boxs 		.=  "<td class=\"cart_total\"><p class=\"cart_total_price\"> $item_prices</p></td>";
												//	$cart_boxs 		.=  "<td class=\"<td class=\"cart_delete\"><a class=\"cart_quantity_delete remove-item\" data-code=\"$product_codes\"><i class=\"fa fa-times\"></i></a></td>";
													$cart_boxs .= "<tr>";

													$subtotals 		= ($product_prices * $product_qtys); //Multiply item quantity * price
													$totals 			= ($totals + $subtotals); //Add up to total price
												}

											}
												echo $cart_boxs;

										}else{
											echo "Your Cart is empty";
										}
										?>



					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">

			<div class="row">
				<div class="col-sm-6">
					<div class="bill-to">
					<p>Shipping Address</p>
						<div class="form-two">
							<form>
								<input type="text" placeholder="Name" name="cus_name">
								<input type="hidden" name="shipping_id" value="">
								<input type="text" placeholder="Email*" name="cus_email">
								<input type="text" placeholder="Mobile" name="cus_mobile">
								<input type="text" placeholder="Address*" name="cus_address">
								<input type="text" placeholder="City" name="cus_city">
								<select name="cus_country">
									<option>-- Country --</option>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
									<input type="text" placeholder="Zip" name="cus_zip">
									<input type="text" placeholder="Fax" name="cus_fax">
									<input type="submit" value="Save & Continue" class="btn btn-primary">
								</form>
							</div>
					</div>
				<div class="col-sm-12 hidden" id="info">
					<div class="total_area">
						<ul>
							<li>[ store name ]<br>
							  [ store address here ]
							</li>

							<a href="payment.php" class="btn btn-primary">Continue to payment</a>

						</ul>
					</div>
				</div>
				</div>
				<div class="col-sm-6" style="margin-top:5.2em;" >
						<div class="payment-options">
							<div class="order-message">
								<textarea name="payment_message"  placeholder="Notes about your rented costume(s)" rows="10"></textarea>
							</div>
							<span>
								<label><input type="radio" id="pick" name="payment_mode">&nbsp; <i class="fa fa-home"></i> Pick-up</label>
							</span>
							<span>
								<label><input type="radio" id="ship" name="payment_mode">&nbsp; <i class="fa fa-truck"></i> Shipping</label>
							</span>
						</div>
				</div>

			</div>
		</div>
	</section><!--/#do_action-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pick').click(function(){
			$('#info').removeClass('hidden');
			$('.bill-to').addClass('hidden');
		});
		$('#ship').click(function(){
			$('.bill-to').removeClass('hidden');
			$('#info').addClass('hidden');
		});
	});
</script>
<?php require('footer.php'); ?>
