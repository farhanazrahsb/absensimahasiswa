<?php
include "../proses/koneksi.php";
$id_dosen=$_POST['id_dosen'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

if (empty($id_dosen)){
echo "<script>alert('ID Dosen belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($nama)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else if (empty($email)){
echo "<script>alert('Email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO input_dosen (id_dosen,nama,username,password,email) VALUES ('$id_dosen','$nama','$username','$password','$email')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=input_dosen.php'>";
}
}

?>