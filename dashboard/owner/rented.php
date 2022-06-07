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

             <!-- Modal -->
             <div class="modal fade" id="managereturnd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document" style="width:25%;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                  </div>
                  <form id="returned_form">
                  <div class="modal-body">
                         <label>Costume Id #:</label> : <input type="text" id="costName" value='' readonly><br>
                         <hr>
                         <label>Qty returned:</label> : <input type="number" name="qtys" id="qtyItem" value=''><br>

                  </div>
                  <div class="modal-footer">

                  <input type="hidden" id="orderID" name="orderID" value=''>
                  <input type="hidden" id="pid" name="pid" value=''>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
                                  <button type="submit" name="returned_btn" id="returned_btn" class="btn btn-primary returned_btn"><i class="bi bi-check"></i> &nbsp; Returned</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <section class="content-header">
            <h1 class="pull-left">Returned items</h1>
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
                                        
                                        </tr>
                                    </thead>
                                    <tbody id="returneditems">

                                    </tfoot>
                                </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Modal -->
             <div class="modal fade" id="managereturnd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document" style="width:25%;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                  </div>
                  <form id="returned_form">
                  <div class="modal-body">
                         <label>Costume Id #:</label> : <input type="text" id="costName" value='' readonly><br>
                         <hr>
                         <label>Qty returned:</label> : <input type="number" name="qtys" id="qtyItem" value=''><br>

                  </div>
                  <div class="modal-footer">

                  <input type="hidden" id="orderID" name="orderID" value=''>
                  <input type="hidden" id="pid" name="pid" value=''>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
                                  <button type="submit" name="returned_btn" id="returned_btn" class="btn btn-primary returned_btn"><i class="bi bi-check"></i> &nbsp; Returned</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </aside>
    <?php require('footer.php'); ?>
