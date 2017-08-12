<?php include 'inc/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php 

    $limit = 10;
    if (isset($_GET['p'])) {
    	$page = $_GET['p'];
    	$start=$limit*($page-1);
    } else {
    	$page = 1;
    	$start=0;
    }

    $query=mysqli_query($openServer, "select * from transaksi limit $start, $limit") or die(mysqli_error());
    $tot=mysqli_query($openServer, "select * from transaksi") or die(mysqli_error());
	$total=mysqli_num_rows($tot);
	$num_page=ceil($total/$limit);
  ?>
    <table border="1">
      <tr>
      	<td>no</td>
        <td>kode</td>
        <td>tanggal masuk</td>
      </tr>
  <?php 
    while($res=mysqli_fetch_array($query)) {
  ?>
  	  <tr>
  	  	<td> <?php echo  $res['id']; ?></td>
  	  	<td> <?php echo  $res['kode']; ?></td>
  	  	<td> <?php echo  $res['tanggal_masuk']; ?></td>
  	  </tr> 
  <?php 
    }
  ?>	     
    </table>
  
  <?php 
    function pagination($page,$num_page)
	{
	  echo'<ul style="list-style-type:none;">';

	  for($i=1;$i<=$num_page;$i++)
	  {
	     if($i==$page)
			{
			 echo'<li style="float:left;padding:5px;">'.$i.'</li>';
			}
			else
			{
			 echo'<li style="float:left;padding:5px;"><a href="halaman.php?p='.$i.'">'.$i.'</a></li>';
			}
	  }
	  echo'</ul>';
	}
	
	if($num_page>1)
	{
	 pagination($page,$num_page);
	}
  ?>
</body>
</html>