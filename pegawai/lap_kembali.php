<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dahulu');
	document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "admin"){
	echo"<script>alert('Anda Bukan Admin');
	document.location.href='meminjam.php'</script>\n";
}
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
$pdf->Cell(25.5,0.7,"Laporan Data Barang yang sudah di kembalikan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggl Pinjam', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Waktu Pinjam', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Kembali', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Ruangan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Peminjam', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'jumlah', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from detail_pinjam,peminjaman,inventaris,pegawai,ruang,jenis
where peminjaman.id_pegawai = pegawai.id_pegawai and
detail_pinjam.id_inventaris = inventaris.id_inventaris and peminjaman.status_peminjaman= 'kembali' and 
detail_pinjam.id_peminjaman = peminjaman.id_peminjaman and ruang.id_ruang = inventaris.id_ruang 
and jenis.id_jenis = inventaris.id_jenis
order by id_detail_pinjam");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal_pinjam'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['waktu_pinjam'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal_kembali'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['nama_ruang'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['nama_jenis'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['nama_pegawai'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah_pinjam'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_kembali.pdf","I");

?>

