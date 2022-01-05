<?php
header("Expire: Mon, 26 July 2001 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:i:s"). "GMT");
header("Cache-Control: no-store, no-chace, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-chace");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-excel; name='ecxel'");
header("Content-disposition: attachment; filename=Rekap_Data_Dosen.xls");
?>
<?php
include('../../proses/koneksi.php');
?>

<table border="1" style="border-style: solid">
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-large;">
			<td colspan="4">UNIVERSITAS GUNADARMA</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="4">Jl. Margonda Raya No.100, Pondok Cina <br> Beji, Kota Depok, Jawa Barat 16424</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-small;">
			<td colspan="4">Telp: (021) 78881112</td>
			</tr>
			<tr></tr><tr></tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium;">
			<td colspan="4">Rekap Dosen</td>
			</tr>
			<tr align="center" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: medium">
				<th>No</th>
				<th>ID Dosen</th>
				<th>Nama</th>
				<th>Email</th>
			</tr>
		<?php
		$res = mysqli_query($koneksi, "SELECT * FROM input_dosen order by nama asc");
		$no = 1;
		
		while ($row = mysqli_fetch_array($res)){
		?>
		<tr align="left" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: small">
				<td><?php echo $no ?></td>
				<td><?php echo $row['id_dosen']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['email']; ?></td>
		   </tr>
		   <?php
		   $no++;
		} 
		?>
	</table>
