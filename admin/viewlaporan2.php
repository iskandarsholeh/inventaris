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
$bulan=$_GET['Bulan'];
$tahun=$_GET['Tahun'];

if ($bulan=='0') {$sbulan='0';}elseif($bulan=='2'){$sbulan='Februari';}elseif($bulan=='3'){$sbulan='Maret';}elseif($bulan=='4'){$sbulan='April';}elseif($bulan=='5'){$sbulan='Mei';}elseif($bulan=='6'){$sbulan='Juni';}
    elseif($bulan=='7'){$sbulan='Juli';}elseif($bulan=='8'){$sbulan='Agustus';}elseif($bulan=='9'){$sbulan='September';
   }elseif($bulan=='10'){$sbulan='Oktober';}elseif($bulan=='11'){$sbulan='November';}elseif($bulan=='12'){$sbulan='
   Desember';}elseif($bulan='1'){$sbulan='Januari';}

?>
<?php
include "header.php";
?> 
    
     <h3 align="center">Laporan Inventaris Pinjam</h3>
        <h5 align="center">Bulan : <?=$sbulan;?> Tahun : <?=$tahun;?></h5>
  
 
     <table class="table table-bordered table-striped table-hover">
			<tr >
			
				<th style="text-align: center">No</th>
				<th style="text-align: center">Nama</th>
				<th style="text-align: center">Tanggal Pinjam</th>
				<th style="text-align: center">Waktu Pinjam</th>
				<th style="text-align: center">Jumlah Pinjam</th>
				<th style="text-align: center">Status</th>
				<th style="text-align: center">Nama Peminjam</th>
		    </tr>
		    <?php
		      include '../db/koneksi.php'; 
		    	$no=1;
		    	$sql=mysql_query("SELECT * FROM view_kembali WHERE MONTH(tanggal_pinjam)=$bulan AND YEAR(tanggal_pinjam)=$tahun");
		    	while ($row=mysql_fetch_array($sql)) {
		     ?>
		    <tr>
				<th scope="row" style="padding: 5px"><center><?= $no++; ?></center></th>
				<td  align="center"><?= $row['nama']; ?></td>
				<td  align="center"><?= $row['tanggal_pinjam']; ?></td>
				<td  align="center"><?= $row['waktu_pinjam']; ?></td>
				<td  align="center"><?= $row['jumlah_pinjam']; ?></td>
				<td  align="center"><?= $row['status_peminjaman']; ?></td>
				<td  align="center"><?= $row['nama_pegawai']; ?></td>
			</tr>
		<?php } ?>
		  </table>



</div>
<?php
include "footer.php";
?> 
