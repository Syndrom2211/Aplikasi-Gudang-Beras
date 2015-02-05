-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2014 at 08:49 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.2-1ubuntu4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gudangberas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beras`
--

CREATE TABLE IF NOT EXISTS `jenis_beras` (
  `kd_jenisberas` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jenisberas` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jenisberas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `jenis_beras`
--

INSERT INTO `jenis_beras` (`kd_jenisberas`, `nama_jenisberas`) VALUES
(15, 'Kemudi Special'),
(14, 'Sekoci Super'),
(13, 'Beras 69'),
(17, 'Pandan Wangi'),
(18, 'Sentra Ramos'),
(21, 'Sekoci Super'),
(20, 'Beras C4'),
(22, 'Beras Alwi'),
(32, 'Beras Vietnam'),
(31, 'Beras Berkualitas123');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `kd_pelanggan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(60) NOT NULL,
  `alamat_pelanggan` varchar(70) NOT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`) VALUES
(5, 'Ridwan Hawafi Zakaria', 'Bogor', '08766453632'),
(4, 'Aditya Irwansyah', 'Jakarta', '0857764893'),
(6, 'Roby Fadillah', 'Jakarta', '0876645363'),
(7, 'Olan', 'Pekanbaru', '08877367342'),
(8, 'Mako Yasugahira Tanaka', 'Japanese', '0322884963'),
(9, 'Fachri Muhammad', 'Sulawesi Selatan', '08667654'),
(10, 'Rangga Rentya', 'Surabaya', '0877635262'),
(11, 'Vatica Kainama', 'Kalimantan Barat', '08977652728'),
(12, 'Umar Fadhlurrachman', 'Aceh', '0876645373'),
(13, 'Izzati Nabilah', 'Malaysia', '0859947364'),
(17, 'Insani Anisa', 'Margahayu', '0876647859');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
  `kd_pemasok` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pemasok` varchar(60) NOT NULL,
  `alamat_pemasok` varchar(70) NOT NULL,
  `telepon_pemasok` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_pemasok`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`kd_pemasok`, `nama_pemasok`, `alamat_pemasok`, `telepon_pemasok`) VALUES
(4, 'PT. Fajar Deli Utama', 'JL. Dagaan No. 18-C Medan', '08766373627'),
(5, 'PT. Yamika Arbis', 'JL. Budi Kemakmuran No.8 Medan', '087736355274'),
(6, 'PT. Saudara Pratama', 'JL. Sutomo No.226 Medan', '08897746365'),
(7, 'PT. Beras Madju Jaya', 'JL. Kukusan Raya No.62B', '087665383726'),
(9, 'PT. Beras Sejati', 'JL. Budiluhur Jati No.87 Jateng', '0866473644'),
(12, 'PT. Budi Daya Sentosa', 'JL. Cendrawasih 3 No.46', '08876645365');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `no_order` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(11) NOT NULL,
  `kd_pemasok` varchar(10) NOT NULL,
  `kd_jenisberas` varchar(30) NOT NULL,
  `jml_pengadaan` int(30) NOT NULL,
  `kd_satuan` varchar(10) NOT NULL,
  `limit_persediaan` int(30) NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `yg_menyerahkan` varchar(50) NOT NULL,
  PRIMARY KEY (`no_order`),
  UNIQUE KEY `kode_pemasok` (`kd_pemasok`,`kd_jenisberas`,`kd_satuan`,`saldo_akhir`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `pengadaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `no_order` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(11) NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `kd_jenisberas` varchar(30) NOT NULL,
  `jml_pengeluaran` int(30) NOT NULL,
  `kd_satuan` varchar(10) NOT NULL,
  `limit_persediaan` int(30) NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `yg_mengambil` varchar(50) NOT NULL,
  PRIMARY KEY (`no_order`),
  UNIQUE KEY `kode_peanggan` (`kd_pelanggan`,`kd_jenisberas`,`kd_satuan`,`limit_persediaan`,`saldo_akhir`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pengeluaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jenisberas` varchar(11) NOT NULL,
  `kd_pemasok` varchar(10) NOT NULL,
  `kd_pelanggan` varchar(11) NOT NULL,
  `saldo` int(30) NOT NULL,
  `tgl_stock_opname` varchar(11) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `limit_persediaan` int(50) NOT NULL,
  `kd_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `kd_jenisberas`, `kd_pemasok`, `kd_pelanggan`, `saldo`, `tgl_stock_opname`, `tanggal`, `limit_persediaan`, `kd_satuan`) VALUES
(64, '13', '6', '', 3000, '06-03-2014', '06-03-2014', 87777, '20');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `kd_satuan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_satuan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`kd_satuan`, `nama_satuan`) VALUES
(20, '50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(30) NOT NULL,
  `level` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `no_telepon`, `level`) VALUES
(0, 'firdam', '090a5385bb6a5aeaecd67a95bfa3daf3837702f2', 'tes123@yahoo.com', '085798160154', 'user'),
(9, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'jenovasystem@ymail.com', '081320118244', 'admin'),
(15, 'rani', '70e0294c86cf544230a9e9ba8d474d01a5a1e2a4', 'rani123@yahoo.com', '087665473837', 'user');
