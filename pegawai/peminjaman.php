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
 <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span >Input Pinjam</button>
 <p><h4 class="col-md-8" ><center>Inventaris yang masih di pinjamkan</center></h4></p>
 <a style="margin-bottom:10px" href="lap_pinjam.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
<html>
<table class="table table-bordered table-striped table-hover" >
<head>
 <tr>
            <th >No</th>
            <th >Tanggal Pinjam  </th>
      <th >Jumlah </th>
      <th >Tanggal Kembali </th>
      <th >Nama Peminjam</th>
      <th >Inventory</th>
      <th >Ruang</th>
      <th >Jenis  </th>
      <th >Status</th>
      
      <th >Aksi</th>
          </tr>
        </head>
                                    
                  

                                   
                  <?php 
include "../db/koneksi.php";
$query  = "select * from detail_pinjam,peminjaman,inventaris,pegawai,ruang,jenis
where peminjaman.id_pegawai = pegawai.id_pegawai and
detail_pinjam.id_inventaris = inventaris.id_inventaris and peminjaman.status_peminjaman= 'pinjam' and 
detail_pinjam.id_peminjaman = peminjaman.id_peminjaman and ruang.id_ruang = inventaris.id_ruang 
and jenis.id_jenis = inventaris.id_jenis
order by id_detail_pinjam";
$sql  = mysql_query ($query);
$no = 1;
while ($data=mysql_fetch_array($sql)) {
?>      
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo $data['tanggal_pinjam'];?></td>
                       <td><?php echo $data['jumlah_pinjam'];?></td>
                        <td><?php echo $data['tanggal_kembali'];?></td>
                         <td><?php echo $data['nama_pegawai'];?></td>
                          <td ><?php echo $data['nama'];?></td>
                          <td ><?php echo $data['nama_ruang'];?></td>
                          <td ><?php echo $data['nama_jenis'];?></td>
              <td ><?php echo $data['status_peminjaman'];?></td>
                      
                                            <td> <a href="kembali_pinjam.php?id=<?= $data['id_peminjaman']; ?>&jumlah=<?= $data['jumlah_pinjam'];?>&idinv=<?= $data['id_inventaris'];?>" class="btn btn-success" onClick = "return confirm('Apakah Anda ingin mengembalikan  <?php echo $data['nama']; ?>?')"> Kembalikan </a></td>
                                        </tr>
                    
                                        <?php $no++; }?>
                                </table> 
  <p><h4 ><center>Inventaris yang sudah di kembalikan</center></h4></p>
<a style="margin-bottom:10px" href="lap_kembali.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
 
<tr>
            <th >No</th>
            <th >Tanggal Pinjam  </th>
      <th >Jumlah </th>
      <th >Tanggal Kembali </th>
      <th >Nama Peminjam</th>
      <th >Inventory</th>
      <th >Ruang</th>
      <th >Jenis</th>
      <th >Status</th>
      
      <th >Aksi</th>
          </tr>
                         
                  

                                  
                  <?php 
include "../db/koneksi.php";
$query  = "select * from detail_pinjam,peminjaman,inventaris,pegawai,ruang,jenis
where peminjaman.id_pegawai = pegawai.id_pegawai and
detail_pinjam.id_inventaris = inventaris.id_inventaris and peminjaman.status_peminjaman= 'kembali' and 
detail_pinjam.id_peminjaman = peminjaman.id_peminjaman and ruang.id_ruang = inventaris.id_ruang 
and jenis.id_jenis = inventaris.id_jenis
order by id_detail_pinjam";
$sql  = mysql_query ($query);
$no = 1;
while ($data=mysql_fetch_array($sql)) {
?>      
                                        <tr class="odd gradeX">
                                          <td><?php echo $no?></td>
                                              <td><?php echo $data['tanggal_pinjam'];?></td>
                       <td><?php echo $data['jumlah_pinjam'];?></td>
                        <td><?php echo $data['tanggal_kembali'];?></td>
                         <td><?php echo $data['nama_pegawai'];?></td>
                          <td ><?php echo $data['nama'];?></td>
                          <td ><?php echo $data['nama_ruang'];?></td>
                          <td ><?php echo $data['nama_jenis'];?></td>
              <td ><?php echo $data['status_peminjaman'];?></td>
                      
                                            <td class="center"><a class="btn btn-danger" href="hapus_pinjam.php?id=<?php echo $data['id_peminjaman']; ?>" 
  onClick = "return confirm('Apakah Anda ingin mengapus  <?php echo $data['nama']; ?>?')"> hapus</a> </td>
                                        </tr>
                    
                                        <?php $no++; }?>
                            
                  
                  

                                </table>

                                <div id="myModal" class="modal fade">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Barang Baru</h4>
      </div>
      <div class="modal-body">
 <form name="tbarang" method="POST" action="proses_pinjam.php">
<table align="center">
  <tr>
    <td>Nama Barang</td>
    <td>&nbsp;:&nbsp;</td>
    <td>
    <select name="nambar" class="form-control">
        <option>---Pilih Barang---</option>
      <?php 
       include'../db/koneksi.php';
        $q=mysql_query("SELECT * FROM view_inventaris");
        while($pg=mysql_fetch_array($q)){
       ?>
      <option value="<?= $pg['id_inventaris']; ?>">
        <?= $pg['nama'].' ('.$pg['nama_ruang'].')'; ?></option>
      <?php } ?>
    </select>
    </td>
  </tr>

  <tr>
    <td>Jumlah</td>
    <td>&nbsp;:&nbsp;</td>
    <td><input type="text" name="juml" autocomplete="off" class="form-control"></td>
  </tr>

  <tr>
    <td>Tanggal Pinjam</td>
    <td>&nbsp;:&nbsp;</td>
    <td><input type="date" name="tp" class="form-control" value="<?= date('Y-m-d'); ?>" readonly></td>
  </tr>
<tr>
    <td>Waktu Pinjam</td>
    <td>&nbsp;:&nbsp;</td>
    <td><input type="time" name="wp" class="form-control" value="<?= date('H:i:s'); ?>" readonly></td>
  </tr>
  <tr>
    <td>Peminjam</td>
    <td>&nbsp;:&nbsp;</td>
    <td>
      <select name="peminjam" class="form-control">
        <option>---Pilih Peminjam---</option>
      <?php 
      include'../db/koneksi.php';
        $q=mysql_query("SELECT * FROM pegawai");
        while($pg=mysql_fetch_array($q)){
       ?>
      <option value="<?= $pg['id_pegawai']; ?>"><?= $pg['nama_pegawai']; ?></option>
      <?php } ?>
      </select>
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td colspan="3" align="center"><input type="submit" name="pbarang" Value="Tambah" class="btn btn-success"></td>
  </tr>
</table>
</form>
      </div>
  </form>

<?php
include "footer.php";
?>
                </html>