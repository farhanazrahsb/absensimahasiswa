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
	<i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-folder-open-o"></i> Tentukan Pertemuan, Kelas, Nama Dosen Dan Matkul
	</div>
	
	<div class="table-responsive">
	<center><a href="view_absenmahasiswa.php"><button class="btn btn-info btn-block" type="submit" title="Lihat Semua Absen Mahasiswa">Lihat Semua Data Absen Mahasiswa</button></a></center><br>
	<form action="viewrekap_absen.php" method="post" name="postform">
	<table class="table table-striped table-bordered table-hover">
				<tr>
					<td><select id="pilihpertemuan" name="pilihpertemuan" class="selectpicker form-control" data-live-search="true">
					<option value="" selected="selected">-- Pilih Pertemuan --</option>
					<?php 
					
					$query=mysqli_query($koneksi, "select distinct pertemuan from rekap_absen order by pertemuan asc");
					
					while($row=mysqli_fetch_array($query))
					{
						?><option value="<?php  echo $row['pertemuan']; ?>"><?php  echo $row['pertemuan']; ?></option>
					<?php 
					}
					?>
					</select>	
					</td>
					<td>
					<select id="kelas" name="namakelas" class="selectpicker form-control" data-live-search="true" data-size="11">
					<option value="" selected="selected">-- Pilih Kelas --</option>
					<?php 
					
					$query=mysqli_query($koneksi, "select * from kelas order by kelas asc");
					
					while($row=mysqli_fetch_array($query))
					{
						?><option value="<?php  echo $row['kode_kelas']; ?>"><?php  echo $row['kelas']; ?></option>
					<?php 
					}
					?>
					</select>	
				  	</td>
				  	<td>
					<select id="dosen" name="namadosen" class="form-control">
					<option value="" selected="selected">-- Pilih Dosen --</option>
					
					</select>	
				  	</td>
				  	<td>
					<select id="matkul" name="namamatkul" class="form-control">
					<option value="" selected="selected">-- Pilih Matkul --</option>
					
					</select>	
				  	</td>
				</tr>
				<tr>
					<td colspan="6"><input class="btn btn-info btn-lg" type="submit" value="Pencarian Data" name="pencarian"/>
					<input class="btn btn-warning btn-lg" type="reset" value="Reset" /></td>
				</tr>
			</table>
		</form>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                $(function(){
                   $('#kelas').change(function(){
                        
                        $('#dosen').load('cari_data.php?kode_kelas=' + $(this).val(),function(responseTxt,statusTxt,xhr)
                        {
                          if(statusTxt=="success")
                            $('.loading').remove();
                        
                        });
                        return false;
                   });

                });

                </script>
                <script type="text/javascript">
                $(function(){
                   $('#dosen').change(function(){
                        
                        $('#matkul').load('cari_data2.php?id_dosen=' + $(this).val(),function(responseTxt,statusTxt,xhr)
                        {
                          if(statusTxt=="success")
                            $('.loading').remove();
                        
                        });
                        return false;
                   });

                });

                </script>

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
