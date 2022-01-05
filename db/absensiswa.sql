-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 31 Jan 2018 pada 08.26
-- Versi server: 10.1.29-MariaDB
-- Versi PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2666692_gunadarma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `no` int(10) NOT NULL,
  `id_admin` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`no`, `id_admin`, `nama`, `username`, `password`, `email`) VALUES
(6, 'Adm01', 'Farhan Azra Hasibuan', 'hasibuan', 'hasibuan', 'hasibuan@yahoo.com'),
(7, 'Adm02', 'Sri Chanjarwati', 'chanjar', 'chanjar', 'srichanjarwati@yahoo.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `no` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`no`, `nama`, `email`, `message`) VALUES
(2, 'farhan', 'farhanazra02@yahoo.com', 'Good Job');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_matkul`
--

CREATE TABLE `dosen_matkul` (
  `no` int(10) NOT NULL,
  `id_dosen` varchar(8) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `hari` varchar(8) NOT NULL,
  `sesi_awal` varchar(30) NOT NULL,
  `sesi_akhir` varchar(30) NOT NULL,
  `ruang` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen_matkul`
--

INSERT INTO `dosen_matkul` (`no`, `id_dosen`, `kode_matkul`, `kode_kelas`, `hari`, `sesi_awal`, `sesi_akhir`, `ruang`) VALUES
(5, '34567321', 'M01', '3KA01', 'Selasa', 'Sesi 3, 09:30-10:30', 'Sesi 4, 10:30-11:30', 'E431'),
(7, '12345678', 'M01', '3IA02', 'Senin', 'Sesi 5, 11:30-12:30', 'Sesi 7, 13:30-14:30', 'G123'),
(9, '12345612', 'M02', '3KA02', 'Jumat', 'Sesi 9, 15:30-16:30', 'Sesi 10, 16:30-17:30', 'G411'),
(10, '12345678', 'M05', '3KA01', 'Senin', 'Sesi 1, 07:30-08:30', 'Sesi 2, 08:30-09:30', 'D123'),
(11, '12345678', 'M02', '3IA04', 'Selasa', 'Sesi 3, 09:30-10:30', 'Sesi 4, 10:30-11:30', 'D124');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forget_pass`
--

CREATE TABLE `forget_pass` (
  `no` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type_user` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forget_pass`
--

INSERT INTO `forget_pass` (`no`, `email`, `type_user`, `waktu`) VALUES
(16, 'farhanazra90@gmail.com', 'Mahasiswa', '2017-08-15 17:43:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_dosen`
--

CREATE TABLE `input_dosen` (
  `no` int(10) NOT NULL,
  `id_dosen` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input_dosen`
--

INSERT INTO `input_dosen` (`no`, `id_dosen`, `nama`, `email`, `username`, `password`) VALUES
(10, '34567321', 'M. Alfandi Hasibuan', 'user@yahoo.com', 'fandi', 'fandi'),
(11, '12345678', 'Farhan Azra Hasibuan', 'farhanazra02@yahoo.com', 'azra', 'azra'),
(12, '12345612', 'Sri Chanjarwati', 'srichanjarwati@yahoo.com', 'chanjar', 'chanjar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_mhs`
--

CREATE TABLE `input_mhs` (
  `no` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input_mhs`
--

INSERT INTO `input_mhs` (`no`, `username`, `password`, `npm`, `nama`, `kode_jurusan`, `kode_kelas`, `semester`, `email`) VALUES
(16, 'farhan', 'farhan', '13114952', 'Farhan Azra', 'J01', '3KA01', 6, 'farhanazra90@gmail.com'),
(17, 'fandi', 'fandi', '13114951', 'M. Alfandi', 'J02', '3IA01', 6, 'user@yahoo.com'),
(19, 'chanjar', 'chanjar', '13134891', 'Sri Chanjarwati', 'J01', '3KA01', 6, 'schanjarwati@gmail.com'),
(24, 'aldo', 'aldo', '34134213', 'Aldo Fernanda', 'J02', '3IA02', 6, 'user@yahoo.com'),
(25, 'Jamal', 'Jamal', '12312412', 'Jamal', 'J01', '3KA01', 6, 'user@yahoo.com'),
(26, 'jena', 'jena', '13114922', 'Jena Rede', 'J01', '3KA03', 6, 'widodocoki@yahoo.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `jurusan`) VALUES
('J01', 'Sistem Informasi'),
('J02', 'Teknik Informatika'),
('J03', 'Teknik Komputer'),
('J04', 'Sistem Komputer'),
('J05', 'Manajemen Informatika'),
('J06', 'Psikologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kelas`, `kode_jurusan`) VALUES
('3IA01', '3IA01', 'J02'),
('3IA02', '3IA02', 'J02'),
('3IA03', '3IA03', 'J02'),
('3IA04', '3IA04', 'J02'),
('3KA01', '3KA01', 'J01'),
('3KA02', '3KA02', 'J01'),
('3KA03', '3KA03', 'J01'),
('3KA04', '3KA04', 'J01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(10) NOT NULL,
  `matkul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `matkul`) VALUES
('M01', 'Matematika'),
('M02', 'Algoritma'),
('M03', 'Analisa Pemrograman'),
('M04', 'Sistem Basis Data'),
('M05', 'Sistem Berbasis Pengetahuan'),
('M06', 'Akuntansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_absen`
--

CREATE TABLE `rekap_absen` (
  `no` int(10) NOT NULL,
  `pertemuan` varchar(20) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `semester` int(2) NOT NULL,
  `id_dosen` varchar(8) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `ket_absen` varchar(10) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_absen`
--

INSERT INTO `rekap_absen` (`no`, `pertemuan`, `npm`, `nama`, `jurusan`, `kelas`, `semester`, `id_dosen`, `kode_matkul`, `ket_absen`, `waktu`) VALUES
(81, 'Pertemuan 1', '13114952', 'Farhan Azra', 'Sistem Informasi', '3KA01', 6, '34567321', 'M01', 'Hadir', 'Friday, 29-09-2017 / 04:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `dosen_matkul`
--
ALTER TABLE `dosen_matkul`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `forget_pass`
--
ALTER TABLE `forget_pass`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `input_dosen`
--
ALTER TABLE `input_dosen`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `id_dosen` (`id_dosen`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indeks untuk tabel `input_mhs`
--
ALTER TABLE `input_mhs`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indeks untuk tabel `rekap_absen`
--
ALTER TABLE `rekap_absen`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen_matkul`
--
ALTER TABLE `dosen_matkul`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `forget_pass`
--
ALTER TABLE `forget_pass`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `input_dosen`
--
ALTER TABLE `input_dosen`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `input_mhs`
--
ALTER TABLE `input_mhs`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `rekap_absen`
--
ALTER TABLE `rekap_absen`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
