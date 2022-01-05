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
	<i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-book"></i> Rekap Kritik & Saran
	</div>
  
<div class="panel-body">
<div class="table-responsive">
 <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0">
				<thead>
				<tr><th colspan="15"><center>REKAP KRITIK & SARAN</center></th></tr>
				<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Message</th>
				<th><center>Aksi</center></th>
				</tr>
				</thead>

				
				<tbody>
				<?php
				include "../proses/koneksi.php";

				$query=mysqli_query($koneksi,"select * from contact");
				$no=1;
				while($var=mysqli_fetch_array($query)){
				?>

					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $var['nama'];?></td>
						<td><?php echo $var['email'];?></td>
						<td><?php echo $var['message'];?></td>
						<td><?php echo "<center><a class='fa fa-trash' title='Hapus' href='delete_kritik.php?no=".$var['no']."'></a></center>"; ?></td>

					</tr>
				<?php
				$no++;
				}
				?>
				</tbody>
				
 </table>
</div>
</div>

	 <!-- pagging jquery -->
	 <script src="assets/js/jquery.js"></script>
	 <script src="assets/js/jquery.dataTables.js"></script>

	 <!-- sidebar -->
	 <script>

		$(function () {

			var links = $('.sidebar-links > div');

			links.on('click', function () {

				links.removeClass('selected');
				$(this).addClass('selected');

			});
		});

	 </script>

	 <!-- logout -->
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

