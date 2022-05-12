<?php
require "config.php";
// if(isset($_POST["action"]) && $_POST["action"] == "view_category") {
    //session_start();fetch_categories
//     fetch_costume_category($con);
// }
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
        <div class="col-sm-12">
				 <div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class=\'item active\'>
								<div class="col-sm-6">
									<form>
									<h1>Panglaki</h1>
									<h2>Dress</h2>
									<p>Dress pero pang laki</p>
									<button type="submit" class="btn btn-default add-to-cart">Get it now</button>
									</form>	
								</div>
								<div class="col-sm-6">
									<img src="assets/images/shop/product8.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>

							<div class=\'item\'>
								<div class="col-sm-6">
									<form>
									<h1>Panglaki2</h1>
									<h2>Dress</h2>
									<p>Dress pero pang laki</p>
									<button type="submit" class="btn btn-default add-to-cart">Get it now</button>
									</form>	
								</div>
								<div class="col-sm-6">
									<img src="assets/images/shop/product8.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>

				</div>    ';
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
