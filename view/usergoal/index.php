      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>myhome/index"><i class="fa fa-home"></i> myHome</a></li>
            <li><a href="<?php echo base_url() ?>usergoal/index"></i> <?php echo $this->title; ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <div class="box">
                <div class="box-header with-border">
                  <div class="row">
                    <div class="col-md-10">
                        <h3 class="box-title">Daily Nutrition Goals</h3>
                    </div>
                     <!-- <div class="col-md-2">
                        <button type="submit" name="btnEditGoal" class="btn btn-default"><a href="<?php echo base_url()?>usergoal/edit">Edit</a></button>
                    </div> -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      
                      <td><b>Calories</b></td>
                      <td colspan="2"><span class="badge bg-blue"><?php echo $this->gd->calories ?></span></td>
                    </tr>
                    <?php 
                      $carbs = .60*$this->gd->macronutrients;
                       $fat = .16*$this->gd->macronutrients;
                        $protein = .24*$this->gd->macronutrients;
                    ?>
                    <tr>
                      <td><b>Carbohydrates </b><small> <i>   <?php  echo((int)$carbs) ?>gm</i></small></td>
                      <td><span class="badge bg-red">50%</span></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-red" style="width: 50%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Fat </b><small> <i>   <?php  echo((int)$fat) ?>gm</i></small></td>
                      <td><span class="badge bg-yellow">30%</span></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 30%"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Protein </b> <small> <i>   <?php  echo((int)$protein) ?>gm</i></small></td>
                      <td><span class="badge bg-green">20%</span></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-green" style="width: 20%"></div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div><!-- /.content-wrapper -->

      