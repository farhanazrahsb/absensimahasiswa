<?php
include "../proses/koneksi.php";
$npm=$_POST['npm'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$kode_jurusan=$_POST['jurusan'];
$kode_kelas=$_POST['kelas'];
$semester=$_POST['semester'];
$email=$_POST['email'];

if (empty($npm)){
echo "<script>alert('Npm belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($nama)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($kode_jurusan)){
echo "<script>alert('Jurusan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($kode_kelas)){
echo "<script>alert('Kelas belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($semester)){
echo "<script>alert('Semester belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else if (empty($email)){
echo "<script>alert('Email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO input_mhs (npm,nama,username,password,kode_jurusan,kode_kelas,semester,email) VALUES ('$npm','$nama','$username','$password','$kode_jurusan','$kode_kelas','$semester','$email')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_mhs.php'>";
}
}

?>