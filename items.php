<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">For Pick-up Item</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="price">Order Number</td>
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
					<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
    $user_id = $_SESSION['id'];
    $stmt_ship_sd = $con->prepare("SELECT *
		    							 FROM user_rent
		    							 JOIN orders ON user_rent.ord_id = orders.id
									 JOIN tbl_costume ON orders.pid = tbl_costume.id
									 JOIN tbl_costume_categories ON tbl_costume.c_category_id = tbl_costume_categories.id WHERE user_rent.costumer_id=?");
    $stmt_ship_sd->bind_param('s',$user_id);
    $stmt_ship_sd->execute();
    $row_ship_sd = $stmt_ship_sd->get_result();
   while($row1 = $row_ship_sd->fetch_assoc()){
   if($row1["paid_status"]==0){
   $sta = "Pending.....";
   }else{
   $sta = "For Pickup";
   }
    ?>
        <tr>
        						<td class="cart_description">
        						<center><h4>#<?php echo $row1['id'];?></h4></center>
							</td>
							<td class="cart_product">
								<a href="">	<a href="">	<img width="100" src="data:image/jpeg;base64,<?php echo base64_encode($row1['c_image'])?>" alt="" /></a></a>

							</td>
							<td class="cart_description">
								<h4><?php echo $row1['cat_name'];?></h4>
							</td>
							<td class="cart_price">
								<h4>Php <?php echo $row1['amount_paid']?></h4>
							</td>
							<td>
								<h4><?php echo   $sta;?></h4>
							</td>
						</tr>

<?php  }?>


					</tbody>
				</table>
			</div>
		</div>
	</section>
	<?php require('footer.php'); ?>
