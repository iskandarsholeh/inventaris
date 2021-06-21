<?php
include "../db/koneksi.php";

$id	= $_GET['id'];
$jumlah=$_GET['jumlah'];
$jmb=$_GET['idinv'];

$query = mysql_query("delete from bout where id_out='$id'");
$q = mysql_query("UPDATE inventaris SET jumlah=(jumlah+$jumlah) WHERE id_inventaris='$jmb'")or die ("Gagal update".mysql_error());
if ($query && $q) {
echo "<script>alert('data dikembalikan silahkan input ulang');
document.location.href='jual.php'</script>\n";
} else {
echo "<script>alert('data gagal di edit');
document.location.href='index.php'</script>\n";
}
?>
