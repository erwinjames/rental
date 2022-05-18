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
							</div>
					</div>
				<div class="col-sm-12 hidden" id="info">
					<div class="total_area">
						<ul>
							<li>[ store name ]<br>
							  [ store address here ]
							</li>
							<input type="submit" value="Continue to payment" class="btn btn-primary">
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

					</form>
					
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