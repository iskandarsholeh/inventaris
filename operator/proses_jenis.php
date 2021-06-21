<?php
	include "../db/koneksi.php";

if(isset($_POST['submit'])){
	$nama_jenis=$_POST['nama'];
	$kode=$_POST['kode'];
	$keterangan=$_POST['keterangan'];

	//insert into inventaris values('','','','','','','','','')

	

	$sql=mysql_query("insert into jenis(nama_jenis,kode_jenis,keterangan) values('$nama_jenis','$kode','$keterangan')");
		if($sql){
		  echo"<meta http-equiv='refresh' content='0 url=jenis.php'>";
		  echo"<script>alert('Data sudah masuk ke Database');</script>";
		}else{
		echo mysql_error();
	}
}
?>