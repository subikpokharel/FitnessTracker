

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-apple"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Food Reference</span>
                  <span class="info-box-number"><?php echo ($this->countF->total); ?><small> Entries</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-heartbeat"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Cardio Exercise</span>
                  <span class="info-box-number"><?php echo ($this->countC->total); ?><small> Entries</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-clone"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Strength Exercise</span>
                  <span class="info-box-number"><?php echo ($this->countS->total); ?><small> Entries</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Members</span>
                  <span class="info-box-number"><?php echo ($this->countM->total); ?><small> Members</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

      <?php  /*  <!-- Main row -->
          <div class="row">

          <div class="col-md-12">
          <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Database Usage</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart-responsive">
                        <canvas id="pieChart" height="150"></canvas>

                         <div id="container" style="min-width: 310px; height: 100px; max-width: 600px; margin: 0 auto"></div>
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-red"></i> Cardio Exercise</li>
                        <li><i class="fa fa-circle-o text-green"></i> Strength Exercise</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Food Reference</li>
                        <li><i class="fa fa-circle-o text-aqua"></i> Members</li>
                        <li><i class="fa fa-circle-o text-light-blue"></i> Measurement Units</li>
                        <li><i class="fa fa-circle-o text-gray"></i> Calories Reference</li>
                        <li><i class="fa fa-circle-o text-violet"></i> BMI Reference</li>
                      </ul>
                    </div><!-- /.col -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <!-- Left col -->
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="<?php echo base_url() ?>public/dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="<?php echo base_url() ?>public/#">Alexander Pierce</a>
                          <span class="users-list-date">Today</span>
                        </li>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="<?php echo base_url() ?>public/javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
                <div class="col-md-6">
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Items</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-info">
                        <a href="<?php echo base_url() ?>public/javascript::;" class="product-title">Samsung TV <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                      </div>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo base_url() ?>public/javascript::;" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.col -->*/ ?>

            
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      