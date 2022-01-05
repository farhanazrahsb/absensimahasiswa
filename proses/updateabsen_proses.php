<?php
include '../proses/koneksi.php';
// menyimpan data kedalam variabel
$no=$_POST['no'];
$npm=$_POST['npm'];
$nama=$_POST['nama'];
$jurusan=$_POST['jurusan'];
$kelas=$_POST['kelas'];
$semester=$_POST['semester'];
$pertemuan=$_POST['pertemuan'];
$nama_dosen=$_POST['nama_dosen'];
$matkul=$_POST['matkul'];
$ket_absen=$_POST['ket_absen'];
$waktu=$_POST['waktu'];
  $query= "UPDATE rekap_absen SET npm='$npm', nama='$nama', jurusan='$jurusan', kelas='$kelas', semester='$semester', pertemuan='$pertemuan', id_dosen='$nama_dosen', kode_matkul='$matkul', ket_absen='$ket_absen', waktu='$waktu' WHERE npm='$npm' AND waktu='$waktu'";
  $hasil= mysqli_query($koneksi, $query);

  if ($hasil) {
    header('location: ../admin/view_absenmahasiswa.php');
  }
?>