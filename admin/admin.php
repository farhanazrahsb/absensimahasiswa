<?php
include('cekadmin.php');
?>

<html>
<head>
    <link rel="icon" type="img/png" href="../assets/images/icon.png">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/design.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link rel="stylesheet" type="text/css" href="../css/sidebar-collapse.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
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
            <div class="link-yellow">

                <a href="rekapkehadiran.php">
                    <i class="fa fa-archive"></i>Rekap Kehadiran
                </a>
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
    <i class="fa fa-home"></i> Dashboard
    </div>

    <div class="content">
        <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Lupa Password</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="forgetpass.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Absen</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_absen.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Mahasiswa</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_mhs.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Dosen</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_dosen.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                <div class="col-lg-5 col-md-6">
                        <div class="panel panel-brown">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Admin</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_regis.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-purple">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Jurusan, Matkul Dan Kelas</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_all.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="panel panel-cyan">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h4>Rekap Kritik Dan Saran</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_kritiksaran.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
</div>

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