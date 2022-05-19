<?php require('header.php'); ?>
<?php

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);

?>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>

      </div>
    </div>
  </div>

	<section id="do_action">
		<div class="container">

			<div class="row">
				<div class="col-sm-6">
					<div class="bill-to">
					<p>Shipping Address</p>
						<div class="form-two">
							<?php

							if(!isset($_SESSION['c_name'])){?>

							<form method="post" id="placeOrder">
								<input type="text" placeholder="Name" name="name" required>
								<input type="hidden" name="shipping_id" value="">
								<input type="text" placeholder="Email*" name="email" required>
								<input type="tel" placeholder="Mobile" name="phone" required>
								<textarea type="text" placeholder="Address*" name="address" rows="3" cols="10" required></textarea>
								<input type="text" placeholder="City" name="cus_city" required>
								<select name="country" required>
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
									<input type="text" placeholder="Zip" name="zip" required>
									<input type="hidden" name="products" value="<?= $allItems; ?>">
									<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
									<input type="submit" name="submit" value="Save & Continue" class="btn btn-primary">
								</form>
							<?php }else{?>

															<form method="post" id="placeOrder">
																	<input type="hidden" name="name" value="<?php echo $_SESSION["c_name"]; ?>">
																	<input type="hidden" name="email" value="<?php echo $_SESSION["c_email"]; ?>">
																	<input type="hidden" name="phone" value="<?php echo $_SESSION["c_number"]; ?>">
																	<input type="hidden" name="address" value="<?php echo $_SESSION["c_address"]; ?>">
																				<input type="hidden" name="products" value="<?= $allItems; ?>">
																	<input type="hidden" name="products" value="<?= $allItems; ?>">
																	<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
																	<input type="submit" name="submit" value="Save & Continue" class="btn btn-primary">
															</form>
							<?php }?>
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
