<?php
$serverName = "FAUZI-PC\MSSQLSERVER,1433"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"apd_base");
$koneksi = sqlsrv_connect( $serverName, $connectionInfo);

$waktu=date("Y-m-d");

// if( $koneksi ) {
//      echo "Connection established.<br />";
// }else{
//      echo "Connection could not be established.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }
?>
