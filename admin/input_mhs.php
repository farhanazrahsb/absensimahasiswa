<?php
	include('cekadmin.php');
	include('../proses/koneksi.php');
?>
<html>
<head>
	<link rel="icon" type="img/png" href="../assets/images/icon.png">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/design.css">
	<link rel="stylesheet" type="text/css" href="../css/sidebar-collapse.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
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
</div>
<div class="title">
	BERANDA ADMIN
</div>
	<div class="title-list">
	<i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-address-book"></i> Input Mahasiswa
	</div>

	<div class="content">
	<form action="cekinputmhs.php" method="POST">
     <div class="form-group">
     <div class="col-md-4">
     <h3>FORM INPUT MAHASISWA</h3><br>
  	 <label>NPM</label><br>
     <input class="form-control" name="npm" placeholder="NPM">
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
     <label>Jurusan</label>
     <select name="jurusan" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Jurusan --</option>
            <?php 
			include "../proses/koneksi.php";
			
			$query=mysqli_query($koneksi, "select * from jurusan order by jurusan asc");
			
			while($row=mysqli_fetch_array($query))
			{
			?>
			<option value="<?php  echo $row['kode_jurusan']; ?>"><?php  echo $row['jurusan']; ?></option>
			<?php 
			}
			?>               
     </select>
     <br>
     <label>Kelas</label>
     <select name="kelas" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Kelas --</option>
            <?php 
			include "../proses/koneksi.php";
			
			$query=mysqli_query($koneksi, "select * from kelas order by kelas asc");
			
			while($row=mysqli_fetch_array($query))
			{
			?>
			<option value="<?php  echo $row['kode_kelas']; ?>"><?php  echo $row['kelas']; ?></option>
			<?php 
			}
			?>               
     </select>
     <br>
     <label>Semester</label>
     <input class="form-control" name="semester" placeholder="Semester">
     <br>
     <label>Email</label>
     <input class="form-control" name="email" placeholder="Email">
     <br>
     <button class="btn btn-success btn-lg" type="submit" name="submit" onclick="return add()">Save</button>
     <button class="btn btn-primary btn-lg" type="reset" name="reset">Reset</button>
     </div>
     </div>
     </form>                                                                   
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

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

  <script type="text/javascript" language="JavaScript">
 function add()
 {
 tanya = confirm("Apakah Data Sudah Benar ?");
 if (tanya == true) return true;
 else return false;
 } </script>
</body>
<?php
	include ('footer_admin.php');
?>
</html>