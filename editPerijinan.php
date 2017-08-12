<?php 
  include 'inc/koneksi.php';
 
   session_start();
     $mysesi = $_SESSION['user_id'];

    if (is_null($mysesi)) {
    header("location:login.php");
      // echo "isi dari sesi adalah: " . $mysesi;
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
        Edit Perijinan
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
              <h3 class="box-title">Edit Perijinan</h3>
             <?php 
               if (isset($_GET['edit'])) {
                 $idPerijinan = $_GET['edit'];
                 $qPerijinan = "SELECT * FROM transaksi WHERE id= '$idPerijinan'";

                 $openPerijinan = mysqli_query($openServer, $qPerijinan);
               
                 while ($row = mysqli_fetch_array($openPerijinan)) {
             ?>     

              <form action="editperijinan.php" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Transaksi</label>

                  <div class="col-sm-10">
                    <input readonly type="text" name="kode" class="form-control" id="inputEmail3" value="<?php echo $row['kode']; ?>" >
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Masuk</label>
                    <div class="col-sm-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="tanggal_masuk" class="form-control pull-right" id="datepicker" value="<?php echo $row['tanggal_masuk']; ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                     <label class="col-sm-2 control-label">Tanggal Jadi</label>
                     <div class="col-sm-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="tanggal_jadi" class="form-control pull-right" id="datepicker" value="<?php echo $row['tanggal_jadi']; ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <!-- /.form group -->

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama CV / PT</label>
                  <div class="col-sm-4">
                    <input type="text" name="nama_cv" class="form-control" id="inputEmail3" value="<?php echo $row['nama_cv']; ?>" >
                  </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">NPWP CV / PT</label>
                  <div class="col-sm-4">
                    <input type="text" name="npwp_cv" class="form-control" id="inputEmail3" value="<?php echo $row['npwp_cv']; ?>" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Perizinan</label>

                  <div class="col-sm-10">
                   <?php $jp= $row['jenis_perizinan']; ?>
                    <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Masukkan Nama CV"> -->
                    <select class="form-control" name="jenis_perizinan">
                      <option <?php if ($jp == "SBU") echo "selected";?> >SBU</option>
                      <option <?php if ($jp == "SKT") echo "selected";?> >SKT</option>
                      <option <?php if ($jp == "SKA") echo "selected";?> >SKA</option>
                  </select>
                  </div>
                  
              <label for="status-bayar" class="col-sm-2 control-label">Status Pembayaran</label>
                  <div class="col-sm-10">
                    <!-- radio -->
                <div class="form-group">
                <?php $sp = $row['status_pembayaran'];  ?>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="bayar" <?php if ($sp == "bayar") echo "checked"; ?> >
                      Bayar
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="belum" <?php if ($sp == "belum") echo "checked"; ?> >
                      Belum
                    </label>
                  </div>
                  
                </div>
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran</label>

                  <div class="col-sm-10">

                    <input  type="text" name="jumlah_pembayaran" class="form-control" id="inputEmail3" value="<?php echo $row['jumlah_pembayaran']; ?>">

                  </div>
                </div>
                  
                <div class="box-footer">
                <input type="submit" name="edit" class="btn btn-primary" value="Edit">
                </div>

              </div>
              <!-- /.box-body -->
              </form>
          <?php 
              }
            } 
            if (isset($_POST['edit'])) {

               $id = $_POST['id'];       
               $kode_transaksi = $_POST['kode'];
               $tanggal_masuk = $_POST['tanggal_masuk'];
               $tanggal_jadi = $_POST['tanggal_jadi'];
               $nama_cv = $_POST['nama_cv'];
               $npwp_cv = $_POST['npwp_cv'];
               $jenis_perizinan = $_POST['jenis_perizinan'];
               $status_pembayaran = $_POST['optionsRadios'];
               $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

               $qUpdate ="UPDATE transaksi SET id='$id', kode='$kode_transaksi', tanggal_masuk='$tanggal_masuk', tanggal_jadi='$tanggal_jadi', nama_cv='$nama_cv', npwp_cv='npwp_cv', jenis_perizinan='$jenis_perizinan', status_pembayaran='$status_pembayaran', jumlah_pembayaran='$jumlah_pembayaran' WHERE id = '$id'";

               $update = mysqli_query($openServer, $qUpdate);
               echo "<script> location.replace('perijinan.php'); </script>";
             }   

              if (isset($_GET['signout'])) {
                 session_destroy();
                 echo "<script> location.replace('login.php'); </script>";
              }
          ?>   
            </div>
          </div>
        </div>

        <!--/.col (right) -->
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
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
</body>
</html>
