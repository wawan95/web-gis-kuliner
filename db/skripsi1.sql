-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 11:31 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(85) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(2, 'administrator', 'administrator', '$2y$12$NNtn2OaZcjo1rEhEfFPFT.oaoQ6aJpF2dSfmY095qG.BHz4P69sw6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Rumah Makanan'),
(2, 'Restoran'),
(3, 'Oleh - Oleh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kuliner`
--

CREATE TABLE IF NOT EXISTS `tbl_kuliner` (
  `id_kuliner` int(5) NOT NULL,
  `nama_kuliner` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `images` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kuliner`
--

INSERT INTO `tbl_kuliner` (`id_kuliner`, `nama_kuliner`, `id_kategori`, `alamat`, `images`, `keterangan`, `lat`, `lng`) VALUES
(5, 'Soto Pak Denuh', 1, 'Jl. AKBP Agil Kusumadya, Jatikulon Krajan, Jati Kulon, Kec. Jati, Kabupaten Kudus', 'pakdenuh.jpg', 'Soto Kudus Pak Danuh ini letaknya berada di jalan R.Agil Kusumadya dekat perempatan RS.Mardi Rahayu layak menyambut kedatangan kita. Disajikan di mangkuk mungil yang porsinya pas di perut. Pelengkapnya juga ada sate telur puyuh, kripik paru, dan krupuk kulit.', -6.827528342029693, 110.83194728220906),
(6, 'Garuda Restoran', 2, 'jl.jendral sudirman no 1 barongan kudus', 'DSC_0630.JPG', 'Resto Garuda itu satu di antara resto legendaris di Kudus, dan terkenal dengan sajian makanan yang enak sekali', -6.8071873999999974, 110.8429372647239),
(7, 'Jenang Mubarok', 3, 'Jl. Sunan Muria No.33, Glantengan, Kota Kudus, Kabupaten Kudus', 'jenang_mubarok1.JPG', 'Jenang Kudus adalah makanan khas Indonesia. Terbuat dari bahan alami dan pilihan (tepung beras ketan, santan kelapa, gula,dll), diproses secara modern & Higienis dibawah pengawasan tenaga ahli berpengalaman. Memiliki rasa yang lezat dan bergizi serta tidak diragukan lagi mutunya. Cocok untuk dihidangkan pada acara resmi maupun santai serta cocok oleh-oleh maupun bingkisan.', -6.802609999999986, 110.84394500000008),
(8, 'Soto Kudus Bu Jatmi', 1, 'Jalan Wahid Hasyim No.43, Kota Kudus, Panjunan, Kota Kudus, Kabupaten Kudus', 'sotobujatmi.jpg', 'Soto bujatmi', -6.811197724138076, 110.83808012361942),
(9, 'Soto Kudus Pak Ramijan', 1, 'Jalan Kudus-Jepara No.79A, Bakalan Krapyak,Kaliwungu, Kabupaten Kudus', 'sotokuduspakramidjan.jpg', 'Daging kerbau memang menjadi kekhasan soto kudus. Ini pula yang tidak dimiliki daerah lain yang biasanya menggunakan daging ayam atau daging sapi sebagai isian soto.', -6.8024906, 110.8261336),
(10, 'RM Sari Rasa', 1, 'Jl. Raya Agil Kusumadya No.20, Jati Kulon, Jati, Kabupaten Kudus', 'garang-asem_20170910_095335.jpg', 'garang asem RM Sari Rasa', -6.8231533, 110.8348022),
(11, 'Ulam Sari Resto', 2, 'jl.Museum kretek No.10 Getas Pejaten Jati ,kudus', 'ulamsari.JPG', 'ulam sari resto', -6.826534, 110.836631),
(12, 'RM. Wani Piro', 1, 'Jl. Museum Kretek No.9 Getas Pejaten Jati, Kudus', 'WaniPiro.JPG', 'Tempat yg cocok untuk bersante sambil menikmati masakan gudeg di kota kudus.', -6.8268461, 110.8361134);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kuliner`
--
ALTER TABLE `tbl_kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kuliner`
--
ALTER TABLE `tbl_kuliner`
  MODIFY `id_kuliner` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
