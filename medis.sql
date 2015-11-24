-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2013 at 11:49 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE IF NOT EXISTS `antrian` (
  `nomor_antrian` int(5) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  PRIMARY KEY (`nomor_antrian`),
  KEY `Nama` (`Nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`nomor_antrian`, `Nama`) VALUES
(1, 'Andy Primawan'),
(2, 'Azka Ihsan Nurrahman');

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE IF NOT EXISTS `data_pasien` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `TTL` varchar(75) NOT NULL,
  `Jenis_Kelamin` varchar(2) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Golongan_Darah` varchar(2) NOT NULL,
  `Tinggi` int(4) NOT NULL,
  `Berat` int(4) NOT NULL,
  `Alamat` text NOT NULL,
  `Kontak` varchar(20) NOT NULL,
  UNIQUE KEY `ID` (`ID`),
  KEY `Nama` (`Nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`ID`, `Nama`, `TTL`, `Jenis_Kelamin`, `Status`, `Golongan_Darah`, `Tinggi`, `Berat`, `Alamat`, `Kontak`) VALUES
(1, 'Andy Primawan', 'Cimahi, 1 Januari 1993', 'L', 'Belum Menikah', 'A', 165, 56, 'Jalan Cihanjuang', '082116140829'),
(2, 'Azka Ihsan Nurrahman', 'Cimahi, 7 Februari 1993', 'L', 'Belum Menikah', 'O', 165, 58, 'Jalan Roket Raya No. A4 Sangkuriang, Cimahi', '082116140638'),
(4, 'Indra Kusuma P', 'Bali, 2 Desember 2012', 'L', 'Belum Menikah', 'O', 165, 58, 'Jalan Bali No.3', '098239210293'),
(5, 'Fajrin', 'Makasar, 20 Oktober 1993', 'L', 'Menikah', 'AB', 176, 76, 'Setia Budi', '08080808');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `Nama` varchar(50) NOT NULL,
  `Tanggal` varchar(30) NOT NULL,
  `Catatan_Kesehatan` text NOT NULL,
  PRIMARY KEY (`Nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`Nama`, `Tanggal`, `Catatan_Kesehatan`) VALUES
('Andy Primawan', '5 Oktober 2013', 'Sakit Demam'),
('Indra Kusuma P', '5 November 2013', 'Sakit Kepala Sebelah');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`Nama`) REFERENCES `data_pasien` (`Nama`);

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`Nama`) REFERENCES `data_pasien` (`Nama`);
