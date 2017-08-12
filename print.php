<?php 
  include 'inc/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <?php
   if (isset($_GET['print'])) {
   		require('inc/pdf.php');
   		
   		ob_start();

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);

		$print ="SELECT * FROM transaksi where id='$_GET[print]'";
		$open = mysqli_query($openServer, $print);
		$jml =1;

		while ($row = mysqli_fetch_array($open)) {
	
		  $pdf->Cell(0,10,$row['nama_cv'] . $jml,0,1);
		  $jml++;
		}
		// for($i=1;$i<=10;$i++)
			

		$pdf->Output();
		ob_end_flush();
   	}	
 ?>

</body>
</html>