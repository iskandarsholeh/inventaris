
<?php
include "../db/koneksi.php";
	$id=$_GET['id'];
	$user=$_POST['username'];
	$nama=$_POST['nama_petugas'];
	$pass=$_POST['pass'];
	$pass = md5($pass);
	$user = md5($user);
$query = mysql_query("update petugas set username='$user',
								   nama_petugas='$nama',
								   password='$pass',
								   id_level='2'
								   where id_petugas='$id'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='petugas.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='petugas.php'</script>\n";
}

?>
s