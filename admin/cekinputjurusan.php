<?php
include "../proses/koneksi.php";
$kode_jurusan=$_POST['kode_jurusan'];
$jurusan=$_POST['jurusan'];

if (empty($kode_jurusan)){
echo "<script>alert('Kode Jurusan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($jurusan)){
echo "<script>alert('Jurusan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO jurusan (kode_jurusan,jurusan) VALUES ('$kode_jurusan','$jurusan')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_jurusan.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_jurusan.php'>";
}
}

?>