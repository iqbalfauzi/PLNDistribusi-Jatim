<?php
require_once 'koneksi.php';

    $namagi =$_POST["garduinduk"];
    $q=sqlsrv_query($koneksi,"INSERT INTO [apd_base].[dbo].[gi]
           ([nama_gi])
     VALUES
           ('$namagi')"); 

if ($q){
?>
  <script language="javascript">
  alert("Gardu Induk berhasil di tambahkan");
  history.back();
  </script>
  <?php } else
  {
   echo"Data Gagal Disimpan";
  }
?>