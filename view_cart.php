
<?php
include "header.php";
$cart=new Cart();
?>
<section id="cart_items">
<div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>

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
                require 'config.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>

				
													<tr>	
												  <td class="cart_product"><a><img  width="100" src='assets/images/shop/product8.jpg'></a></td>";
													<td class="cart_description"> $product_names</td>
													<td class="cart_price"> $product_prices</td>
													<td class="cart_quantity"> $product_qtys</td>
													<td class="cart_total\"><p class="cart_total_price"> $item_prices</p></td>
													<td class="<td class="cart_delete\"><a class="cart_quantity_delete remove-item" data-code="$product_codes"><i class="fa fa-times"></i></a></td>
												<tr>
												




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

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require('footer.php'); ?>
	