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
                        <h1 class="box-title"><br><b><i>Your Diary from:</i></b></h1>
                      </div>
                      <div class="col-md-2">
                       <br>
                       <button class="btn bg-primary btn-flat margin"> <?php echo $this->pastdate ?></button>
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
                                  <th ><b>Date</b></th>
                                  <th ><b>Calories Consumed</b></th>
                                  <th ><b>Calories Burnt</b></th>
                                  <th ><b>Total Calories</b></th>
                              </tr>
                            </thead>
                            <tbody>
                                 <?php
                                 foreach ($this->rec as $r) { ?>
                                    <tr>
                                      <td ><font color="#000000"><h2><b><?php echo $r->date; ?></b></h2></font></td>
                                      <td ><font color="#00a65a"><h2><b><?php echo $r->consumed; ?></b></h2></font></td>
                                      <td ><font color="#f56954"><h2><b><?php echo $r->burnt; ?></b></h2></font></td>
                                      <td ><font color="#0E6C8B"><h2><b><?php echo $r->total; ?></b></h2></font></td>
                                    </tr>
                                  <?php } ?>
                            </tbody>
                            </table>
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
                          
                      <?php if ($this->weight > 0) { ?>
                            <span><h3><b><i>Total Weight loss: <?php echo $this->weight ?> lbs</i></b></h3></span>
                            <div><h2><b></b></h2></div>
                         <?php } else { ?>
                            <span><h3><b><i>Total Weight gained: <?php echo -$this->weight ?> lbs</i></b></h3></span>
                            <div><h2><b></b></h2></div>
                         <?php } ?>
                              
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



      