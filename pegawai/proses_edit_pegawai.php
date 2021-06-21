
<?php
include "../db/koneksi.php";
	$id=$_GET['id'];
	$user=$_POST['username'];
	$nama=$_POST['nama_pegawai'];
	$pass=$_POST['pass'];
	$pass = md5($pass);
	$nip=$_POST['nip'];
	$alamat=$_POST['alamatp'];

$query = mysql_query("update pegawai set username='$user',
								   nama_pegawai='$nama',
								   password='$pass',
								   alamat='$alamat',
								   nip='$nip'
								   where id_pegawai='$id'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='pegawai.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='pegawai.php'</script>\n";
}

?>
