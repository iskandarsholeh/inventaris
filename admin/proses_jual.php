<?php 
session_start();
include '../db/koneksi.php';

if (isset($_POST['pbarang'])) {
	$idpegawai=$_POST['peminjam'];
	$nama=$_POST['nambar'];
	$jumlahjual=$_POST['juml'];
	$tp=$_POST['tp'];
	$wp=$_POST['wp'];

$cekjml = mysql_query("SELECT jumlah FROM inventaris WHERE  id_inventaris= '$nama'");
$rcekjml= mysql_fetch_array($cekjml);
$jmlb=$rcekjml['jumlah'];
$sisabr=$jmlb-$jumlahjual;

   if($jmlb=='0') {
    echo "<script>alert('Stock Barang Habis :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=jual.php'>";
   } else if($sisabr < 0 ){
echo "<script>alert('Stock Barang Kurang !! :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=jual.php'>";

   } else { 
	$dt=mysql_query("select * from inventaris where id_inventaris='$nama'");
	$data=mysql_fetch_array($dt);
	$sisa=$data['jumlah']-$jumlahjual;
	mysql_query("update inventaris set jumlah='$sisa' where id_inventaris='$nama'");

	$query=mysql_query("INSERT INTO bout (tanggal_out,tanggal_ganti,waktu_out,id_pegawai,status_out,waktu_ganti) VALUES('$tp','0000-00-00','$wp','$idpegawai','terjual','00:00:00') ");

	if ($query) {
		$sql=mysql_query("SELECT * FROM bout WHERE tanggal_out='$tp' AND waktu_out='$wp' AND id_pegawai='$idpegawai'");
		$row=mysql_fetch_array($sql);
		$idout=$row['id_out'];

		$sql2=mysql_query("INSERT INTO detail_bout(id_inventaris,jumlah_out,id_out) VALUES('$nama','$jumlahjual','$idout')");

		if ($sql2) {
			echo "<script>alert('Data Sudah Masuk... :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=rusak.php'>";
		}else{
			echo "<script>alert('Input Detail Pinjam Gagal... :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=rusak.php'>";
		}
	   
	}else{
	   echo "<script>alert('Input Peminjaman Gagal... :)');</script>";
       echo "<meta http-equiv='refresh' content='0 url=rusak.php>";
	}
}
}
?>