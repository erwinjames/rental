<?php require('header.php'); ?>
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
					<?php require('category.php'); ?>
				
				<div class="col-sm-9 padding-right">
					<?php require('new.php'); ?>
					
					<!-- This is Category Post option -->
					
					<?php require('most_rented.php'); ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php require('footer.php'); ?>