      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            BMI Management
            <small>BMI Reference Form</small>
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
                  <h3 class="box-title">Create New BMI Reference</h3>
                  <br>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>bmi/index"> List BMI References</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="bmiForm"  method="post" action="<?php echo base_url() ?>bmi/create" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="lowerBound">BMI Lower Bound</label>
                      <input type="text" class="form-control" id="lowerBound" placeholder="Enter BMI Lower Bound" name="bmi_low" required>
                    </div>
                    <div class="form-group">
                      <label for="upperBound">BMI Upper Bound</label>
                      <input type="text" class="form-control" id="upperBound" placeholder="Enter BMI Upper Bound" name="bmi_high" required>
                    </div>
                    <div class="form-group">
                      <label for="remarksValue">Remarks</label>
                      <input type="text" class="form-control" id="remarksValue" placeholder="Enter BMI Remarks" name="remarks" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="btnSave" class="btn btn-primary">Save BMI</button>
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

        $("#bmiForm").validate();
      });
    </script>
  </body>
</html>
