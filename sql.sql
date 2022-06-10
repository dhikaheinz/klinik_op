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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.pasien: ~3 rows (approximately)
DELETE FROM `pasien`;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` (`id_pasien`, `no_rm`, `nama_pasien`, `nik`, `jk`, `email`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kabupaten`, `provinsi`, `kodepos`, `pekerjaan`, `updated_by`, `updated_date`) VALUES
	(1, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, '1090622', 'Adhika Bhisana', 'asd', 'Laki Laki', 'asdsad@asjdgjiadsh.com', '0812048612124', 'asdasd', '2022-06-08', 'asdasd', 'asdasd', 'asddas', 'asdasd', 'asdasd', NULL, '2022-06-09 00:00:00'),
	(3, '2090622', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', NULL, '2022-06-09 00:00:00'),
	(4, '3090622', 'argi', 'asdasd', 'Perempuan', 'asdasd@asdasd', '213123123', 'asdasd', '2022-06-06', 'asasc', 'ascasc', 'ascasc', 'ascac', 'ascasc', NULL, '2022-06-09 00:00:00');
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.penanggung_jawab: ~2 rows (approximately)
DELETE FROM `penanggung_jawab`;
/*!40000 ALTER TABLE `penanggung_jawab` DISABLE KEYS */;
INSERT INTO `penanggung_jawab` (`id_penanggung`, `no_rm`, `nama_penanggung`, `hubungan`, `jk`, `no_hp`, `tgl_lahir`, `alamat`, `updated_by`, `updated_date`) VALUES
	(1, '1090622', 'pendampingasd', 'asdasd', 'Perempuan', '0129837815263', '2022-06-08', 'asdasdasd', NULL, '2022-06-09 00:00:00'),
	(2, '2090622', '', '', '', '', '0000-00-00', '', NULL, '2022-06-09 00:00:00'),
	(3, '3090622', 'dhika', 'asdasd', 'Perempuan', '123123123', '2022-06-13', 'sdqwdqwd', NULL, '2022-06-09 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_klinik.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `no_rm`, `tanggal_lahir`, `nm_user`, `level`, `updated_by`, `updated_date`) VALUES
	(1, '123', '2022-06-09', '1', '1', '1', '2022-06-09 11:19:34'),
	(2, '1090622', '2022-06-08', 'Adhika Bhisana', NULL, NULL, '2022-06-09 00:00:00'),
	(3, '2090622', '0000-00-00', '', NULL, NULL, '2022-06-09 00:00:00'),
	(4, '3090622', '2022-06-06', 'argi', NULL, NULL, '2022-06-09 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
