-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 03:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `stock`, `image`, `deskripsi`, `category_id`) VALUES
(1, 'Belajar Berhitung', 100, 'book.jpg', 'buku mengenai pembelajaran untuk tingkat Sekolah dasar', 1),
(2, 'Belajar aljabar', 100, 'book.jpg', 'buku mengenai pembelajaran untuk tingkat Sekolah Menengah Atas', 1),
(3, 'Anatomi Tumbuhan', 100, 'book.jpg', 'buku mengenai pembelajaran untuk tingkat Sekolah Menengah Pertama', 3),
(4, 'Anatomi Hewan', 150, 'book.jpg', 'buku mengenai pembelajaran untuk tingkat Sekolah Menengah Pertama', 3),
(5, 'Buku teks mahir berbahasa indonesia', 50, 'book.jpg', 'buku mengenai pembelajaran bahasa indonesia', 2),
(6, 'Buku teks esps berbahasa indonesia', 50, 'book.jpg', 'buku mengenai pembelajaran bahasa indonesia', 2),
(7, 'nama nama binatang', 50, '394751660_download.jpg', 'nama nama binatang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Biologi'),
(4, 'Fisika'),
(5, 'Kimia'),
(6, 'Administrasi'),
(7, 'Algoritma Dasar'),
(8, 'Geologi'),
(9, 'Pendidikan Kewarganegaraan'),
(10, 'Sosiologi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
