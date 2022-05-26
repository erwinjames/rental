<?php
require "config.php";
// if(isset($_POST["action"]) && $_POST["action"] == "view_category") {
    //session_start();fetch_categories
//     fetch_costume_category($con);
// }
if(isset($_POST["action"]) && $_POST["action"] == "fetch_costumes") {
    //session_start();fetch_categories
    fetch_costume($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "userRental") {
    //session_start();fetch_categories
    fetch_user_rent($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'assgn_edit_id_form') {
    assign_edit_id($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'costme_edit_id_form') {
    costume_edit_form($con);
}
if($_POST["action"] == "ship_ownr_signout") {
    session_start();
    sign_out();
}
if(isset($_POST["action"]) && $_POST["action"] == "fetch_categories") {
    //session_start();
    fetch_cat($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "fetch_costume_rented") {
    //session_start();
    fetch_rented_cost($con);
}
if($_POST['action'] == 'add') {
    //session_start();
    add_costume($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "add_category") {
    //session_start();
    adding_categories($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_inventorys') {
    delete_invetory($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_cost') {
    delete_costumes($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'edit_inventory_forms') {
    edit_inventory_name($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'acceptUserRental') {
    acceptUserRent($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'declineUsers') {
    declineUse($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'modalFetch') {
    modalFetch($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'returnedcostume') {
    returnedcostumes($con);
}
function returnedcostumes($c) {
           $r_ids = $_POST['returnId'];
           $stat = 1;
            $sql_updts = "UPDATE `user_rent` SET `p_return_stat` = ? WHERE `user_rent`.`ord_id` = ?";
            $stmt4 = $c->prepare($sql_updts);
            $stmt4->bind_param('ss',$stat,$r_ids);
            if($stmt4->execute()){
              echo "Updated successfully!";
            }else{
              echo "Not updated";
            }
            $stmt4->close();
}
function modalFetch($con) {
    ob_start();
          $fetch_modals_id = $_POST['modal_fe_id'];
          $stmtss1= "SELECT *
                        FROM orders
                        LEFT JOIN user_rent ON orders.id=user_rent.ord_id
                        Where orders.id=?";
          $stmts = $con->prepare($stmtss1);
          $stmts->bind_param('s', $fetch_modals_id);
          echo $con->error;
          $stmts->execute();
          $results = $stmts->get_result();
          $rows = $results->fetch_array();
ob_end_clean();
        echo json_encode($rows);
}

function declineUse($c) {
    $dcline_id = $_POST['declineId'];
    $stmt3 = $c->prepare("DELETE FROM orders WHERE id=?");
    $stmt3->bind_param('s',$dcline_id);
    echo $c->error;
    $stmt3->execute();
    $stmt3->close();
    echo "Deleted Successfully!";
}
function acceptUserRent($c) {
        $a_id = $_POST['acceptId'];
            $sql_updt = "UPDATE orders SET paid_status=1 WHERE id=?";
            $stmt = $c->prepare($sql_updt);
            $stmt->bind_param('s',$a_id);
            $stmt->execute();
            $stmt->close();
            echo "Updated successfully!";
}

function edit_inventory_name($c) {
        $c_id = $_POST['cost_id_ajax'];
        $edit_name = $_POST['edit_costume'];
            $sql_updt = "UPDATE tbl_costume_categories SET cat_name=? WHERE id=?";
            $stmt = $c->prepare($sql_updt);
            $stmt->bind_param('ss',$edit_name,$c_id);
            $stmt->execute();
            $stmt->close();
            echo "Updated successfully!";
}
function delete_costumes($c) {
    $cos_id = $_POST['delete_cost_id'];
    $stmt4 = $c->prepare("DELETE FROM tbl_costume WHERE id=?");
    $stmt4->bind_param('s',$cos_id);
    echo $c->error;
    $stmt4->execute();
    $stmt4->close();
    echo "Deleted Successfully!";
}
function costume_edit_form($con) {
  ob_start();
          $edit_ids = $_POST['edit_cost_id'];
          $stmtss = "SELECT
                      tc.id,
                      tc.c_name,
                      TO_BASE64(tc.c_image),
                      tc.c_category_id,
                      tc.c_size,
                      tc.c_availability,
                      tc.c_price,
                      tc.c_stock,
                      tc.c_description,
                      tcc.cat_name
                      FROM tbl_costume tc
                      JOIN tbl_costume_categories tcc ON tc.c_category_id=tcc.id WHERE tc.id=?";
          $stmts = $con->prepare($stmtss);
          $stmts->bind_param('s', $edit_ids);
          $stmts->execute();
          $results = $stmts->get_result();
          $rows = $results->fetch_array();
           ob_end_clean();
        echo json_encode($rows);

}


function delete_invetory($c) {
    $inv_id = $_POST['delete_invetory_id'];
    $stmt3 = $c->prepare("DELETE FROM tbl_costume_categories WHERE id=?");
    $stmt3->bind_param('s',$inv_id);
    echo $c->error;
    $stmt3->execute();
    $stmt3->close();
    echo "Deleted Successfully!";
}

function assign_edit_id($con) {
  ob_start();
          $edit_id = $_POST['cost_id'];
          $stmtss = "SELECT id,cat_name FROM tbl_costume_categories WHERE id=?";
          $stmts = $con->prepare($stmtss);
          $stmts->bind_param('s', $edit_id);
          $stmts->execute();
          $results = $stmts->get_result();
          $row = $results->fetch_array();
           ob_end_clean();
        echo json_encode($row);
}

function adding_categories($c) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // $id = $_SESSION['id'];
    $des = $_POST['category_name'];

    $stmt = $c->prepare("INSERT INTO tbl_costume_categories(cat_name) VALUES (?)");
    $stmt->bind_param('s', $des);
    $stmt->execute();
    $stmt->close();
    echo 'added successfully!';
}

function add_costume($c) {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $cn= $_POST['costume_name'];

    $labe= $_POST['label_purpose'];
    $size = $_POST['size'];
    $image_files = file_get_contents($_FILES["images"]["tmp_name"]);
    $avail = $_POST['availability'];
    $price =$_POST['price'];
    $stak = $_POST['stock'];
    $des = $_POST['discript'];

    $stmt = $c->prepare("INSERT INTO tbl_costume(c_name,c_image,c_category_id,c_size,c_availability,c_price,c_stock,c_description) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss', $cn,$image_files,$labe,$size,$avail,$price,$stak,$des);
    $stmt->execute();
    if($stmt){
    $lastid=$c->insert_id;
     for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
     {
      $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
      $query = ("INSERT INTO tbl_costume_image(cost_id,images) VALUES (?,?)");
      echo $c->error;
      $statement = $c->prepare($query);
      $statement->bind_param('ss', $lastid,$image_file);
      $statement->execute();
      $statement->close();
     }
    }
    echo 'added successfully!';
    $stmt->close();
}


function fetch_costume_category($c) {
    $stmt = $c->prepare("SELECT * FROM tbl_costume");

    $stmt->execute();
    $result = $stmt->get_result();
    echo '   <table id="dataTablesFull" class="table table-hover table-stripped table-bordered">
    <thead>
        <tr>
            <th class="no-sort">Costume Code</th>
            <th>Size</th>
            <th>Photo</th>
            <th>Description/Color</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Stocks</th>
            <th>Category</th>
            <th class="no-sort">&nbsp;</th>
        </tr>
    </thead>';
    while ($row1 = $result->fetch_assoc()){
        $output = '

        <tbody>
            <tr>
                <td>Pvc8978s'.$row1['id'].'</td>
                <td>'.$row1['c_size'].'</td>
                <td><img src="data:image/jpeg;base64,'.base64_encode($row1['c_image'] ).'"></td>
                <td>'.$row1['c_description'].'</td>
                <td>P'.$row1['c_price'].'</td>
                <td>'.$row1['c_availability'].'</td>
                <td>'.$row1['c_stock'].'</td>
                <td>'.$ship_line_id.'</td>
                <td>
                     <div class="text-centert">
                        <a href="#" class="text-red" data-toggle="modal" data-target="#delete"><span data-toggle="tooltip" title="Delete record"
data-toggle="tooltip" title="Manage Record"><i class="bi bi-x-circle-fill"></i></span></a>
                    <a href="#" class="text-yellow" data-toggle="modal" data-target="#manage"><span data-toggle="tooltip" title="Delete record"
data-toggle="tooltip" title="Manage Record"><i class="bi bi-pencil-square"></i></span></a>
                    </div>
                </td>
            </tr>
        </tfoot>
    ';
    echo $output;

    }
    echo '</table>';
    $stmt->close();
}

function fetch_costume($c) {
    $stmt = $c->prepare("SELECT * FROM tbl_costume");
    $stmt->execute();
    $result = $stmt->get_result();

   while($row = $result->fetch_array()){
        $output = '

 <tr>
                                            <td>'.$row['c_name'].'</td>
                                            <td class="text-center"> <img src="data:image/jpeg;base64,'.base64_encode($row["c_image"]).'" width="20%" class="img-thumbnail"></td>
                                            <td>'.$row['c_price'].'</td>
                                            <td>'.$row['c_availability'].'</td>
                                            <td>'.$row['c_stock'].'</td>
                                            <td>
                                                <div class="text-centert">

<button type="button" name="delete_costume" class="text-red red delete_costume" id="'.$row["id"].'">
<span data-toggle="tooltip" title="Delete record" data-toggle="tooltip" title="Delete Record">
<i class="fa fa-trash text-red"></i></span>
</button>

<button type="button" name="edit_costume" class="text-yellow edit_costume" id="'.$row["id"].'" data-toggle="modal" data-target="#manage">
<span data-toggle="tooltip" title="Manage record"
data-toggle="tooltip" title="Manage Record"><i class="fa fa-edit text-yellow"></i></span>
</button>
                                                </div>
                                            </td>
       </tr>
                        ';
    echo $output;
   }
    $stmt->close();
}

function fetch_rented_cost($c) {
    $stmt = $c->prepare("SELECT
      o.id,
      o.names,
      o.email,
      o.phone,
      o.aaddress,
      o.products,
      o.amount_paid,
      o.paid_status,
      o.products,
      ur.pickup_date,
      ur.return_date
      FROM orders o
      LEFT JOIN user_rent ur ON o.id=ur.ord_id where o.paid_status = 1 AND ur.p_return_stat = 0");
    $stmt->execute();
    $result = $stmt->get_result();
   while($row = $result->fetch_array()){
        $output = '
        <tr>
            <td>'.$row['names'].'</td>
            <td>'.$row['aaddress'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['pickup_date'].'</td>
            <td>'.$row['return_date'].'</td>
            <td>'.$row['products'].'</td>

            <td>
                <div class="text-center">
                    <button type="button" class="btn btn-success btn-sm returnItem" id="'.$row["id"].'"><i class="bi bi-pen"></i> &nbsp; RETURNED</button>
                </div>
            </td>
        </tr>';
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
            <button type="button" name="edit_role_btn" class="button small green update_role_btn" id="'.$row1["id"].'" data-toggle="modal" data-target="#manage"">
                  <span data-toggle="tooltip" title="Edit"><i class="fa fa-edit text-yellow"></i></span>
            </button>
              <button type="button" name="rl_btn_delete" class="button small red rl_btn_delete" id="'.$row1["id"].'">
                <span data-toggle="tooltip" title="Delete"><i class="fa fa-trash text-red"></i></span>
              </button>
            </div>
        </li>
       ';
    echo $output;
}
echo '</ul>';
}
function fetch_user_rent($c){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $stmt_ship_sd = $c->prepare("SELECT * FROM orders Where paid_status=0");
    $stmt_ship_sd->execute();
    $row_ship_sd = $stmt_ship_sd->get_result();
    while ($row1 = $row_ship_sd->fetch_assoc()){
        $output = '
        <tr>
        <td><a href="#" data-toggle="modal" class="modalId" data-target="#exampleModalCenter" id="'.$row1["id"].'"><span data-toggle="tooltip" title="View Details">'.$row1['names'].'</span></a></td>
        <td>
            <div class="text-centert">
                <button type="button" name="acceptRental" class="btn btn-success btn-sm acceptuser" id="'.$row1["id"].'"><i class="bi bi-check"></i> &nbsp; Accept</button>
            <button type="button" name="declineRental" class="btn btn-danger btn-sm declineuser" id="'.$row1["id"].'"><i class="bi bi-x"></i> &nbsp; Decline</button>
            </div>
        </td>
    </tr>
       ';
    echo $output;
}
}


function sign_out() {
    session_destroy();
    echo "Signout successfully!";
}

?>
