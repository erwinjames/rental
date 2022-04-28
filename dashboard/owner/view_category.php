   <?php require('header.php'); ?>
   
   <aside class="right-side">
        <section class="content-header">
                  <h1 class="pull-left"><?php echo $_GET['cat']; ?></h1>
        <div style="clear:both"></div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div id="view_category" class="table-responsive">
                                
                           </div>
                        </div>
                </div>
            </div>
        </section>
    </aside>
    <!-- Modal -->
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> Close</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="bi bi-check"></i> Delete</button>
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
                                   <input type="text" name="label_client_address" class="form-control" required/>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x"></i> Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="bi bi-check"></i> Update</button>
                  </div>
                </div>
              </div>
            </div>
    <?php require('footer.php'); ?>