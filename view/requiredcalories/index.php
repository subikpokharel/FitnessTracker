      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Required Calories Management
            <small>Calories Tables</small>
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
                  <h3 class="box-title">Required Calories Reference Table</h3>
                  <br>
                  <a class="btn btn-success" href="<?php echo base_url() ?>requiredcalories/create"> New Required Calories Reference</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Exercise Level</th>
                        <th>Multiplier</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($this->requiredcalorieslist as $rcl) {?>
                       <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rcl->exercise_level; ?></td>
                        <td><?php echo $rcl->multiplier; ?></td>
                        <td><a href="<?php echo base_url() ?>requiredcalories/edit/<?php echo $rcl->id ?>" class="btn btn-success" > Edit </a>   
                        <a href="<?php echo base_url() ?>requiredcalories/delete/<?php echo $rcl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                    <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SN</th>
                        <th>Exercise Level</th>
                        <th>Multiplier</th>
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
