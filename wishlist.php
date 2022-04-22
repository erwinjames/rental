<?php require('header.php'); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="">Home</a></li>
				  <li class="active">Wishlist</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
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
							<td class="cart_delete">
								<a style="background: #FE980F; color: #fff; cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
								<a style="background: #FE980F; color: #fff; cursor: pointer;"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						

					</tbody>
				</table>
			</div>
		</div>
	</section>

	<?php require('footer.php'); ?>