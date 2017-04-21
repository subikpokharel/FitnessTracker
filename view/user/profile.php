 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $this->title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/public/bootstrap/css/bootstrap.min.css">
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
  <body class="hold-transition signup-page">

<div class="row">
  <div class="col-xs-2">
  </div> 
  <div class="col-xs-8">
  <div class="signup-box">
      <div class="login-logo">
        <a href="<?php echo base_url()?>user/profile"><b>Customer</b>Profile</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <?php echo SessionHelper::flashMessage();  ?>
      <!--enctype="multipart/form-data"-->
         <form action="<?php echo base_url()?>user/profile/<?php echo $this->userdata->cus_id ?>" method="post" id="profileForm" enctype="multipart/form-data"  novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label>Hello, <?php echo ucfirst($this->userdata->username); ?></label>   
                    </div>
                    <div class="form-group">
                      <label for="first">First Name</label>
                      <input type="text" class="form-control" id="first" placeholder="Enter your First Name" value="<?php echo ($this->userdata->Fname); ?>" name="Fname" required>
                    </div>
                    <div class="form-group">
                      <label for="last">Last Name</label>
                      <input type="text" class="form-control" id="last" placeholder="Enter your Last Name" value="<?php echo ($this->userdata->Lname); ?>"  name="Lname" required>
                    </div>
                    <div class="form-group">
                      <label for="eMail">Email</label>
                      <input type="email" class="form-control" id="eMail" placeholder="Enter Email" value="<?php echo ($this->userdata->email); ?>"  name="email" required>
                    </div>
                    <div class="form-group">
                     <div class="user-panel">
                          <div class="pull-left image">
                             <img src="<?php echo base_url()?>public/images/customer/<?php echo $this->userdata->profile_picture; ?>" class="img-circle" alt="User Image">
                          </div>
                          <div class="pull-left info">
                              <label for="profilePicture">Change Profile Picture</label>
                              <input type="file" id="profilePicture" class="form-control" name="profile_picture">
                          </div>
                        </div>  
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <div class="row">
                       <div class="col-xs-10">
                          <button type="submit" name="btnUpdate" class="btn btn-primary">Update Profile</button>
                        </div>
                        <div class="col-xs-2">
                          <button type="submit" class="btn btn-default"><a href="<?php echo base_url()?>dashboard/index">Back to Home</a></button>
                        </div>
                      </div>
                  </div>
                </form>



        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    </div>
    <div class="col-xs-2">
  </div> 
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>admin/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>admin/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>admin/public/plugins/iCheck/icheck.min.js"></script>


    <script src="<?php echo base_url()?>admin/public/validation/dist/jquery.validate.js"></script>

    <script>
      $(function () {

        $("#profileForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
 

 