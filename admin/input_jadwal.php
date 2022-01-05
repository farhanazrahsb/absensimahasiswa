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
</li>

</div>
<div class="title">
	BERANDA ADMIN
</div>
	<div class="title-list">
	<i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-address-book"></i> Input Jadwal
	</div>

	<div class="content">                    
     <form role="form" action="cekinputmatkuldosen.php" method="post">
     <div class="form-group">
     <div class="col-md-4">
     <h3>FORM INPUT JADWAL</h3><br>
     <label>Kelas</label><br>
     <select name="kode_kelas" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Pilih Kelas --</option>
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
     <br>
  	 <label>Nama Dosen</label><br>
     <select name="id_dosen" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Nama Dosen --</option>
            <?php 
			include "../proses/koneksi.php";
			
			$query=mysqli_query($koneksi, "select * from input_dosen order by nama asc");
			
			while($row=mysqli_fetch_array($query))
			{
			?>
			<option value="<?php  echo $row['id_dosen']; ?>"><?php  echo $row['nama']; ?></option>
			<?php 
			}
			?>               
     </select>
     <br>
     <br>
     <label>Mata Kuliah</label>
     <select name="kode_matkul" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Mata Kuliah --</option>
            <?php 
			include "../proses/koneksi.php";
			
			$query=mysqli_query($koneksi, "select * from matkul order by matkul asc");
			
			while($row=mysqli_fetch_array($query))
			{
			?>
			<option value="<?php  echo $row['kode_matkul']; ?>"><?php  echo $row['matkul']; ?></option>
			<?php 
			}
			?>               
     </select>
     <br>
     <br>
     <label>Hari</label>
     <select name="hari" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Hari --</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
     </select>
     <br>
     <br>
     <label>Sesi Awal</label>
     <select name="sesi_awal" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Sesi Awal --</option>
            <option value="Sesi 1, 07:30-08:30">Sesi 1, 07:30-08:30</option>
            <option value="Sesi 2, 08:30-09:30">Sesi 2, 08:30-09:30</option>
            <option value="Sesi 3, 09:30-10:30">Sesi 3, 09:30-10:30</option>
            <option value="Sesi 4, 10:30-11:30">Sesi 4, 10:30-11:30</option>
            <option value="Sesi 5, 11:30-12:30">Sesi 5, 11:30-12:30</option>
            <option value="Sesi 6, 12:30-13:30">Sesi 6, 12:30-13:30</option>
            <option value="Sesi 7, 13:30-14:30">Sesi 7, 13:30-14:30</option>
            <option value="Sesi 8, 14:30-15:30">Sesi 8, 14:30-15:30</option>
            <option value="Sesi 9, 15:30-16:30">Sesi 9, 15:30-16:30</option>
            <option value="Sesi 10, 16:30-17:30">Sesi 10, 16:30-17:30</option>
            <option value="Sesi 11, 17:30-18:30">Sesi 11, 17:30-18:30</option>
            <option value="Sesi 12, 18:30-19:30">Sesi 12, 18:30-19:30</option>
            <option value="Sesi 13, 19:30-20:30">Sesi 13, 19:30-20:30</option>
            <option value="Sesi 14, 20:30-21:30">Sesi 14, 20:30-21:30</option>
     </select>
     <br>
     <br>
     <label>Sesi Akhir</label>
     <select name="sesi_akhir" class="selectpicker form-control" data-live-search="true">
            <option value="" selected>-- Sesi Akhir --</option>
            <option value="Sesi 1, 07:30-08:30">Sesi 1, 07:30-08:30</option>
            <option value="Sesi 2, 08:30-09:30">Sesi 2, 08:30-09:30</option>
            <option value="Sesi 3, 09:30-10:30">Sesi 3, 09:30-10:30</option>
            <option value="Sesi 4, 10:30-11:30">Sesi 4, 10:30-11:30</option>
            <option value="Sesi 5, 11:30-12:30">Sesi 5, 11:30-12:30</option>
            <option value="Sesi 6, 12:30-13:30">Sesi 6, 12:30-13:30</option>
            <option value="Sesi 7, 13:30-14:30">Sesi 7, 13:30-14:30</option>
            <option value="Sesi 8, 14:30-15:30">Sesi 8, 14:30-15:30</option>
            <option value="Sesi 9, 15:30-16:30">Sesi 9, 15:30-16:30</option>
            <option value="Sesi 10, 16:30-17:30">Sesi 10, 16:30-17:30</option>
            <option value="Sesi 11, 17:30-18:30">Sesi 11, 17:30-18:30</option>
            <option value="Sesi 12, 18:30-19:30">Sesi 12, 18:30-19:30</option>
            <option value="Sesi 13, 19:30-20:30">Sesi 13, 19:30-20:30</option>
            <option value="Sesi 14, 20:30-21:30">Sesi 14, 20:30-21:30</option>
     </select>
     <br>
     <br>
     <label>Ruang</label>
     <input class="form-control" name="ruang" placeholder="Ruang Ex: D123">
     <br>
     <button class="btn btn-success btn-lg" type="submit">Save</button>
     <button class="btn btn-primary btn-lg" type="reset">Reset</button>
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
</body>
<?php
	include ('footer_admin.php');
?>
</html>