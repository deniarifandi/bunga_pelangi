-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2024 pada 02.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunga_pelangi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_foto`
--

CREATE TABLE `tabel_foto` (
  `id` int(11) NOT NULL,
  `murid_id` int(11) DEFAULT NULL,
  `fotoagama1` varchar(255) DEFAULT NULL,
  `fotoagama2` varchar(255) DEFAULT NULL,
  `fotoagama3` varchar(255) DEFAULT NULL,
  `fotojati1` varchar(255) DEFAULT NULL,
  `fotojati2` varchar(255) DEFAULT NULL,
  `fotojati3` varchar(255) DEFAULT NULL,
  `fotoliterasi1` varchar(255) DEFAULT NULL,
  `fotoliterasi2` varchar(255) DEFAULT NULL,
  `fotoliterasi3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_foto`
--

INSERT INTO `tabel_foto` (`id`, `murid_id`, `fotoagama1`, `fotoagama2`, `fotoagama3`, `fotojati1`, `fotojati2`, `fotojati3`, `fotoliterasi1`, `fotoliterasi2`, `fotoliterasi3`) VALUES
(1, 1, 'photo_675a1af4705687.04079891.jpg', 'photo_675a1af4707691.33256002.jpg', 'photo_675a1af4707fa8.31038539.jpg', 'photo_675a1af47087a3.81092180.jpg', 'photo_675a1af4708ff8.01307448.jpg', 'photo_675a1af4709746.91421063.jpg', 'photo_675a1af4709f66.40230694.jpg', 'photo_675a1af470a7a5.45727029.jpg', 'photo_675a1af4736f51.27213113.jpg'),
(2, 2, 'photo_675a1c8c65db17.29454741.jpg', 'photo_675a1c8c661b35.74714843.', 'photo_675a1c8c661ca4.70421254.', 'photo_675a1c8c661d19.21090749.', 'photo_675a1c8c661d70.21121310.', 'photo_675a1c8c661df6.83879278.', 'photo_675a1c8c661e57.65379117.', 'photo_675a1c8c661ec6.67541215.', 'photo_675a1c8c661f35.05711812.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_foto`
--
ALTER TABLE `tabel_foto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_foto`
--
ALTER TABLE `tabel_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
