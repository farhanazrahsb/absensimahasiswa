<?php
include('../proses/koneksi.php');
include('cekdosen.php');
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
                <a class="navbar-brand" href="dosen.php">
                    <h1>Universitas Gunadarma</h1>
                </a>
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
					<h2>Cek Validasi Absensi</h2>
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

        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0">
                <tr><th colspan="15"><center>REKAP ABSENSI</center></th></tr>
                <tr>
                <th>No</th>
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
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode <b><?php echo $_POST['pilihpertemuan']?></b> dan kelas <b><?php echo $_POST['namakelas']?></b></i>
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
                <td><?php echo "<center><a class='fa fa-pencil-square-o' title='Edit' href='updatedsn_absen.php?no=".$var['no']."'></a></center>"; ?></td>

            </tr>
            <?php
            $no++;
            }
            ?>
            <tr>
                <td colspan="15" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysqli_num_rows($query)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr>     
        </table>
        <?php
        }else{
            unset($_POST['pencarian']);
        }
        ?>
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
