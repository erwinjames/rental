<?php require('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Dear <?php echo $_SESSION['c_name']?></h2>
			<?php
			 ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $ordId = $_GET['id'];
    $stmt_ship_sd = $con->prepare("SELECT *
    							 FROM user_rent 
    							 JOIN orders ON user_rent.ord_id = orders.id WHERE user_rent.id=?");
    $stmt_ship_sd->bind_param('s',$ordId);
    $stmt_ship_sd->execute();
    $row_ship_sd = $stmt_ship_sd->get_result();
  $row1 = $row_ship_sd->fetch_assoc();
        $output = '
    		Your Order Successfully complete....<hr>
			<h4>Total payable amount: <strong>Php '.$row1['amount_paid'].'</strong></h4>Thanks for purchase. Receive your order successfully. We will contact you ASAP (<b>'.$row1['email'].'</b>) when the items are already packed. For more details please contact us, details at shop details page ... Thank You !
       ';
    echo $output;
			?>
		</div>
	</div>
</div>

<?php require('footer.php'); ?>
