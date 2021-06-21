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
<?php /*
<h3 align="center">Peminjaman Barang</h3><br>
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
    <td><input type="text" name="juml" class="form-control"></td>
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
</form>*/?>
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
       <div class="modal-body">  
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-select.min.css">
  <script type="text/javascript" src="../assets/js/bootstrap-select.min.js"></script>
 <form  name="tbarang" method="POST" action="proses_jual.php">
  <div class="form-group">
        <label>Nama Barang</label>
        <?php
    //<select name="nambar" id="framework" class="form-control selectpicker" data-live-search="true" multiple>
        ?>
      <select name="nambar" class="form-control selectpicker" data-live-search="true">
        <option class="form-control">---Pilih Barang---</option>
      <?php 
       include'../db/koneksi.php';
        $q=mysql_query("SELECT * FROM view_inventaris");
        while($pg=mysql_fetch_array($q)){
       ?>
      <option value="<?= $pg['id_inventaris']; ?>">
        <?= $pg['nama'].' ('.$pg['jumlah'].')'; ?></option>
      <?php } ?>
    </select>
 
</div>
 <div class="form-group">
  <label>Jumlah</label>
      <input type="text" name="juml" autocomplete="off" class="form-control">
  </div>
 <div class="form-group">
 <label>Tanggal</label><input type="date" name="tp" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
 </div>
  <div class="form-group">
<label>Waktu</label>
<input type="time" name="wp" class="form-control" value="<?= date('H:i:s'); ?>" readonly>
</div>
 <div class="form-group">
<label>Karyawan</label>
      <select name="peminjam" id="framework" class="form-control selectpicker" data-live-search="true" >
        <option>---Pilih Karyawan---</option>
      <?php 
      include'../db/koneksi.php';
        $q=mysql_query("SELECT * FROM pegawai");
        while($pg=mysql_fetch_array($q)){
       ?>
      <option value="<?= $pg['id_pegawai']; ?>"><?= $pg['nama_pegawai']; ?></option>
      <?php } ?>
      </select>
 
</div>
    <td colspan="3" align="center"><input type="submit" name="pbarang" Value="Tambah" class="btn btn-success"></td>
</table>
</form>
      </div>
  </form>
<?php
include "footer.php";
?>