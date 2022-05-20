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
                                                    <a href="#" class="text-red" data-toggle="modal" data-target="#delete"><span data-toggle="tooltip" title="Delete record"
data-toggle="tooltip" title="Manage Record"><i class="bi bi-x-circle-fill"></i></span></a>
                                                <a href="#" class="text-yellow" data-toggle="modal" data-target="#manage"><span data-toggle="tooltip" title="Manage record"
data-toggle="tooltip" title="Manage Record"><i class="bi bi-pencil-square"></i></span></a>
                                                </div>
                                            </td>
       </tr>
                                    >';
    echo $output;
   }
    $stmt->close();
}

function fetch_rented_cost($c) {
    $stmt = $c->prepare("SELECT * FROM orders where paid_status = 1");
    $stmt->execute();
    $result = $stmt->get_result();
   while($row = $result->fetch_array()){
        $output = '
        <tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['id'].'</td>
            <td><img src="assets/icon.png"></td>
            <td >
                <div class="text-center">
                    <a href="#" class="btn btn-success btn-sm"><i class="bi bi-pen"></i> &nbsp; Manage</a>
                  <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-x"></i> &nbsp; Delete</a>
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
            <a href="#" data-toggle="modal" data-target="#manage"><span data-toggle="tooltip" title="Edit"><i class="fa fa-edit text-yellow"></i></span></a>
              <a href="#" data-toggle="modal" data-target="#delete"><span data-toggle="tooltip" title="Delete"><i class="fa fa-trash text-red"></i></span></a>
            </div>
        </li>
       ';
    echo $output;
}
echo '</ul>';
}

function sign_out() {
    session_destroy();
    echo "Signout successfully!";
}
?>
