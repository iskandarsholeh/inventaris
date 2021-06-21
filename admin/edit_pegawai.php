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
 
<?php
$id = $_GET['id'];
$query = mysql_query ("select * from pegawai where id_pegawai=$id");
$data= mysql_fetch_array($query);

?>
<html>
<head>
	<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pegawai</h3>
</head>
<body>
	<form method="post" action="proses_edit_pegawai.php?id=<?php echo $_GET['id'];?>" >
		<table class="table">
			<tr>
				<td class="col-md-2">username</td>
				<td><input type="text" name="username" class="form-control" placeholder="Nama" value="<?php echo $data['username'];?>"></td>
			</tr>
			<tr>
				<td class="col-md-2">Nama Pegawai</td>
				<td><input type="text" name="nama_pegawai" class="form-control" placeholder="Nama" value="<?php echo $data['nama_pegawai'];?>"></td>
			</tr>
			<tr>
				<td>Nip</td>
				<td><input type="text" name="pass" class="form-control" placeholder="Nip"></td>
			</tr>
			<tr>
				<td>Alamat
				<td>
					<input type="text" name="alamatp" class="form-control" placeholder="Alamat" value="<?php echo $data['alamat'];?>">
				</td>
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