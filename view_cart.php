
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
						<tr>
							<td class="cart_product">
								<a href=""><img  width="100" src="assets/images/shop/product8.jpg" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Name</a></h4>
							</td>
							<td class="cart_price">
								<p>Php 1231</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form >
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="qty" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									<form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Php 000</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>

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