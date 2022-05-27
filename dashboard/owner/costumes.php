   <?php require('header.php'); ?>

   <aside class="right-side">
        <section class="content-header">
            <h1 class="pull-left">Costume List</h1>
        <div class="pull-right">
          <a data-toggle="modal" class="btn btn-primary btn-sm" data-target="#addss"><i class="bi bi-plus-circle"></i>&nbsp; ADD COSTUME</a>
        </div>

                     <div class="modal fade" id="addss" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document" style="width:50%;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
                          </div>
                          <div class="modal-body">
                                <div class="table-responsive">
                                    <form id="add_costume_record"  enctype="multipart/form-data">
                                        <!-- <div class="form-group">
                                            <label>Costumes code</label>
                                           <input type="text" name="code" class="form-control" required/>
                                        </div> -->
                                        <div class="form-group">
                                            <label>Costume name</label>
                                           <input type="text" name="costume_name" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                           <!-- <input type="file" id="image" name="image" class="form-control" required/> -->

                                        <img id="output"/>
                                        <input type="file" name="images" class="form-control" id="images" accept=".jpg, .png, .gif"/>
                                        <input type="hidden" name="action" id="action" value="add" />
                                        <input type="hidden" name="image_id" id="image_id" />

                                          </div>
                                          <div class="form-group">
                                              <label>Other Images</label>
                                             <!-- <input type="file" id="image" name="image" class="form-control" required/> -->

                                          <img id="output"/>
                                          <input type="file" name="image[]" class="form-control" id="image" multiple accept=".jpg, .png, .gif"/>
                                          <input type="hidden" name="action" id="action" value="add" />
                                          <input type="hidden" name="image_id" id="image_id" />

                                            </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                           <select class="form-control select2 " name="label_purpose" required tabindex="-1" aria-hidden="true"/ style="width:100%">
                                           <option></option>
                                                <?php

                                                   $stmt_ship_sds = $con->prepare("SELECT * FROM tbl_costume_categories");
                                                   $stmt_ship_sds->execute();
                                                   $row_ship_sd = $stmt_ship_sds->get_result();
                                                   while ($row1 = $row_ship_sd->fetch_assoc()){
                                                ?>
                                                <option value="<?php echo $row1["id"]?>"><?php echo $row1["cat_name"]?></option>
                                               <?php } ?>
                                               </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Size</label>
                                           <input type="text" name="size" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Availability</label>
                                           <input type="text" name="availability" class="form-control" required/>
                                        </div>
                                         <div class="form-group">
                                            <label>Price</label>
                                           <input type="text" name="price" class="form-control" required/>
                                        </div>
                                         <div class="form-group">
                                            <label>Stock</label>
                                           <input type="text" name="stock" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                                <textarea name="discript" class="form-control" required></textarea>
                                        </div>


                                   </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> &nbsp; Close</button>
                            <button type="submit" id="add" name="add" class="btn btn-primary"><i class="bi bi-check"></i> &nbsp; Save</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>



        <div style="clear:both"></div>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                           <div  class="table-responsive">
                             <table id="dataTablesFull"  class="table table-hover table-stripped table-bordered">
                                                         <thead>
                                                             <tr>
                                                                 <th>Name</th>
                                                                 <th>Image</th>
                                                                 <th>Price</th>
                                                                 <th>Availability</th>
                                                                 <th>Stock</th>
                                                                 <th class="no-sort">&nbsp;</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody  id="costumes_list">


                                                          </tfoot>
                                                        </table>
                           </div>
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
                     <form id="shit">

                                <div class="form-group">
                                    <label>Costume name</label>
                                   <input type="text" id="costume_name" name="costume_name" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                   <input type="file" name="attachement[]"  class="form-control" multiple accept=".jpg, .png, .gif"/>
                                   <div id="attachment"></div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" name="cat" id="cat" required tabindex="-1" aria-hidden="true"/ style="width:100%">

                                         <?php
                                            $stmt_ship_sd = $con->prepare("SELECT * FROM tbl_costume_categories");
                                            $stmt_ship_sd->execute();
                                            $row_ship_sd = $stmt_ship_sd->get_result();
                                            while ($row1 = $row_ship_sd->fetch_assoc()){
                                         ?>

                                         <option value="<?php echo $row1["id"]?>"><?php echo $row1["cat_name"]?></option>
                                        <?php } ?>
                                        </select
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                   <input type="text" id="size" name="size" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Availability</label>
                                   <input type="text" id="availability" name="availability" class="form-control" required/>
                                </div>
                                 <div class="form-group">
                                    <label>Price</label>
                                   <input type="text" id="price" name="price" class="form-control" required/>
                                </div>
                                 <div class="form-group">
                                    <label>Stock</label>
                                   <input type="text" id="stock" name="stock" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                        <textarea id="description" name="Description" class="form-control" required></textarea>
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
