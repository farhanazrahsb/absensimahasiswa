<?php
include "proses/koneksi.php";
$nama=$_POST['nama'];
$email=$_POST['email'];
$message=$_POST['message'];

if (empty($nama)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else if (empty($email)){
echo "<script>alert('Email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else if (empty($message)){
echo "<script>alert('Message belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO contact (nama,email,message) VALUES ('$nama','$email','$message')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}
}

?>