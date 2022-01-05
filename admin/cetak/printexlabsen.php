<?php
header("Expire: Mon, 26 July 2001 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:i:s"). "GMT");
header("Cache-Control: no-store, no-chace, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-chace");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-excel; name='ecxel'");
header("Content-disposition: attachment; filename=Rekap_Data_Absen.xls");
?>
<?php
include('../../proses/koneksi.php');
?>

<table border="1" style="border-style: solid">
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-large;">
			<td colspan="11">UNIVERSITAS GUNADARMA</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="11">Jl. Margonda Raya No.100, Pondok Cina <br> Beji, Kota Depok, Jawa Barat 16424</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="11">Telp: (021) 78881112</td>
			</tr>
			<tr></tr><tr></tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium;">
			<td colspan="11">Rekap Absen</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium">
				<th>No</th>
				<th>Pertemuan</th>
				<th>NPM</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Kelas</th>
				<th>Semester</th>
				<th>Nama Dosen</th>
				<th>Mata Kuliah</th>
				<th>Keterangan Absen</th>
				<th>Waktu</th>
			</tr>
		<?php

		$res = mysqli_query($koneksi, "SELECT * FROM rekap_absen order by pertemuan asc");
		$no = 1;
		
		while ($row = mysqli_fetch_array($res)){
			$nama_dsn=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama FROM input_dosen WHERE id_dosen='$row[id_dosen]'"));
			$nama_matkul=mysqli_fetch_array(mysqli_query($koneksi, "SELECT matkul FROM matkul WHERE kode_matkul='$row[kode_matkul]'"));
		?>
		<tr align="left" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: small">
				<td><?php echo $no ?></td>
				<td><?php echo $row['pertemuan'];?></td>
				<td><?php echo $row['npm'];?></td>
				<td><?php echo $row['nama'];?></td>
				<td><?php echo $row['jurusan'];?></td>
				<td><?php echo $row['kelas'];?></td>
				<td><?php echo $row['semester'];?></td>
				<td><?php echo $nama_dsn['nama'];?></td>
				<td><?php echo $nama_matkul['matkul'];?></td>
				<td><?php echo $row['ket_absen'];?></td>
				<td><?php echo $row['waktu'];?></td>
		   </tr>
		   <?php
		   $no++;
		} 
		?>
	</table>
