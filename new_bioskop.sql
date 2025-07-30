-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 05:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`) VALUES
(7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `nama`, `jenis`, `nomor`) VALUES
(1, 'Coz', 'Dana', '08123456789'),
(2, 'Coz', 'Gopay', '08123456789'),
(3, 'Coz', 'Ovo', '08123456789'),
(4, 'Gloxinia', 'BCA', '72268535'),
(5, 'Coz', 'BRI', '324252687625535');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(8) NOT NULL,
  `gambar` blob NOT NULL,
  `judul` varchar(30) NOT NULL,
  `sinopsis` text NOT NULL,
  `director` varchar(100) NOT NULL,
  `aktor` varchar(100) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `bahasa` varchar(30) NOT NULL,
  `subtitle` varchar(30) NOT NULL,
  `kategori_id` int(4) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `gambar`, `judul`, `sinopsis`, `director`, `aktor`, `durasi`, `bahasa`, `subtitle`, `kategori_id`, `harga`) VALUES
(1, 0x61376636652d626c61646572756e6e65722e6a7067, 'Blade Runner 2049', 'Film Blade Runner 2049 menceritakan tentang K, seorang petugas dari Departemen Kepolisian Los Angeles, yang mengungkap sebuah rahasia. Ia pergi mencari mantan blade runner yang telah hilang selama lebih dari tiga dekade.', 'Denis Ville', 'Jared Telo', '115 Menit', 'Inggris', 'English', 1002, 'Rp25000'),
(2, 0x32393764652d67656f73746f726d2e6a7067, 'Geostrom', 'Pada tahun 2017, bencana alam kerap kali terjadi di seluruh dunia. Hal ini mengakibatkan seluruh negara di dunia mulai membentuk koalisi untuk merancang sebuah satelit besar yang berguna untuk mengatur klimatologi bernama Dutch Boy. Satelit ini bisa mengatur cuaca dan mengendalikannya dengan cepat.', 'Dea Devlin', 'Ed Haris', '109 Menit', 'UK', 'Indonesia', 1031, 'Rp30000'),
(3, 0x36633663392d6864642d6e65772e706e67, 'Happy Death Day', 'Seorang mahasiswa harus menghidupkan kembali hari pembunuhannya berulang kali, dalam lingkaran yang hanya akan berakhir ketika dia menemukan identitas pembunuhnya.', 'Scott Lopbell', 'Jessica Rothe', '96 Menit', 'English', 'Indonesia', 1021, 'Rp25000'),
(4, 0x4f6e6570696563652e6a706567, 'One Piece Film: Red', 'Untuk pertama kalinya, Uta - penyanyi paling dicintai di dunia - akan mengungkapkan dirinya kepada dunia dalam sebuah konser live. Suara yang telah ditunggu-tunggu oleh seluruh dunia akan segera bergema.', 'Goro Taniguchi', 'Mayumi Tanaka(voice), Kazuya Nakai(voice), Akemi Okamura(voice).', '115 Menit', 'Japan', 'Indonesia', 1031, 'Rp50000'),
(5, 0x616c692e6a7067, 'Ali & Ratu Ratu Queens', 'Setelah ayahnya meninggal, seorang remaja berangkat ke New York untuk mencari ibunya yang terasing dan segera menemukan cinta dan hubungan di tempat yang tak terduga.', 'Lucky Kuswandi', 'Iqbaal Dhiafakhri Ramadhan, Aurora Ribero, Nirina Zubir', '100 Menit', 'Indonesia', '', 1014, 'Rp20000'),
(6, 0x6a6b7476736562642e6a706567, 'Jakarta vs Everybody', 'Dom, seorang remaja yang sedang mencari jati diri, mencoba segala cara untuk mencapai mimpinya sebagai seorang aktor di Jakarta. Setelah serangkaian audisi yang gagal, Dom bertemu Radit dan Pinkan, seorang pasangan muda yang memberikannya pekerjaan. Menggunakan keterampilan aktingnya untuk berperan sebagai karakter yang berbeda, Dom terjemus dalam dunia hitam.', 'Ertanto Robby Soediskam', 'Jefri Nichol, Wulan Guritno, Dea Panendra, Ganindra Bimo', '102 Menit', 'Indonesia', '', 1014, 'Rp20000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(4) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1001, 'Romance'),
(1002, 'Documentary'),
(1003, 'Comedy'),
(1005, 'Crime'),
(1012, 'Horor'),
(1014, 'Drama'),
(1021, 'Thriller'),
(1031, 'Action'),
(1039, 'Sci-fi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(8) NOT NULL,
  `kategori_id` int(4) NOT NULL,
  `bayar_id` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `film_id`, `kategori_id`, `bayar_id`, `total`, `tanggal`) VALUES
(37, 8, 2, 1031, 4, 'Rp30000', '2022-12-17'),
(45, 8, 3, 1031, 4, 'Rp30000', '2022-12-16'),
(46, 8, 5, 1014, 2, 'Rp20000', '2022-12-17'),
(47, 8, 4, 1031, 4, 'Rp50000', '2022-12-17'),
(48, 8, 6, 1014, 1, 'Rp20000', '2022-12-17'),
(49, 7, 3, 1021, 2, 'Rp25000', '2022-12-15'),
(52, 7, 4, 1031, 4, 'Rp50000', '2022-12-18'),
(59, 7, 6, 1031, 4, 'Rp20000', '2022-12-15'),
(60, 7, 5, 1031, 5, 'Rp20000', '2022-12-18'),
(61, 24, 4, 1031, 2, 'Rp50000', '2023-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `admin_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `tipe`, `admin_id`) VALUES
(7, 'Coz', 'pedioccos76@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 0),
(8, 'Gloxinia', 'gloxinia12@gmail.com', 'gloxinia', '94408ce756e3337d068199fa0398a27512aa0148', '', 0),
(21, 'user', 'user@gmail.com', 'user', '8fb5cfe922674e0f9faa46a92716f66bd67ad344', '', 0),
(22, 'Queen', 'queen45@gmail.com', 'queen', '1e24db22dda19316ce8d1e050b94d9d231938d64', '', 0),
(23, 'aaaaaa', 'lalallala@gmail.com', 'aaaaaa', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', 0),
(24, 'naomi', 'naomiyy@gmail.com', 'naomi123', '59e7e7d8546e1fd19e0345f36b482706e4560882', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_kategori` (`kategori_id`),
  ADD KEY `kategori` (`kategori_id`),
  ADD KEY `kd_kategori_2` (`kategori_id`),
  ADD KEY `kd_kategori_3` (`kategori_id`),
  ADD KEY `kategori_2` (`kategori_id`),
  ADD KEY `kd_kategori_4` (`kategori_id`),
  ADD KEY `kd_kategori_5` (`kategori_id`),
  ADD KEY `kategori_3` (`kategori_id`),
  ADD KEY `kategori_4` (`kategori_id`),
  ADD KEY `kategori_5` (`kategori_id`),
  ADD KEY `kd_kategori_6` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bayar_id` (`bayar_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `bayar_id` FOREIGN KEY (`bayar_id`) REFERENCES `bayar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
