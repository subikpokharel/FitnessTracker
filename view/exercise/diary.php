      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>myhome/index"><i class="fa fa-home"></i> myHome</a></li>
            <li><a href="<?php echo base_url() ?>myhome/index"><i ""></i> <?php echo $this->title; ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        

         <div class="box">
                <div class="box-header with-border">
                  <div class="row">
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2">
                        <h3 class="box-title"><br><b><i>Your Exercise Diary for:</i></b></h3>
                      </div>
                      <div class="col-md-2">
                        <?php $year = date("Y"); 
                              $month = date("F");
                              $date = date("d");
                              $day = date("l");
                        ?>
                       <button class="btn bg-primary btn-flat margin">&nbsp;<?php echo $day; ?>,&nbsp;<?php echo $month; ?>&nbsp;<?php echo $date; ?>&nbsp;<?php echo $year; ?></button>
                      </div>
                      <div class="col-md-4"></div>
                   </div>
                   <div class="row">
                    <br><br><br><br>
                      <div class="col-md-2">
                        
                      </div>
                      <div class="col-md-8">
                         <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th colspan="5"><b>Cardiovascular</b></th>
                                  <th colspan="2"><b>Minutes</b></th>
                                  <th colspan="2"><b>Calories Burnt</b></th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->cardioexerciselist as $cl) { ?>
                                    <tr>
                                      <td colspan="5"><?php echo $cl->name; ?></td>
                                      <td colspan="2"><?php echo $cl->time; ?></td>
                                      <td colspan="2"><?php echo $cl->calories; ?></td>
                                      <td><a href="<?php echo base_url() ?>food/cedit/<?php echo $cl->id ?>" class="btn btn-success" > Edit </a>   
                                          <a href="<?php echo base_url() ?>food/delete/<?php echo $cl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                                    </tr>
                                  <?php } ?>
                            </tbody>
                            </table>
                            <button class="btn btn-default ">Add Cardiovascular Exercise</button>
                          </div><!-- /.box-body -->
                      </div>
                      <div class="col-md-2">
                        
                      </div>
                   </div>





                   <div class="row">
                    <br><br><br><br>
                      <div class="col-md-2">
                        
                      </div>
                      <div class="col-md-8">
                         <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th colspan="4"><b>Strength Training</b></th>
                                  <th colspan="1"><b>Sets</b></th>
                                  <th colspan="1"><b>Repetations per sets</b></th>
                                  <th colspan="2"><b>Weights per sets</b></th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->strengthexerciselist as $sl) { ?>
                                    <tr>
                                      <td colspan="4"><?php echo $sl->name; ?></td>
                                      <td colspan="1"><?php echo $sl->sets; ?></td>
                                      <td colspan="1"><?php echo $sl->number_per_set; ?></td>
                                      <td colspan="2"><?php echo $sl->weight; ?></td>
                                      <td><a href="<?php echo base_url() ?>food/sedit/<?php echo $cl->id ?>" class="btn btn-success" > Edit </a>   
                                          <a href="<?php echo base_url() ?>food/delete/<?php echo $cl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                                    </tr>
                                  <?php } ?>
                            </tbody>
                            </table>
                            <button class="btn btn-default ">Add Strength Exercise</button>
                          </div><!-- /.box-body -->
                      </div>
                      <div class="col-md-2">
                        
                      </div>
                   </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      
          
      </div><!-- /.content-wrapper -->
      </body>
</html>



      