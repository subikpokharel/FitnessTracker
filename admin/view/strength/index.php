      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Exercise Management
            <small>Strength exercise</small>
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

              <div class="box">
                <div class="box-header">
                <?php echo SessionHelper::flashMessage();  ?>
                  <h3 class="box-title">Strength Exercise Table</h3>
                  <br>
                  <a class="btn btn-success" href="<?php echo base_url() ?>strength/create"> New Strength Exercise</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Muscle Group</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($this->strengthlist as $cl) {?>
                       <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cl->name; ?></td>
                        <td><?php echo $cl->musclegroup; ?></td>
                        <td><a href="<?php echo base_url() ?>strength/edit/<?php echo $cl->id ?>" class="btn btn-success" > Edit </a>   
                        <a href="<?php echo base_url() ?>strength/delete/<?php echo $cl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>
                    <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Muscle Group</th>
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
