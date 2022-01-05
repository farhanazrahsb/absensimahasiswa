<?php
include 'cekadmin.php';
include '../proses/koneksi.php';
if(isset($_GET['no'])){
    $no   = $_GET['no'];
    $query  = mysqli_query($koneksi,'select * from rekap_absen where no= "'.$no.'"');
    $var   = mysqli_fetch_array($query);
    $pertemuan=$var['pertemuan'];
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
  $pertemuan = '';
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
<html>
<head>
  <link rel="icon" type="img/png" href="../assets/images/icon.png">
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="../css/design.css">
  <link rel="stylesheet" type="text/css" href="../css/sidebar-collapse.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
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
  <i class="fa fa-home"></i> <a href="admin.php">Dashboard</a> / <i class="fa fa-address-book"></i> Edit Data Absen
  </div>
<div class="content">
<h2>Edit Data Absen</h2>
  <form action="../proses/updateabsen_proses.php" method="POST">
     <div class="form-group">
     <div class="col-md-4">
     <label>Waktu</label><br>
     <input class="form-control" name="waktu" placeholder="Waktu" value="<?php echo $var['waktu']; ?>" readonly>
     <br>
     <label>NPM</label><br>
     <input class="form-control" name="npm" placeholder="NPM" value="<?php echo $var['npm']; ?>" readonly>
     <br>
     <label>Nama</label>
     <input class="form-control" name="nama" placeholder="Nama" value="<?php echo $var['nama']; ?>">
     <br>
     <label>Jurusan</label>
     <input class="form-control" name="jurusan" placeholder="Jurusan" value="<?php echo $var['jurusan']; ?>">
     <br>
     <label>Kelas</label>
     <input class="form-control" name="kelas" placeholder="Kelas" value="<?php echo $var['kelas']; ?>">
     <br>
     <label>Semester</label>
     <input class="form-control" name="semester" placeholder="Semester" value="<?php echo $var['semester']; ?>">
     <br>
     <label>Pertemuan</label>
     <input class="form-control" name="pertemuan" placeholder="Pertemuan" value="<?php echo $var['pertemuan']; ?>">
     <br>
     <label>ID Dosen</label>
     <input class="form-control" name="nama_dosen" placeholder="Nama Dosen" value="<?php echo $var['id_dosen']; ?>">
     <br>
     <label>Kode Mata Kuliah</label>
     <input class="form-control" name="matkul" placeholder="Mata Kuliah" value="<?php echo $var['kode_matkul']; ?>">
     <br>
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
     <br>
     <br>
     <button class="btn btn-success btn-lg" type="submit" name="update" onclick="return add()">UPDATE</button>
     </div>
     </div>
     </form>                                                                        
  </div>
</body>
<?php
  include ('footer_admin.php');
?>
</html>