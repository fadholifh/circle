-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 02:44 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecircle`
--
CREATE DATABASE IF NOT EXISTS `thecircle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thecircle`;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `nama`, `created`, `status`) VALUES
(1, 'Lowker', '2018-01-01 14:17:56', 1),
(2, 'Sharing', '2017-11-27 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `post_id`, `isi`, `waktu`, `penulis`, `status`) VALUES
(4, 1, 'bagus', '2018-01-02 09:50:00', '15111010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lowker`
--

DROP TABLE IF EXISTS `lowker`;
CREATE TABLE `lowker` (
  `lowker_id` int(11) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowker`
--

INSERT INTO `lowker` (`lowker_id`, `tipe`, `status`) VALUES
(1, 'Tidak Ada', 1),
(2, 'Internship', 1),
(3, 'FUll Time', 1),
(4, 'Part Time', 1),
(5, 'Freelance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `size` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE `notifikasi` (
  `notifikasi_id` int(11) NOT NULL,
  `penerima_id` varchar(10) NOT NULL,
  `pengirim_id` varchar(10) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`notifikasi_id`, `penerima_id`, `pengirim_id`, `isi`, `date`, `status`) VALUES
(4, '15112222', '15111112', 'lol', '2017-12-29 08:16:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `pesan_id` int(11) NOT NULL,
  `penerima_id` varchar(10) NOT NULL,
  `pengirim_id` varchar(10) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pesan_id`, `penerima_id`, `pengirim_id`, `isi`, `waktu`, `status`) VALUES
(6, '15118776', '15111112', 'apa ini?', '2017-12-29 08:16:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(255) DEFAULT 'default/logo.jpg',
  `waktu` datetime NOT NULL,
  `w_deadline` datetime NOT NULL,
  `forum_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT 'default/default.jpg',
  `penulis` varchar(40) NOT NULL,
  `gaji` int(11) NOT NULL,
  `kota_penempatan` varchar(50) NOT NULL DEFAULT '-',
  `email` varchar(50) NOT NULL DEFAULT 'a@default.com',
  `no_hp` varchar(15) NOT NULL DEFAULT '-',
  `lowker_id` int(11) NOT NULL DEFAULT '1',
  `tag_id` varchar(255) NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `judul`, `isi`, `file`, `waktu`, `w_deadline`, `forum_id`, `img`, `penulis`, `gaji`, `kota_penempatan`, `email`, `no_hp`, `lowker_id`, `tag_id`, `status`) VALUES
(1, 'Apa itu HTML', '&lt;p&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;&quot;&gt;HyperText Markup Language (&lt;/span&gt;&lt;b style=&quot;color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;&quot;&gt;HTML&lt;/b&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;&quot;&gt;) adalah sebuah bahasa markup yang digunakan untuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam sebuah Penjelajah web Internet dan formating hypertext sederhana yang ditulis kedalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang terintegerasi.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'default/logo.jpg', '2018-01-03 08:25:56', '0000-00-00 00:00:00', 2, 'default/default.jpg', '15118776', 0, '-', 'a@default.com', '-', 1, '2', 1),
(2, 'Apa itu PHP', '&lt;p&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;&quot;&gt;adalah singkatan dari &quot;PHP: Hypertext Prepocessor&quot;, yaitu bahasa pemrograman yang digunakan secara luas untuk penanganan pembuatan dan pengembangan sebuahÂ &lt;/span&gt;&lt;a href=&quot;https://id.wikipedia.org/wiki/situs_web&quot; class=&quot;extiw&quot; title=&quot;w:situs web&quot; style=&quot;color: rgb(102, 51, 102); background-image: none; background-color: rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;&quot;&gt;situs web&lt;/a&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;&quot;&gt;Â dan bisa digunakan bersamaan denganÂ &lt;/span&gt;&lt;a href=&quot;https://id.wikibooks.org/w/index.php?title=HTML&amp;action=edit&amp;redlink=1&quot; class=&quot;new&quot; title=&quot;HTML (halaman belum tersedia)&quot; style=&quot;color: rgb(165, 88, 88); background-image: none; background-color: rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;&quot;&gt;HTML&lt;/a&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;&quot;&gt;. PHP diciptakan oleh Rasmus Lerdorf pertama kali tahun 1994. Pada awalnya PHP adalah singkatan dari &quot;Personal Home Page Tools&quot;. Selanjutnya diganti menjadi FI (&quot;Forms Interpreter&quot;). Sejak versi 3.0, nama bahasa ini diubah menjadi &quot;PHP: Hypertext Prepocessor&quot; dengan singkatannya &quot;PHP&quot;. PHP versi terbaru adalah versi ke-5. Berdasarkan survey Netcraft pada bulan Desember 1999, lebih dari sejuta website menggunakan PHP, di antaranya adalah NASA, Mitsubishi, dan RedHat.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'default/logo.jpg', '2018-01-03 08:27:14', '0000-00-00 00:00:00', 2, 'default/default.jpg', '15118776', 0, '-', 'a@default.com', '-', 1, '1', 1),
(3, 'Insurance Specialist Sales ', '&lt;div class=&quot;conttop-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Industri&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Asuransi&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;clearfix&quot; style=&quot;padding: 0px; margin: 0px; clear: both;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;cont-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 20px 0px 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Jenjang Karir&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Lulusan Baru (Fresh Graduate)&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;clearfix&quot; style=&quot;padding: 0px; margin: 0px; clear: both;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;cont-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 20px 0px 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Pendidikan&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Diploma (D3)&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;clearfix&quot; style=&quot;padding: 0px; margin: 0px; clear: both;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;cont-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 20px 0px 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Gaji yang Ditawarkan&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Rp. 3 Juta - Rp. 4 Juta&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;clearfix&quot; style=&quot;padding: 0px; margin: 0px; clear: both;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;cont-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 20px 0px 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Fasilitas &amp; Tunjangan&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;BPJS Ketenagakerjaan&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;clearfix&quot; style=&quot;padding: 0px; margin: 0px; clear: both;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;cont-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 20px 0px 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Keahlian&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;-&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;clearfix&quot; style=&quot;padding: 0px; margin: 0px; clear: both;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;cont-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 20px 0px 0px; font-family: &quot;Avenir Next LT Pro Regular&quot;, arial; font-size: 14px;&quot;&gt;&lt;div class=&quot;label-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: 150px; max-width: 300px; font-weight: 700;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Ditempatkan&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;divider-jobdetail&quot; style=&quot;padding: 0px; margin: 0px 10px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;:&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;val-sal-jobdetail&quot; style=&quot;padding: 0px; margin: 0px; float: left; width: auto; max-width: 300px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;Indonesia&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;', 'default/logo.jpg', '2018-01-03 08:32:22', '2018-01-03 08:28:21', 1, 'default/default.jpg', '15118776', 3000000, 'Jakarta', 'e@examples.com', '027401231', 3, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `nama`, `status`) VALUES
(1, 'PHP', 1),
(2, 'HTML', 1),
(3, 'PHPMA', 1),
(4, 'Pekerjaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `nim` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default/no-ava.png',
  `no_hp` varchar(12) NOT NULL,
  `work` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `registered` datetime NOT NULL,
  `userg_id` int(11) NOT NULL,
  `status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `email`, `password`, `nama`, `alamat`, `tempat_lahir`, `ttl`, `img`, `no_hp`, `work`, `bio`, `registered`, `userg_id`, `status`) VALUES
('15111010', 'admin@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Alex', 'Condongcatur', 'Sleman', '1997-11-22', 'user-socialgood-icon.png', '083123485921', 'Admin', 'Super Admin :)', '2017-11-27 00:00:00', 1, 1),
('15111112', 'admin@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Alex', 'Condongcatur', 'Sleman', '1997-11-22', 'user-socialgood-icon.png', '083123485921', 'Admin', 'Super Admin :)', '2017-11-27 00:00:00', 1, 1),
('15112222', 'user@user.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Espargaro', 'Condongcatur', 'Bantul', '1997-11-08', 'default/no-ava.png', '082382132823', 'User', 'i&#039;m user', '2017-11-27 02:00:00', 1, 1),
('15118776', 'admin@logos.com', '37d84101c03fe300d4eb2b25526475ed', 'Gatau', 'gatai', 'gatai', '2017-12-26', 'user-huemanity-creative-freelance-graphic-design-startup-logo-design-by-Alex-Tass.jpg', '9283989', 'asd', 'sadasdsad', '2017-12-26 19:36:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userg`
--

DROP TABLE IF EXISTS `userg`;
CREATE TABLE `userg` (
  `userg_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `forum` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `komentar` int(11) NOT NULL,
  `lowker` int(11) NOT NULL,
  `pesan` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `userg` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userg`
--

INSERT INTO `userg` (`userg_id`, `nama`, `forum`, `post`, `tag`, `komentar`, `lowker`, `pesan`, `user`, `userg`, `status`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Useres', 0, 1, 1, 1, 0, 1, 0, 0, 1),
(3, 'lololo', 1, 1, 1, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `penulis` (`penulis`);

--
-- Indexes for table `lowker`
--
ALTER TABLE `lowker`
  ADD PRIMARY KEY (`lowker_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`notifikasi_id`),
  ADD KEY `notifikasi_ibfk_1` (`penerima_id`),
  ADD KEY `notifikasi_ibfk_2` (`pengirim_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pesan_id`),
  ADD KEY `penerima_id` (`penerima_id`),
  ADD KEY `pengirim_id` (`pengirim_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `lowker_id` (`lowker_id`),
  ADD KEY `penulis` (`penulis`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `userg_id` (`userg_id`);

--
-- Indexes for table `userg`
--
ALTER TABLE `userg`
  ADD PRIMARY KEY (`userg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lowker`
--
ALTER TABLE `lowker`
  MODIFY `lowker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `notifikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userg`
--
ALTER TABLE `userg`
  MODIFY `userg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`penulis`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`penerima_id`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`pengirim_id`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`penerima_id`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`pengirim_id`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`penulis`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`lowker_id`) REFERENCES `lowker` (`lowker_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userg_id`) REFERENCES `userg` (`userg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
