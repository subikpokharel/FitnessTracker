      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Food Management
            <small>Food Reference Form</small>
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
                  <h3 class="box-title">Create New Food Reference</h3>
                  <br>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>food/index"> List Food Reference</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="foodForm"  method="post" action="<?php echo base_url() ?>food/create" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exerciseName">Food Name</label>
                      <input type="text" class="form-control" id="exerciseName" placeholder="Enter Name" name="name" required>
                    </div>
                    <div class="form-group">
                      <label for="measurementUnit">Measurement Unit for Food</label>
                      <select name="measurement_unit" class="form-control">
                      <option>Select maesurement unit</option>
                      <?php foreach ($this->mUnit as $mu) { ?>
                            <option value="<?php echo $mu->id; ?>"> <?php echo $mu->measurement_unit ?> </option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="caloriesValue">Calories</label>
                      <input type="number" class="form-control" id="caloriesValue" placeholder="Enter Food Calories" min="0" name="calories" required>
                    </div>
                    <div class="form-group">
                      <label for="fatValue">Fat</label>
                      <input type="number" class="form-control" id="fatValue" placeholder="Enter Food Fat" min="0" name="fat" required>
                    </div>
                    <div class="form-group">
                      <label for="carbsValue">Carbohydrates</label>
                      <input type="number" class="form-control" id="carbsValue" placeholder="Enter Food Carbohydrates" min="0" name="carbs" required>
                    </div>
                    <div class="form-group">
                      <label for="proteinValue">Protein</label>
                      <input type="number" class="form-control" id="proteinValue" placeholder="Enter Food Protein" min="0" name="protein" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="btnSave" class="btn btn-primary">Save Food</button>
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

        $("#foodForm").validate();
      });
    </script>
  </body>
</html>
