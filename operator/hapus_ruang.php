<?php
include "../db/koneksi.php";

$id	= $_GET['id'];


$query = mysql_query("delete from ruang where id_ruang='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='ruang.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='ruang.php'</script>\n";
}
?>
