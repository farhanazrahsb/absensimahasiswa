<?php
include "../proses/koneksi.php";

   $option = '<option value="">-- Pilih Dosen --</option>';
   
   $kode_kelas = isset($_GET['kode_kelas']) ?  $_GET['kode_kelas'] :'';
   $sql ="select distinct id_dosen from dosen_matkul where kode_kelas='".$kode_kelas."'";
   if($res = $koneksi->query($sql)) {
      while ($row = $res->fetch_assoc()) {
        $nama_dosen=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama FROM input_dosen WHERE id_dosen='$row[id_dosen]'"));
        $option .= "<option value='".$row['id_dosen']."'>".$nama_dosen['nama']."</option>";
      }
   }
   echo $option;
?>