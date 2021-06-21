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
include 'header.php';

?>
<h3><span class="glyphicon glyphicon-LIST"></span>  Data Ruang</h3>
 <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Ruangan</button>
 <body>
	<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from ruang");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

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
	
 <form action="cari_ruang.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
	 </form>
  <table class="table table-hover">
        <tr>
          <th class="col-md-1">No</th>
      <th class="col-md-2" >Nama Ruang</th> 
         <th class="col-md-2" >Aksi</th> 
        </tr>
 <?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from ruang where nama_ruang like '$cari%'");
	}else{
		$brg=mysql_query("select * from ruang limit $start, $per_hal");
	}
	$no=1;
	while($data=mysql_fetch_array($brg)){

		?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no?></td>
                       <td><?php echo $data['nama_ruang'];?></td>
                      <td class="center"><a href="edit_ruang.php?id=<?php echo $data['id_ruang']; ?>" class="btn btn-warning" > Edit </a>
					  <a href="hapus_ruang.php?id=<?php echo $data['id_ruang']; ?>" 
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
				<h4 class="modal-title">Tambah Ruang</h4>
			</div>
			<div class="modal-body">
			<form method="post" action="proses_ruang.php">
			<div class="form-group">
				<label>Nama Ruangan</label>
				<input type="text" name="nama"  class="form-control" autocomplete="off" placeholder="Nama" required>
			</div>
			<div class="form-group">
				<label>Kode</label>
				<input type="text" name="kode" class="form-control" autocomplete="off" placeholder="Kode" required>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" autocomplete="off" placeholder="Keterangan" required>
			</div>

				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
	</form>

										</body>
										
										<?php 
include 'footer.php';
?>