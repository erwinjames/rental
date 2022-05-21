   <?php require('header.php'); ?>

   <aside class="right-side">
        <section class="content-header">
            <h1 class="pull-left">Costume List</h1>
        <div class="pull-right"><a data-toggle="modal" class="btn btn-primary btn-sm" data-target="#add"><i class="bi bi-plus-circle"></i>&nbsp; ADD COSTUME</a></div>
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
                                    <label>Costumes code</label>
                                   <input type="text" name="code" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Costume name</label>
                                   <input type="text" name="costume_name" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                   <input type="file" name="attachement[]" id="attachement[]" class="form-control" multiple accept=".jpg, .png, .gif"/>
                                   <img src="assets/icon.png" alt=""> (Old image)
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                   <select class="form-control select2 select2-hidden-accessible" name="label_purpose" required tabindex="-1" aria-hidden="true"/ style="width:100%">
                                        <option></option>
                                        <option value="Safari Animals">Safari Animals</option>
                                        <option value="Nutrition Month Costumes">Nutrition Month Costumes</option>
                                        <option value="Disney Prince&Princess">Disney Prince&Princess</option>
                                        <option value="Halloween Costumes">Halloween Costumes</option>
                                        <option value="Cartoon Characters">Cartoon Characters</option>
                                        <option value="Buwan ng Wika Costumes">Buwan ng Wika Costumes</option>
                                        <option value="Bird">Bird</option>
                                        <option value="Zebra">Zebra</option>
                                        <option value="Elephant">Elephant</option>
                                        <option value="Leopard">Leopard</option>
                                        <option value="Giraffe">Giraffe</option>
                                        <option value="Lion">Lion</option>
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
                                        <textarea class="form-control summernote" required></textarea>
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

             <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document" style="width:50%;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
                  </div>
                  <div class="modal-body">
                        <div class="table-responsive">
                            <form id="add_costume_record" method="post" enctype="multipart/form-data">
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
                                <input type="file" name="images" class="form-control" id="image" accept=".jpg, .png, .gif"/>
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
                                   <select class="form-control select2 select2-hidden-accessible" name="label_purpose" required tabindex="-1" aria-hidden="true"/ style="width:100%">
                                   <option></option>
                                        <?php
                                           $stmt_ship_sd = $con->prepare("SELECT * FROM tbl_costume_categories");
                                           $stmt_ship_sd->execute();
                                           $row_ship_sd = $stmt_ship_sd->get_result();
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
        </section>
    </aside>
    <?php require('footer.php'); ?>
