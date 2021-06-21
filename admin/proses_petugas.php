<?php
   include "../db/koneksi.php";
   $username = $_POST['username'];
   $password = $_POST['password'];
   $nama = $_POST['nama'];
   $password = md5($password);
   $username = md5($username);
   $cekuser = mysql_query("SELECT * FROM petugas WHERE username = '$username'");
   if(mysql_num_rows($cekuser) > 0) {
     echo "<div align='center'>Username Sudah Terdaftar! <a href='petugas.php'>Back</a></div>";
   } else {
     
          $simpan = mysql_query("INSERT INTO petugas(username, password, nama_petugas, id_level) VALUES('$username','$password','$nama','2')");
       if($simpan) {
          echo "<script>alert('data tersimpan')</script>";
		  echo "<meta http-equiv='refresh' content='1 url=petugas.php'>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
   
?>
