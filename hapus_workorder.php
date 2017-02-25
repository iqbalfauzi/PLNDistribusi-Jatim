<?php 
include 'koneksi.php';

$idwo = $_GET['id'];
sqlsrv_query($koneksi,"delete from work_order where id_wo =$idwo");

header("location:index.php");

?>