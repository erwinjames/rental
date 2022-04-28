   <?php require('header.php'); ?>
   
   <aside class="right-side">
        <section class="content-header">
            <h1 class="pull-left">Costumes Categories</h1>
             <div class="pull-right"><a data-toggle="modal" class="btn btn-primary btn-sm" data-target="#add"><i class="bi bi-plus-circle"></i>&nbsp; ADD CATEGORY</a></div>
        <div style="clear:both"></div>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div id="fetch_categories" class="box-body">
      
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add -->
              <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
                  </div>
                  <div class="modal-body">
                        <div class="table-responsive">
                            <form id="add_category"  method="post" enctype="multipart/form-data">   
                                <div class="form-group">
                                    <label>Categorty name</label>
                                   <input type="text" name="category_name" class="form-control" required/>
                                </div>
                            
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
                    <button type="button" id="add_category_btn" data-dismiss="modal" class="btn btn-primary"><i class="bi bi-check"></i> &nbsp; Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Record</h5>
                  </div>
                  <div class="modal-body">
                         <p>Are you sure you want to delete this one!?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="bi bi-check"></i>&nbsp; Delete</button>
                  </div>
                </div>
              </div>
            </div>

             <div class="modal fade" id="manage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Manage Record</h5>
                  </div>
                  <div class="modal-body">
                     <form>   
                        <div class="form-group">
                          <label>Costumes name</label>
                            <input type="text" name="code" class="form-control" value="" required/>
                        </div>
                                
                      </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="bi bi-check"></i> &nbsp; Update</button>
                  </div>
                </div>
              </div>
            </div>

        </section>
    </aside>
    <?php require('footer.php'); ?>