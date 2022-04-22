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
      <div class="login-logo"> <h3>[ Software Name ]</h3></div>
      <div class="login-box-body">
        <form method="post" action="forgot.php" >
          <p class="login-box-msg">Enter your Email</p>
            <div class="form-group has-feedback">
                <div class="input-group login-userinput">
          <span class="input-group-addon" style="background:#3c8dbc;color:#fff"><span class="glyphicon glyphicon-envelope"></span></span>
          <input  type="text" class="form-control" name="email" placeholder="Email" required>
        </div>
      </div>
          <div class="row">
            <div class="col-xs-8"></div>
            <div class="col-xs-4">
              <button style="background:#3c8dbc; color: #fff" type="submit" class="btn btn-block btn-flat" name="login_user">Submit</button>
            </div>       
          </div>
        </form>

      </div>
      <br><p class="text-center"><a href="login.php">Sign in</a></p>
    </div>

    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>