
<?php
include "header.php";

if(!isset($_SESSION['id'])){

?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive">
				<table class="table ">
						<center><p>Must Login First </p> <a href="login.php"><b>LOGIN HERE!</b></a></center>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->


<?php } else {?>

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
					<?php
				$cid= $_SESSION['id'];
                $stmt = $con->prepare('SELECT * FROM cart WHERE cid=?');
				$stmt->bind_param('s',$cid);
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
													<tr>
													<input type="hidden" class="pid" value="<?= $row['id'] ?>">
												  <td class="cart_product"><a><img  width="100" src='assets/images/shop/product8.jpg'></a></td>
													<td class="cart_description"><?= $row['product_name'] ?></td>
													<td class="cart_price"> <?= number_format($row['product_price'],2); ?></td>
                        							  <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
													<td class="cart_quantity"><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:70px;"></td>
													<td class="cart_total\"><p class="cart_total_price"><?= number_format($row['total_price'],2); ?></p></td>
													<td class="<td class="cart_delete\"><a  href="modules/cart_process.php?remove=<?= $row['id'] ?>"  onclick="return confirm('Are you sure want to remove this item?');" class="cart_quantity_delete remove-item" data-code="$product_codes"><i class="fa fa-times"></i></a></td>
                     </tr>
					 <?php endwhile; ?>
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
						<?php

$cid= $_SESSION['id'];
$stmt = $con->prepare('SELECT * FROM cart WHERE cid=?');
$stmt->bind_param('s',$cid);
$stmt->execute();
$result = $stmt->get_result();
$grand_total = 0;
while ($row = $result->fetch_assoc()):
?>
<?php $grand_total += $row['total_price']; ?>

							<li><?= $row['product_name'] ?><span>Php  <?= number_format($row['product_price'],2); ?></span></li>
							<?php endwhile; ?>
							<br>

							<li>Total <span>
							<?= number_format($grand_total,2); ?>
							</li>

						</ul>

					 <span>
						  <hr>
			 					<a href="index.php" style="margin-top: 19px; margin-left: 1em;" class="btn btn-default update <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
							 <a href="checkout.php" class="btn btn-default check_out <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
						</span>

				</div>
			</div>
		</div>
	</section>

	<?php } require('footer.php'); ?>
