      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Exercise Management
            <small>Strength Exercise Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
               <?php echo SessionHelper::flashMessage();  ?>
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Strength Exercise</h3>
                  <br>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>strength/index"> List Strength Exercise</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="strengthForm"  method="post" action="<?php echo base_url() ?>strength/edit/<?php echo $this->strengthdata->id ?>" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exerciseName">Exercise Name</label>
                      <input type="text" class="form-control" id="exerciseName" placeholder="Enter Name" name="name" value="<?php echo $this->strengthdata->name ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="metValue">Muscular Group</label>
                      <input type="text" class="form-control" id="metValue" placeholder="Enter Exercise Type" name="musclegroup" value="<?php echo $this->strengthdata->musclegroup ?>" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="btnUpdate" class="btn btn-primary">Update Exercise</button>
                  </div>

                </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 
      </div><!-- /.content-wrapper -->
 

    <!-- DataTables -->
    <script src="<?php echo base_url()?>public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
    <script>
      $(function () {

        $("#strengthForm").validate();
      });
    </script>
  </body>
</html>
