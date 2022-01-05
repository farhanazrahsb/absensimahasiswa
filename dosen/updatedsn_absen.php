<?php
include('../proses/koneksi.php');
include('cekdosen.php');
if(isset($_GET['no'])){
    $no   = $_GET['no'];
    $query  = mysqli_query($koneksi,'select * from rekap_absen where no= "'.$no.'"');
    $var   = mysqli_fetch_array($query);
    $npm=$var['npm'];
    $nama=$var['nama'];
    $jurusan=$var['jurusan'];
    $kelas=$var['kelas'];
    $semester=$var['semester'];
    $nama_dosen=$var['id_dosen'];
    $matkul=$var['kode_matkul'];
    $ket_absen=$var['ket_absen'];
    $waktu=$var['waktu'];
    }
  else{
  $npm = '';
  $nama = '';
  $jurusan = '';
  $kelas = '';
  $semester = '';
  $nama_dosen = '';
  $matkul = '';
  $ket_absen = '';
  $waktu = '';
  }
    ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absensi Gunadarma</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="../css/style3.css" rel="stylesheet">
	<link href="../css/default.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="dosen.php">Home</a></li>
        <li><a href="validasi_absen.php">Validasi Absensi</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="updateprofile.php">Update Profil</a></li>
            <li><a onclick="return konfirmasi()" href="logout.php">Logout</a></li>
        </ul>
        </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: contact -->
    <section id="absen" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Validasi Absensi</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>

        <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form" action="../proses/updatevalidasiabsen_proses.php" method="post" role="form" class="contactForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Waktu</label>
                            <input class="form-control" name="waktu" placeholder="Waktu" value="<?php echo $var['waktu']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>NPM</label>
                            <input class="form-control" name="npm" placeholder="NPM" value="<?php echo $var['npm']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="form-group">
                                <input class="form-control" name="nama" placeholder="Nama" value="<?php echo $var['nama']; ?>" readonly>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input class="form-control" name="jurusan" placeholder="Jurusan" value="<?php echo $var['jurusan']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input class="form-control" name="kelas" placeholder="Kelas" value="<?php echo $var['kelas']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <input class="form-control" name="semester" placeholder="Semester" value="<?php echo $var['semester']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Pertemuan</label>
                            <input class="form-control" name="pertemuan" placeholder="Pertemuan" value="<?php echo $var['pertemuan']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>ID Dosen</label>
                            <input class="form-control" name="nama_dosen" placeholder="Nama Dosen" value="<?php echo $var['id_dosen']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input class="form-control" name="matkul" placeholder="Mata Kuliah" value="<?php echo $var['kode_matkul']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                            <label>Keterangan Absen</label><br>
                            <label class="radio-inline">
                            <input type="radio" name="ket_absen" value="Hadir" checked> Hadir
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="ket_absen" value="Absen"> Absen
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="ket_absen" value="Sakit"> Sakit
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="ket_absen" value="Izin"> Izin
                            </label>
                            <div class="validation"></div>
                            
                    <div class="col-md-12">
                        <button type="submit" name="update" class="btn btn-skin pull-right">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>  
</div>
</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					
					<p>Universitas Gunadarma &copy; All Right Reserved - <?php echo date("Y")?></p>
                   
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>	
	<script src="../js/jquery.scrollTo.js"></script>
	<script src="../js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
    <script type="text/javascript" language="JavaScript">
     function konfirmasi()
     {
     tanya = confirm("Anda Yakin Untuk Keluar ?");
     if (tanya == true) return true;
     else return false;
     }
     </script>
</body>

</html>
