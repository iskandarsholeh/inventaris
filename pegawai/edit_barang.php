<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dahulu');
	document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "admin"){
	echo"<script>alert('Anda Bukan Admin');
	document.location.href='meminjam.php'</script>\n";
}
?>
<?php
include "header.php";
?>

<?php
$id = $_GET['id'];
$query = mysql_query ("select * from inventaris where id_inventaris=$id");
$data= mysql_fetch_array($query);

?>
<html>
<head>
	<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
</head>
<body>
	<form method="post" action="proses_edit.php?id=<?php echo $_GET['id'];?>" >
		<table class="table">
			<tr>
				<td class="col-md-2">Nama Barang</td>
				<td><input type="text" name="nama" class="form-control" placeholder="Nama" autocomplete="off" value="<?php echo $data['nama'];?>"></td>
			</tr>
			<tr>
				<td>Kondisi</td>
				<td><input type="text" name="kondisi" class="form-control" placeholder="Kondisi" autocomplete="off" value="<?php echo $data['kondisi'];?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input type="text" name="keterangan" class="form-control" autocomplete="off" placeholder="Keterangan" value="<?php echo $data['keterangan'];?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" name="jumlah" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?php echo $data['jumlah'];?>"></td>
			</tr>
			<tr>
				<td>Kode</td>
				<td><input type="text" name="kode" class="form-control" autocomplete="off" placeholder="Kode" value="<?php echo $data['kode_inventaris'];?>"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="date" name="tanggal" class="form-control" autocomplete="off" placeholder="Tanggal" value="<?= date('Y-m-d'); ?>" readonly></td>
			</tr>
			<tr>
				<td>Ruang</td>
				<td>
					
					<select name="ruang" class="form-control">
						<?php 
						include '../db/koneksi.php';

						$per=mysql_query("SELECT * FROM ruang");
						while ($f=mysql_fetch_array($per)) {
							$idruang=$f['id_ruang'];
							$namaruang=$f['nama_ruang'];
						 ?>
						<option value="<?= $idruang; ?>"> <?= $namaruang; ?> </option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>

					<select name="jenis" class="form-control">
						<?php 
						include '../db/koneksi.php';

						$per=mysql_query("SELECT * FROM jenis");
						while ($f=mysql_fetch_array($per)) {
						 ?>
						<option value="<?= $f['id_jenis']; ?>"> <?= $f['nama_jenis']; ?> </option>
					<?php } ?>
					</select>
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