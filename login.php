<?php 
  include 'inc/koneksi.php';
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASKOPINDO | aplikasi perjinan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ASKOPINDO</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body success">
    <p class="login-box-msg">Silahkan Masukkan Username & Password anda</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="user" name="username" class="form-control" placeholder="Username" required="required">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
       
        <div class="col-xs-4" class="align-right">
          <input type="submit" name="login" class="btn btn-primary btn-block btn flat" value="login">
        </div>
        
        <div class="col-xs-4 pull-right">
          <input type="reset" name="reset" class="btn btn-primary btn-block btn flat pull-right" value="reset">
        </div>

        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
  
  <?php 
    if (isset($_POST['login'])) {
      
      $username = $_POST['username'];
      $password = md5($_POST['password']);

      $qlogin = "SELECT * FROM tlogin WHERE username ='$username' AND password ='$password'";
      $login = mysqli_query($openServer, $qlogin);

      $jml = mysqli_num_rows($login);
      
      if ($jml > 0) {
        while ($row = mysqli_fetch_array($login)) {
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['level'] = $row['level'];
        }        
        header("location:statistik.php");
      }
      else{
        // header("location:login.php");
        echo "<script>alert('Username /  Password salah bungg')</script>";

      }
    }
  ?>

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
