-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_klinik.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(100) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.pasien: ~14 rows (approximately)
DELETE FROM `pasien`;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` (`id_pasien`, `no_rm`, `nama_pasien`, `nik`, `jk`, `email`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kabupaten`, `provinsi`, `kodepos`, `pekerjaan`, `updated_by`, `updated_date`) VALUES
	(1, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, '1090622', 'Adhika Bhisana', 'asd', 'Laki Laki', 'asdsad@asjdgjiadsh.com', '0812048612124', 'asdasd', '2022-06-08', 'asdasd', 'asdasd', 'asddas', 'asdasd', 'asdasd', NULL, '2022-06-09 00:00:00'),
	(3, '2090622', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', NULL, '2022-06-09 00:00:00'),
	(4, '3090622', 'argi', 'asdasd', 'Perempuan', 'asdasd@asdasd', '213123123', 'asdasd', '2022-06-06', 'asasc', 'ascasc', 'ascasc', 'ascac', 'ascasc', NULL, '2022-06-09 00:00:00'),
	(5, '4240622', 'asdasd', 'asdasd', 'Perempuan', 'rumah.ancur0@gmail.com', 'asdasd', 'asdasd', '2022-06-23', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', NULL, '2022-06-24 00:00:00'),
	(6, '5240622', 'asdasd', 'asdasd', 'Perempuan', 'rumah.ancur0@gmail.com', 'asdasd', 'asdasd', '2022-06-23', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', NULL, '2022-06-24 00:00:00'),
	(7, '6240622', 'sasa', 'asd', 'Laki Laki', 'adhika.bhisana21@gmail.com', 'asd', 'asd', '2022-06-23', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, '2022-06-24 00:00:00'),
	(8, '7240622', 'dhika', 'qeqweqwe', 'Perempuan', 'rumah.ancur0@gmail.com', 'qweqw', 'qwe', '2022-06-23', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', NULL, '2022-06-24 00:00:00'),
	(9, '8240622', 'acasc', 'sacasc', 'Laki Laki', 'rumah.ancur0@gmail.com', 'asc', 'asc', '2022-06-23', 'asc', 'asc', 'asc', 'asc', 'asc', NULL, '2022-06-24 00:00:00'),
	(10, '9240622', 'hanz', 'asdas', 'Laki Laki', 'rumah.ancur0@gmail.com', 'asdasd', 'asd', '2022-06-23', 'asdasd', 'asd', 'asd', 'asd', 'asd', NULL, '2022-06-24 00:00:00'),
	(11, '10240622', 'coz', 'asdasd', 'Laki Laki', 'adhika.bhisana@gmail.com', 'asdasd', 'asdasd', '2022-06-23', 'asdasd', 'asdasd', 'asd', 'sda', 'asd', NULL, '2022-06-24 00:00:00'),
	(12, '11240622', 'coz', 'asdasd', 'Laki Laki', 'adhika.bhisana@gmail.com', 'asdasd', 'asdasd', '2022-06-23', 'asdasd', 'asdasd', 'asd', 'sda', 'asd', NULL, '2022-06-24 00:00:00'),
	(13, '12240622', 'coz', 'asdasd', 'Laki Laki', 'adhika.bhisana@gmail.com', 'asdasd', 'asdasd', '2022-06-23', 'asdasd', 'asdasd', 'asd', 'sda', 'asd', NULL, '2022-06-24 00:00:00'),
	(14, '13240622', 'asdasd', 'asd', 'Laki Laki', 'adhika.bhisana21@gmail.com', 'asdsda', 'asdasd', '2022-06-23', 'asdasd', 'asd', 'asd', 'asd', 'asd', NULL, '2022-06-24 00:00:00');
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;

-- Dumping structure for table db_klinik.pasien_kunjungan
CREATE TABLE IF NOT EXISTS `pasien_kunjungan` (
  `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(50) DEFAULT NULL,
  `tgl_kunjungan` date DEFAULT NULL,
  `waktu_kunjungan` varchar(100) DEFAULT NULL,
  `nama_saksi` varchar(100) DEFAULT NULL,
  `hubungan` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.pasien_kunjungan: ~6 rows (approximately)
DELETE FROM `pasien_kunjungan`;
/*!40000 ALTER TABLE `pasien_kunjungan` DISABLE KEYS */;
INSERT INTO `pasien_kunjungan` (`id_kunjungan`, `no_rm`, `tgl_kunjungan`, `waktu_kunjungan`, `nama_saksi`, `hubungan`, `status`, `updated_by`, `updated_date`) VALUES
	(1, NULL, NULL, 'Malam', 'asd', 'asd', NULL, '2', '2022-06-14 00:00:00'),
	(2, '90767', '2022-06-08', 'Malam', 'awdawd', 'awddw', 'Proses', '2', '2022-06-14 00:00:00'),
	(3, '1090622', '2022-06-07', 'Malam', 'asdas', 'sad', 'Proses', '2', '2022-06-14 00:00:00'),
	(4, '1090622', '2022-06-24', 'Malam', 'ascasd', '1212', 'Batal', '2', '2022-06-14 00:00:00'),
	(5, '1090622', '2022-06-15', 'Siang', '123', '123', 'Proses', '2', '2022-06-16 00:00:00'),
	(6, '1090622', '2022-06-28', 'Malam', 'sdf', 'sdf', 'Proses', '2', '2022-06-24 00:00:00');
/*!40000 ALTER TABLE `pasien_kunjungan` ENABLE KEYS */;

-- Dumping structure for table db_klinik.penanggung_jawab
CREATE TABLE IF NOT EXISTS `penanggung_jawab` (
  `id_penanggung` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(100) DEFAULT NULL,
  `nama_penanggung` varchar(100) DEFAULT NULL,
  `hubungan` varchar(50) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_penanggung`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.penanggung_jawab: ~13 rows (approximately)
DELETE FROM `penanggung_jawab`;
/*!40000 ALTER TABLE `penanggung_jawab` DISABLE KEYS */;
INSERT INTO `penanggung_jawab` (`id_penanggung`, `no_rm`, `nama_penanggung`, `hubungan`, `jk`, `no_hp`, `tgl_lahir`, `alamat`, `updated_by`, `updated_date`) VALUES
	(1, '1090622', 'pendampingasd', 'asdasd', 'Perempuan', '0129837815263', '2022-06-08', 'asdasdasd', NULL, '2022-06-09 00:00:00'),
	(2, '2090622', '', '', '', '', '0000-00-00', '', NULL, '2022-06-09 00:00:00'),
	(3, '3090622', 'dhika', 'asdasd', 'Perempuan', '123123123', '2022-06-13', 'sdqwdqwd', NULL, '2022-06-09 00:00:00'),
	(4, '4240622', 'asd', 'asd', 'Laki Laki', 'asd', '2022-06-22', 'asd', NULL, '2022-06-24 00:00:00'),
	(5, '5240622', 'asd', 'asd', 'Laki Laki', 'asd', '2022-06-22', 'asd', NULL, '2022-06-24 00:00:00'),
	(6, '6240622', 'asd', 'asd', 'Perempuan', 'asd', '2022-06-28', 'asd', NULL, '2022-06-24 00:00:00'),
	(7, '7240622', 'asdasd', 'asdasd', 'Perempuan', 'asd', '2022-06-22', 'asd', NULL, '2022-06-24 00:00:00'),
	(8, '8240622', 'asdasd', 'asd', 'Perempuan', 'asd', '2022-06-16', 'asd', NULL, '2022-06-24 00:00:00'),
	(9, '9240622', 'asdasd', 'asdasd', 'Laki Laki', 'assad', '2022-06-23', 'asd', NULL, '2022-06-24 00:00:00'),
	(10, '10240622', 'asd', 'sad', 'Laki Laki', 'sda', '0000-00-00', 'asd', NULL, '2022-06-24 00:00:00'),
	(11, '11240622', 'asd', 'sad', 'Laki Laki', 'sda', '0000-00-00', 'asd', NULL, '2022-06-24 00:00:00'),
	(12, '12240622', 'asd', 'sad', 'Laki Laki', 'sda', '0000-00-00', 'asd', NULL, '2022-06-24 00:00:00'),
	(13, '13240622', 'asd', 'asd', 'Laki Laki', 'asd', '0000-00-00', 'asd', NULL, '2022-06-24 00:00:00');
/*!40000 ALTER TABLE `penanggung_jawab` ENABLE KEYS */;

-- Dumping structure for table db_klinik.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nm_user` varchar(100) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.users: ~14 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `no_rm`, `tanggal_lahir`, `nm_user`, `level`, `updated_by`, `updated_date`) VALUES
	(1, '123', '2022-06-09', '1', '1', '1', '2022-06-09 11:19:34'),
	(2, '1090622', '2022-06-08', 'Adhika Bhisana', NULL, NULL, '2022-06-09 00:00:00'),
	(3, '2090622', '0000-00-00', '', NULL, NULL, '2022-06-09 00:00:00'),
	(4, '3090622', '2022-06-06', 'argi', NULL, NULL, '2022-06-09 00:00:00'),
	(5, '4240622', '2022-06-23', 'asdasd', NULL, NULL, '2022-06-24 00:00:00'),
	(6, '5240622', '2022-06-23', 'asdasd', NULL, NULL, '2022-06-24 00:00:00'),
	(7, '6240622', '2022-06-23', 'sasa', NULL, NULL, '2022-06-24 00:00:00'),
	(8, '7240622', '2022-06-23', 'dhika', NULL, NULL, '2022-06-24 00:00:00'),
	(9, '8240622', '2022-06-23', 'acasc', NULL, NULL, '2022-06-24 00:00:00'),
	(10, '9240622', '2022-06-23', 'hanz', NULL, NULL, '2022-06-24 00:00:00'),
	(11, '10240622', '2022-06-23', 'coz', NULL, NULL, '2022-06-24 00:00:00'),
	(12, '11240622', '2022-06-23', 'coz', NULL, NULL, '2022-06-24 00:00:00'),
	(13, '12240622', '2022-06-23', 'coz', NULL, NULL, '2022-06-24 00:00:00'),
	(14, '13240622', '2022-06-23', 'asdasd', NULL, NULL, '2022-06-24 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
