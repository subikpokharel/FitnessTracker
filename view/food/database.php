      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Food Database
            <small>Food Table</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Food tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                <?php echo SessionHelper::flashMessage();  ?>
                  <h3 class="box-title">Food Database</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Food Name</th>
                        <th>Measurement Unit</th>
                        <th>Calories</th>
                        <th>Fat</th>
                        <th>Carbs</th>
                        <th>Protein</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($this->foodlist as $fl) {?>
                       <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $fl->name; ?></td>
                        <td><?php echo $fl->measurement_unit; ?></td>
                        <td><?php echo $fl->calories; ?></td>
                        <td><?php echo $fl->fat; ?></td>
                        <td><?php echo $fl->carbs; ?></td>
                        <td><?php echo $fl->protein; ?></td>
                        <td> <a href="<?php echo base_url() ?>food/delete/<?php echo $fl->id?>" class="btn btn-default">Add Food</a></td></td>
                    <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SN</th>
                        <th>Food Name</th>
                        <th>Measurement Unit</th>
                        <th>Calories</th>
                        <th>Fat</th>
                        <th>Carbs</th>
                        <th>Protein</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
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
  </body>
</html>
