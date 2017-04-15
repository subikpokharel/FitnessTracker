      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Required Calories Management
            <small>Required Calories Reference Form</small>
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
                  <h3 class="box-title">Create New Required Calories Reference</h3>
                  <br>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>requiredcalories/index"> List Required Calories References</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="requiredcaloriesForm"  method="post" action="<?php echo base_url() ?>requiredcalories/create" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exerciseLevel">Exercise Level</label>
                      <input type="text" class="form-control" id="exerciseLevel" placeholder="Enter Daily Exercise Level" name="exercise_level" required>
                    </div>
                    <div class="form-group">
                      <label for="multiplierValue">Multiplier</label>
                      <input type="text" class="form-control" id="multiplierValue" placeholder="Enter the Multiplier" name="multiplier" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="btnSave" class="btn btn-primary">Save Data</button>
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

        $("#requiredcaloriesForm").validate();
      });
    </script>
  </body>
</html>
