<?php
include "db/koneksi.php";
session_start();
?>
<html>
<head>
<title> Login </title>
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
<link rel="stylesheet" href="tes3.css">
</head>
<body >
 <h2>Login Form </h2>
<form method = "post" name = "login" action = "proses_login2.php">
<div class="container"style="background-color:#ffffff" >

<center>
    <img src="male.png" alt="Avatar" class="avatar">
	</center>

<div class="container" style="background-color:#ffffff">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username"  name="username" autocomplete="off" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="mypass" name="password" autocomplete="off" required>
    <button type ="submit" name="submit" value="masuk"><font face="verdana" color="white">Masuk</font> </button>
     <input type="checkbox" onclick="myFunction()">Show Password

</div>
</form>
</body>
</html>