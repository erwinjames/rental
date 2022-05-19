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


		<div class="">
			<h2>price range</h2>
			<p id="amount" style="text-align:center"></p>
			<div id="slider-range"></div>
			<div class="pricerange">
			  <form>
			    <input type="hidden" id="minimum" name="minimum" value="">
			    <input type="hidden" id="maximum" name="maximum" value="">
			  </form>
			</div>
		</div>
		<!--/price-range-->

	</div>
</div>
