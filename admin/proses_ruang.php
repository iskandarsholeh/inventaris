<?php
	include "../db/koneksi.php";

if(isset($_POST['submit'])){
	$nama_ruang=$_POST['nama'];
	$kode=$_POST['kode'];
	$keterangan=$_POST['keterangan'];
 $cekuser = mysql_query("SELECT * FROM ruang WHERE kode_ruang = '$kode'");
   if(mysql_num_rows($cekuser) > 0) {
     echo "<div align='center'>Ruangan Sudah Terdaftar! <a href='ruang.php'>Back</a></div>";
   } else {

	$sql=mysql_query("insert into ruang(nama_ruang,kode_ruang,keterangan) values('$nama_ruang','$kode','$keterangan')");
		if($sql){
		  echo"<meta http-equiv='refresh' content='0 url=ruang.php'>";
		  echo"<script>alert('Data sudah masuk ke Database');</script>";
		}else{
		echo mysql_error();
	}
}
}
?>
