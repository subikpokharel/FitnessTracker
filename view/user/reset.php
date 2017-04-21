<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/public/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/public/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/public/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>admin/public/validation/demo/css/screen.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url()?>user/reset"><b>Reset </b>Password</a>
      </div><!-- /.login-logo -->
      <?php echo SessionHelper::flashMessage();  ?>
      <div class="login-box-body">
        <p class="login-box-msg">Please enter your new password</p>
        <form action="<?php echo base_url()?>user/reset" method="post" id="loginForm"  novalidate>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required="">
            <?php
              if (isset($err['password'])) {
                echo $err['password'];
              }
            ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required="">
            <?php
              if (isset($err['cpassword'])) {
                echo $err['cpassword'];
              }
            ?>
            <span class="glyphicon glyphicon-lock  form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-2"> 
            </div><!-- /.col -->
            <div class="col-xs-8">
              <button type="submit" name="btnReset" class="btn btn-danger btn-block btn-flat">Reset Password</button>
            </div><!-- /.col -->
            <div class="col-xs-2"> 
            </div><!-- /.col -->
          </div>
        </form>
        <br>
         <a href="<?php echo base_url()?>user/login">Back to Login Page</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>admin/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>admin/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>admin/public/plugins/iCheck/icheck.min.js"></script>


    <script src="<?php echo base_url()?>admin/public/validation/dist/jquery.validate.js"></script>

    <script>
      $(function () {

        $("#loginForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
 