<?php
include 'cekmahasiswa.php';
include '../proses/koneksi.php';
?>
<html lang="en">
<head>
    <link rel="icon" type="img/png" href="../assets/images/icon.png">
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
                <a class="navbar-brand" href="mahasiswa.php">
                    <h1>Universitas Gunadarma</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#absen">Absensi</a></li>
		<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="updateprofile.php">Update Profil</a></li>
            <li><a onclick="return konfirmasi()" href="../logout.php">Logout</a></li>
        </ul>
        </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>Selamat Datang <?php echo $_SESSION['username'] ?>, <br> Di Absensi Gunadarma</h2>
			<h4>Silahkan Klik Di Bawah Ini!</h4>
		</div>
		<div class="page-scroll">
			<a href="#absen" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->

	<!-- Section: contact -->
    <section id="absen" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Form Absensi</h2>
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

        <?php
        $username = $_SESSION['username'];
        $query=mysqli_query($koneksi,"select * from input_mhs  where username='".$username."'");
        while($var=mysqli_fetch_array($query)){
            $nama_jrs=mysqli_fetch_array(mysqli_query($koneksi, "SELECT jurusan FROM jurusan WHERE kode_jurusan='$var[kode_jurusan]'"));
            $nama_kls=mysqli_fetch_array(mysqli_query($koneksi, "SELECT kelas FROM kelas WHERE kode_kelas='$var[kode_kelas]'"));
        ?>
  

    <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form" action="cekinput_absen.php" method="post" role="form" class="contactForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Dan Waktu Hari Ini</label>
                            <input class="form-control" type="text" name="waktu" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("l, d-m-Y / H:i");?>" readonly>
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
                            <input class="form-control" name="jurusan" placeholder="Jurusan" value="<?php echo $nama_jrs['jurusan']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input class="form-control" name="kelas" placeholder="Kelas" value="<?php echo $nama_kls['kelas']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <input class="form-control" name="semester" placeholder="Semester" value="<?php echo $var['semester']; ?>" readonly>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Pertemuan</label>
                            <select name="pertemuan" class="form-control">
                                <option value="" selected>-- Pilih Pertemuan --</option>
                                <option value="Pertemuan 1">Pertemuan 1</option>
                                <option value="Pertemuan 2">Pertemuan 2</option>
                                <option value="Pertemuan 3">Pertemuan 3</option>
                                <option value="Pertemuan 4">Pertemuan 4</option>
                                <option value="Pertemuan 5">Pertemuan 5</option>
                                <option value="Pertemuan 6">Pertemuan 6</option>
                                <option value="Pertemuan 7">Pertemuan 7</option>
                                <option value="Pertemuan 8">Pertemuan 8</option>
                                <option value="Pertemuan 9">Pertemuan 9</option>
                                <option value="Pertemuan 10">Pertemuan 10</option>
                                <option value="Pertemuan 11">Pertemuan 11</option>
                                <option value="Pertemuan 12">Pertemuan 12</option>
                                <option value="Pertemuan 13">Pertemuan 13</option>
                                <option value="Pertemuan 14">Pertemuan 14</option>

                                </select>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Nama Dosen</label>
                            <select id="dosen" name="nama_dosen" class="form-control">
                                <option value="" selected>-- Nama Dosen --</option>
                                <?php 
                                    include "../proses/koneksi.php";
                                    
                                    $query=mysqli_query($koneksi, "select * from input_dosen order by nama asc");
                                    
                                    while($row=mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php  echo $row['id_dosen']; ?>"><?php  echo $row['nama']; ?></option>
                                    <?php 
                                    }
                                    ?>                    
                                </select>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <label>Mata Kuliah</label>
                            <select id="matkul" name="matkul" class="form-control">
                                <option value="" selected>-- Mata Kuliah --</option>
                                                   
                                </select>
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
                        <button type="submit" class="btn btn-skin pull-right">Save</button>
                    </div>
                </div>
                </form>
                
            </div>
        </div>
    </div>	
<?php }; ?>

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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                $(function(){
                   $('#dosen').change(function(){
                        $('#matkul').after('<span class="loading">Tunggu..sedang load data matkul..</span>');
                        $('#matkul').load('carimatkul.php?id_dosen=' + $(this).val(),function(responseTxt,statusTxt,xhr)
                        {
                          if(statusTxt=="success")
                            $('.loading').remove();
                        
                        });
                        return false;
                   });

                });

                </script>
                
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
