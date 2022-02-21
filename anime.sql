-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2022 pada 03.56
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anime`
--

CREATE TABLE `anime` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_anime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `durasi` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `anime`
--

INSERT INTO `anime` (`id`, `judul_anime`, `deskripsi`, `durasi`, `created_at`, `updated_at`) VALUES
(1, 'Boruto: Naruto Next Generations', 'Anime ini tidak lagi menceritakan tentang Naruto lagi sekarang menceritakan anaknya Naruto yaitu Boruto', '00:23:59', '2022-02-18 12:26:38', '2022-02-18 12:26:38'),
(2, 'One Piece', 'Anime ini menceritakan Monkey D Luffy berpetualang dilautan m untuk bisa menemukan harta karun One Piece', '00:23:54', '2022-02-18 17:13:57', '2022-02-18 17:13:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anime`
--
ALTER TABLE `anime`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
