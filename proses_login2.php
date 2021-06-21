<?php
include "db/koneksi.php";
$username = md5($_POST['username']);
$password = md5($_POST['password']);

session_start();

$login = mysql_query("select a.username,password,nama_petugas,b.id_level,nama_level FROM petugas
		 a,level b WHERE a.id_level=b.id_level AND a.username='$username' AND a.password='$password'");
$data = mysql_fetch_array($login);
if (mysql_num_rows($login) > 0){
$_SESSION['username'] = $data['username'];
$_SESSION['nama'] = $data['nama_level'];
$status=$data['id_level'];
$_SESSION['nama_petugas'] = $data['nama_petugas'];
echo $status;
if ($status == "1")
{
	$_SESSION['nama_petugas'];
	$_SESSION['nama'];
header('location:admin/index.php'); 
}
else if ($status == "2")
{
	$_SESSION['nama_petugas'];
	$_SESSION['nama'];
header('location:operator/petugas.php'); 
}



}else{

$login = mysql_query("select * from pegawai where username='$username' and nip='$password'");
$data1 = mysql_fetch_array($login);
if (mysql_num_rows($login) > 0){
 $_SESSION['username'] = $data1['username'];
 $_SESSION['id_pegawai'] = $data1['id_pegawai'];
 $_SESSION['nama'] = 'pegawai';
 header("location:pegawai/meminjam.php");
 }else{
echo "<script>alert('Username atau Password salah')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}
}
?>