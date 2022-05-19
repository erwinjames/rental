<?php require('header.php'); ?>
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li><input type="radio" name="payment_mode"> <!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/ph/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/ph/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png" alt="Pay with PayPal" /></a></td></tr></table><!-- PayPal Logo --></li>
							<li><input type="radio" name="payment_mode"> Bank Deposit</li>
							<li><input type="radio" name="payment_mode"> Cash (In-Store-Payment)</li>
							<li><input type="radio" name="payment_mode"> Gcash</li>
							<li><input type="radio" name="payment_mode"> Online Bank Tranfer (via SwiftPay)</li>
						</ul>
					</div>

					<div class="bill-to" style="margin-top: -3em;">
					<?php if(!isset($_SESSION['c_name'])){ ?>
						<h5 class="shipping_info"></h5>
							<p>Billing Address</p>
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
									<center><input type="submit" value="Pay now" class="btn btn-primary" style="width:50%; height: 40px;"></center>
									</form>;
							</div>
							<?php}else{?>
							     <hr>
							<?php } ?>
							<form>
							<center><input type="submit" value="Pay now" class="btn btn-primary" style="width:50%; height: 40px;"></center>
						</form>
					</div>

				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<?php if(isset($_SESSION['c_name'])){?>
						<ul>
							<li><strong>Contact: </strong><?php echo $_SESSION['c_email'] ?> / <?php echo $_SESSION['c_number'] ?>  <span><a href="#">Change</a></span></li>
							<li><strong>Ship to: </strong><?php echo $_SESSION['c_address'] ?> <span><a href="#">Change</a></span></li>
							<li><strong>Method: </strong> Sample Method <span><a href="#">Change</a></span></li>
						</ul>
						<?php}else{?>
							<ul>
								<li><strong>Contact: </strong> <span><a href="#">Change</a></span></li>
							</ul>
							<?php } ?>
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
