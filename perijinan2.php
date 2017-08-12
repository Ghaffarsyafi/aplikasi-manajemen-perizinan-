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
        Transaksi Perijinan
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
              <h3 class="box-title">Transaksi Perijinan</h3>
              <form action="perijinan.php" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Transaksi</label>

                  <div class="col-sm-10">
                    <input type="text" name="kode" class="form-control" id="inputEmail3" placeholder="Kode Transaksi" required="required" value="<?php echo generateKode('id', 'transaksi'); ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Masuk</label>
                    <div class="col-sm-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="tanggal_masuk" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>
                     <label class="col-sm-2 control-label">Tanggal Jadi</label>
                     <div class="col-sm-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="tanggal_jadi" class="form-control pull-right" id="datepicker" required="required">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <!-- /.form group -->

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama CV / PT</label>
                  <div class="col-sm-4">
                    <input type="text" name="nama_cv" class="form-control" id="inputEmail3" placeholder="Masukkan Nama CV / PT" required="required">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">NPWP CV / PT</label>
                  <div class="col-sm-4">
                    <input type="text" name="npwp_cv" class="form-control" id="inputEmail3" placeholder="Masukkan NPWP CV / PT" required="required">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Perizinan</label>

                  <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Masukkan Nama CV"> -->
                    <select class="form-control" name="jenis_perizinan">
                    <option>SBU</option>
                    <option>SKT</option>
                    <option>SKA</option>
                  </select>
                  </div>
                  
              <label for="status-bayar" class="col-sm-2 control-label">Status Pembayaran</label>
                  <div class="col-sm-10">
                    <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="bayar" checked>
                      Bayar
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="belum">
                      Belum
                    </label>
                  </div>
                  
                </div>
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran</label>

                  <div class="col-sm-10">
                    <input type="text" name="jumlah_pembayaran" class="form-control" id="inputEmail3" placeholder="Rp." required="required">
                  </div>
                </div>
                  
                <div class="box-footer">
                <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>

              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <div class="box box-success ">
            <div class="box-header">
              <h3 class="box-title">Data Pemohon Sertifikat</h3>
            </div>
            
            
             <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Jadi</th>
                  <th>Nama CV / PT</th>
                  <th>NPWP CV / PT</th>
                  <th>Jenis Perizinan</th>
                  <th>Status Pembayaran</th>
                  <th>Jumlah Pembayaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
               
                  <?php 
                    if ($_SESSION['level'] == '1') 
                    {
                      $transaksi ="SELECT * FROM transaksi";
                    } else

                    {
                      $transaksi ="SELECT * FROM transaksi where user_id=" . $_SESSION['user_id'];
                    }
                    

                    $open = mysqli_query($openServer, $transaksi);
                    while ($row = mysqli_fetch_array($open)) {
                    
                  ?> 

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['kode']; ?></td>
                  <td><?php echo $row['tanggal_masuk']; ?></td>
                  <td><?php echo $row['tanggal_jadi']; ?></td>
                  <td><?php echo $row['nama_cv']; ?></td>
                  <td><?php echo $row['npwp_cv']; ?></td>
                  <td><?php echo $row['jenis_perizinan']; ?></td>
                  <td><?php echo $row['status_pembayaran']; ?></td>
                  <td><?php echo "Rp. " . number_format($row['jumlah_pembayaran'], 0, ".", "."); ?></td>
                  <td class="td-actions text-right">
    
                    <!-- <button type="button" rel="tooltip" title="Print" class="btn btn-info btn-simple btn-xs">
                        <a href="print.php?print=<?php echo $row['id']; ?>"><i style="color: #fff" class="fa fa-print"></i></a>
                    </button> -->
                    <button type="button" rel="tooltip" title="Print" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#myModal">
                      <i style="color: #fff" class="fa fa-print"></i>
                    </button>
                    <!-- Modal Core -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <tr>
                                
                              </tr>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info btn-simple">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="button" rel="tooltip" title="Edit" class="btn btn-success btn-simple btn-xs">
                        <a href="editperijinan.php?edit=<?php echo $row['id']; ?>"><i style="color: #ffffff;" class="fa fa-edit"></i></a>
                    </button>

                    <button type="button" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs">
                      <a href="?hapus=<?php echo $row['id']; ?>"><i style="color: #fff" class="fa fa-times"></i></a>
                    </button>
                  </td>
                </tr>
          

                <?php 
                   }
                ?>
                 
              </table>
            </div>
          </div>
         
        </div>
        <!-- left column -->
       <?php 

       function generateKode($column=null, $tableName)
          {
            include('inc/koneksi.php');

            if ($column == null) {
              $qCust = "SELECT id FROM $tableName";
            } else {
              $qCust = "SELECT $column FROM $tableName";
            }
            
            
            $cst = mysqli_query($openServer, $qCust);

            $jml = mysqli_num_rows($cst);
            if ($jml> 0) {
              $jml++;
              return "TRS-00" . $jml;
            } else {
              return "TRS-001";
            }
            
          }

        if (isset($_GET['signout'])) {
          session_destroy();
          echo "<script> location.replace('login.php'); </script>";
        }

          if (isset($_POST['simpan'])) {
                 
            $kode_transaksi = $_POST['kode'];
            $tanggal_masuk = $_POST['tanggal_masuk'];
            $tanggal_jadi = $_POST['tanggal_jadi'];
            $nama_cv = $_POST['nama_cv'];
            $npwp_cv = $_POST['npwp_cv'];
            $jenis_perizinan = $_POST['jenis_perizinan'];
            $status_pembayaran = $_POST['optionsRadios'];
            $jumlah_pembayaran = $_POST['jumlah_pembayaran'];
            $user_id = $_SESSION['user_id'];

            $qInsert = "INSERT INTO transaksi(kode, tanggal_masuk, tanggal_jadi, nama_cv, npwp_cv, jenis_perizinan,  status_pembayaran, jumlah_pembayaran, user_id)VALUES('$kode_transaksi', '$tanggal_masuk', '$tanggal_jadi', '$nama_cv', '$npwp_cv', '$jenis_perizinan', '$status_pembayaran', '$jumlah_pembayaran', '$user_id')";

            $simpan = mysqli_query($openServer, $qInsert);

            echo "<script> location.replace('perijinan.php'); </script>";
      
          }

          if (isset($_GET['hapus'])) {
            
            $qdelete ="DELETE FROM transaksi WHERE id='$_GET[hapus]'";

            $delete = mysqli_query($openServer, $qdelete);
            
            echo "<script> location.replace('perijinan.php'); </script>";

          }
        ?>
        
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
