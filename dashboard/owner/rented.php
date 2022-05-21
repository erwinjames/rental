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
                                            <th>Email</th>
                                            <th>Pick-up Date</th>
                                            <th>Return Date Date</th>
                                            <th>Rented Item</th>
                                            <th class="no-sort text-right">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rentedInfo">

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
