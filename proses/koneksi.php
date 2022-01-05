<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "absensiswa";
 
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$query = mysqli_select_db($koneksi, $db_name);
 
if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>