-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 03:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praba`
--

-- --------------------------------------------------------

--
-- Table structure for table `elmahdi`
--

CREATE TABLE `elmahdi` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elmahdi`
--

INSERT INTO `elmahdi` (`id_pembeli`, `nama`, `alamat`, `hp`, `tgl_transaksi`, `jenis_barang`, `nama_barang`, `jumlah`, `harga`) VALUES
(1, 'Praba', 'Serang', '6', '2022-11-22', 'Pakaian', 'Celana Jeans', 5, 150000),
(69, 'riyan', 'cibubur', '123234345', '2022-11-11', 'Makanan', 'Hewan', 90, 150000),
(345, 'Garpu', 'Jogja', '786', '2022-11-12', 'tes', 'tes', 5, 80000),
(6969, 'arya', 'cibubur', '0623164979', '1050-02-13', 'tes', 'Hewan', 69, 690000),
(76543, 'ayam', 'Cilegon', '7897894325', '2022-11-11', 'Makanan', 'Geprek Meracau', 56, 80),
(342314525, 'gugu', 'unknownnnnn', '90909090', '2022-11-10', 'Makanan', 'Steak', 90, 87000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'arta', 'erte', 'high@gmail.com', '12341234'),
(2, 'eL', 'rete', 'praba.elmahdi@gmail.com', '$2y$10$XQKL42i9FiTsx./vaTfnD.sBAgF5rtoiauqD9uZLTtfxKxO0pun96'),
(3, 'gugu', 'bass.bujell', 'praba.arya.elmahdi.tik21@mhsw.pnj.ac.id', '$2y$10$v0v7ySZBXlCi.Ej3kSCdNOmbw3IH9hvLEqJyY9j1l7UaCTzfD14/G'),
(4, 'arya', 'arya', 'arya@gmail.com', '$2y$10$nczVNucwJCn1B5NHxpScJeSEQdOHYwCMjeofduaF038hMXKKZPVk.'),
(5, 'gustova', 'gustova', 'arya@gmail.com', '$2y$10$OxBKQdjZjZrA6kXqfJuM6OE.ErKaAQvLXiY9ogcHGeYdnwGOOCqka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elmahdi`
--
ALTER TABLE `elmahdi`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
