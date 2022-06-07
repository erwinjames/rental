<?php require('header.php'); ?>
<?php

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT pid,qty,CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	  $pd = $row['pid'];
		$qty = $row['qty'];
	}
	$allItems = implode(', ', $items);
?>

<div class="containers">
<div class="d-flex">
  <form class="checkFrom" action="" method="">
    <label class="labels">
      <span class="fname">Full Name <span class="required">*</span></span>
      <input type="text"  Placeholder="<?php echo $_SESSION['c_name']; ?>" READONLY>
    </label>
    <label class="labels">
      <span>Phone <span class="required">*</span></span>
      <input type="tel" placeholder="<?php echo $_SESSION['c_number'];?>" READONLY>
    </label>
      <label class="labels">
      <span class="fname">Address<span class="required">*</span></span>
      <input type="text"  Placeholder="<?php echo $_SESSION['c_address']; ?>" READONLY>
    </label>
    <label class="labels">
      <span>Email Address <span class="required">*</span></span>
      <input type="email" placeholder="<?php echo $_SESSION['c_email'];?>" READONLY>
    </label>
  </form>
  <div class="Yorder">
    <table class="checkTable">
      <tr class="checkTr">
        <th colspan="2" class="checkTh">Your order</th>
      </tr>
      <tr class="checkTr">
        <td class="checTD"><?= $allItems; ?></td>
        <td class="checTD"><?= number_format($grand_total,2) ?></td>
      </tr>
      <tr class="checkTr">
        <td class="checTD">Subtotal</td>
        <td class="checTD"><?= number_format($grand_total,2) ?></td>
      </tr>
    </table><br>
          <div>
      <input type="radio" name="dbt" value="gcash" required="TRUE" id="ship" checked> GCASH
    </div>
    <div class="bill-to" id="field1">
    <hr>
      <center>  <img src="assets/images/qrcode.png" alt="" width="150"> </center>
    <p>

        Make your payment directly into our gcash account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
    </p>
    <br>

    <p>
      +(63)9236948643 <b>RENZ</b>
    </p>
        <hr>
</div>
    <div>
      <input type="radio" name="dbt" value="dbt" required="TRUE" disabled> Direct Bank Transfer
    </div>
    <div>
      <input type="radio" name="dbt" required="TRUE"  value="cd" id="pick"> Cash
    </div>
  <div id="info">
    <hr>
    <p>
     		Cash on Pickup.
    	</p>
    	    <hr>
</div>
    <div>
      <input type="radio" name="dbt" value="cd" disabled> Paypal <span>
      <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
      </span>
    </div>
    <hr>
    		<form method="post" id="placeOrder">
    								<label class="labels">
                <span>Pickup Date:</span>
								<input placeholder="Pickup date" name="p_date" type="text" class="start_date form-control"  required>
                <span>Pickup Time:</span><input name="p_time" type="time" class="start_time form-control"  required>
								</label>
								<label class="labels">
                  <span>Return Date:</span>
								<input placeholder="Return Date" name="r_date" type="text" class="form-control end_date"  required>
								</label>
								<input type="hidden" name="cid" value="<?php echo $_SESSION["id"]; ?>">
								<input type="hidden" name="pids" value="<?= $pd;  ?>">
							   <input type="hidden" name="name" value="<?php echo $_SESSION["c_name"]; ?>">
								<input type="hidden" name="email" value="<?php echo $_SESSION["c_email"]; ?>">
								<input type="hidden" name="phone" value="<?php echo $_SESSION["c_number"]; ?>">
								<input type="hidden" name="address" value="<?php echo $_SESSION["c_address"]; ?>">
								<input type="hidden" name="pqty" value="<?= $qty; ?>">
								<input type="hidden" name="products" value="<?= $allItems; ?>">
								<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
								<label class="labels">
							      <input type="submit" name="submit" value="Place Order" class="btn btn-primary">
							      </label>
			</form>
  </div><!-- Yorder -->
 </div>
</div>

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
