       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             <?php echo $this->title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>myhome/index"><i class="fa fa-home"></i> myHome</a></li>
            <li><a href="<?php echo base_url() ?>exercise/diary"><i ""></i> Exercise Diary</a></li>
            <li><a href="<?php echo base_url() ?>exercise/cadd/<?php  echo $this->cardiodata->id?>"><i ""></i> <?php echo $this->title; ?></a></li>
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
        					<form action="<?php echo base_url()?>exercise/cadd/<?php  echo $this->cardiodata->id?>" method="post" id="addExerciseForm"  novalidate>
          					<div class="form-group">
          						<label for="email">Adding Exercise :<p> <b> <?php echo($this->cardiodata->name) ?></b></p></label>
          					</div>
          					<div class="form-group">
            						<label for="min">How long? (mins)</label>
                      				<input type="number" class="form-control" id="min" min="0" name="time"  required>
         					</div>
         					 <div class="row">
            						<div class="col-xs-7">
              								<button type="submit" name="btnAddCardio" class="btn btn-success btn-block btn-flat">Add Exercise</button>
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

        $("#addExerciseForm").validate();

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>














 