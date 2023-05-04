-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2023 pada 06.29
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `size` varchar(20) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `jenis_kelamin`, `jurusan`, `email`, `no_hp`, `foto`, `tipe`, `size`, `id`) VALUES
('3122500001', 'Ade Hafis Rabbani', 'Laki-laki', 'Teknik Informatika', 'hafis@it.student.pens.ac.id', '085830556606', 'Hafis.png', 'png', '75848', 5),
('3122500002	', 'Nadila Aulya Salsabila Mirdianti', 'Perempuan', 'Teknik Informatika', 'nadila@it.student.pens.ac.id', '081234765487', 'Nadila.png', 'png', '91509', 6),
('3122500003', 'Denti Widayati', 'Perempuan', 'Teknik Informatika', 'denti@it.student.pens.ac.id', '089523304487', 'denti.png', 'png', '73917', 7),
('3122500004	', 'Zahrotul Hidayah', 'Perempuan', 'Teknik Informatika', 'zahro@it.student.pens.ac.id', '085790342735', 'jahro.png', 'png', '94392', 8),
('3122500005', 'Gede Hari Yoga Nanda', 'Laki-laki', 'Teknik Informatika', 'gede@it.student.pens.ac.id', '083135368657', 'ari.png', 'png', '83847', 9),
('3122500006', 'Virgiawan Ivada Raksi Sekar Wibana', 'Laki-laki', 'Teknik Informatika', 'ivada@it.student.pens.ac.id', '085236113808', 'ivo.png', 'png', '84308', 10),
('3122500007	', 'Irfan Akmal Ardianto', 'Laki-laki', 'Teknik Informatika', 'irfan@it.student.pens.ac.id	', '081274340490', 'irfan.png', 'png', '73933', 11),
('3122500008	', 'Arsyita Devanaya Arianto', 'Perempuan', 'Teknik Informatika', 'arsyi@it.student.pens.ac.id', '085171620044	', 'DSC_9900 34.jpg', 'jpg', '84018', 12),
('3122500009', 'Mirta Chadhirotin Nachlah', 'Perempuan', 'Teknik Informatika', 'mirtha@it.student.pens.ac.id', '089603443665', 'mirtha.png', 'png', '88408', 13),
('3122500010	', 'Leody Zelvon Herliansa', 'Laki-laki', 'Teknik Informatika', 'leody@it.student.pens.ac.id', '081331571335', 'leo.png', 'png', '77125', 14),
('3122500011', 'Ali Azhar Pradana Braveian', 'Laki-laki', 'Teknik Informatika', 'ali@it.student.pens.ac.id', '0895360141561', 'ali.png', 'png', '97171', 15),
('3122500012', 'Awal Raya', 'Laki-laki', 'Teknik Informatika', 'awal@it.student.pens.ac.id', '081359200521', 'awal.png', 'png', '97100', 16),
('3122500013	', 'Mahendra Khibrah Rabbani Sayyid', 'Laki-laki', 'Teknik Informatika', 'khibrah@it.student.pens.ac.id', '08817934297', 'mahendra.png', 'png', '95819', 17),
('3122500014', 'Muhammad Iqbal Rahmatullah', 'Laki-laki', 'Teknik Informatika', 'iqbal@it.student.pens.ac.id', '081231685459', 'iqbal.png', 'png', '72019', 18),
('3122500015', 'Mayada Azizah	', 'Perempuan', 'Teknik Informatika', 'mayada@it.student.pens.ac.id	', '081359049794', 'mayada.png', 'png', '95200', 19),
('3122500016', 'Gandi Rukmaning Ayu', 'Perempuan', 'Teknik Informatika', 'gandi@it.student.pens.ac.id', '083857864688', 'gandi.png', 'png', '91727', 20),
('3122500017', 'Handaru Dwiki Yuntara', 'Perempuan', 'Teknik Informatika', 'yuntara@it.student.pens.ac.id', '083848439262', 'handaru.png', 'png', '61657', 21),
('3122500018	', 'Adam Rasyid Nurmuhammad	', 'Laki-laki', 'Teknik Informatika', 'adam@it.student.pens.ac.id', '08996086746', 'adam.png', 'png', '72288', 22),
('3122500019', 'Akmal Zidani Fikri', 'Laki-laki', 'Teknik Informatika', 'akmal@it.student.pens.ac.id', '087703133145', 'akmal.png', 'png', '89434', 23),
('3122500020	', 'Adinda Zahra Qariru', 'Perempuan', 'Teknik Informatika', 'adinda@it.student.pens.ac.id', '081297901397	', 'dinda.png', 'png', '83205', 24),
('3122500021', 'Mohammad Ilham Ramadani', 'Laki-laki', 'Teknik Informatika', 'ilham@it.student.pens.ac.id', '089699609041', 'ilham.png', 'png', '92242', 25),
('3122500022	', 'Virginia Faiqoh', 'Perempuan', 'Teknik Informatika', 'virginia@it.student.pens.ac.id', '089515888419', 'pira.png', 'png', '61420', 26),
('3122500023', 'Masyitha Fahra Nabila', 'Perempuan', 'Teknik Informatika', 'masyita@it.student.pens.ac.id	', '081216756463	', 'masita.png', 'png', '100348', 27),
('3122500024', 'Muhamad Reza Muktasib', 'Laki-laki', 'Teknik Informatika', 'reza@it.student.pens.ac.id', '085649915406	', 'reza.png', 'png', '82542', 28),
('3122500025', 'Adira Callysta', 'Perempuan', 'Teknik Informatika', 'adira@it.student.pens.ac.id', '085716039986	', 'adira.png', 'png', '75021', 29),
('3122500026', 'Shofira Izza Nurrohmah', 'Perempuan', 'Teknik Informatika', 'sofira@it.student.pens.ac.id	', '085608295984', 'shopie.png', 'png', '75677', 30),
('3122500027	', 'Rifqi Rayita Dhiyaulhaq	', 'Laki-laki', 'Teknik Informatika', 'rifki@it.student.pens.ac.id', '085746335238', 'rifki.png', 'png', '74729', 31),
('3122500028	', 'Bagus Bimo Prakoso', 'Laki-laki', 'Teknik Informatika', 'bimo@it.student.pens.ac.id', '085645494404', 'bimo.png', 'png', '105344', 32),
('3122500030', 'Muhammad Syahrul Ramadhan', 'Laki-laki', 'Teknik Informatika', 'sahrul@it.student.pens.ac.id', '08986367472', 'sahrul.png', 'png', '81976', 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pswd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pswd`) VALUES
(1, 'arsyitadevanaya@gmail.com', '$2y$10$COGteFeBeRMhVKLkTb004.0CN.vnCCwUFQD/Ospk6GU45EPxQ3WGi'),
(2, 'ariantoachmad2@gmail.com', '$2y$10$b1WSmjdtojAH6mW.L5TVSOWzBLL08.K7p4jWqGYg8RKlZUfaq/7Ci'),
(4, 'arsyitadevanaya20@it.student.pens.ac.id', '$2y$10$aNu4xRlYoAhHE8zSwns0k.wa6jqYM0d2HW3zTfClngPYXh1y8e22O');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
