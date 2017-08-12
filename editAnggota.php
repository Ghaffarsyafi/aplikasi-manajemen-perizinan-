<?php 
   include('inc/koneksi.php');

   session_start();
     $mysesi = $_SESSION['user_id'];

    if (is_null($mysesi)) {
      header("location:login.php");
    }
?>
  <?php 
    include 'header.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Anggota
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- ini untuk form transaksi perijinan -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Anggota</h3>
                
              <?php 
                if (isset($_GET['edit'])) {
                  $idAnggota = $_GET['edit'];
                  $qanggota ="SELECT * FROM anggota WHERE id='$idAnggota'";

                  $openAnggota = mysqli_query($openServer, $qanggota);

                  while ($row = mysqli_fetch_array($openAnggota)) {
                
              ?>

              <form action="editAnggota.php" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Anggota</label>

                  <div class="col-sm-10">
                    <input type="text" name="kode_anggota" class="form-control" id="inputEmail3" value="<?php echo $row['kode_anggota']; ?>" readonly>
                  </div>
                </div>

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Direktur</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama_direktur" class="form-control" id="inputEmail3" value="<?php echo $row['nama_direktur']; ?>">
                      </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama CV / PT</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama_cv" class="form-control" id="inputEmail3" value="<?php echo $row['nama_cv']; ?>" >
                    </div>
                </div>
               
                 <div class="form-group">
                  
                    <label for="inputEmail3" class="col-sm-2 control-label">BPC Askopindo</label>
                    <div class="col-sm-4">
                      <input type="text" name="bpc_askopindo" class="form-control" id="inputEmail3" value="<?php echo $row['bpc_askopindo']; ?>">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                      <input type="text" name="alamat" class="form-control" id="inputEmail3" value="<?php echo $row['alamat']; ?>" >
                    </div>
                  </div>

                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No telpon</label>
                    <div class="col-sm-4">
                      <input type="text" name="no_telpon" class="form-control" id="inputEmail3" value="<?php echo $row['no_telpon']; ?>" >
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-4">
                      <input type="text" name="email" class="form-control" id="inputEmail3" value="<?php echo $row['email']; ?>" >
                    </div>
                  </div>
                  
                <div class="box-footer">
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                </div>

              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>

      
        <!-- left column -->
        <?php 
          }
            }

          if (isset($_POST['edit'])) {
            
            $kode_anggota = $_POST['kode_anggota'];
            $nama_direktur = $_POST['nama_direktur'];
            $nama_cv = $_POST['nama_cv'];
            $bpc_askopindo = $_POST['bpc_askopindo'];
            $alamat = $_POST['alamat'];
            $no_telpon = $_POST['no_telpon'];
            $email = $_POST['email'];

            $qUpdate ="UPDATE anggota SET kode_anggota='$kode_anggota', nama_direktur='$nama_direktur', nama_cv='$nama_cv', bpc_askopindo='$bpc_askopindo', alamat='$alamat', no_telpon='$no_telpon', email='$email'";

            $update = mysqli_query($openServer, $qUpdate);

            echo "<script> location.replace('anggota.php'); </script>";
          }

          if (isset($_GET['signout'])) {
            session_destroy();
            echo "<script> location.replace('login.php'); </script>";
          }

        ?>

       
       
        <!-- right column -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0,1
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Ghaffar al farrez</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

   
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
  $(document).ready(function(){
    $("#example2").datatable();
  });
</script>
</body>
</html>