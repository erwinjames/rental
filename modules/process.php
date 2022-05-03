<?php
require "config.php";
if(isset($_POST["action"]) && $_POST["action"] == "view_category") {
    //session_start();fetch_categories
    fetch_costume_category($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "fetch_costume") {
    //session_start();fetch_categories
    fetch_costume($con);
}


function fetch_costume($c) {
    $stmt = $c->prepare("SELECT * FROM tbl_costume");
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $output = '
        <div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="assets/images/shop/product8.jpg" width="268px" height="249px" alt="" />
													<h2>PHP&nbsp'.$row['c_price'].'</h2>
													<p>'.$row['c_description'].'</p>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">			
													<form>
															<h2>Php '.$row['c_price'].' </h2><!--This is under form because style factor when product price move to form then style is not formating-->
															<p>'.$row['c_description'].'</p>
															<a href="product_details.php?costId='.$row['id'].'" class="btn btn-default add-to-cart">Details</a>
														</form>	
													</div>
												</div>
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
                        <form class="form-submits">
                        <input type="hidden" class="pid" value="'.$row['id'].'">
                        <input type="hidden" class="pname" value="'.$row['c_name'].'">
                        <input type="hidden" class="pprice" value="'.$row['c_price'].'">
                        <input type="hidden" class="description" value="'.$row['c_description'].'">
                        </form>
													<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
													<li><button class="add_cart" ><i class="fa fa-plus-square"></i>&nbspAdd to Rent</button></li>
												</ul>
											</div>
										</div>
									</div>

										
										</div>';
    echo $output;
    }
    $stmt->close();
}

function fetch_cat($c) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $stmt_ship_sd = $c->prepare("SELECT * FROM tbl_costume_categories"); 
    $stmt_ship_sd->execute();
    $row_ship_sd = $stmt_ship_sd->get_result();
    echo '<ul class="todo-list list-inline">';
    while ($row1 = $row_ship_sd->fetch_assoc()){
        $output = '   
        <li id="" style="width:28%;margin:10px;padding:12px;">
          <div class="row">
            <div class="col-xs-1" style="vertical-align:middle"><i class="bi bi-box-seam"></i> &nbsp;  </div>
            <div class="col-xs-10"><a href="view_category.php?cat='.$row1['cat_name'].'">'.$row1['cat_name'].'</a></div>
          </div>
          <div class="pull-right">
            <a href="#" data-toggle="modal" data-target="#manage"><span data-toggle="tooltip" title="Edit"><i class="fa fa-edit text-yellow"></i></span></a>
              <a href="#" data-toggle="modal" data-target="#delete"><span data-toggle="tooltip" title="Delete"><i class="fa fa-trash text-red"></i></span></a>
            </div>
        </li> 
       ';
    echo $output;
}
echo '</ul>';
}


?>