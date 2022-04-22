<?php require('header.php'); ?>
<aside class="right-side">
    <section class="content-header">
         <h1><?php echo $_SESSION['username']; ?></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li><li class="active">Manage Profile</li></ol>
    </section>
    <section class="content">
      <form id="update_profile">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header"><h3><i class="fa fa-cog"></i> Edit Profile</h3></div>
                   <div class="box-body">
                       <div class="row">
                        <form id="update_profile">
                             <div class="col-md-6" >

                  <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" class="form-control" id="name" name="name" value="" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email Address </label>
                    <input type="email" name="email_address" class="form-control" placeholder="" value="" required="" />
                </div>

                     <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" name="username" class="form-control username" placeholder="" value="" required=""  />
                </div>
              
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                    <label for="name">Last </label>
                    <input type="text" class="form-control" id="name" name="name" value="" required>
                  </div>
                

                <div class="form-group">
                    <label for="password">Change Password</label>
                     <input type="text" name="password" class="form-control password" placeholder="" value="" required="" />
                          
                  </div>


            
             <div class="form-group">
                    <label for="avatar">Avatar</label><br>
                      <input type="file" name="avatar" accept="image/jpeg">
                      <p class="help-block">Square JPG image only, recommended size: 128x128px.</p>
                      <p><a href="?qa=removeAvatar">Remove Avatar Image</a></p>
                  </div>
                </div>
                </form>
                       </div>

                    <tfoot>
                        <div class="col-md-12 text-left">
                  <div class="form-group">
                    <button class="btn btn-primary btn-flat notify_message" type="submit">SAVE CHANGES</button>
                  </div>
                </div>
                    </tfoot>
                   </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</aside>
<?php require('footer.php'); ?>