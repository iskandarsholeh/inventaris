<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dulu');
  document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "operator"){
  echo"<script>alert('Anda Bukan Operator');
  document.location.href='index.php'</script>\n";
}
?>
<?php
include "header.php";
?> 

<?php
$id = $_GET['id'];
$query = mysql_query ("select * from jenis where id_jenis=$id");
$data= mysql_fetch_array($query);

?>
<html>
<head>
	<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Jenis</h3>
</head>
<body>
	<form method="post" action="proses_edit_jenis.php?id=<?php echo $_GET['id'];?>" >
		<table class="table">
			<tr>
				<td class="col-md-2">Nama jenis</td>
				<td><input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Nama" value="<?php echo $data['nama_jenis'];?>"></td>
			</tr>
			<tr>
				<td>Kode</td>
				<td><input type="text" name="kode" class="form-control" autocomplete="off" placeholder="Kode" value="<?php echo $data['kode_jenis'];?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input type="text" name="keterangan" class="form-control" autocomplete="off" placeholder="Keterangan" value="<?php echo $data['keterangan'];?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="simpan" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
<?php 
include "footer.php" ?>
</html>