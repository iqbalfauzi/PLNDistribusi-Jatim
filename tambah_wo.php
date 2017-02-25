<?php
require_once 'koneksi.php';
    
    $type = $_POST["idtype"];
    $id_gi = $_POST["idgardu"];
    $id_pen = $_POST["idpen"];
    $id_bag = $_POST["id_bag"];
    $tgl_gangguan = $_POST["tanggal_gangguan"];
    $ket = $_POST["keterangan"];
    $id_user = $_POST["id_user"];
    $status = $_POST["status"];
    $tanggal_selesai="Belum";

    $q=sqlsrv_query($koneksi,"INSERT INTO [apd_base].[dbo].[work_order]
           ([id_gi],[id_pen],[id_bag],[id_user],[status],[tanggal_gangguan],[keterangan],[tanggal_selesai],[type_wo])
     VALUES
           ('$id_gi','$id_pen','$id_bag','$id_user','$status','$tgl_gangguan','$ket','$tanggal_selesai','$type')"); 

if ($q){
?>
  <script language="javascript">
  alert("Work Order Berhasil Ditambahkan");
  history.back();
  </script>
  <?php } else
  {
   echo"Data Work Order Gagal Disimpan";
  }
?>