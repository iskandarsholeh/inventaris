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
<h3><span class="glyphicon glyphicon-user"></span>  Data Petugas</h3>
 <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Petugas</button>

<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from petugas where id_level='2'");
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

 <form action="cari_petugas.php" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari"> 
  </div>
   </form>
  <table class="table table-hover">
        <tr>
          <th class="col-md-1">No</th>
      <th class="col-md-2" >Nama </th>
      <th class="col-md-2" >Username </th>
      <th class="col-md-3" >Aksi</th>     
        </tr>
 <?php 
  if(isset($_GET['cari'])){
    $cari=mysql_real_escape_string($_GET['cari']);
    $brg=mysql_query("select * from petugas where nama_petugas like '$cari%'");
  }else{
    $brg=mysql_query("select * from petugas where id_level= '2' limit $start, $per_hal");
  }
  $no=1;
  while($data=mysql_fetch_array($brg)){

    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no?></td>
                       <td><?php echo $data['nama_petugas'];?></td>
                       <td><?php echo $data['username'];?></td>
                      <td class="center"><a href="edit_petugas.php?id=<?php echo $data['id_petugas']; ?>" class="btn btn-warning" > Edit </a>
            <a href="hapus_petugas.php?id=<?php echo $data['id_petugas']; ?>" 
                onClick = "return confirm('Apakah Anda ingin mengapus  
            <?php echo $data['nama_petugas']; ?>?')" class="btn btn-danger"> hapus</a></td>
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
        <h4 class="modal-title">Input Petugas</h4>
      </div>
      <div class="modal-body">
          <script>
function myFunction() {
  var x = document.getElementById("mypass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>

  <form action="proses_petugas.php" method="post">
  <label>Username </label> 
  <div class="form-group">
  <input name="username" type="text" class="form-control" autocomplete="off" placeholder="username" required></td></tr>
  </div>
  <label>Password</label>
  <div class="form-group">
  <input name="password" id="mypass"type="password" class="form-control" autocomplete="off" placeholder="Password"required>
  </div>
  <label>Nama</label> 
  <div class="form-group">
  <input name="nama" type="text" class="form-control" autocomplete="off" placeholder="Nama Petugas"required>
  </div>
  <div class="form-group">
  <input type="checkbox" onclick="myFunction()">Show Password
</div>
  <div class="modal-footer">
 <input value="Daftar" class="btn btn-primary"  type="submit"> 
</div>
      </div>
<?php 
  include 'footer.php';
  ?>
</html>