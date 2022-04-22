<?php require('header.php'); ?>
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
						<ul>
							<li>item 1 <span>Php 000 </span></li>
							<li>item 3 <span>Php 000 </span></li>
							<li>item 2 <span>Php 000 </span></li>
							<br>
							<li>Total <span>
								Php 000
							 </span></li>
						</ul>
							<form >
							<input type="submit" class="btn btn-default update"  value="Update"/>
							<a href="product_list.php" style="margin-top: 19px; margin-left: 1em;" class="btn btn-default update">Continue Shopping</a>
							<a class="btn btn-default check_out" href="payment.php">Check Out</a>
							</form>	
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php require('footer.php'); ?>