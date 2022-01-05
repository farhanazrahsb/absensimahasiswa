<?php
include '../proses/koneksi.php';
// menyimpan data kedalam variabel
  $npm=$_POST['npm'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $semester=$_POST['semester'];
  $email=$_POST['email'];
  $query= "UPDATE input_mhs SET npm='$npm', nama='$nama', username='$username', password='$password', semester='$semester', email='$email' WHERE npm='$npm'";
  $hasil= mysqli_query($koneksi, $query);

  if ($hasil) {
    header('location: ../mahasiswa/updateprofile.php');
  }
?>