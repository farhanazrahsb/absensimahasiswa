<?php
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
	<i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-id-badge"></i> Input Admin
	</div>


	<?php
	include '../proses/koneksi.php';
	if ($koneksi->connect_error){
	echo 'Gagal koneksi ke database';
	} else {
	//koneksi berhsil
	}
	// membuat query max
	  $carikode = mysqli_query($koneksi, "select max(id_admin) from admin") or die (mysql_error());
	  // menjadikannya array
	  $datakode = mysqli_fetch_array($carikode);
	  // jika $datakode
	  if ($datakode) {
	   $nilaikode = substr($datakode[0], 3);
	   // menjadikan $nilaikode ( int )
	   $kode = (int) $nilaikode;
	   // setiap $kode di tambah 1
	   $kode = $kode + 1;
	   $kode_otomatis = "Adm".str_pad($kode, 2, "0", STR_PAD_LEFT);
	  } else {
	   $kode_otomatis = "Adm01";
	  }

	echo'
	
	<div class="content">
	<form role="form" action="cekinputregis.php" method="post">
     <div class="form-group">
     <div class="col-md-4">
     <h3>FORM INPUT ADMIN</h3><br>
     <label>ID Admin</label>
     <input class="form-control" name="id_admin" placeholder="ID Admin" value="'.$kode_otomatis.'" readonly>
     <br>
     <label>Nama</label>
     <input class="form-control" name="nama" placeholder="Nama">
     <br>
  	 <label>Username</label>
     <input class="form-control" name="username" placeholder="Username">
     <br>
     <label>Password</label>
     <input class="form-control" type="password" name="password" placeholder="Password">
     <br>
     <label>Email</label>
     <input class="form-control" name="email" placeholder="Email">
     <br>
     <button class="btn btn-success btn-lg" type="submit">Save</button>
     <button class="btn btn-primary btn-lg" type="reset">Reset</button>
     </div>
     </div>
     </form>                           
                                                 
	</div>';?>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
</body>
<?php
	include ('footer_admin.php');
?>
</html>