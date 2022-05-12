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
    $stmt = $c->prepare("SELECT tc.c_name,
    							   tc.id,
    							   tc.c_image,
    							   tc.c_category_id,
    							   tc.c_size,
    							   tc.c_availability,
    							   tc.c_price,
    							   tc.c_stock,
    							   tc.c_description,
    							   tcc.cat_name
    							   FROM tbl_costume tc
    							   JOIN tbl_costume_categories tcc ON tc.c_category_id=tcc.id");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        $output = '
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
							<div class=\'item \'>
								<div class="col-sm-6">
									<form>
									<h1>'.$row['c_name'].'</h1>
									<h2>'.$row['cat_name'].'</h2>
									<p>'.$row['c_description'].'</p>
									<button class="btn btn-default add-to-cart"><a href="product_details.php?costId='.$row['id'].'">Get it now</a></button>
									</form>
								</div>
								<div class="col-sm-6">
								        <img src="data:image/jpeg;base64,'.base64_encode($row['c_image']).'" width="268px" height="249px" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div> ';
    }
      echo $output;
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
