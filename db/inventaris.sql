-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for inventaris
CREATE DATABASE IF NOT EXISTS `inventaris` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventaris`;

-- Dumping structure for table inventaris.detail_pinjam
CREATE TABLE IF NOT EXISTS `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `id_inventaris` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_pinjam`),
  KEY `id_inventaris` (`id_inventaris`),
  KEY `id_peminjaman` (`id_peminjaman`),
  CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pinjam_ibfk_2` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.detail_pinjam: ~9 rows (approximately)
DELETE FROM `detail_pinjam`;
/*!40000 ALTER TABLE `detail_pinjam` DISABLE KEYS */;
INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `jumlah_pinjam`, `id_peminjaman`) VALUES
	(13, 1, 1, 14),
	(14, 1, 2, 15),
	(15, 2, 1, 16),
	(16, 2, 1, 17),
	(17, 2, 1, 18),
	(18, 2, 1, 19),
	(19, 2, 1, 20),
	(20, 2, 1, 21),
	(21, 2, 2, 22),
	(22, 2, 3, 23),
	(23, 2, 2, 24);
/*!40000 ALTER TABLE `detail_pinjam` ENABLE KEYS */;

-- Dumping structure for table inventaris.inventaris
CREATE TABLE IF NOT EXISTS `inventaris` (
  `id_inventaris` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tanggal_register` date DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `kode_inventaris` varchar(50) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inventaris`),
  KEY `id_ruang` (`id_ruang`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_jenis` (`id_jenis`),
  CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.inventaris: ~21 rows (approximately)
DELETE FROM `inventaris`;
/*!40000 ALTER TABLE `inventaris` DISABLE KEYS */;
INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`) VALUES
	(1, 'Proyektor', 'Mulus', 'Toshiba', 2, 1, '2019-03-09', 1, '1000', 1),
	(2, 'LCD', 'Baik', 'Toshiba', 3, 1, '2019-03-09', 1, '1001', 1),
	(4, 'Almari', 'Baik', 'Almari', 10, 1, '2019-03-09', 3, '1002', 1),
	(5, 'Papan Tulis', 'Baik', 'Papan', 1, 1, '2019-03-09', 6, '1005', 1),
	(6, 'Timbang Badan', 'Baik', 'Tb', 1, 1, '2019-03-09', 4, '1008', 1),
	(7, 'Papan Data', 'baik', 'Papan Data', 10, 1, '2019-03-09', 3, '1202', 1),
	(8, 'Drum', 'Baik', 'Drum', 0, 1, '2019-03-09', 4, '1104', 1),
	(9, 'Gitar', 'Baik', 'Gitar', 2, 1, '2019-03-09', 4, '1000', 1),
	(10, 'Bass', 'Baik', 'Bass', 3, 1, '2019-03-09', 4, '1002', 1),
	(11, 'Meja', 'baik', 'meja', 20, 1, '2019-03-09', 7, '1022', 1),
	(12, 'Kursi', 'baik', 'kursi', 25, 1, '2019-03-09', 1, '1011', 1),
	(13, 'Sound System', 'baik', 'Sound', 10, 1, '2019-03-09', 1, '1023', 1),
	(14, 'Laptop', 'Baik', 'baik', 10, 1, '2019-03-09', 1, '1111', 1),
	(15, 'Kabel Aux', 'baik', 'baik', 10, 1, '2019-03-09', 1, '2222', 1),
	(16, 'Adaptop', 'baik', 'baik', 10, 1, '2019-03-09', 1, '2341', 1),
	(17, 'Komputer', 'Baik', 'baik', 10, 1, '2019-03-09', 1, '2012', 1),
	(18, 'DVD Plyer', 'baik', 'dvd', 10, 1, '2019-03-09', 5, '2312', 1),
	(19, 'Printer', 'baik', 'mulus', 10, 1, '2019-03-09', 4, '1243', 1),
	(21, 'LCD', 'Baik', 'Toshiba', 20, 1, '2019-03-09', 3, '2015', 1),
	(22, 'Kursi', 'baik', 'kursi', 10, 1, '2019-03-09', 7, '1021', 1);
/*!40000 ALTER TABLE `inventaris` ENABLE KEYS */;

-- Dumping structure for table inventaris.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `kode_jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.jenis: ~1 rows (approximately)
DELETE FROM `jenis`;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
	(1, 'Alat', 'A', 'Alat'),
	(4, 'Bahan', 'B', 'Bahan');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;

-- Dumping structure for table inventaris.level
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.level: ~2 rows (approximately)
DELETE FROM `level`;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id_level`, `nama_level`) VALUES
	(1, 'admin'),
	(2, 'operator');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table inventaris.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.pegawai: ~9 rows (approximately)
DELETE FROM `pegawai`;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id_pegawai`, `username`, `nama_pegawai`, `nip`, `alamat`) VALUES
	(1, '239632fb19f8d5a4d297912ffff5363c', 'kandar', '239632fb19f8d5a4d297912ffff5363c', 'bangkalan'),
	(2, '4e3a77ce388ff804ba20ab589fc6069d', 'Kirito', 'adcaec3805aa912c0d0b14a81bedb6ff', 'Jepun'),
	(3, '76a729a96e75ca1ad26c2e0e8dfd8b7e', 'Hendo', '992a6d18b2a148cf20d9014c3524aa11', 'Hongkong'),
	(4, '2cba673c2f1ffa4e57ae9ddedf9a38b7', 'megumin', 'c4ded2b85cc5be82fa1d2464eba9a7d3', 'Jepang'),
	(5, '255f1b952b2c4d5566ade29c3460b3ba', 'Aquila', '099ebea48ea9666a7da2177267983138', 'Tokyo'),
	(6, 'e2e42a07550863f8b67f5eb252581f6d', 'Nick', '1e01ba3e07ac48cbdab2d3284d1dd0fa', 'bangkalan'),
	(7, 'e5b5a57b9d168fbdd42a1e8799dd59c3', 'Lili', '6531401f9a6807306651b87e44c05751', 'Bangkalan'),
	(8, '2e3817293fc275dbee74bd71ce6eb056', 'Lala', 'c37bf859faf392800d739a41fe5af151', 'Bangkalan');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table inventaris.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pinjam` date DEFAULT NULL,
  `waktu_pinjam` time DEFAULT NULL,
  `waktu_kembali` time DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.peminjaman: ~9 rows (approximately)
DELETE FROM `peminjaman`;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `waktu_pinjam`, `waktu_kembali`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`) VALUES
	(14, '2019-03-19', '18:10:50', '00:00:00', '0000-00-00', 'pinjam', 4),
	(15, '2019-03-19', '18:11:33', '19:23:56', '2019-03-19', 'kembali', 4),
	(16, '2019-03-19', '18:37:34', NULL, '0000-00-00', 'pinjam', 2),
	(17, '2019-03-19', '18:39:03', '00:00:00', '0000-00-00', 'pinjam', 2),
	(18, '2019-03-19', '22:19:08', '23:04:29', '2019-03-19', 'kembali', 4),
	(19, '2019-03-19', '23:18:43', '23:19:07', '2019-03-19', 'kembali', 5),
	(20, '2019-03-19', '23:19:21', '04:57:42', '2019-03-20', 'kembali', 2),
	(21, '2019-03-20', '04:57:18', '00:00:00', '0000-00-00', 'pinjam', 3),
	(22, '2019-03-20', '05:03:33', '09:24:50', '2020-03-20', 'kembali', 6),
	(23, '2019-05-20', '20:33:13', '00:00:00', '0000-00-00', 'pinjam', 7),
	(24, '2019-09-13', '18:42:41', '00:00:00', '0000-00-00', 'pinjam', 1);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table inventaris.petugas
CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `id_level` (`id_level`),
  CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.petugas: ~7 rows (approximately)
DELETE FROM `petugas`;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
	(1, '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'Iskandar ', 1),
	(2, '4b583376b2767b923c3e1da60d10de59', '4b583376b2767b923c3e1da60d10de59', 'sholeh', 2),
	(4, '2bd8ab451a35759c5737128e35c8011a', '2bd8ab451a35759c5737128e35c8011a', 'vivo', 1),
	(5, '1dceafea1799963305c85239882a62fc', '1dceafea1799963305c85239882a62fc', 'Aliga', 2),
	(6, 'bffec417c4f1d414635b78ac4db36408', 'bffec417c4f1d414635b78ac4db36408', 'Seeu', 2),
	(7, '9b534531f56f2849feeec30e43b30dcc', '9b534531f56f2849feeec30e43b30dcc', 'kazuma', 2),
	(8, '8f4ef05b543fb6157b374099100574b3', '8f4ef05b543fb6157b374099100574b3', 'Natural', 2);
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;

-- Dumping structure for table inventaris.ruang
CREATE TABLE IF NOT EXISTS `ruang` (
  `id_ruang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(50) DEFAULT NULL,
  `kode_ruang` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris.ruang: ~10 rows (approximately)
DELETE FROM `ruang`;
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`) VALUES
	(1, 'Tata Usaha', 'TU', 'tempat'),
	(3, 'Hubungan Masyarakat', 'humas', 'Hubungan'),
	(4, 'Aula', 'A', 'tempat'),
	(5, 'Ruang 01', '01', 'kelas'),
	(6, 'Ruang 02', '02', 'Kelas'),
	(7, 'Ruang 03', '03', 'Kelas'),
	(9, 'Ruang 04', '04', 'Kelas'),
	(10, 'Ruang 05', '05', 'kelas'),
	(11, 'Ruang 06', '06', 'Kelas'),
	(12, 'Ruang 07', '07', 'Kelas');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;

-- Dumping structure for view inventaris.view_inventaris
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_inventaris` (
	`id_inventaris` INT(11) NOT NULL,
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`kondisi` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`keterangan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah` INT(11) NULL,
	`tanggal_register` DATE NULL,
	`kode_inventaris` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_jenis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_ruang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_petugas` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view inventaris.view_kembali
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_kembali` (
	`id_inventaris` INT(11) NOT NULL,
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_ruang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah_pinjam` INT(11) NOT NULL,
	`tanggal_pinjam` DATE NULL,
	`waktu_pinjam` TIME NULL,
	`tanggal_kembali` DATE NULL,
	`nama_jenis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_detail_pinjam` INT(11) NOT NULL,
	`status_peminjaman` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_pegawai` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_peminjaman` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view inventaris.view_pinjam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pinjam` (
	`id_inventaris` INT(11) NOT NULL,
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_ruang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah_pinjam` INT(11) NOT NULL,
	`tanggal_pinjam` DATE NULL,
	`waktu_pinjam` TIME NULL,
	`tanggal_kembali` DATE NULL,
	`nama_jenis` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_detail_pinjam` INT(11) NOT NULL,
	`status_peminjaman` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama_pegawai` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_peminjaman` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view inventaris.view_inventaris
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_inventaris`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_inventaris` AS SELECT a.id_inventaris, nama, kondisi,a.keterangan, jumlah, tanggal_register, kode_inventaris, b.nama_jenis,c.nama_ruang,d.nama_petugas
from inventaris a, jenis b, ruang c, petugas d where a.id_jenis=b.id_jenis and a.id_ruang=c.id_ruang and a.id_petugas=d.id_petugas ;

-- Dumping structure for view inventaris.view_kembali
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_kembali`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kembali` AS SELECT b.id_inventaris,c.nama,e.nama_ruang,b.jumlah_pinjam,a.tanggal_pinjam,a.waktu_pinjam,a.tanggal_kembali, f.nama_jenis,
b.id_detail_pinjam, a.status_peminjaman,d.nama_pegawai, a.id_peminjaman from peminjaman a,detail_pinjam b,inventaris c, pegawai d, ruang e, jenis f where  
a.id_peminjaman=b.id_peminjaman and b.id_inventaris=c.id_inventaris and a.id_pegawai=d.id_pegawai and c.id_ruang=e.id_ruang and 
a.status_peminjaman='kembali' 
and c.id_jenis=f.id_jenis
order by tanggal_kembali desc ;

-- Dumping structure for view inventaris.view_pinjam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_pinjam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pinjam` AS SELECT b.id_inventaris,c.nama,e.nama_ruang,b.jumlah_pinjam,a.tanggal_pinjam,a.waktu_pinjam,a.tanggal_kembali, f.nama_jenis,
b.id_detail_pinjam, a.status_peminjaman,d.nama_pegawai, a.id_peminjaman from peminjaman a,detail_pinjam b,inventaris c, pegawai d, ruang e, jenis f where  
a.id_peminjaman=b.id_peminjaman and b.id_inventaris=c.id_inventaris and a.id_pegawai=d.id_pegawai and c.id_ruang=e.id_ruang and a.status_peminjaman='pinjam' 
and c.id_jenis=f.id_jenis
order by id_detail_pinjam ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
