
<?php
include "../db/koneksi.php";
	$id=$_GET['id'];
	$user=$_POST['username'];
	$nama=$_POST['nama_pegawai'];
	$pass=$_POST['pass'];
	$pass = md5($pass);
	$alamat=$_POST['alamatp'];
	$user = md5($user);
$query = mysql_query("update pegawai set username='$user',
								   nama_pegawai='$nama',
								   alamat='$alamat',
								   nip='$pass'
								   where id_pegawai='$id'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='pegawai.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='pegawai.php'</script>\n";
}

?>
s