<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dahulu');
  document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "pegawai"){
  echo"<script>alert('Anda Bukan Pegawai');
  document.location.href='index.php'</script>\n";
}
?>
<?php
include "header.php";
?>
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
       <div class="modal-body">  
<link rel="stylesheet" href="#">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-select.min.css">
  <script type="text/javascript" src="../assets/js/bootstrap-select.min.js"></script>
<center>
<h3 align="center">Peminjaman Barang</h3><br>
<form name="tbarang" method="POST" action="proses_pinjam.php">
  <div class="form-group">
        <label>Nama Barang</label>
    <select name="nambar" class="form-control selectpicker " data-live-search="true" style="width:50%">
        <option class="form-control">---Pilih Barang---</option>
      <?php 
       include'../db/koneksi.php';
        $q=mysql_query("SELECT * FROM view_inventaris");
        while($pg=mysql_fetch_array($q)){
       ?>
      <option value="<?= $pg['id_inventaris']; ?>">
        <?= $pg['nama'].' ('.$pg['nama_ruang'].')'.' ('.$pg['jumlah'].')'; ?></option>
      <?php } ?>
    </select>
 
</div>
 <div class="form-group">
  <label>Jumlah</label>
      <input type="text" name="juml" autocomplete="off" class="form-control"  >
  </div>
 <div class="form-group">
 <label>Tanggal</label><input type="date" name="tp" class="form-control" value="<?= date('Y-m-d'); ?>" readonly >
 </div>
  <div class="form-group">
<label>Waktu</label>
<input type="time" name="wp" class="form-control" value="<?= date('H:i:s'); ?>" readonly >
</div>
     <input type="hidden" name="peminjam" class="form-control" value="<?php echo $_SESSION['id_pegawai']; ?>" readonly>
   
    <td colspan="3" align="center"><input type="submit" name="pbarang" Value="Tambah" class="btn btn-success"></td>
 
</table>
</form>
<?php
include "footer.php";
?>