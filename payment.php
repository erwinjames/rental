<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li><a href="$">Information</a></li>
				  <li><a href="$">Shipping</a></li>
				  <li class="active">Payment</li>
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
					<div class="total_area">
						<ul>
							<li><!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/ph/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/ph/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png" alt="Pay with PayPal" /></a></td></tr></table><!-- PayPal Logo --></li>
							<li><input type="radio" name="payment_mode"> Bank Deposit</li>
							<li><input type="radio" name="payment_mode"> Cash (In-Store-Payment)</li>
							<li><input type="radio" name="payment_mode"> Gcash</li>
							<li><input type="radio" name="payment_mode"> Online Bank Tranfer (via SwiftPay)</li>
						</ul>
					</div>
					<div class="bill-to" style="margin-top: -3em;">
						<h5 class="shipping_info"></h5>
							<p>Billing Address</p>
						<div class="form-two">
							<?php
							 if(isset($_SESSION['id']) && $_SESSION['id']){	?>
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
									<center><input type="submit" value="Pay now" class="btn btn-primary" style="width:50%; height: 40px;"></center>

									</form>
								<?php }else{
									if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
									$tax_item = 0;
									$taxes = 30;
									$total 			= 0;
									$list_tax 		= '';
									$cart_box 		= '	<form>';

									foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
											if(isset($product["product_qty"])){
												$product_name = $product["c_name"];
												$product_qty = $product["product_qty"];
												$product_price = $product["c_price"];
												$product_code = $product["product_code"];
												$product_size = $product["product_size"];
											}else{
												$product_name = $product["c_name"];
												$product_qty = 1;
												$product_price = $product["c_price"];
												$product_code = $product["product_code"];
												$product_size = $product["product_size"];
											}


										$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price

										$cart_box 		.=  "<li> $product_code &ndash;  $product_name (Qty : $product_qty | $product_size) <span> PHP. $item_price </span></li>";

										$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
										$total 			= ($total + $subtotal); //Add up to total price
									}
									$grand_total = $total; //grand total

									//Print Shipping, VAT and Total

										$cart_box .= "<center><input type=\"submit\" value=\"Pay now\" class=\"btn btn-primary\" style=\"width:50%; height: 40px;\"></center>";

										$cart_box = "</form>";
									echo $cart_box;
									}else{
									echo "Your Cart is empty";
									}

							}		?>
							</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li><strong>Contact: </strong>Sample Email / Digits <span><a href="#">Change</a></span></li>
							<li><strong>Ship to: </strong> Complete Shipping Address <span><a href="#">Change</a></span></li>
							<li><strong>Method: </strong> Sample Method <span><a href="#">Change</a></span></li>
						</ul>
					</div>
						<div class="payment-options">
							<div class="order-message">
								<textarea name="payment_message"  placeholder="Notes about your rented costume(s)" rows="10"></textarea>
							</div>
						</div>
				</div>

			</div>
		</div>
	</section><!--/#do_action-->


<?php require('footer.php'); ?>
