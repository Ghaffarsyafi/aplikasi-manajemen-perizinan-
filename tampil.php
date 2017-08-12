<?php 
  include 'inc/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <table border="1">
  	<tr>
  		<td>No</td>
  		<td>Kode</td>
  		<td>Tanggal Masuk</td>
  		<td>Tanggal Jadi</td>
		<td>Nama CV / PT</td>
		<td>NPWP CV / PT</td>
		<td>Aksi</td>
  	</tr> 
  <?php 
    $transaksi ="SELECT * FROM transaksi";
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
        <td>
        	<a href="?edit=<?php echo $row['id']; ?>"> Edit</a>
        	<a href="?hapus=<?php echo $row['id']; ?>"> hapus</a>
        </td>
  	</tr>
  <?php 
     }
  ?>	
  </table>
  
  <?php 
    if (isset($_GET['edit'])) {
    	$transaksi ="SELECT * FROM transaksi where id='" . $_GET['edit'] . "'";

        $open = mysqli_query($openServer, $transaksi);
        while ($row = mysqli_fetch_array($open)) {
  ?>
	  <form method="post" action="tampil.php">
	  	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
	  	<label>Kode</label>
	  	<input readonly type="text" name="kode" value="<?php echo $row['kode']; ?>" >
	  	<br>

	  	<label>Tanggal Masuk</label>
	  	<input type="text" name="tanggal_masuk" value="<?php echo $row['tanggal_masuk']; ?>" >
	  	<br>

	  	<label>Tanggal Jadi</label>
	  	<input type="text" name="tanggal_jadi" value="<?php echo $row['tanggal_jadi']; ?>" >
	  	<br>

	  	<label>nama_cv</label>
	  	<input type="text" name="nama_cv" value="<?php echo $row['nama_cv']; ?>" >
	  	<br>

	  	<label>npwp_cv</label>
	  	<input type="text" name="npwp_cv" value="<?php echo $row['npwp_cv']; ?>" >
	  	<br>

	  	<input type="submit" name="simpan" value="Simpan">
	  </form>
  <?php 
  	  } 	
    }
    elseif (isset($_GET['hapus'])) {
    	$qhapus ="DELETE FROM transaksi WHERE id='$_GET[hapus]'";
    	$delete = mysqli_query($openServer, $qhapus);
    	header("location:tampil.php");	
    }
    elseif (isset($_POST['simpan'])) {    	
    	$id = $_POST['id'];       
        $kode_transaksi = $_POST['kode'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $tanggal_jadi = $_POST['tanggal_jadi'];
        $nama_cv = $_POST['nama_cv'];
        $npwp_cv = $_POST['npwp_cv'];
               

        $qUpdate ="UPDATE transaksi SET  kode='$kode_transaksi', tanggal_masuk='$tanggal_masuk', tanggal_jadi='$tanggal_jadi', nama_cv='$nama_cv', npwp_cv='npwp_cv' WHERE id = '$id'";

       
        $update = mysqli_query($openServer, $qUpdate);
        header("location:tampil.php");
    }
  ?>
</body>
</html>