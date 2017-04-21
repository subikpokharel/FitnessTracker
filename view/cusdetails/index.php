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
        <a href="<?php echo base_url()?>user/signup">Additional Information</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <?php echo SessionHelper::flashMessage();  ?>
      <!--enctype="multipart/form-data"-->
         <form action="<?php echo base_url()?>cusdetails/index" method="post" id="detailsForm"  novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="userHeight">Height</label>
                      <div class="row">
                        <div class="col-xs-6">
                           <input type="text" class="form-control" id="userHeight" placeholder="Enter your height" name="height" required>
                        </div>
                        <div class="col-xs-4">
                          <select name="unit_height" class="form-control">
                              
                              <option value="0"> Inches </option>
                              <option value="1"> Meters </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="userWeight">Weight</label>
                      <div class="row">
                        <div class="col-xs-6">
                           <input type="text" class="form-control" id="userWeight" placeholder="Enter your Weight" name="weight" required>
                        </div>
                        <div class="col-xs-4">
                          <select name="unit_weight" class="form-control">
                              
                              <option value="0"> Pounds </option>
                              <option value="1"> Kg </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label >  Gender  </label>
                      <input type="radio" value="male" name="gender" checked=""> Male
                      <input type="radio" value="female" name="gender"> Female
                    </div>

                    <div class="form-group">
                      <label for="dob">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" placeholder="yyyy-mm-dd" name="dob" required>
                    </div>
                    <div class="form-group">
                      <label for="addr">Address</label>
                      <input type="text" class="form-control" id="addr" placeholder="Enter your Address" name="address" required>
                    </div>
                    <div class="form-group">
                      <label for="phone">Telephone</label>
                      <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <div class="row">
                       <div class="col-xs-12">
                          <button type="submit" name="btnAdd" class="btn btn-primary">Add Information</button>
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

        $("#detailsForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
 

 