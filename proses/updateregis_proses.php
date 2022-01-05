<?php
include '../proses/koneksi.php';
// menyimpan data kedalam variabel
  $id_admin=$_POST['id_admin'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $query= "UPDATE admin SET id_admin='$id_admin', nama='$nama', username='$username', password='$password', email='$email' WHERE id_admin='$id_admin'";
  $hasil= mysqli_query($koneksi, $query);

  if ($hasil) {
    header('location: ../admin/view_regis.php');
  }
?>