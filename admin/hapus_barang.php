<?php
include "../db/koneksi.php";

$id	= $_GET['id'];


$query = mysql_query("delete from inventaris where id_inventaris='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='index.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='index.php'</script>\n";
}
?>
