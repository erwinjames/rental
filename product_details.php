<?php require('header.php'); ?>
	<section>
		<div class="container">
			<div class="row">
					<?php require('category.php'); ?>

				<div class="col-sm-9 padding-right">
					<?php	
					if(isset($_GET['costId'])){
					$getCat = $_GET['costId'];
					$stmt = $con->prepare("SELECT tc.id,
												tc.c_name,
												tc.c_image,
												tc.c_category_id,
												tc.c_size,
												tc.c_availability,
												tc.c_price,
												tc.c_stock,
												tc.c_description,
												tcc.cat_name,
												tci.images
												FROM tbl_costume tc
												JOIN tbl_costume_image tci ON tc.id = tci.cost_id 
												JOIN tbl_costume_categories tcc  ON tc.c_category_id=tcc.id 
												WHERE tc.id=?");
					$stmt->bind_param('s', $getCat);
					$stmt->execute();
					$result = $stmt->get_result();
					$row1 = $result->fetch_array();
					$picture = base64_encode($row1['images']) ;
					$output .='
						<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						<div class="view-product">
							<img src="data:image/jpeg;base64,'.$picture.'" alt="" />
							<!-- <h3>ZOOM</h3> -->
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">
	
							<div class="carousel-inner">
							<div class="item active">
						
							
					';
				   while($row = $result->fetch_array()){
					$pictures = base64_encode($row['images']) ;
						$output .= '
									<a href="">	<img width="20%" src="data:image/jpeg;base64,'.$pictures.'" alt="" /></a>
							';
				
				   }
				   $output .='
				   </div></div>
				   <a class="left item-control" href="#similar-product" data-slide="prev">
					   <i class="fa fa-angle-left"></i>
				   </a>
				   <a class="right item-control" href="#similar-product" data-slide="next">
					   <i class="fa fa-angle-right"></i>
				   </a>
			   </div>
					   </div>
					   <!-- product div information -->
									   <div class="col-sm-7">
													   <div class="product-information"><!--/product-information-->
														   <h2>'.$row1['c_name'].'</h2>
														   <p>'.$row1['c_description'].'</p>
														   <img src="assets/images/product-details/rating.png" alt="" />
													   <form class="form-submit">
														   <span>
																   <span>Php '.$row1['c_price'].'</span>
																   <label>Quantity:</label>
																   <input type="text" value="1" class="pqty"/>
																   <input type="hidden" class="pid" value="'.$row1['id'].'">
																   <input type="hidden" class="pname" value="'.$row1['c_name'].'">
																   <input type="hidden" class="pprice" value="'.$row1['c_price'].'">
																   <input type="hidden" class="pimage" value="'.$row1['c_image'].'">
																   <input type="hidden" class="pcode" value="'.$getCat.'">
														   </span>
														   <hr>
													   
														   <button type="submit" class="btn btn-fefault addItemBtn cart add-to-cart">
														   <i class="fa fa-shopping-cart"></i>
														   Add to cart
														   </button>
												   
													   </form>
													   <hr>
													   
														   <p><b>Availability:</b>
															   '.$row1['c_availability'].'
														   </p>
														   <!-- <p><b>Condition:</b> New</p> -->
														   <p><b>Category:</b> '.$row1['cat_name'].'</p>
														   <a href=""><img src="assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
													   </div><!--/product-information-->
									   </div>
									   <!-- end of product div information -->
							   </div>';

							   echo $output;
					$stmt->close();
				}
?>
				</div>
			</div>
		</div>
	</section>

<?php require('footer.php'); ?>

