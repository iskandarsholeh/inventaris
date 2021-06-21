<?php 
session_start();
include '../db/koneksi.php';

if (isset($_POST['pbarang'])) {
	$idpegawai=$_POST['peminjam'];
	$nama=$_POST['nambar'];
	$jumlahpinjam=$_POST['juml'];
	$tp=$_POST['tp'];
	$wp=$_POST['wp'];

$cekjml = mysql_query("SELECT jumlah FROM inventaris WHERE  id_inventaris= '$nama'");
$rcekjml= mysql_fetch_array($cekjml);
$jmlb=$rcekjml['jumlah'];
$sisabr=$jmlb-$jumlahpinjam;

   if($jmlb=='0') {
    echo "<script>alert('Stock Barang Habis :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=meminjam.php'>";
   } else if($sisabr < 0 ){
echo "<script>alert('Stock Barang Kurang !! :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=meminjam.php'>";

   } else { 
	$dt=mysql_query("select * from inventaris where id_inventaris='$nama'");
	$data=mysql_fetch_array($dt);
	$sisa=$data['jumlah']-$jumlahpinjam;
	mysql_query("update inventaris set jumlah='$sisa' where id_inventaris='$nama'");

	$query=mysql_query("INSERT INTO peminjaman(tanggal_pinjam,tanggal_kembali,waktu_pinjam,id_pegawai,status_peminjaman,waktu_kembali) VALUES('$tp','0000-00-00','$wp','$idpegawai','pinjam','00:00:00') ");

	if ($query) {
		$sql=mysql_query("SELECT * FROM peminjaman WHERE tanggal_pinjam='$tp' AND waktu_pinjam='$wp' AND id_pegawai='$idpegawai'");
		$row=mysql_fetch_array($sql);
		$idpinjam=$row['id_peminjaman'];

		$sql2=mysql_query("INSERT INTO detail_pinjam(id_inventaris,jumlah_pinjam,id_peminjaman) VALUES('$nama','$jumlahpinjam','$idpinjam')");

		if ($sql2) {
			echo "<script>alert('Data Sudah Masuk... :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=meminjam.php'>";
		}else{
			echo "<script>alert('Input Detail Pinjam Gagal... :)');</script>";
            echo "<meta http-equiv='refresh' content='0 url=meminjam.php'>";
		}
	   
	}else{
	   echo "<script>alert('Input Peminjaman Gagal... :)');</script>";
       echo "<meta http-equiv='refresh' content='0 url=meminjam.php>";
	}
}
}
?>