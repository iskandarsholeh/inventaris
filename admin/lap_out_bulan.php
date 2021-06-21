<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dulu');
  document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "admin"){
  echo"<script>alert('Anda Bukan Admin');
  document.location.href='petugas.php'</script>\n";
}

$bulan=$_GET['Bulan'];
$tahun=$_GET['Tahun'];
?>
<?php
include '../db/koneksi.php';
require('../pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/unnamed.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'INVENTARIS SARANA dan PRASARANA',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 082228300495',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. HALIM KUSUMA',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.youtube.com/c/Nyamarsta email : iskandar.sholeh22@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang yang di Pinjam",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggl Out', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Waktu Out', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Karyawan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'jumlah', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("SELECT * FROM view_jual WHERE MONTH(tanggal_out)=$bulan AND YEAR(tanggal_out)=$tahun");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal_out'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['waktu_out'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nama_pegawai'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah_out'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_pinjam.pdf","I");

?>

