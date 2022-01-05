<?php
include "../proses/koneksi.php";
$kode_jurusan=$_POST['kode_jurusan'];
$kode_kelas=$_POST['kode_kelas'];
$kelas=$_POST['kelas'];

if (empty($kode_jurusan)){
echo "<script>alert('Kode Jurusan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($kode_kelas)){
echo "<script>alert('Kode Kelas belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($kelas)){
echo "<script>alert('Kelas belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO kelas (kode_jurusan,kode_kelas,kelas) VALUES ('$kode_jurusan','$kode_kelas','$kelas')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_kelas.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_kelas.php'>";
}
}

?>