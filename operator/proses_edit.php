
<?php
include "../db/koneksi.php";
	$id=$_GET['id'];
	$nama=$_POST['nama'];
	$kondisi=$_POST['kondisi'];
	$keterangan=$_POST['keterangan'];
	$jumlah=$_POST['jumlah'];
	$jenis=$_POST['jenis'];
	$tanggal=$_POST['tanggal'];
	$ruang=$_POST['ruang'];
	$kode=$_POST['kode'];

$query = mysql_query("update inventaris set nama='$nama',
								   kondisi='$kondisi',
								   keterangan='$keterangan',
								   jumlah='$jumlah',
								   id_jenis='$jenis',
								   tanggal_register='$tanggal',
								   id_ruang='$ruang',
								   kode_inventaris='$kode',
								   id_petugas='1' 
								   where id_inventaris='$id'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='index.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='index.php'</script>\n";
}

?>
