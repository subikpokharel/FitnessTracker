<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/dist/css/skins/_all-skins.min.css">

     <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/validation/demo/css/screen.css">


    <!--for pichart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
       <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>public/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="<?php echo base_url() ?>public/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url()?>dashboard/index" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TrackFitness</b>Admin</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>TrackFitness</b>Admin</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="<?php echo base_url()?>public/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="<?php echo base_url()?>public/#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()?>public/images/admin/<?php echo $this->userdata->profile_picture ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo ucfirst($this->userdata->Fname); ?> <?php echo ucfirst($this->userdata->Lname); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()?>public/images/admin/<?php echo $this->userdata->profile_picture ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo ucfirst($this->userdata->Fname); ?> <?php echo ucfirst($this->userdata->Lname); ?><br> <?php echo $this->userdata->username ?>
                      <small>Logged In Since:  <?php echo $this->userdata->last_login ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url()?>user/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url()?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()?>public/images/admin/<?php echo $this->userdata->profile_picture ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo ucfirst($this->userdata->Fname); ?> <?php echo ucfirst($this->userdata->Lname); ?></p>
              <a href="<?php echo base_url()?>public/#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="<?php echo base_url()?>dashboard/index"><i class="fa fa-dashboard"></i> <span>Dashboard Management</span></a></li>


            <li class="treeview">
              <a href="<?php echo base_url()?>public/#">
                <i class="fa fa-dashboard"></i> <span>Exercise Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url()?>cardio/index"><i class="fa fa-book"></i> <span>Cardio Exercise</span></a></li>
                <li><a href="<?php echo base_url()?>strength/index"><i class="fa fa-book"></i> <span>Strength Exercise</span></a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url()?>public/#">
                <i class="fa fa-dashboard"></i> <span>Food Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url()?>food/index"><i class="fa fa-book"></i> <span>Food Reference</span></a></li>
                <li><a href="<?php echo base_url()?>measurement/index"><i class="fa fa-book"></i> <span>Food Measurement Units</span></a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url()?>bmi/index"><i class="fa fa-book"></i> <span>BMI Management</span></a></li>
            <li><a href="<?php echo base_url()?>requiredcalories/index"><i class="fa fa-book"></i> <span>Required Calories Management</span></a></li>
          </ul>
        </section>
      </aside>

