
<?php
include "../db/koneksi.php";
	$id=$_GET['id'];
	$nama=$_POST['nama'];
	$ko=$_POST['kode'];
	$keterangan=$_POST['keterangan'];
	

$query = mysql_query("update ruang set nama_ruang='$nama',
								   kode_ruang='$ko',
								   keterangan='$keterangan'
								   where id_ruang='$id'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='ruang.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='ruang.php'</script>\n";
}

?>
