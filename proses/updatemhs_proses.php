<?php
include '../proses/koneksi.php';
// menyimpan data kedalam variabel
  $npm=$_POST['npm'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $kode_jurusan=$_POST['kode_jurusan'];
  $kode_kelas=$_POST['kode_kelas'];
  $semester=$_POST['semester'];
  $email=$_POST['email'];
  $query= "UPDATE input_mhs SET npm='$npm', nama='$nama', username='$username', password='$password', kode_jurusan='$kode_jurusan', kode_kelas='$kode_kelas', semester='$semester', email='$email' WHERE npm='$npm'";
  $hasil= mysqli_query($koneksi, $query);

  if ($hasil) {
    header('location: ../admin/view_mahasiswa.php');
  }
?>