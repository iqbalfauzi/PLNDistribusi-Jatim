<?php
session_start();
include 'koneksi.php';
$usern = $_POST['username'];
$passm = $_POST['password'];


// query untuk mendapatkan record dari username
$hasil = sqlsrv_query($koneksi, "SELECT * FROM [dbo].[user] WHERE username = '$usern' and password='$passm'");

$data = sqlsrv_fetch_array($hasil);
// cek kesesuaian password
if ($usern == $data['username'] && $passm==$data['password'])
{
    // menyimpan username dan level ke dalam session
	$_SESSION['id_user'] = $data['id_user'];  
	header('location:index.php');
}
else
{
	echo "<script>
	alert (' Maaf Login Gagal, Silahkan Isi Username dan Password Anda Dengan Benar');
	eval(\"parent.location='login.php'\");
</script>";
}

?>