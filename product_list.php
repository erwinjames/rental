<?php
include "header.php";
?>
<body>

<?php
include "category.php";
?>
<?php if(!isset($_GET['catid'])){?>
<form class="form-item" id="load_product">
</form>

  <?php
}else{
   $cat = $_GET['catid'];
    $stmt_ship_sd = $con->prepare("SELECT  * FROM tbl_costume WHERE c_category_id=?");
    $stmt_ship_sd->bind_param('s',$cat);
    $stmt_ship_sd->execute();
    $row_ship_sd = $stmt_ship_sd->get_result();
   while($row1 = $row_ship_sd->fetch_assoc()){ ?>

  <div class="col-md-3">
  <div class="product-image-wrapper">
  <div class="single-products">
  	<div class="productinfo text-center">
  		<img src="data:image/jpeg;base64,<?php echo base64_encode($row1['c_image'])?>" width="268px" height="249px"alt="" />
  		<h2>PHP&nbsp<?php echo $row1['c_price']?></h2>
  		<p><?php echo $row1['c_description']?></p>
  	</div>
  	<div class="product-overlay">
  		<div class="overlay-content">
  				<h2>Php <?php echo $row1['c_price']?> </h2><!--This is under form because style factor when product price move to form then style is not formating-->
  				<p><? echo $row1['c_description']?></p>
  				<a href="product_details.php?costId=<?php echo $row1['id']?>" class="btn btn-default add-to-cart">Details</a>
  		</div>
  	</div>
  </div>
  <div class="choose">
  <ul class="nav nav-pills nav-justified">

  </ul>
  </div>
  </div>
  </div>
<?php } } ?>

<?php
include "footer.php";
?>
</body>
</html>
