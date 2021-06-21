<?php
	include "../db/koneksi.php";

if(isset($_POST['submit'])){
	$nama_barang=$_POST['nama'];
	$kondisi=$_POST['kondisi'];
	$keterangan=$_POST['keterangan'];
	$jumlah=$_POST['jumlah'];
	$jenis=$_POST['jenis'];
	$tanggal=$_POST['tanggal'];
	$ruang=$_POST['ruang'];
	$kode=$_POST['kode'];
	
	$sql=mysql_query("insert into inventaris(nama,kondisi,keterangan,jumlah,id_jenis,tanggal_register,id_ruang,kode_inventaris,id_petugas) values('$nama_barang','$kondisi','$keterangan','$jumlah','$jenis','$tanggal','$ruang','$kode','1');");
		if($sql){
		  echo"<meta http-equiv='refresh' content='0 url=index.php'>";
		  echo"<script>alert('Data sudah masuk ke Database');</script>";
		}else{
		echo mysql_error();
	}
}
?>