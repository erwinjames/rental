
<aside class="right-side">
    <section class="content-header">
 <h1 style="margin: 10px 0 20px 0">Dashboard</h1>
        <ol style="margin: 10px 0 20px 0" class="breadcrumb"><li><a href="?route=dashboard"><i class="fa fa-dashboard"></i>Home</a></li><li class="active">Dashboard</li></ol>
    </section>
    <section class="content">
    	 <div class="row">

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-blue">
             <div class="inner">
               <h3>13</h3>
               <p>Stocks</p>
             </div>
             <div class="icon">
               <i class="bi bi-upc-scan"></i>
             </div>
             <a href="allstocks.php" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
          <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>123</h3>
               <p>Costumes </p>
             </div>
             <div class="icon">
               <i class="bi bi-box-seam"></i>
             </div>
             <a href="suppliers.php" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-red">
             <div class="inner">
               <h3>21</h3>
               <p>Rented</p>
             </div>
             <div class="icon">
               <i class="bi bi-cart-check"></i>
             </div>
             <a href="costumer.php" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
		 <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-yellow">
             <div class="inner">
               <h3>23</h3>
               <p>Sales</p>
             </div>
             <div class="icon">
               <i class="bi bi-coin"></i>
             </div>
             <a href="sales.php" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>

         <!-- ./col -->
       </div>

        <div class="row">
          <div class="col-md-8">

             <div class="box box-primary">
                  <div class="box-header">
                    <i class="fa fa-pie"></i>
                   <h3 class="box-title">Sales Bar Chart</h3>
                   <canvas id="myChart" style="width:100%;max-width:900px"></canvas>
                 </div>
              </div>
             </div>
            <div class="col-md-4">
                    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Costumes</h3>

          <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           </div>
                </div>
                  <div class="box-body">
                    <ul class="products-list product-list-in-box">
                <!-- /.box-header -->
                <?php
              $results = $con->query("SELECT tc.c_name,
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
                               JOIN tbl_costume_categories tcc ON tc.c_category_id=tcc.id
                               ORDER BY tc.id DESC ");
              if (!$results){
                  printf("Error: %s\n", $con->error);
                  exit;
              }

              while($row = $results->fetch_assoc()) {
              $picture = base64_encode($row['c_image']);
              $products_list=<<<EOT
                  <li class="item">
                <div class="product-img">
                   	<img src="data:image/jpeg;base64,{$picture}"/>
                 </div>
                    <div class="product-info">
                        <a href="#">{$row['c_name']}
                          <span class="label pull-right" style="background-color:#fff;color:green; border:1px solid;"> Status</span>
                        </a>
                        <a href="" class="products-title"><span></span></a>
                        <span class="product-description">Details</span>

                    </div>
                  </li>
              EOT;
              echo $products_list;
            }?>

                <!-- /.box-body -->
                    </ul>
                  </div>
              </div>

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
     </section>
   </aside>
