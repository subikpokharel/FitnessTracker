<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User | Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/validation/demo/css/screen.css">

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
        <a href="<?php echo base_url()?>user/profile"><b>User</b>Profile</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form role="form" id="userprofileForm"  method="post" action="<?php echo base_url() ?>user/profile" enctype="multipart/form-data" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label>Hello <?php echo ucfirst($this->userdata->username); ?></label>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo ($this->userdata->email); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="FName">First Name</label>
                      <input type="text" class="form-control" id="FName" name="Fname" value="<?php echo($this->userdata->Fname); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="LName">Last Name</label>
                      <input type="text" class="form-control" id="LName" name="Lname" value="<?php echo ($this->userdata->Lname); ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Profile Picture </label>
                      <input type="file" class="form-control" name="profile_picture">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="row">
                     <div class="col-xs-2"> 
                      <div class="checkbox icheck">
                      </div>
                     </div><!-- /.col -->
                      <div class="col-xs-8">
                        <button type="submit" name="btnUpdate" class="btn btn-success btn-block btn-flat">Update Profile</button>
                      </div><!-- /.col -->
                  </div>

          </form>
          <br>
                <a href="<?php echo base_url()?>dashboard/index">Back to Dashboard</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>public/plugins/iCheck/icheck.min.js"></script>


    <script src="<?php echo base_url()?>public/validation/dist/jquery.validate.js"></script>

    <script>
      $(function () {

        $("#userprofileForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
 