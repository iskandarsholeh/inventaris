<?php
include "../db/koneksi.php";

$id	= $_GET['id'];


$query = mysql_query("delete from Pegawai where id_pegawai='$id'");
if ($query) {
echo "<script>alert('data berhasil dihapus');
document.location.href='pegawai.php'</script>\n";
} else {
echo "<script>alert('data gagal dihapus');
document.location.href='pegawai.php'</script>\n";
}
?>
