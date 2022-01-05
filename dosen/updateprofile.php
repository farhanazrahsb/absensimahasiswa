<?php
include('../proses/koneksi.php');
include('cekdosen.php');
if(isset($_GET['no'])){
    $no   = $_GET['no'];
    $query  = mysqli_query($koneksi,'select * from input_dosen where no= "'.$no.'"');
    $var   = mysqli_fetch_array($query);
    $id_dosen=$var['id_dosen'];
    $nama=$var['nama'];
    $username=$var['username'];
    $password=$var['password'];
    $email=$var['email'];
    }
  else{
  $id_dosen = '';
  $nama = '';
  $username = '';
  $password = '';
  $email = '';
  }
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
                    <h2>Update Your Profile</h2>
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
        $query=mysqli_query($koneksi,"select * from input_dosen  where username='".$username."'");
        while($var=mysqli_fetch_array($query)){
        ?>

    <div class="row">
    <div class="col-lg-8">
    <div class="boxed-grey">
    <form action="../proses/updatedosenprofile_proses.php" method="POST">
     <div class="form-group">
     <div class="col-md-4">
     <label>ID Dosen</label><br>
     <input class="form-control" name="id_dosen" placeholder="ID Dosen" value="<?php echo $var['id_dosen']; ?>" readonly>
     <br>
     <label>Nama</label>
     <input class="form-control" name="nama" placeholder="Nama" value="<?php echo $var['nama']; ?>">
     <br>
     <label>Username</label>
     <input class="form-control" name="username" placeholder="Username" value="<?php echo $var['username']; ?>">
     <br>
     <label>Password</label>
     <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $var['password']; ?>">
     <br>
     <label>Email</label>
     <input class="form-control" name="email" placeholder="Email" value="<?php echo $var['email']; ?>">
     <br>
     <button class="btn btn-success btn-lg" type="submit" name="update" onclick="return add()">UPDATE</button>
     </div>
     </div>
     </form>
     </div>
     </div>                                                                        
    <div>
        </div>
        </div>
        <?php }; ?>
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
