<?php
include "../proses/koneksi.php";
$kode_matkul=$_POST['kode_matkul'];
$matkul=$_POST['matkul'];

if (empty($kode_matkul)){
echo "<script>alert('Kode Matkul belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($matkul)){
echo "<script>alert('Matkul belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO matkul (kode_matkul,matkul) VALUES ('$kode_matkul','$matkul')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_matkul.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_matkul.php'>";
}
}

?>