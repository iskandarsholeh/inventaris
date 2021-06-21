<?php
include "../db/koneksi.php";

$id	= $_GET['id'];


$query = mysql_query("delete from Petugas where id_petugas='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='petugas.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='petugas.php'</script>\n";
}
?>