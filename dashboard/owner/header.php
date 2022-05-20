<?php
require "process/modules/config.php";
session_start();
$query = "SELECT DYM,year(DYM) as dateYear,SUM(amount_paid) as totalProfit FROM orders ORDER BY dateYear ";
//execute query
$result = $con->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
$date = date("Y",strtotime($row['dateYear']));
$productname[] =$date;
$sale[]= $row['totalProfit'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Renz Rental Costumes</title>
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="costumer/assets/images/ico/favicon.ico">
        <link rel="apple-touch-icon" href="assets/icon-large.png"/>
        <link rel="image_src" href="assets/icon-large.png"/>
        <!-- Bootstrap 3.3.5 -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
           <!-- Theme style -->
        <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
         <!-- AdminLTE Skins. Choose a skin from the css/skins-->
        <link rel="stylesheet" type="text/css" href="assets/skins/lblack.css">
        <!-- Pace style -->
        <link rel="stylesheet" href="assets/plugins/pace/pace.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
         <!-- Date Picker -->
        <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
         <!-- Time Picker -->
        <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
         <!-- summernote wysihtml5 - text editor -->
        <link href="assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap slider -->
        <link rel="stylesheet" href="assets/plugins/bootstrap-slider/bootstrap-slider.min.css">

        <!-- CUSTOM CSS -->
        <link href="assets/custom.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


        <!-- jQuery 2.1.4 -->
    <!-- <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
    <script src="process/js/main/jquery-1.10.2.min.js"></script>
    <script src="process/js/main/jquery.validate.min.js"></script>
    <script src="process/js/process.js"></script>

</head>
  <body class="hold-transition sidebar-collapsed sidebar-mini">
        <div class="wrapper">
        <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="?route=dashboard" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b><i class="bi bi-basket"></i></b></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg">RRC</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
                <div class="navbar-custom-menu">
                   <ul class="nav navbar-nav">
                         <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/icon.png" class="user-image" alt="User Image" />
                                <span class="hidden-xs"><?php echo $_SESSION['name']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                     <img src="assets/icon.png" class="img-circle" />
                                     <p><?php echo $_SESSION['name'];?><small>
                                      Admin<br>Renz Costumes</small></p>
                                </li>
                                <!-- Menu Footer-->
                                  <li class="user-footer">
                                      <div class="text-center">
                                          <a href="#" id="ship_ownr_signout" class="btn btn-default btn-flat">Sign Out</a>
                                      </div>
                                  </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar ">
          <section class="sidebar">

              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="assets/icon.png" class="user-image" alt="User Image"  style="max-height:45px;max-width:45px; border-radius:50%">
                </div>
                <div class="pull-left info">
                  <p style="color: #fff">User name</p>
                    <a href="#"><i class="fa fa-circle text-success"></i>Online</a>

                </div>
              </div><br>

                <!-- search form -->
                <form method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..." required/>
                    <input type="hidden" name="route" value="search" />
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="bi bi-search"></i></i></button>
                        </span>
                    </div>
                </form>

                <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>

              <li>
                  <a href="index.php">
                      <i class="bi bi-speedometer2"></i> &nbsp; <span>Dashboard</span>
                  </a>
              </li>
               <li>
                  <a href="inventory.php">
                      <i class="bi bi-upc-scan"></i> &nbsp;  <span>Inventory</span>
                  </a>
              </li>


               <li>
                  <a href="costumes.php">
                      <i class="bi bi-box-seam"></i> &nbsp;  <span>Costumes</span>
                  </a>
              </li>



              <li>
                  <a href="rentals.php">
                      <i class="bi bi-envelope-exclamation"></i> &nbsp;  <span>Rental</span>
                  </a>
              </li>


              <li>
                  <a href="rented.php">
                      <i class="bi bi-cart-check"></i> &nbsp;  <span>Rented Costumes</span>
                  </a>
              </li>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
