<?php
include "../db/koneksi.php";

$jumlah=$_GET['jumlah'];
$jmb=$_GET['idinv'];

$tgl = date('Y-m-d');
$wtk = date('H:i:s');

$query = mysql_query("UPDATE bout SET tanggal_ganti= '$tgl' , status_out = 'terganti', waktu_ganti= '$wtk' where id_out='$_GET[id]'")or die ("Gagal update".mysql_error());
$q = mysql_query("UPDATE inventaris SET jumlah=(jumlah+$jumlah) WHERE id_inventaris='$jmb'")or die ("Gagal update".mysql_error());
if ($query && $q) {
echo "<script>alert('Barang Sudah Diganti');
document.location.href='laporan_rusak.php'</script>\n";
} else {
echo "<script>alert('gagal');
document.location.href='laporan_rusak.php'</script>\n";
}
?>
