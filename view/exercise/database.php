      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             <?php echo $this->title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>myhome/index"><i class="fa fa-home"></i> myHome</a></li>
            <li><a href="<?php echo base_url() ?>myhome/index"><i ""></i> <?php echo $this->title; ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                <?php echo SessionHelper::flashMessage();  ?>
                  <h3 class="box-title">Cardio Exercise Database</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Exercise Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($this->cardiolist as $cl) {?>
                       <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cl->name; ?></td>
                        <td> <a href="<?php echo base_url() ?>exercise/add/<?php echo $fl->id?>" class="btn btn-default">Add Exercise</a></td>
                    <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SN</th>
                        <th>Exercise Name</th>
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
    <script src="<?php echo base_url()?>admin/public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>admin/public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
  </body>
</html>
