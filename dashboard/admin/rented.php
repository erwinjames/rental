   <?php require('header.php'); ?>
   
   <aside class="right-side">
        <section class="content-header">
            <h1 class="pull-left">Rented List</h1>
        <div style="clear:both"></div>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                           <div class="table-responsive">
                                <table id="dataTablesFull" class="table table-hover table-stripped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No.</th>
                                            <th>Pick-up Date</th>
                                            <th>Return Date Date</th>
                                            <th>Rented Item</th>
                                            <th>Image</th>
                                            <th class="no-sort text-right">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Erwin James Manugas</td>
                                            <td>Subang dako gamay</td>
                                            <td>31212312321</td>
                                            <td>2022-23-11</td>
                                            <td>2022-30-11</td>
                                            <td>Brief</td>
                                            <td><img src="assets/icon.png"></td>
                                            <td >
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-success btn-sm"><i class="bi bi-pen"></i> &nbsp; Manage</a>
                                                  <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-x"></i> &nbsp; Delete</a>
                                                </div>     
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    <?php require('footer.php'); ?>