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

        <div class="table-responsive">
        <h4>Tentukan Pertemuan, Kelas, Nama Dosen Dan Matkul</h4><br>
        <form action="rekapabsen_dosen.php" method="post" name="postform">
        <table class="table table-bordered">
                <tr>
                    <td align="center"><select name="pilihpertemuan" class="form-control selectpicker" data-live-search="true">
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
                    <td align="center">
                    <select id="kelas" name="namakelas" class="form-control">
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
                    <td align="center">
                    <select id="dosen" name="namadosen" class="form-control">
                    <option value="" selected="selected">-- Pilih Dosen --</option>
                    
                    </select>   
                    </td>
                    <td align="center">
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
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                $(function(){
                   $('#kelas').change(function(){
                        
                        $('#dosen').load('../admin/cari_data.php?kode_kelas=' + $(this).val(),function(responseTxt,statusTxt,xhr)
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
                        
                        $('#matkul').load('../admin/cari_data2.php?id_dosen=' + $(this).val(),function(responseTxt,statusTxt,xhr)
                        {
                          if(statusTxt=="success")
                            $('.loading').remove();
                        
                        });
                        return false;
                   });

                });

                </script>

            <div>
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
