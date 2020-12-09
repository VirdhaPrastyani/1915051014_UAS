-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Des 2020 pada 09.18
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_latihan6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_admin` int(4) NOT NULL,
  `useradmin` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_admin`, `useradmin`, `password`) VALUES
(1234, 'virdha@undiksha.ac.id', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
`id` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `resseler` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dikonfirmasi` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `produk`, `resseler`, `jumlah`, `dikonfirmasi`) VALUES
(20, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `gambar_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `harga_beli`, `harga_jual`, `stok`, `gambar_produk`) VALUES
(1, 'Beras Maknyus', 'Banyak Protein', 50000, 70000, 10, '664-beras.jpg'),
(4, 'Gulaku', 'Gula tebu asli', 15000, 25000, 15, '455-gulaku.jpg'),
(5, 'Pepsodent', 'Gigimu menjadi putih', 6000, 8000, 20, '491-pepsodent.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reseller`
--

CREATE TABLE IF NOT EXISTS `reseller` (
`id` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `reseller`
--

INSERT INTO `reseller` (`id`, `username`, `password`) VALUES
(1, 'jepri@gmail.com', '123'),
(2, 'widya@gmail.com', '123'),
(3, 'zasya@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`id`), ADD KEY `pesanan_produk` (`produk`), ADD KEY `pesanan_resseler` (`resseler`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
ADD CONSTRAINT `pesanan_produk` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`),
ADD CONSTRAINT `pesanan_resseler` FOREIGN KEY (`resseler`) REFERENCES `reseller` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
