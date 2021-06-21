
<?php
include "../db/koneksi.php";
	$id=$_GET['id'];
	$nama=$_POST['nama'];
	$ko=$_POST['kode'];
	$keterangan=$_POST['keterangan'];
	

$query = mysql_query("update jenis set nama_jenis='$nama',
								   kode_jenis='$ko',
								   keterangan='$keterangan'
								   where id_jenis='$id'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='jenis.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='jenis.php'</script>\n";
}

?>