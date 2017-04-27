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
                        <h3 class="box-title"><br><b><i>Your Food Diary for:</i></b></h3>
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
                   <?php echo SessionHelper::flashMessage();  ?>
                    <br><br><br><br>
                      <div class="col-md-2"> </div>
                      <div class="col-md-8">
                         <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th ><b>Breakfast</b></th>
                                  <th ><b>Calories Consumed</b></th>
                                  <th ><b>Fats</b></th>
                                  <th ><b>Carbohydrates</b></th>
                                  <th ><b>Proteins</b></th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->foodlist as $fl) {  if ($fl->time == 'breakfast') { ?>
                                    <tr>
                                      <td><?php echo $fl->name; ?></td>
                                      <td><?php echo $fl->calories; ?></td>
                                      <td><?php echo $fl->fat; ?></td>
                                      <td><?php echo $fl->carbs; ?></td>
                                      <td><?php echo $fl->protein; ?></td>
                                      <td><a href="<?php echo base_url() ?>food/delete/<?php echo $fl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                                    </tr>
                                  <?php }} ?>
                            </tbody>
                            </table>
                            <button class="btn btn-default "><a href="<?php echo base_url()?>food/database">Add Food</a></button>
                          </div><!-- /.box-body -->
                      </div>
                      <div class="col-md-2"></div>
                   </div>



                   <div class="row">
                    <br><br><br><br>
                      <div class="col-md-2"> </div>
                      <div class="col-md-8">
                         <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th ><b>Lunch</b></th>
                                  <th ><b>Calories Consumed</b></th>
                                  <th ><b>Fats</b></th>
                                  <th ><b>Carbohydrates</b></th>
                                  <th ><b>Proteins</b></th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->foodlist as $fl) { if ($fl->time == 'lunch') { ?>
                                    <tr>
                                      <td><?php echo $fl->name; ?></td>
                                      <td><?php echo $fl->calories; ?></td>
                                      <td><?php echo $fl->fat; ?></td>
                                      <td><?php echo $fl->carbs; ?></td>
                                      <td><?php echo $fl->protein; ?></td>
                                      <td><a href="<?php echo base_url() ?>food/delete/<?php echo $fl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                                    </tr>
                                  <?php }} ?>
                            </tbody>
                            </table>
                            <button class="btn btn-default "><a href="<?php echo base_url()?>food/database">Add Food</a></button>
                          </div><!-- /.box-body -->
                      </div>
                      <div class="col-md-2"></div>
                   </div>


                    <div class="row">
                    <br><br><br><br>
                      <div class="col-md-2"> </div>
                      <div class="col-md-8">
                         <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th ><b>Dinner</b></th>
                                  <th ><b>Calories Consumed</b></th>
                                  <th ><b>Fats</b></th>
                                  <th ><b>Carbohydrates</b></th>
                                  <th ><b>Proteins</b></th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->foodlist as $fl) {  if ($fl->time == 'dinner') { ?>
                                    <tr>
                                      <td><?php echo $fl->name; ?></td>
                                      <td><?php echo $fl->calories; ?></td>
                                      <td><?php echo $fl->fat; ?></td>
                                      <td><?php echo $fl->carbs; ?></td>
                                      <td><?php echo $fl->protein; ?></td>
                                      <td> <a href="<?php echo base_url() ?>food/delete/<?php echo $fl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                                    </tr>
                                  <?php }} ?>
                            </tbody>
                            </table>
                            <button class="btn btn-default "><a href="<?php echo base_url()?>food/database">Add Food</a></button>
                          </div><!-- /.box-body -->
                      </div>
                      <div class="col-md-2"></div>
                   </div>


                   <div class="row">
                    <br><br><br><br>
                      <div class="col-md-2"> </div>
                      <div class="col-md-8">
                         <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                  <th ><b>Snacks</b></th>
                                  <th ><b>Calories Consumed</b></th>
                                  <th ><b>Fats</b></th>
                                  <th ><b>Carbohydrates</b></th>
                                  <th ><b>Proteins</b></th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->foodlist as $fl) {  if ($fl->time == 'snacks') { ?>
                                    <tr>
                                      <td><?php echo $fl->name; ?></td>
                                      <td><?php echo $fl->calories; ?></td>
                                      <td><?php echo $fl->fat; ?></td>
                                      <td><?php echo $fl->carbs; ?></td>
                                      <td><?php echo $fl->protein; ?></td>
                                      <td><a href="<?php echo base_url() ?>food/delete/<?php echo $fl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                                    </tr>
                                  <?php }} ?>
                            </tbody>
                            </table>
                            <button class="btn btn-default "><a href="<?php echo base_url()?>food/database">Add Food</a></button>
                          </div><!-- /.box-body -->
                      </div>
                      <div class="col-md-2"></div>
                   </div>

                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      
          
      </div><!-- /.content-wrapper -->
      </body>
</html>



      