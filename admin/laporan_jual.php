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

 <button style="margin-bottom:10px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span >Cetak Perbulan</button>
 <p><h4 class="col-md-8" ><center>Inventaris yang terjual</center></h4></p>
 <a style="margin-bottom:10px" href="lap_jual.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
<html>
<head>
 <?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from view_jual");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<div class="col-md-12">
  <table class="col-md-2 " >
    <tr>
      <td>Jumlah Record</td>    
      <td><?php echo $jum; ?></td>
    </tr>
    <tr>
      <td>Jumlah Halaman</td> 
      <td><?php echo $halaman; ?></td>
    </tr>
  </table>
  
 <form action="cari_jual.php" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari nama di sini .." aria-describedby="basic-addon1" name="cari"> 
  </div>
   </form>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-select.min.css">
  <script type="text/javascript" src="../assets/js/bootstrap-select.min.js"></script>
<table class="table table-bordered table-striped table-hover" >
 <tr>
            <th >No</th>
            <th >Tanggal Out  </th>
      <th >Jumlah </th>
      <th >Nama Karyawan</th>
      <th >Inventory</th>
 
      <th >Jenis  </th>
      <th >Status</th>
      
      <th >Aksi</th>
          </tr>
        </head>
                                    


                                   
 <?php 
  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);
    $brg=mysql_query("select * from view_jual where nama like '$cari%' ");
  }else{
    $brg=mysql_query("select * from view_jual limit $start, $per_hal");
  }
  $no=1;
  while($data=mysql_fetch_array($brg)){

    ?>    
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo $data['tanggal_out'];?></td>
                       <td><?php echo $data['jumlah_out'];?></td>
                         <td><?php echo $data['nama_pegawai'];?></td>
                          <td ><?php echo $data['nama'];?></td>
                  
                          <td ><?php echo $data['nama_jenis'];?></td>
              <td ><?php echo $data['status_out'];?></td>
                      
            <td class="center"><a href="edit_jual.php?id=<?php echo $data['id_out']; ?>&jumlah=<?= $data['jumlah_out'];?>&idinv=<?= $data['id_inventaris'];?>" class="btn btn-warning" > Edit </a>
            <a href="hapus_jual.php?id=<?php echo $data['id_out']; ?>" 
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
        <h4 class="modal-title">Cetak Perbulan</h4>
      </div>
      <div class="modal-body">
<form name="LPbarang" method="GET" action="viewlaporanjual.php">
<table align="center">
	<div class="form-group">
	<label>BULAN</label>
		<select name="Bulan" class="form-control">
				<option value="0">---Pilih Bulan---</option>
				<option value="1">Januari</option>
				<option value="2">Februari</option>
				<option value="3">Maret</option>
				<option value="4">April</option>
				<option value="5">Mei</option>
				<option value="6">Juni</option>
				<option value="7">Juli</option>
				<option value="8">Agustus</option>
				<option value="9">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
		</select>
	</div>
	<div class="form-group">
		<label>TAHUN</label>
		<select name="Tahun" class="form-control">
			<option value="0">---Pilih Tahun---</option>
			<?php 
			for($i=2019; $i<=2035; $i++){ 
			?>

			<option><?= $i; ?></option>

			<?php } ?>

		</select>
	</div>



		<input type="submit" Value="Buat Laporan" class="btn btn-success">
	
</table>
</form>
</div>
<?php
include "footer.php";
?> 