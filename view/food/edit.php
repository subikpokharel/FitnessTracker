      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Exercise Management
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
                  <h3 class="box-title">Edit Food Reference</h3>
                  <br>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>food/index"> List Food Reference</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="foodForm"  method="post" action="<?php echo base_url() ?>food/edit/<?php echo $this->fooddata->id ?>" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exerciseName">Food Name</label>
                      <input type="text" class="form-control" id="exerciseName" placeholder="Enter Name" name="name" value="<?php echo $this->fooddata->name ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="caloriesValue">Calories</label>
                      <input type="text" class="form-control" id="caloriesValue" placeholder="Enter Food Calories" name="calories" value="<?php echo $this->fooddata->calories ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="fatValue">Fat</label>
                      <input type="text" class="form-control" id="fatValue" placeholder="Enter Food Fat" name="fat" value="<?php echo $this->fooddata->fat ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="carbsValue">Carbohydrates</label>
                      <input type="text" class="form-control" id="carbsValue" placeholder="Enter Food Carbohydrates" name="carbs" value="<?php echo $this->fooddata->carbs ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="proteinValue">Protein</label>
                      <input type="text" class="form-control" id="proteinValue" placeholder="Enter Food Protein" name="protein" value="<?php echo $this->fooddata->protein ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="sugarValue">Sugar</label>
                      <input type="text" class="form-control" id="sugarValue" placeholder="Enter Food Sugar" name="sugar"  title="If there is no Sugar enter 0" value="<?php echo $this->fooddata->sugar ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="sodiumValue">Sodium</label>
                      <input type="text" class="form-control" id="sodiumValue" placeholder="Enter Food Sodium" name="sodium" title="If there is no Sodium enter 0"  value="<?php echo $this->fooddata->sodium ?>" required>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="btnUpdate" class="btn btn-primary">Update Food</button>
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
