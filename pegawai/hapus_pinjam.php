<?php
include "../db/koneksi.php";

$id	= $_GET['id'];


$query = mysql_query("delete from peminjaman where id_peminjaman='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='peminjaman.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='peminjaman.php'</script>\n";
}
?>