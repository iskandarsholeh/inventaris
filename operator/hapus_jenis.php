<?php
include "../db/koneksi.php";

$id	= $_GET['id'];


$query = mysql_query("delete from jenis where id_jenis='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='jenis.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='jenis.php'</script>\n";
}
?>
