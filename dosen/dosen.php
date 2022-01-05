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

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>Selamat Datang <?php echo $_SESSION['username'] ?>,<br> Di Absensi Gunadarma</h2>
		</div>
    </section>
	<!-- /Section: intro -->

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
