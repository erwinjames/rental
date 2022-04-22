<?php include('includes/server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <title>[Software Name]</title>
</head>
    <body class="login-page">
    <div class="login-box">
      <!-- /.login-logo -->

      <div class="login-box-body">

        <form method="post" action="login.php" >
            <center><img src="assets/icon.png"></center><br>
            <p class="login-box-msg">Sign in to start your session as Admin</p>
           <?php include('includes/errors.php'); ?>

            <div class="form-group has-feedback">
                <div class=" login-userinput">
                <input  type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
            </div>

          <div class="form-group has-feedback">
          <input  type="password" class="form-control" name="password" placeholder="Password" required> 
        </div>
          <div class="row">
            <div class="col-xs-8"></div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button style="background:#3c8dbc; color: #fff" type="submit" class="btn btn-primary btn-block btn-flat" name="login_user">Sign in</button>
            </div><!-- /.col -->
           
          </div>
    <input type="hidden" name="signin"/>
        </form>

      </div><!-- /.login-box-body -->
      <br><p class="text-center">Not a member yet? <a href="register.php">Sign-up!</a></p>
    </div><!-- /.login-box -->

       <!-- jQuery 2.1.3 -->
   <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>