<?php
include "../db/koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
 echo"<script>alert('Silahkan Login Dulu');
  document.location.href='../index.php'</script>\n"; 
} else if($_SESSION['nama'] != "operator"){
  echo"<script>alert('Anda Bukan Operator');
  document.location.href='index.php'</script>\n";
}
?>
<?php
include "header.php";
?>
                                  
                  <?php 
include "../db/koneksi.php";
$id = $_GET['id'];
$query = mysql_query("select * from detail_pinjam,peminjaman,inventaris,pegawai,ruang,jenis
where peminjaman.id_pegawai = pegawai.id_pegawai and
detail_pinjam.id_inventaris = inventaris.id_inventaris and peminjaman.status_peminjaman= 'kembali' and 
detail_pinjam.id_peminjaman = peminjaman.id_peminjaman and ruang.id_ruang = inventaris.id_ruang 
and jenis.id_jenis = inventaris.id_jenis and detail_pinjam.id_peminjaman='$id'");
$data = mysql_fetch_array($query);
?>      
                                      <h3>Detail Pinjam</h3>
     <div class="content">
        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">Nama Barang </td>
                <td width="1%">:</td>
                <td><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td width="1%">:</td>
                <td><?php echo $data['tanggal_pinjam']; ?></td>
            </tr>
            <tr>
                <td>Waktu Pinjam</td>
                <td width="1%">:</td>
               <td><?php echo $data['waktu_pinjam']; ?></td>
            </tr>
             <tr>
                <td>Tanggal Kembali</td>
                <td width="1%">:</td>
                <td><?php echo $data['tanggal_kembali']; ?></td>
            </tr>
             <tr>
                <td>Waktu Kembali</td>
                <td width="1%">:</td>
                <td><?php echo $data['waktu_kembali']; ?></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td width="1%">:</td>
                <td><?php echo $data['jumlah_pinjam']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td width="1%">:</td>
                <td><?php echo $data['status_peminjaman']; ?></td>
            </tr>
            <tr>
                <td>Peminjam</td>
                <td width="1%">:</td>
                <td><?php echo $data['nama_pegawai']; ?></td>
            </tr>
             <tr>
                <td>Jenis</td>
                <td width="1%">:</td>
                <td><?php echo $data['nama_jenis']; ?></td>
             <tr>
                <td>Ruang</td>
                <td width="1%">:</td>
                <td><?php echo $data['nama_ruang']; ?></td>
            
            </tr>
        </table>
    </div>
    <br>
<a href="laporan2.php" class="btn btn-success">Kembali</a>
<?php
include "footer.php";
?>