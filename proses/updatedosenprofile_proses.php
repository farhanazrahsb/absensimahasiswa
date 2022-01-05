<?php
include '../proses/koneksi.php';
// menyimpan data kedalam variabel
  $id_dosen=$_POST['id_dosen'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $query= "UPDATE input_dosen SET id_dosen='$id_dosen', nama='$nama', username='$username', password='$password', email='$email' WHERE id_dosen='$id_dosen'";
  $hasil= mysqli_query($koneksi, $query);

  if ($hasil) {
    header('location: ../dosen/updateprofile.php');
  }
?>