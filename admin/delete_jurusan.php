<?php
include '../proses/koneksi.php';
// menyimpan data id kedalam variabel
$kode_jurusan   = $_GET['kode_jurusan'];
// query SQL untuk insert data
$query="DELETE from jurusan where kode_jurusan='$kode_jurusan'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:view_all.php");
?>