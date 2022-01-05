<?php
include "../proses/koneksi.php";
$kode_kelas=$_POST['kode_kelas'];
$id_dosen=$_POST['id_dosen'];
$kode_matkul=$_POST['kode_matkul'];
$hari=$_POST['hari'];
$sesi_awal=$_POST['sesi_awal'];
$sesi_akhir=$_POST['sesi_akhir'];
$ruang=$_POST['ruang'];

if (empty($kode_kelas)){
echo "<script>alert('Kelas belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($id_dosen)){
echo "<script>alert('Nama Dosen belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($kode_matkul)){
echo "<script>alert('Kode Matkul belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($hari)){
echo "<script>alert('Hari belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($sesi_awal)){
echo "<script>alert('Sesi Awal belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($sesi_akhir)){
echo "<script>alert('Sesi Akhir belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($ruang)){
echo "<script>alert('Ruang belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO dosen_matkul (kode_kelas,id_dosen,kode_matkul,hari,sesi_awal,sesi_akhir,ruang) VALUES ('$kode_kelas','$id_dosen','$kode_matkul','$hari','$sesi_awal','$sesi_akhir','$ruang')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_jadwal.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_jadwal.php'>";
}
}

?>