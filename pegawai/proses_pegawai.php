<?php
   include "../db/koneksi.php";
   $username = $_POST['username'];
   $password = $_POST['password'];
   $nama = $_POST['nama'];
   $nip = $_POST['nip'];
   $alamat = $_POST['alamat'];
   $password = md5($password);
   $cekuser = mysql_query("SELECT * FROM pegawai WHERE username = '$username'");
   if(mysql_num_rows($cekuser) > 0) {
     echo "<div align='center'>Username Sudah Terdaftar! <a href='pegawai.php'>Back</a></div>";
   } else {
     
          $simpan = mysql_query("INSERT INTO pegawai(username, password, nama_pegawai, nip, alamat) VALUES('$username','$password','$nama','$nip','$alamat')");
       if($simpan) {
          echo "<script>alert('data tersimpan')</script>";
		  echo "<meta http-equiv='refresh' content='1 url=pegawai.php'>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
   
?>