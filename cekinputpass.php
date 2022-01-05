<?php
include "proses/koneksi.php";
$email=$_POST['email'];
$type=$_POST['type_user'];

if (empty($email)){
echo "<script>alert('Email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=forget_pass.php'>";
}else if (empty($type)){
echo "<script>alert('Type User belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=forget_pass.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO forget_pass (email,type_user) VALUES ('$email','$type')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=forget_pass.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=forget_pass.php'>";
}
}

?>