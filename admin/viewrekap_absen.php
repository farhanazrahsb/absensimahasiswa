<?php
	include('../proses/koneksi.php');
	include('cekadmin.php');
?>
<html>
<head>
	<link rel="icon" type="img/png" href="../assets/images/icon.png">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/design.css">
	<link rel="stylesheet" type="text/css" href="../css/sidebar-collapse.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="assets/css/jquery.dataTables.css" rel="stylesheet" media="screen">
</head>

<body>
	<aside class="sidebar-left-collapse">

		<a class="company-logo"><img src="../assets/images/ug.png"></a>

		<div class="sidebar-links">

			<div class="link-blue selected">

				<a href="admin.php">
					<i class="fa fa-home"></i>Dashboard
				</a>
				</div>

			<div class="link-green">

				<a href="#">
					<i class="fa fa-address-card"></i>Input Data<i class="fa fa-sort-desc"></i>
				</a>

				<ul class="sub-links">
					<li><a href="input_mhs.php"><i class="fa fa-address-book"></i>  Input Mahasiswa</a></li>
					<li><a href="input_jurusan.php"><i class="fa fa-address-book"></i>  Input Jurusan</a></li>
					<li><a href="input_kelas.php"><i class="fa fa-address-book"></i>  Input Kelas</a></li>
					<li><a href="input_dosen.php"><i class="fa fa-address-book"></i>  Input Dosen</a></li>
					<li><a href="input_matkul.php"><i class="fa fa-address-book"></i>  Input Mata Kuliah</a></li>
					<li><a href="input_jadwal.php"><i class="fa fa-address-book"></i>  Input Jadwal</a></li>
					<li><a href="register.php"><i class="fa fa-address-book"></i>  Input Admin</a></li>
					
				</ul>

			</div>

			<div class="link-yellow">

				<a href="#">
					<i class="fa fa-archive"></i>Rekap Data<i class="fa fa-sort-desc"></i>
				</a>

				<ul class="sub-links">
					<li><a href="forgetpass.php"><i class="fa fa-book"></i> Rekap Lupa Password</a></li>
					<li><a href="view_absen.php"><i class="fa fa-book"></i> Rekap Absen</a></li>
					<li><a href="view_mhs.php"><i class="fa fa-book"></i> Rekap Mahasiswa</a></li>
					<li><a href="view_dosen.php"><i class="fa fa-book"></i> Rekap Dosen</a></li>
					<li><a href="view_regis.php"><i class="fa fa-book"></i> Rekap Admin</a></li>
					<li><a href="view_all.php"><i class="fa fa-book"></i> Rekap Jurusan, Matkul, Kelas</a></li>
					<li><a href="view_kritiksaran.php"><i class="fa fa-book"></i> Rekap Kritik & Saran</a></li>
				</ul>

			</div>

			<div class="link-red">

				<a onclick="return konfirmasi()" href="logout.php">
					<i class="fa fa-power-off"></i>Logout
				</a>
			</div>

		</div>

	</aside>
<div class="header">Universitas Gunadarma 
<li class="right">
Selamat Datang, <?php echo $_SESSION['username'] ?>
</li>

</div>
<div class="title">
	BERANDA ADMIN
</div>
	<div class="title-list">
	<i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-folder-open-o"></i> Rekap Absensi
	</div>

		<div class="panel-body">
		<div class="table-responsive">
		<a class="btn" onclick=self.history.back()> <span class="fa fa-arrow-left" title="Kembali"></span></a>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0">
				<thead>
				<tr><th colspan="15"><center>REKAP ABSENSI</center></th></tr>
				<tr>
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
				<th><center>Aksi</center></th>
				</tr>
				</thead>
				<tbody>
			<?php
			//proses jika sudah klik tombol pencarian data
			if(isset($_POST['pencarian'])){
			//menangkap nilai form
			$pertemuan=$_POST['pilihpertemuan'];
			$kelas=$_POST['namakelas'];
			$dosen=$_POST['namadosen'];
			$matkul=$_POST['namamatkul'];
			if(empty($pertemuan) || empty($dosen) || empty($kelas) || empty($matkul)){
			//jika data tanggal kosong
			?>
			<script language="JavaScript">
				alert('Pertemuan, Kelas, Dosen dan Matkul Harap di Isi!');
				document.location='view_absen.php';
			</script>
			<?php 
			}else{
			?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode <b><?php echo $_POST['pilihpertemuan']?></b> dari kelas <b><?php echo $_POST['namakelas']?></b></i>
			<?php
			$query=mysqli_query($koneksi, "select * from rekap_absen where pertemuan='$pertemuan' and kelas='$kelas' and id_dosen='$dosen' and kode_matkul='$matkul'");
			}
			?>
			<?php
			//menampilkan pencarian data
			$no=1;
            while($var=mysqli_fetch_array($query)){
            $nama_dsn=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama FROM input_dosen WHERE id_dosen='$var[id_dosen]'"));
            $nama_matkul=mysqli_fetch_array(mysqli_query($koneksi, "SELECT matkul FROM matkul WHERE kode_matkul='$var[kode_matkul]'"));
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $var['pertemuan'];?></td>
				<td><?php echo $var['npm'];?></td>
				<td><?php echo $var['nama'];?></td>
				<td><?php echo $var['jurusan'];?></td>
				<td><?php echo $var['kelas'];?></td>
				<td><?php echo $var['semester'];?></td>
				<td><?php echo $nama_dsn['nama'];?></td>
				<td><?php echo $nama_matkul['matkul'];?></td>
				<td><?php echo $var['ket_absen'];?></td>
				<td><?php echo $var['waktu'];?></td>
				<td><?php echo "<center><a class='fa fa-pencil-square-o' title='Edit' href='update_absen.php?no=".$var['no']."'></a> | <a class='fa fa-trash' title='Hapus' href='delete_absen.php?no=".$var['no']."'></a></center>"; ?></td>

			</tr>
			<?php
			$no++;
			}
			?>
			</tbody>
			 

		<?php
		}else{
			unset($_POST['pencarian']);
		}
		?>  
		
		</table>
		</div>
		</div>
	<!-- pagging jquery -->
	 <script src="assets/js/jquery.js"></script>
	 <script src="assets/js/jquery.dataTables.js"></script>

	<script>
	$(function () {

			var links = $('.sidebar-links > div');

			links.on('click', function () {

				links.removeClass('selected');
				$(this).addClass('selected');

			});
		});

	</script>

 <script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Untuk Keluar ?");
 if (tanya == true) return true;
 else return false;
 }</script>

 	 <script>
	 $(document).ready(function() {
     $('#example').DataTable();
	 } );
	 </script>

</body>
<?php
	include ('footer_admin.php');
?>
</html>
