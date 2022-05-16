
<?php
include "header.php";
?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="">Home</a></li>
				  <li class="active">Shopping Cart</li>
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
												$cart_boxs 		.=  "<td class=\"<td class=\"cart_delete\"><a class=\"cart_quantity_delete remove-item\" data-code=\"$product_codes\"><i class=\"fa fa-times\"></i></a></td>";
												$cart_boxs .= "<tr>";

												$subtotals 		= ($product_prices * $product_qtys); //Multiply item quantity * price
												$totals 			= ($totals + $subtotals); //Add up to total price


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
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<?php


									if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
									$tax_item = 0;
									$taxes = 30;
									$total 			= 0;
									$list_tax 		= '';
									$cart_box 		= '<ul>';

									foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
										$product_name = $product["c_name"];
										$product_qty = $product["product_qty"];
										$product_price = $product["c_price"];
										$product_code = $product["product_code"];
										$product_size = $product["product_size"];

										$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price

										$cart_box 		.=  "<li> $product_code &ndash;  $product_name (Qty : $product_qty | $product_size) <span> PHP. $item_price </span></li>";

										$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
										$total 			= ($total + $subtotal); //Add up to total price
									}
									$grand_total = $total; //grand total

									//Print Shipping, VAT and Total
									$cart_box .= "<li class=\"view-cart-total\">Payable Amount : PHP&nbsp".sprintf("%01.2f", $grand_total)."</li>";
										$cart_box .= "<li class=\"view-cart-total\"> <button type='submit'>PAY ONLINE</button>  <button type='submit'>PAY ON STORE</button></li>";
									$cart_box .= "</ul>";

									echo $cart_box;
								}else{
									echo "Your Cart is empty";
								}
								?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require('footer.php'); ?>
