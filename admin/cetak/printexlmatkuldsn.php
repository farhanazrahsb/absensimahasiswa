<?php
header("Expire: Mon, 26 July 2001 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:i:s"). "GMT");
header("Cache-Control: no-store, no-chace, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-chace");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-excel; name='ecxel'");
header("Content-disposition: attachment; filename=Rekap_Data_Jadwal.xls");
?>
<?php
include('../../proses/koneksi.php');
?>

<table border="1" style="border-style: solid">
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-large;">
			<td colspan="9">UNIVERSITAS GUNADARMA</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="9">Jl. Margonda Raya No.100, Pondok Cina <br> Beji, Kota Depok, Jawa Barat 16424</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="9">Telp: (021) 78881112</td>
			</tr>
			<tr></tr><tr></tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium;">
			<td colspan="9">Rekap Mata Kuliah Dosen</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium">
				<th>No</th>
				<th>Nama Dosen</th>
				<th>Mata Kuliah</th>
				<th>Kelas</th>
				<th>Hari</th>
				<th>Sesi Awal</th>
				<th>Sampai</th>
				<th>Sesi Akhir</th>
				<th>Ruang</th>
			</tr>
		<?php
		$id_dosen = $_GET['id_dosen'];
		$res = mysqli_query($koneksi, "SELECT * FROM dosen_matkul WHERE id_dosen='$id_dosen'");
		$no = 1;
		
		while ($row = mysqli_fetch_array($res)){
		$nama_dsn=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama FROM input_dosen WHERE id_dosen='$row[id_dosen]'"));
		$nama_matkul=mysqli_fetch_array(mysqli_query($koneksi, "SELECT matkul FROM matkul WHERE kode_matkul='$row[kode_matkul]'"));
		$nama_kls=mysqli_fetch_array(mysqli_query($koneksi, "SELECT kelas FROM kelas WHERE kode_kelas='$row[kode_kelas]'"));
		?>
		<tr align="left" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: small">
				<td><?php echo $no ?></td>
				<td><?php echo $nama_dsn['nama'];?></td>
				<td><?php echo $nama_matkul['matkul'];?></td>
				<td><?php echo $nama_kls['kelas'];?></td>
				<td><?php echo $row['hari'];?></td>
				<td><?php echo $row['sesi_awal'];?></td>
				<td><?php echo 'sampai';?></td>
				<td><?php echo $row['sesi_akhir'];?></td>
				<td><?php echo $row['ruang'];?></td>
		   </tr>
		   <?php
		   $no++;
		} 
		?>
	</table>
