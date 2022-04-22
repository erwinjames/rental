<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <title>SAP - FSVP</title>
</head>
    <body class="login-page">
    <div class="login-box">
      <div class="login-box-body">
        <form method="post" action="register.php">
          <center><img src="assets/icon.png"></center><br>
          <p class="login-box-msg">Sign up to create your session</p>
           <?php include('includes/errors.php'); ?>

            <div class="form-group has-feedback">
         <div class="login-userinput">
            <label>Username</label>
          <input  type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>"required>
        </div>
          </div>

              <div class="form-group has-feedback">
               <div class="login-userinput">
                  <label>E-mail</label>
                <input  type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"required>
              </div>
          </div>

          <div class="form-group has-feedback">
              <label>Password</label>
          <input  type="password" class="form-control" name="password_1" placeholder="Password" required>
          
          </div>

            <div class="form-group has-feedback">
                <label>Address</label>
          <input  type="password" class="form-control" name="address" placeholder="Address" required>
          </div>
          <div class="form-group has-feedback">
                <label>Contact</label>
          <input  type="password" class="form-control" name="contact" placeholder="Contact" required>
          </div>

          <div class="row">
            <div class="col-xs-4"></div><!-- /.col -->
            <div class="col-xs-4">
              <button style="background:#3c8dbc; color: #fff" type="submit" class="btn btn-block btn-flat" name="reg_user">Register</button>
            </div><!-- /.col -->
           
          </div>
 
  </form>

      </div><!-- /.login-box-body -->
         <br><p class="text-center"> Already a member? <a href="index.php">Sign in</a> </p>
    </div><!-- /.login-box -->

       <!-- jQuery 2.1.3 -->
   <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>