<?php
include "../proses/koneksi.php";
$npm=$_POST['npm'];
$nama=$_POST['nama'];
$jurusan=$_POST['jurusan'];
$kelas=$_POST['kelas'];
$semester=$_POST['semester'];
$pertemuan=$_POST['pertemuan'];
$id_dosen=$_POST['nama_dosen'];
$kode_matkul=$_POST['matkul'];
$ket_absen=$_POST['ket_absen'];
$waktu=$_POST['waktu'];

if (empty($npm)){
echo "<script>alert('Npm belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($nama)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($jurusan)){
echo "<script>alert('Jurusan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($kelas)){
echo "<script>alert('Kelas belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($semester)){
echo "<script>alert('Semester belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($pertemuan)){
echo "<script>alert('Pertemuan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($id_dosen)){
echo "<script>alert('Nama Dosen belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($kode_matkul)){
echo "<script>alert('Mata Kuliah belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($ket_absen)){
echo "<script>alert('Keterangan Absen belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else if (empty($waktu)){
echo "<script>alert('Waktu belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else{
	$query = mysqli_query($koneksi, "INSERT INTO rekap_absen (pertemuan, npm,nama,jurusan,kelas,semester,id_dosen,kode_matkul,ket_absen,waktu) VALUES ('$pertemuan','$npm','$nama','$jurusan','$kelas','$semester','$id_dosen','$kode_matkul','$ket_absen','$waktu')");
if ($query){
echo "<script>alert('Berhasil Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}else{
echo "<script>alert('Gagal Menginput')</script>";
echo "<meta http-equiv='refresh' content='1 url=mahasiswa.php'>";
}
}

?>