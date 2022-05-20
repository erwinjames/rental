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
						

															<form method="post" id="placeOrder">
																	<input placeholder="Pickup date" name="p_date" type="text" class="form-control start_date" >
																	<input placeholder="Return Date" name="r_date" type="text" class="form-control end_date"  >
														
																	<input type="hidden" name="cid" value="<?php echo $_SESSION["c_id"]; ?>">
																	<input type="hidden" name="name" value="<?php echo $_SESSION["c_name"]; ?>">
																	<input type="hidden" name="email" value="<?php echo $_SESSION["c_email"]; ?>">
																	<input type="hidden" name="phone" value="<?php echo $_SESSION["c_number"]; ?>">
																	<input type="hidden" name="address" value="<?php echo $_SESSION["c_address"]; ?>">
																	<input type="hidden" name="products" value="<?= $allItems; ?>">
																	<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
																	<input type="submit" name="submit" value="Save & Continue" class="btn btn-primary">
					
								</form>
							
							</div>

					</div>
			

			</div>
		</div>
	</section><!--/#do_action-->
	<!-- jQuery -->

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
