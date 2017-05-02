       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             <?php echo $this->title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>myhome/index"><i class="fa fa-home"></i> myHome</a></li>
            <li><a href="<?php echo base_url() ?>checkin/index"><i ""></i> <?php echo $this->title; ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                <?php echo SessionHelper::flashMessage();  ?>
                  <h3 class="box-title">Please Enter the Following Informations</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  			
 					<div class="login-box">
      
      					<div class="login-box-body">
        					<form action="<?php echo base_url()?>checkin/index" method="post" id="checkinForm"  novalidate>
          					<div class="form-group">
            						<label for="wt">Enter today's weight (lbs)</label>
                      				<input type="number" class="form-control" id="wt" min="1" name="weight"  required>
         					</div>
                  <?php if ($this->checkindata) { ?>
                     <div class="form-group">
                      <label>Last recoeded weight: <?php echo (int)($this->checkindata->weight/.45)  ?> lbs on <?php echo $this->checkindata->date ?> </label>   
                    </div>
                  <?php } else{ ?>
                  <div class="form-group">
                      <label>No previous records </label>   
                    </div>
                    <?php } ?>
         					 <div class="row">
            						<div class="col-xs-7">
              								<button type="submit" name="btnCheckin" class="btn btn-success btn-block btn-flat">Save Changes</button>
            						</div><!-- /.col -->
            						<div class="col-xs-5">
              								<button class="btn btn-default btn-block btn-flat"><a href="<?php echo base_url()?>myhome/index">Back to Home</a></button><br>
            						</div><!-- /.col -->
          					</div>
        					</form>

      					</div><!-- /.login-box-body -->
    				</div><!-- /.login-box -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 
      </div><!-- /.content-wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>admin/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
      $(function () {

        $("#checkinForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>














 