<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li><a href="index.php">Information</a></li>
				  <li class="active">Shipping</li>
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
					<div class="bill-to" style="margin-top: -3em;">
						<h5 class="shipping_info"></h5>
							<p>Shipping Method</p>
						<div class="form-two">
							<div class="total_area">
							<form>
								<ul>
									<li><input type="radio" name="payment_mode"> Method 1</li>
									<li><input type="radio" name="payment_mode"> Method 2</li>
									<li><input type="radio" name="payment_mode"> Method 3</li>
									<li><input type="radio" name="payment_mode"> Method 4</li>
									<input type="submit" value="Continue to payment" class="btn btn-primary">
								</ul>
							</form>
						</div>
					</div>
				</div>
			</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li><strong>Contact: </strong>Sample Email / Digits <span><a href="#">Change</a></span></li>
							<li><strong>Ship to: </strong> Complete Shipping Address <span><a href="#">Change</a></span></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section><!--/#do_action-->
	

<?php require('footer.php'); ?>