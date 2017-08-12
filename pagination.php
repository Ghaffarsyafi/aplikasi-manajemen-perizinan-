<?php
	include 'inc/koneksi.php';

	if (isset($_GET['halaman'])) {
		$page=$_GET['halaman'];
	} else {
		$page= 1;
	}
	

	
	$limit=10;

	if($page=='')
	{
	 $page=1;
	 $start=0;
	}
	else
	{
	 $start=$limit*($page-1);
	}

	$query=mysqli_query($openServer, "select * from transaksi limit $start, $limit") or die(mysqli_error());
	$tot=mysqli_query($openServer, "select * from transaksi") or die(mysqli_error());
	$total=mysqli_num_rows($tot);
	$num_page=ceil($total/$limit);

	echo'<table> <th>no</th> <th>kode</th> <th>tanggal masuk</th>';
	while($res=mysqli_fetch_array($query))
	{
	  echo "<tr>";
	    echo "<td>" . $res['id'] . "</td>";
	    echo "<td>" . $res['kode'] . "</td>";
	    echo "<td>" . $res['tanggal_masuk'] . "</td>";
	  echo "</tr>";
	}
	echo'</table>';

	function pagination($page,$num_page)
	{
	  echo'<ul style="list-style-type:none; ">';

	  for($i=1;$i<=$num_page;$i++)
	  {
	     if($i==$page)
			{
			 echo'<li style="float:left;padding:5px;">'.$i.'</li>';
			}
			else
			{
			 echo'<li style="float:left;padding:5px;"><a href="pagination.php?halaman='.$i.'">'.$i.'</a></li>';
			}
	  }
	  echo'</ul>';
	}
	
	if($num_page>1)
	{
	 pagination($page,$num_page);
	}
?> 