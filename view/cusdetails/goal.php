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
        <a href="<?php echo base_url()?>cusdetails/goal"><small>Set your goal</small></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <?php echo SessionHelper::flashMessage();  ?>
      <!--enctype="multipart/form-data"-->
         <form action="<?php echo base_url()?>cusdetails/goal" method="post" id="goalForm"  novalidate>
                  <div class="box-body">
                  	<div class="form-group">
                      <label>Based on your previous information, your BMI = <?php echo($this->ubmi->bmi) ?> which is categorised as <?php echo($this->remarks) ?>.</label><br>
                    </div>



                    <div class="form-group">
                      <label>How would you describe your normal daily activities?</label><br>
                      <div class="radio">
                      <input type="radio" name="exercise_level" value="<?php echo $this->rc[0]->id ?>" checked> <?php echo $this->rc[0]->exercise_level ?><br>
                      <input type="radio" name="exercise_level" value="<?php echo $this->rc[1]->id ?>"> <?php echo $this->rc[1]->exercise_level ?><br>
                       <input type="radio" name="exercise_level" value="<?php echo $this->rc[2]->id ?>"> <?php echo $this->rc[2]->exercise_level ?><br>
                      <input type="radio" name="exercise_level" value="<?php echo $this->rc[3]->id ?>"> <?php echo $this->rc[3]->exercise_level ?><br>
                      <input type="radio" name="exercise_level" value="<?php echo $this->rc[4]->id ?>"> <?php echo $this->rc[4]->exercise_level ?><br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="setGoal">What is your Goal?</label>
                          <select name="weight_per_week" class="form-control">
                              <option value="1"> Lose 2 Pounds per week</option>
                              <option value="2"> Lose 1.5 Pounds per week</option>
                              <option value="3" selected> Lose 1 Pounds per week</option>
                              <option value="4"> Lose .5 Pounds per week</option>
                              <option value="5"> Maintain your current weight</option>
                              <option value="6"> Gain .5 Pounds per week</option>
                              <option value="7"> Gain 1 Pounds per week</option>
                          </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <div class="row">
                       <div class="col-xs-12">
                          <button type="submit" name="btnAddGoal" class="btn btn-success">Save and Continue >></button>
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

        $("#goalForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
 

