      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>myhome/index"><i class="fa fa-home"></i> <?php echo $this->title; ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        
        <div class="row">
          <div class="col-md-12">
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <br>
          </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Your Daily Summary</h3>
            </div>
        </div><!-- /.box-header -->
         <?php  
                   $remaining_calories = ($this->calgoal->calories) - ($this->record_data->total);
                   $percent = ($this->record_data->total)/($this->calgoal->calories);
                   $progress = $percent*100;
          ?>
        <div class="box box-default color-palette-box">
            <div class="row">
            <br><br>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" >
                  <div class="row">
                    <div class="col-md-4">
                      <?php if ($progress>100) { $remaining_calories = -$remaining_calories; ?>
                              <span><b><i>Calories Exceeded</i></b></span>
                              <br>
                              <div><font color="#f56954"><h2><b><?php echo $remaining_calories ?></b></h2></font></div>
                              </div>
                      <?php } else{ ?>
                              <span><b><i>Calories Remaining</i></b></span>
                              <br>
                              <div><font color="#00a65a"><h2><b><?php echo $remaining_calories ?></b></h2></font></div>
                              </div>
                      <?php } ?>
                    <div class="col-md-4">
                    <br>
                      <button type="submit" class="btn btn-block btn-default btn-flat"><a href="<?php echo base_url()?>exercise/database"><font color="#001F3F"><b> Add Exercise</b></font></a></button>
                    </div>
                    <div class="col-md-4">
                    <br>
                      <button type="submit" class="btn btn-block btn-default btn-flat"><a href="<?php echo base_url()?>food/database"><font color="#001F3F"><b>Add Food</b></font></a></button>
                    </div>
                  </div>
                </div>                
                <div class="col-md-2"></div>
              </div>
              <div class="row">
              <br>
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="table table-bordered"></div>
                  </div>
                  <div class="col-md-2"></div>
                </div>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-2">
                      <div><font color="#3c8dbc"><h2><b><?php echo $this->calgoal->calories ?></b></h2></font></div>
                      <span><b><i>Goal (cal)</i></b></span>
                    </div>
                    <div class="col-md-2">
                      <div><font color="#3c8dbc"><h2><b><?php echo $this->record_data->consumed ?></b></h2></font></div>
                      <span><b><i>Food(cal)</i></b></span>
                    </div>
                    <div class="col-md-2">
                        <div><font color="#3c8dbc"><h2><b>-</b></h2></font></div>
                    </div>
                    <div class="col-md-2">
                        <div><font color="#3c8dbc"><h2><b><?php echo $this->record_data->burnt ?></b></h2></font></div>
                        <span><b><i>Exercise(cal)</i></b></span>
                    </div>
                    <div class="col-md-2">
                        <div><font color="#3c8dbc"><h2><b>=</b></h2></font></div>
                    </div>
                    <div class="col-md-2">
                      <?php if ($this->record_data->total < 0) { ?>
                        <div><font color="#f56954"><h2><b><?php echo $this->record_data->total ?></b></h2></font></div>
                        <span><b><i>Net (cal)</i></b></span>
                      <?php } else{ ?>
                        <div><font color="#3c8dbc"><h2><b><?php echo $this->record_data->total ?></b></h2></font></div>
                        <span><b><i>Net(cal)</i></b></span>
                        <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="row">
                  <br>
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="table table-bordered"></div>
                  </div>
                  <div class="col-md-2"></div>
                </div>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="progress active">
                    <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo($progress) ?>%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>              
            </div>
             <br><br>
        </div><!-- /.box-body -->

      </div><!-- /.content-wrapper -->

      