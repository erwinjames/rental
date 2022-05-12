
<?php
session_start(); //start session
include("modules/config.php"); //include config file
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
											$totals 			= 0;
											$list_taxs		= '';
											
		
											foreach($_SESSION["products"] as $products){ //Print each item, quantity and price.
												$product_names = $products["c_name"];
												$product_description = $products["c_description"];
												$product_qtys = 1;
												$product_prices = $products["c_price"];
												$product_codes = $products["product_code"];
												$product_sizes = $products["product_size"];
												
												$item_prices 	= sprintf("%01.2f",($product_prices * $product_qtys));  // price x qty = total item price
												$cart_boxs 		.= '<tr>';
												$cart_boxs 		.=  "<td class=\"cart_product\"><a><img  width=\"100\" src='assets/images/shop/product8.jpg'></a></td>";
												$cart_boxs 		.=  "<td class=\"cart_description\"> $product_names</td>";
												$cart_boxs 		.=  "<td class=\"cart_price\"> $product_prices</td>";
												$cart_boxs 		.=  "<td class=\"cart_quantity\"> $product_qtys</td>";
												$cart_boxs 		.=  "<td class=\"cart_total\"><p class=\"cart_total_price\"> $product_prices</p></td>";
												$cart_boxs 		.=  "<td class=\"<td class=\"cart_delete\"><a class=\"cart_quantity_delete remove-item\" data-code=\"$product_code\"><i class=\"fa fa-times\"></i></a></td>";
												$cart_boxs .= "<tr>";

												$subtotals 		= ($product_prices * $product_qtys); //Multiply item quantity * price
												$totals 			= ($totals + $subtotals); //Add up to total price
											}
											$grand_totals = $totals + $shipping_costs; //grand total
											
											foreach($taxes as $keys => $values){ //list and calculate all taxes in array
													$tax_amounts 	= round($totals * ($values / 100));
													$tax_items[$keys] = $tax_amounts;
													$grand_totals 	= $grand_totals + $tax_amounts; 
											}
											
											foreach($tax_items as $keys => $values){ //taxes List
												$list_taxs .= $keys. ' '. $currency. sprintf("%01.2f", $values).'<br />';
											}
											
											$shipping_costs = ($shipping_costs)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_costs).'<br />':'';
											
											//Print Shipping, VAT and Total
											//$cart_boxs .= "<td class=\"view-cart-total\">$shipping_costs  $list_taxs <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_totals)."</td>";
											
											
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
									$total 			= 0;
									$list_tax 		= '';
									$cart_box 		= '<ul class="view-cart">';

									foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
										$product_name = $product["c_name"];
										$product_qty = 1;
										$product_price = $product["c_price"];
										$product_code = $product["product_code"];
										$product_size = $product["product_size"];
										
										$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
										
										$cart_box 		.=  "<li> $product_code &ndash;  $product_name (Qty : $product_qty | $product_size) <span> $currency. $item_price </span></li>";
										
										$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
										$total 			= ($total + $subtotal); //Add up to total price
									}
									$grand_total = $total + $shipping_cost; //grand total
									
									foreach($taxes as $key => $value){ //list and calculate all taxes in array
											$tax_amount 	= round($total * ($value / 100));
											$tax_item[$key] = $tax_amount;
											$grand_total 	= $grand_total + $tax_amount; 
									}
									
									foreach($tax_item as $key => $value){ //taxes List
										$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
									}
									
									$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
									
									//Print Shipping, VAT and Total
									$cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
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