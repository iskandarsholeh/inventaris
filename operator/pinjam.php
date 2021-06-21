<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dulu');
  document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "admin"){
  echo"<script>alert('Anda Bukan Admin');
  document.location.href='index.php'</script>\n";
}
?>
<?php
include "header.php";
?>
<a style="margin-bottom:10px" href="lap_pinjam.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
<a href="meminjam.php">Input Pinjam</a>
<html>
 <p><center>Inventaris yang sudah di pinjam</center></p>
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
detail_pinjam.id_inventaris = inventaris.id_inventaris and peminjaman.status_peminjam= 'pinjam' and 
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
						  <td ><?php echo $data['status_peminjam'];?></td>
                      
                                            <td> <a href="kembali_pinjam.php?id=<?= $data['id_peminjaman']; ?>&jumlah=<?= $data['jumlah_pinjam'];?>&idinv=<?= $data['id_inventaris'];?>" class="btn btn-success" onClick = "return confirm('Apakah Anda ingin mengembalikan  <?php echo $data['nama']; ?>?')"> Kembalikan </a></td>
                                        </tr>
                    
                                        <?php $no++; }?>
                                </table> 
<a style="margin-bottom:10px" href="lap_kembali.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
    
  <p><center>Inventaris yang sudah di kembalikan</center></p>
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
detail_pinjam.id_inventaris = inventaris.id_inventaris and peminjaman.status_peminjam= 'kembali' and 
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
              <td ><?php echo $data['status_peminjam'];?></td>
                      
                                            <td class="center"><a class="btn btn-danger" href="hapus_pinjam.php?id=<?php echo $data['id_peminjaman']; ?>" 
  onClick = "return confirm('Apakah Anda ingin mengapus  <?php echo $data['nama']; ?>?')"> hapus</a> </td>
                                        </tr>
                    
                                        <?php $no++; }?>
                            
                  
                  

                                </table>
<?php
include "footer.php";
?>
								</html>