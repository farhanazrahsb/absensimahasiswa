<?php
include "../proses/koneksi.php";
$id_admin=$_POST['id_admin'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

if (empty($id_admin)){
echo "<script>alert('ID Admin belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else if (empty($nama)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else if (empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else if (empty($email)){
echo "<script>alert('Email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO admin (id_admin,nama,username,password,email) VALUES ('$id_admin','$nama','$username','$password','$email')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}
}

?>