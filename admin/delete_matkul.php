<?php
include '../proses/koneksi.php';
// menyimpan data id kedalam variabel
$kode_matkul   = $_GET['kode_matkul'];
// query SQL untuk insert data
$query="DELETE from matkul where kode_matkul='$kode_matkul'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:view_matkul.php");
?>