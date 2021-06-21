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
include 'header.php';

?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h3>
 <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
 <body>
	<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from view_inventaris");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>

<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	
 <form action="cari_barang.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
	 </form>
  <table class="table table-hover">
        <tr>
          <th class="col-md-0">No</th>
      <th class="col-md-2" >Nama </th>
	  <th class="col-md-1">Kondisi </th>
	  <th class="col-md-2">Keterangan </th>
      <th class="col-md-1">jumlah </th>
	  <th class="col-md-1">Jenis </th>
	  <th class="col-md-1">Ruang </th>
	  <th class="col-md-2">Tanggal Register </th>
      <th class="col-md-2" >Aksi</th>     
        </tr>
 <?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from view_inventaris where nama like '$cari%' or nama_jenis like '$cari'");
	}else{
		$brg=mysql_query("select * from view_inventaris limit $start, $per_hal");
	}
	$no=1;
	while($data=mysql_fetch_array($brg)){

		?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no?></td>
                       <td><?php echo $data['nama'];?></td>
					    <td><?php echo $data['kondisi'];?></td>
						 <td><?php echo $data['keterangan'];?></td>
                        <td><?php echo $data['jumlah'];?></td>
						 <td><?php echo $data['nama_jenis'];?></td>
						  <td><?php echo $data['nama_ruang'];?></td>
						  <td><?php echo $data['tanggal_register'];?></td>
                      <td class="center"><a href="edit_barang.php?id=<?php echo $data['id_inventaris']; ?>" class="btn btn-warning" > Edit </a>
					  <a href="hapus_barang.php?id=<?php echo $data['id_inventaris']; ?>" 
			          onClick = "return confirm('Apakah Anda ingin mengapus  
					  <?php echo $data['nama']; ?>?')" class="btn btn-danger"> hapus</a></td>
                                        </tr>
                    
                                        <?php $no++; }?>
										</table>
		<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
			<div id="myModal" class="modal fade">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
			<form method="post" action="proses_barang.php">
			<div class="form-group">
				<label>Nama Barang</label>
				<input type="text" name="nama"  class="form-control" autocomplete="off" placeholder="NAMA" required>
			</div>
			<div class="form-group">
				<label>Kondisi</label>
				<input type="text" name="kondisi" class="form-control" autocomplete="off" placeholder="KONDISI" required>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" autocomplete="off" placeholder="KETERANGAN" required>
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="text" name="jumlah" class="form-control" autocomplete="off" placeholder="JUMLAH" required>
			</div>
			<div class="form-group">
				<label>Jenis</label>
					<select name="jenis" required class="form-control">
						<option>Pilih Jenis</option>
						<?php 
						include 'db/koneksi.php';

						$per=mysql_query("SELECT * FROM jenis");
						while ($f=mysql_fetch_array($per)) {
						 ?>
						<option value="<?= $f['id_jenis']; ?>"> <?= $f['nama_jenis']; ?> </option>
					<?php } ?>
					</select>
			</div>
			<div class="form-group">
				<label>Tanggal Register</label>
				<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" placeholder="TANGGAL REGISTER" readonly>
			</div>
			<div class="form-group">
				<label>Ruang</label>
					<select name="ruang" class="form-control" required>
						<option>Pilih Ruang</option>
						<?php 
						include 'db/koneksi.php';

						$per=mysql_query("SELECT * FROM ruang");
						while ($f=mysql_fetch_array($per)) {
							$idruang=$f['id_ruang'];
							$namaruang=$f['nama_ruang'];
						 ?>
						<option value="<?= $idruang; ?>"> <?= $namaruang; ?> </option>
					<?php } ?>
					</select>
			</div>
			<div class="form-group">
				<label>Kode</label>
				<input type="text" name="kode" class="form-control" autocomplete="off" placeholder="KODE INVENTARIS">
				<div class="modal-footer">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
	</form>

										</body>
										
										<?php 
include 'footer.php';
?>