<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li><a href="$">Information</a></li>
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
						<tr>
							<td class="cart_product">
								<a href=""><img  width="100" src="assets/images/shop/product8.jpg" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Dress</a></h4>
							</td>
							<td class="cart_price">
								<p>Php 000</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Php 000</p>
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
					<div class="total_area">
						<form>
						<ul>
							<li><a type="button" class="btn" style="color:#696763">Paypal</a></li>
							<li><input type="radio" name="payment_mode"> Bank Deposit</li>
							<li><input type="radio" name="payment_mode"> Cash (In-Store-Payment)</li>
							<li><input type="radio" name="payment_mode"> Gcash</li>
							<li><input type="radio" name="payment_mode"> Online Bank Tranfer (via SwiftPay)</li>
						</ul>
					</div>
						<div class="payment-options">
							<div class="order-message">
								<textarea name="payment_message"  placeholder="Notes about your rented costume(s)" rows="10"></textarea>
								<center><input type="submit" value="Pay now" class="btn btn-primary" style="width:50%; height: 40px;"></center>
							</div>	
						</div>
					</form>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li><strong>Contact: </strong>Sample Email / Digits</li>
							<li><strong>Method: </strong> Pick up in store &bull; [store name and address]</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section><!--/#do_action-->
	

<?php require('footer.php'); ?>