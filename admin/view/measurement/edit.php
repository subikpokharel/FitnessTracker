      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Food Measurement Unit Management
            <small>Food Measurement Unit Reference Form</small>
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
                  <h3 class="box-title">Edit Food Measurement Unit Reference</h3>
                  <br>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>measurement/index"> List Food Measurement Unit References</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="measurementForm"  method="post" action="<?php echo base_url() ?>measurement/edit/<?php echo $this->measurementdata->id ?>" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="mUnit">Food Measurement Unit</label>
                      <input type="text" class="form-control" id="mUnit" placeholder="Enter Measurement Unit" name="measurement_unit" value="<?php echo $this->measurementdata->measurement_unit ?>"  required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="btnUpdate" class="btn btn-primary">Update Measurement Unit</button>
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

        $("#measurementForm").validate();
      });
    </script>
  </body>
</html>
