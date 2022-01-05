<?php
header("Expire: Mon, 26 July 2001 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:i:s"). "GMT");
header("Cache-Control: no-store, no-chace, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-chace");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-excel; name='ecxel'");
header("Content-disposition: attachment; filename=Rekap_Data_Mahasiswa.xls");
?>
<?php
include('../../proses/koneksi.php');
?>

<table border="1" style="border-style: solid">
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-large;">
			<td colspan="7">UNIVERSITAS GUNADARMA</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="7">Jl. Margonda Raya No.100, Pondok Cina <br> Beji, Kota Depok, Jawa Barat 16424</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="7">Telp: (021) 78881112</td>
			</tr>
			<tr></tr><tr></tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium;">
			<td colspan="7">Rekap Mahasiswa</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium">
				<th>No</th>
				<th>NPM</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Kelas</th>
				<th>Semester</th>
				<th>Email</th>
			</tr>
		<?php
		$kode_kelas = $_GET['kode_kelas'];
		$res = mysqli_query($koneksi, "SELECT * FROM input_mhs WHERE kode_kelas='$kode_kelas'");
		$no = 1;
		
		while ($row = mysqli_fetch_array($res)){
			$nama_jrs=mysqli_fetch_array(mysqli_query($koneksi, "SELECT jurusan FROM jurusan WHERE kode_jurusan='$row[kode_jurusan]'"));
			$nama_kls=mysqli_fetch_array(mysqli_query($koneksi, "SELECT kelas FROM kelas WHERE kode_kelas='$row[kode_kelas]'"));
		?>
		<tr align="left" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: small">
				<td><?php echo $no ?></td>
				<td><?php echo $row['npm'];?></td>
				<td><?php echo $row['nama'];?></td>
				<td><?php echo $nama_jrs['jurusan'];?></td>
				<td><?php echo $nama_kls['kelas'];?></td>
				<td><?php echo $row['semester'];?></td>
				<td><?php echo $row['email'];?></td>
		   </tr>
		   <?php
		   $no++;
		} 
		?>
	</table>
