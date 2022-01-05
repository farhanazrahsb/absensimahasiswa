<?php

require('fpdf181/fpdf.php');

require "../../proses/koneksi.php";

$pdf= new FPDF('l','mm','A4');
$pdf->AddPage();

$pdf->Image('../../assets/images/ugback.png',100,50,100);

$id_dosen = $_GET['id_dosen'];

//header

$pdf->Image('../../assets/images/ug.png',10,10,20);
$pdf->Image('../../assets/images/garis.png',5,-3,290);
$pdf->SetFont('Arial','B','14');
$pdf->Cell(20 ,5,' ',0,0);
$pdf->Cell(110,5,'UNIVERSITAS GUNADARMA',0,1);
$pdf->SetFont('Arial','','11');
$pdf->Cell(20 ,5,' ',0,0);
$pdf->Cell(110,5,'Jl. Margonda Raya No.100 Pondok Cina',0,0);
$pdf->Cell(59 ,5,' ',0,1);
$pdf->Cell(20 ,5,' ',0,0);
$pdf->Cell(90,5,'Beji, Kota Depok, Jawa Barat 16424',0,0);
$pdf->Cell(20 ,5,' ',0,0);
$pdf->Cell(34 ,5,'' ,0,1);


$pdf->Cell(20 ,5,' ',0,0);
$pdf->Cell(110,5,'Telepon: (021) 78881112',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
$pdf->Cell(189,10,'  ',0,1);

$pdf->Cell(100,5,'REKAP JADWAL',0,1);
$pdf->Cell(100,5,'ID Dosen :',0,1);
$pdf->Cell(-50,5,$id_dosen,0,1);
//pdf->Cell(189,10,'',1,1);
//$pdf->Cell(100,5,'Atas Nama :',1,1);

$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->SetFont('Arial','B','12');
$pdf->SetFillColor('12','29','253');
$pdf->Cell(10 ,5,'No',1,0,'C',1);
$pdf->Cell(25,5,'ID Dosen',1,0,'C',1);
$pdf->Cell(76  ,5,'Matkul',1,0,'C',1);
$pdf->Cell(18  ,5,'kelas',1,0,'C',1);
$pdf->Cell(20 ,5,'Hari',1,0,'C',1);
$pdf->Cell(46 ,5,'Sesi Awal',1,0,'C',1);
$pdf->Cell(20 ,5,'Sampai',1,0,'C',1);
$pdf->Cell(46 ,5,'Sesi Akhir',1,0,'C',1);
$pdf->Cell(20  ,5,'Ruang',1,1,'C',1);

$querykaas=mysqli_query($koneksi,"SELECT * FROM dosen_matkul WHERE id_dosen='$id_dosen'");
$no=1;
while ($var=mysqli_fetch_array($querykaas)) {
$nama_matkul=mysqli_fetch_array(mysqli_query($koneksi, "SELECT matkul FROM matkul WHERE kode_matkul='$var[kode_matkul]'"));
$nama_kls=mysqli_fetch_array(mysqli_query($koneksi, "SELECT kelas FROM kelas WHERE kode_kelas='$var[kode_kelas]'"));

$pdf->SetFont('Arial','','12');
$pdf->Cell(10 ,5,$no,1,0);
$pdf->Cell(25 ,5,$var['id_dosen'],1,0);
$pdf->Cell(76  ,5,$nama_matkul['matkul'],1,0);
$pdf->Cell(18  ,5,$nama_kls['kelas'],1,0);
$pdf->Cell(20  ,5,$var['hari'],1,0);
$pdf->Cell(46  ,5,$var['sesi_awal'],1,0);
$pdf->Cell(20  ,5,'Sampai',1,0);
$pdf->Cell(46  ,5,$var['sesi_akhir'],1,0);
$pdf->Cell(20  ,5,$var['ruang'],1,1);
$no++;
}



$pdf->SetFont('Arial','B','12');
$pdf->Cell(45 ,5,' ',0,0);
$pdf->Cell(55  ,5,' ',0,0);


$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(45 ,5,' ',0,0);
$pdf->Cell(55  ,5,' ',0,0);
$pdf->Cell(47  ,5,' ',0,0);
$pdf->Cell(39  ,5,'',0,1);



$pdf->Cell(189,8,'  ',0,1);
$pdf->Cell(189,8,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(189,10,'  ',0,1);
$pdf->Cell(45 ,5,' ',0,0);
$pdf->Cell(55  ,5,' ',0,0);
$pdf->Cell(52  ,5,' ',0,0);
$pdf->Output();

?>
