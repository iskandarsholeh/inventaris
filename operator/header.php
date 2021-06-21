<html>
<head>
	<?php 
	include '../db/koneksi.php';
	?>
	<title>INVENTARIS</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Inventaris Sarana dan Prasarana</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['nama']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a>
					 <div class="dropdown-menu pull-right">
                <p class="dropdown-header"><?php echo $_SESSION['nama']  ?></p>
                <a class="dropdown-header"  class="glyphicon glyphicon-log-out" href="logout.php">Logout</a>
                <div class="dropdown divider"></div>
              </li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	

	<div class="col-md-2">
		<div class="row">
			<div class="col-xs-6">
		</div>
		<ul class="nav nav-pills nav-stacked">
				
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</a></li>
			<li class="active"><a href="meminjam.php"><span class="glyphicon glyphicon-bookmark"></span>  Peminjaman</a></li>        												
			<li class="active"><a href="petugas.php"><span class="glyphicon glyphicon-user"></span>  Petugas</a></li>
			<li class="active"><a href="pegawai.php"><span class="glyphicon glyphicon-user"></span>  Pegawai</a></li>
			<li class="active"><a href="ruang.php"><span class="glyphicon glyphicon-list"></span>  Ruang</a></li>
			<li class="active"><a href="jenis.php"><span class="glyphicon glyphicon-list"></span>  Jenis</a></li>
			<li class="active"><a href="laporan.php"><span class="glyphicon glyphicon-file"></span>  Laporan Pinjam</a></li>
			<li class="active"><a href="laporan2.php"><span class="glyphicon glyphicon-file"></span>  Laporan Kembali</a></li>
			<li class="active"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	</div>
	<div class="col-md-10">