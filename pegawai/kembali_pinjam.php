<?php
include "../db/koneksi.php";

$jumlah=$_GET['jumlah'];
$jmb=$_GET['idinv'];

$tgl = date('Y-m-d');

$query = mysql_query("UPDATE peminjaman SET tanggal_kembali= '$tgl' , status_peminjaman = 'kembali' where id_peminjaman='$_GET[id]'")or die ("Gagal update".mysql_error());
$q = mysql_query("UPDATE inventaris SET jumlah=(jumlah+$jumlah) WHERE id_inventaris='$jmb'")or die ("Gagal update".mysql_error());
if ($query && $q) {
echo "<script>alert('Barang Sudah Dikembalikan');
document.location.href='peminjaman.php'</script>\n";
} else {
echo "<script>alert('gagal');
document.location.href='peminjaman.php'</script>\n";
}
?>