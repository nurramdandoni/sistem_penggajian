-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2020 pada 09.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_shift` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `total_jam_lembur` int(11) NOT NULL,
  `total_insentif_lembur` double(20,2) NOT NULL,
  `status_terlambat` enum('ya','tidak') NOT NULL,
  `insentif_harian` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `nama_bonus` varchar(100) NOT NULL,
  `insentif` double(20,2) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bonus`
--

INSERT INTO `bonus` (`id`, `nama_bonus`, `insentif`, `keterangan`) VALUES
(1, 'Bonus Kehadiran', 200000.00, 'Reward Bulanan Tanpa Telat'),
(2, 'Bonus Kehadiran Harian', 8000.00, 'Reward Harian Tanpa Telat'),
(3, 'Bonus Kinerja', 300000.00, 'Berdasarkan Laporan Atasan Langsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `keterangan`) VALUES
(1, 'Biro Administrasi Akademik', 'Akademik'),
(2, 'Laboratorium Komputer', 'Labkom'),
(3, 'Pusat Pengembangan Sistem Informasi (PPSI)', 'PPSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gaji` double(20,2) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `id_jabatan`, `gaji`, `keterangan`) VALUES
(1, 1, 3200000.00, 'Pengalaman 3 Tahun'),
(2, 2, 3200000.00, 'Pengalaman 3 Tahun'),
(3, 3, 3000000.00, 'Pengalaman 3 Tahun'),
(4, 4, 2200000.00, 'Fresh Graduate'),
(5, 5, 2500000.00, 'Fresh Graduate'),
(6, 6, 2600000.00, 'Fresh Graduate'),
(7, 7, 2400000.00, 'Fresh Graduate'),
(8, 8, 2400000.00, 'Fresh Graduate'),
(9, 9, 2500000.00, 'Fresh Graduate');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `masa_jabatan` int(11) NOT NULL,
  `masa_promosi` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `id_divisi`, `nama_jabatan`, `masa_jabatan`, `masa_promosi`, `keterangan`) VALUES
(1, 1, 'Kepala BAA', 5, 3, 'Kepala'),
(2, 3, 'Kepala PPSI', 5, 3, 'kepala'),
(3, 2, 'Koordinator Laboran', 5, 3, 'Kepala'),
(4, 2, 'Laboran', 2, 0, 'Staff Laboran'),
(5, 3, 'Programmer Front End', 2, 0, 'Desain Layout Program (CSS)'),
(6, 3, 'Programmer Mobile (FullStack)', 2, 0, 'Android Studio'),
(7, 3, 'Programmer WebApps (FullStack)', 2, 0, 'Php, Javascript, HTML, JQuery'),
(8, 1, 'Staff BAA', 2, 0, 'Staff Akademik'),
(9, 3, 'System Documentation', 2, 0, 'Dokumentasi System');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `NIK` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `nama_karyawan`, `id_divisi`, `id_jabatan`, `tanggal_masuk`) VALUES
('STTB1234', 'Doni Nurramdan, A. Md.', 3, 7, '2019-12-01'),
('STTB1235', 'Muhammad Faqih, S. Kom.', 3, 6, '2020-02-05'),
('STTB1236', 'Cintiya Dewiani Putri, S. Kom.', 3, 6, '2020-01-15'),
('STTB1237', 'Titi Widaretna, S. T.', 3, 2, '2017-01-27'),
('STTB1238', 'Gia Yuliana, S. Kom.', 3, 9, '2017-01-01'),
('STTB1239', 'Andri Nugroho, S. Kom.', 3, 5, '2018-09-01'),
('STTB1240', 'Syifa Nur Fauziah, S. Kom.', 1, 1, '0000-00-00'),
('STTB1241', 'Hena Sulaeman, S. T.', 2, 3, '2017-01-01'),
('STTB1242', 'Fahri Fauzi', 2, 4, '2019-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `nama_lembur` varchar(100) NOT NULL,
  `satuan` enum('per jam','per hari') NOT NULL,
  `insentif` double(20,2) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id`, `nama_lembur`, `satuan`, `insentif`, `keterangan`) VALUES
(1, 'Lembur Hari Normal Shift 1', 'per jam', 10000.00, 'Sistem Flat'),
(2, 'Lembur Hari Normal Shift 2', 'per jam', 12000.00, 'Sistem Flat'),
(3, 'Lembur Hari Normal Shift 3', 'per jam', 15000.00, 'Sistem Flat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `nama_shift` varchar(100) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`id`, `nama_shift`, `jam_awal`, `jam_akhir`, `keterangan`) VALUES
(1, 'Shift 1', '08:00:00', '16:00:00', 'Shift Jam Kerja Normal (Senin - Jumat)'),
(2, 'Shift 2', '16:00:00', '24:00:00', 'Shift Jam Kerja Normal (Senin - Jumat)'),
(3, 'Shift 3', '24:00:00', '08:00:00', 'Shift Jam Kerja Normal (Senin - Jumat)'),
(4, 'Shift Piket 1', '08:00:00', '16:00:00', 'Shift 1 diluar Jam Kerja Normal (Sabtu - Minggu)'),
(5, 'Shift Piket 2', '16:00:00', '24:00:00', 'Shift 1 diluar Jam Kerja Normal (Sabtu - Minggu)'),
(6, 'Shift Piket 3', '24:00:00', '08:00:00', 'Shift 1 diluar Jam Kerja Normal (Sabtu - Minggu)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_shift` (`id_shift`);

--
-- Indeks untuk tabel `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
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
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
