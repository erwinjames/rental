<?php
 //start session //include config file
include "header.php";
?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php require('slider.php'); ?>
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<section>
						<div class="container">
							<div class="row">
							<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>categories</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#">
											<span class="badge pull-right">
											</span>
										</a>
									</h4>
								</div>
							</div>
					<?php

					$stmt = $con->prepare("SELECT * FROM tbl_costume_categories");
					$stmt->execute();
					$result = $stmt->get_result();
					while($row = $result->fetch_assoc()){
					?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#"><?php echo $row['cat_name']; ?></a></h4>
								</div>
							</div>
					<?php }?>
						</div><!--/category-productsr-->
					</div>
				</div>



				<div class="col-sm-9 padding-right">
					<?php require('new.php'); ?>

					<!-- This is Category Post option -->

					<?php require('most_rented.php'); ?>

				</div>
			</div>
		</div>
	</section>

	<?php require('footer.php'); ?>
