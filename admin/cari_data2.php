<?php
include "../proses/koneksi.php";

   $option = '<option value="">-- Pilih Matkul --</option>';
   
   $id_dosen = isset($_GET['id_dosen']) ?  $_GET['id_dosen'] :'';
   $sql ="select distinct kode_matkul from dosen_matkul where id_dosen='".$id_dosen."'";
   if($res = $koneksi->query($sql)) {
      while ($row = $res->fetch_assoc()) {
        $nama_matkul=mysqli_fetch_array(mysqli_query($koneksi, "SELECT matkul FROM matkul WHERE kode_matkul='$row[kode_matkul]'"));
	     $option .= "<option value='".$row['kode_matkul']."'>".$nama_matkul['matkul']."</option>";
      }
   }
   echo $option;
?>