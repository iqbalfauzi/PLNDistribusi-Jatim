<?php
include 'koneksi.php';
$idgardu = $_GET['idgardu'];

if ($idgardu == 1) {
	# code...?>
	<option value="6">Tidak ada</option>"
	<?php 
} else {
	$kota1 = sqlsrv_query($koneksi,"SELECT * FROM [apd_base].[dbo].[View_1] WHERE Expr1=$idgardu");
	echo "<option>Pilih Penyulang</option>";
	while($kor = sqlsrv_fetch_array($kota1)){
		echo "<option value=\"".$kor['id_pen']."\">".$kor['nama_pen']."</option>\n";
	}
}

?>
