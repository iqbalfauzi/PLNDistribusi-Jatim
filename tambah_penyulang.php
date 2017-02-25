<?php
require_once 'koneksi.php';

    $idgardu =$_POST["idgardu"];
    $namapen =$_POST['namapenyulang'];
    $q=sqlsrv_query($koneksi,"INSERT INTO [apd_base].[dbo].[pen]
           ([id_gi]
           ,[nama_pen])
     VALUES
           ($idgardu
           ,'$namapen')"); 

if ($q){
?>
  <script language="javascript">
  alert("Penyulang berhasil di tambahkan");
  history.back();
  </script>
  <?php } else
  {
   echo"Data Gagal Disimpan";
  }
?>