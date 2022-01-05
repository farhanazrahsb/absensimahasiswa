<?php
include '../proses/koneksi.php';
// menyimpan data id kedalam variabel
$kode_kelas   = $_GET['kode_kelas'];
// query SQL untuk insert data
$query="DELETE from kelas where kode_kelas='$kode_kelas'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:view_kelas.php");
?>