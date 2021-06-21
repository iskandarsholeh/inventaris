<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dulu');
  document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "admin"){
  echo"<script>alert('Anda Bukan Admin');
  document.location.href='petugas.php'</script>\n";
}
?>
<?php
include "header.php";
?>
a
<?php
$id = $_GET['id'];
$query = mysql_query ("select * from petugas where id_petugas=$id");
$data= mysql_fetch_array($query);

?>
<html>
<head>
	<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Petugas</h3>
</head>
<body>
	<form method="post" action="proses_edit_petugas.php?id=<?php echo $_GET['id'];?>" >
		<table class="table">
			<tr>
				<td class="col-md-2">username</td>
				<td><input type="text" name="username" class="form-control" placeholder="Nama" value="<?php echo $data['username'];?>"></td>
			</tr>
			<tr>
				<td class="col-md-2">Nama Petugas</td>
				<td><input type="text" name="nama_petugas" class="form-control" placeholder="Nama" value="<?php echo $data['nama_petugas'];?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="pass" class="form-control" placeholder="Password"></td>
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