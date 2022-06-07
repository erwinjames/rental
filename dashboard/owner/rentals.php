   <?php require('header.php'); ?>

   <aside class="right-side">
        <section class="content-header">
                  <h1 class="pull-left">Costumers List</h1>
        <div style="clear:both"></div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                           <div class="table-responsive">
                                <table id="dataTablesFull" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID:</th>
                                            <th>Payment Mode</th>
                                            <th>Name</th>
                                            <th class="no-sort">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userRental">

                                    </tfoot>
                                </table>
                           </div>
                        </div>
                </div>
            </div>
        </section>
    </aside>
    <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document" style="width:25%;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                  </div>
                  <div class="modal-body">
                         <label>Fullname</label> : <input type="text" id="runame" value='' readonly><br>
                         <label>Address</label> : <input type="text" id="ruaddress" value='' readonly><br>
                         <label>Contact</label> : <input type="text" id="rucontact" value='' readonly><br>
                         <label>Pick-up Date</label> : <input type="text" id="rupickupD" value='' readonly><br>
                         <label>Return Date</label> : <input type="text" id="ruReturnupD" value='' readonly><br>
                         <label>Item</label> : <input type="text" id="ruItemName" value='' readonly><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-minus"></i> &nbsp; Close</button>
                  </div>
                </div>
              </div>
            </div>
    <?php require('footer.php'); ?>
