<?php
include '../proses/koneksi.php';
// menyimpan data kedalam variabel
$npm=$_POST['npm'];
$ket_absen=$_POST['ket_absen'];
$waktu=$_POST['waktu'];
  $query= "UPDATE rekap_absen SET ket_absen='$ket_absen' WHERE npm='$npm' AND waktu='$waktu'";
  $hasil= mysqli_query($koneksi, $query);

  if ($hasil) {
    header('location: ../dosen/validasi_absen.php');
  }
?>