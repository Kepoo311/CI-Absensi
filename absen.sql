-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2023 pada 04.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `status_absen` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_absensi`
--

INSERT INTO `data_absensi` (`id`, `kelas`, `tanggal`, `nama_guru`, `status_absen`, `keterangan`) VALUES
(9, 'XII AKL 1', '2023-08-07', 'Maryanah, S.Pd.', 'Hadir', ''),
(10, 'XII AKL 1', '2023-08-07', 'Dzuli Kamala, M.Pd.I', 'Sakit', 'Sakit Kepala'),
(11, 'XII AKL 1', '2023-08-07', 'Hj. Zahria Hadiyati, S.Pd', 'Ijin', 'Keluar Kota'),
(12, 'XII AKL 1', '2023-08-07', 'Diah Indri Safitri, S.Pd', 'Alpa', ''),
(19, 'XII AKL 2', '2023-08-14', 'Sumiyati, S.Pd', 'Hadir', ''),
(20, 'XII AKL 2', '2023-08-14', 'Yunita Sari, S.Pd', 'Alpa', ''),
(22, 'XII AKL 1', '2023-08-14', 'Maryanah, S.Pd.', 'Hadir', ''),
(24, 'XII AKL 1', '2023-08-14', 'Hj. Zahria Hadiyati, S.Pd', 'Alpa', ''),
(25, 'XII AKL 1', '2023-08-14', 'Diah Indri Safitri, S.Pd', 'Ijin', 'Keluar Kota'),
(29, 'XII AKL 3', '2023-08-14', 'Dina Sundari, S.Pd', 'Hadir', ''),
(30, 'XII AKL 3', '2023-08-14', 'Cucu Herlina S.Pd', 'Sakit', ''),
(31, 'XII AKL 3', '2023-08-14', 'Dzuli Kamala, M.Pd.I', 'Hadir', ''),
(36, 'XII AKL 4', '2023-08-14', 'Agustina Damayanti, S.Pd', 'Alpa', ''),
(37, 'XII AKL 4', '2023-08-14', 'Ngatimin, S.E', 'Hadir', ''),
(41, 'XII AKL 5', '2023-08-14', 'Putri Ayu Eka Ramadhani, S.Pd, M,Pd', 'Alpa', ''),
(43, 'XII AKL 5', '2023-08-14', 'Martalinda, S.Pd', 'Hadir', ''),
(44, 'XII AKL 2', '2023-08-15', 'Sukmawati, S.Pd.', 'Hadir', ''),
(45, 'XII AKL 2', '2023-08-15', 'Martono, S.E', 'Sakit', ''),
(46, 'XII AKL 2', '2023-08-15', 'Maryanah, S.Pd.', 'Ijin', 'Keluar Kota'),
(47, 'XII AKL 1', '2023-08-15', 'Putri Ayu Eka Ramadhani, S.Pd, M,Pd', 'Hadir', ''),
(48, 'XII AKL 1', '2023-08-15', 'Agustina Damayanti, S.Pd', 'Hadir', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`) VALUES
(1, 'Hj. Dewi Ningsih, S.Pd.,M.Pd'),
(2, 'Drs. Ismatullah'),
(3, 'Dzuli Kamala, M.Pd.I'),
(4, 'Asvedia S.Pd.I'),
(5, 'Rina Wati, S.Ag'),
(6, 'Nur Fadillah, S.Pd.I'),
(7, 'Muflihin, S.Pd.'),
(8, 'Achmad Bismar W, S.Pd.I'),
(9, 'Dwipa Fredy Putri, M.Pd.'),
(10, 'Mas Azizah, M.Pd'),
(11, 'Ricadesta Amalia S.Pd'),
(12, 'Erfika Kumalasari, M.Pd'),
(13, 'Yuli Mulyawati, S.Pd'),
(14, 'Corry Lusia Sinaga S.E'),
(15, 'Handayani, M.Pd'),
(16, 'Diah Indri Safitri, S.Pd'),
(17, 'Gina Anggriana, S.Pd'),
(18, 'Santi Noviyana, S.Pd'),
(19, 'Carina Aurelia, S.Pd'),
(20, 'Chandra Kusuma, M.Pd'),
(21, 'Resliky Thofan D, S.Pd'),
(22, 'Andhita Marcelia, S.Pd'),
(23, 'Tiara Elifia Rista, S.Pd'),
(24, 'Dra. Sri Wahyuni, M.M'),
(25, 'Dra. Hj. Ernita Wati'),
(26, 'Hj. Zahria Hadiyati, S.Pd'),
(27, 'Novilia S.Pd'),
(28, 'Marlena S.Pd.'),
(29, 'Risfalidah, M.Pd.'),
(30, 'Nurjanah, M.Pd.'),
(31, 'Dina Mariyanti S, S.Pd'),
(32, 'Cucu Herlina S.Pd'),
(33, 'Utari Rezki, S.Pd'),
(34, 'Murniyati, S.Pd'),
(35, 'Citra Haningtyas, S.Pd'),
(36, 'Heni Ayu Pertiwi, S.Si'),
(37, 'Sandria Febrianti, S.Si'),
(38, 'Anita Tri Setiani, S.Pd'),
(39, 'Meri Susanti, M.Pd'),
(40, 'Citra Rafika Utari, S Pd'),
(41, 'Sulasmi, S Pd. M M'),
(42, 'Wayan Sukanta M.Pd'),
(43, 'Dicky Sapto Tejo, S.Pd'),
(44, 'Sukmawati, S.Pd.'),
(45, 'Nuril Astuti, S.Pd'),
(46, 'Nani Kurniaty, S.Pd'),
(47, 'Martalinda, S.Pd'),
(48, 'Dra. Rez Nurlela'),
(49, 'Wita Asiyah, S.Pd'),
(50, 'Trisna Asili Bhawantu, S.Pd'),
(51, 'Nelda Susanti, S.Pd'),
(52, 'Darmala Sari, S.Pd'),
(53, 'Yesi Puspitasari, S.Pd'),
(54, 'Alekka Hermawan, S.Pd'),
(55, 'Yuli Seti Purwaningsih, S.Pd'),
(56, 'Indri Julianti Afnil, S.Pd'),
(57, 'Ahmad Gempar, S.Pd'),
(58, 'Wiranti Kusparwati, S.Pd'),
(59, 'Bema Hayuliani, S.Pd'),
(60, 'Agung Sasongko, S.Si'),
(61, 'Aprilyanti, S.Si'),
(62, 'Kimyawani, S.Pd'),
(63, 'Kesi Rahayu, S.Pd'),
(64, 'Herlina S.Pd'),
(65, 'Sumiyati, S.Pd'),
(66, 'Hj.Yasminarti, S.E.,M.M'),
(67, 'Omy Firliany Hanafiah, S.Pd., M.Si'),
(68, 'Dra, Anneke Maulisa, M.M.Pd'),
(69, 'Sri Mulaydina  S.Pd'),
(70, 'Kartika Sari, S.Pd'),
(71, 'Elya Yulina S.Pd'),
(72, 'Drs. H.Sujana Mei Raharja M.Pd'),
(73, 'Martono, S.E'),
(74, 'Ngatimin, S.E'),
(75, 'Reni Usman, S.Pd'),
(76, 'Putri Ayu Eka Ramadhani, S.Pd, M,Pd'),
(77, 'Dwi Ralimawati, S.Pd'),
(78, 'Mutiara Iwana S.Pd'),
(79, 'Agustina Damayanti, S.Pd'),
(80, 'Dina Sundari, S.Pd'),
(81, 'Ria Handayani, S.E'),
(82, 'Pungky Ayu Lestari, S.Pd'),
(83, 'Dra. Hj. Alina'),
(84, 'Hj. Siti Uswatun Khasanah, M.Pd'),
(85, 'Devita Sari, S.Sos'),
(86, 'Syelfma Octriani, S.Sos'),
(87, 'Noffita Indah Furi, S.E, M.Pd'),
(88, 'Amelia Vidyastuti, M.Pd'),
(89, 'Hj. Euis Nurhayati, SE., M.M.'),
(90, 'Hj. Ela Krisdiana S.Pd'),
(91, 'Adha Marlins S.E'),
(92, 'Fasmita, S.E'),
(93, 'Dwi Januari Siskasari, S.Pd'),
(94, 'Kemala Saudi Rose S.E, M.M'),
(95, 'Damaiyanti, S.S'),
(96, 'Lindaningsili, S.Pd'),
(97, 'Sugeng, S.Pd'),
(98, 'Estianti, S.Pd'),
(99, 'Putri Auggraini, S.S'),
(100, 'Indy Az Zahra A.Md.Par'),
(101, 'Ahmad Dian Maulid, A.Md.Par, S.E'),
(102, 'Insani Rahmawati, S.Tr. Par'),
(103, 'Agus Riady'),
(104, 'Zulfalimi Agustiadi, A.Md.Par'),
(105, 'Ilman Hakim, S.Tr. Par.'),
(106, 'Lasmono, A.Md. Par'),
(107, 'Rama Santika A.Md.Par'),
(108, 'Ovan Ardan, A.Md.Par'),
(109, 'Edi Herinanto, S.Kom'),
(110, 'Drs. Darpin'),
(111, 'Junpo, S.Kom'),
(112, 'Ayu Jayanti, S.Kom.'),
(113, 'Supriyatno, S.Kom'),
(114, 'Willy Audika Putri S.Kom'),
(115, 'Anggi Fratica S.Kom.'),
(116, 'Novi Anita S.Kom'),
(117, 'Ratih Windari, S.Kom'),
(118, 'Bayu Alimuddin Sany, S.Kom'),
(119, 'Ni Made Novia Rezkianti, S.T'),
(120, 'Dewi Anggraini, S.Kom'),
(121, 'Rahmi Permata Hati, S.Kom'),
(122, 'Hary Widodo, S.Kom'),
(123, 'Dian Sri Purwanti, S.Kom'),
(124, 'Tonino Andre Dwi Widodo, M.Ti.'),
(125, 'Dafril Ashadi, S.Kom.'),
(126, 'Ahmad Eko Saputra, S.Kom.'),
(127, 'Meilanza Wardah Hasanah, S.Pd.'),
(128, 'Ulfi Zakiyah, S.Sn'),
(129, 'Elizabet Dina Sutanti, S.Pd'),
(130, 'Numa Ima  S.Pd'),
(131, 'Yan Mulyana A.Md Par.'),
(132, 'Marydawati Turnip, S.Pd.'),
(133, 'Resdiono'),
(134, 'Ranggi'),
(135, 'lin Mariyanti, S.S'),
(136, 'Dra. Arinalia M.M.'),
(137, 'Dani Rudiyansah, S.Pd.'),
(138, 'Maryanah, S.Pd.'),
(139, 'Nani Wulandari, S.Pd.'),
(140, 'Misna Yunita. S.Pd.'),
(141, 'Laedy Puspita Putri Taupan, S.Pd.'),
(142, 'Martini Indriani, S.Pd.'),
(143, 'Annisa Anggrayani, S.Pd.'),
(144, 'Dea Aurelia S.Psi.'),
(145, 'Falahudin, S.Pd.'),
(146, 'Dini Arum P, S.Pd.'),
(147, 'Putri Alifa S.Pd.'),
(148, 'Yunita Sari, S.Pd'),
(149, 'Sukaisili, S.Ag'),
(150, 'Marudin Sihite, S.Th');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hari`
--

CREATE TABLE `data_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_hari`
--

INSERT INTO `data_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X AKL 1'),
(2, 'X AKL 2'),
(3, 'X AKL 3'),
(4, 'X AKL 4'),
(5, 'X AKL 5'),
(6, 'X MPLB'),
(7, 'X Pem 1'),
(8, 'X Pem 2'),
(9, 'X ULP 1'),
(10, 'X ULP 2'),
(11, 'X TJKT 1'),
(12, 'X TJKT 2'),
(13, 'X TJKT 3'),
(14, 'X DKV 1'),
(15, 'X DKV 2'),
(16, 'X PPLG 1'),
(17, 'X PPLG 2'),
(18, 'X Pht 1'),
(19, 'X Pht 2'),
(20, 'X Pht 3'),
(21, 'X Kul 1'),
(22, 'X Kul 2'),
(23, 'X Bus 1'),
(24, 'X Bus 2'),
(25, 'XI AKL 1'),
(26, 'XI AKL 2'),
(27, 'XI AKL 3'),
(28, 'XI AKL 4'),
(29, 'XI AKL 5'),
(30, 'XI MPLB'),
(31, 'XI Pem 1'),
(32, 'XI Pem 2'),
(33, 'XI Pem 3'),
(34, 'XI ULP 1'),
(35, 'XI ULP 2'),
(36, 'XI TJKT 1'),
(37, 'XI TJKT 2'),
(38, 'XI TJKT 3'),
(39, 'XI DKV 1'),
(40, 'XI DKV 2'),
(41, 'XI PPLG 1'),
(42, 'XI PPLG 2'),
(43, 'XI Pht 1'),
(44, 'XI Pht 2'),
(45, 'XI Pht 3'),
(46, 'XI Kul 1'),
(47, 'XI Kul 2'),
(48, 'XI Bus'),
(49, 'XII AKL 1'),
(50, 'XII AKL 2'),
(51, 'XII AKL 3'),
(52, 'XII AKL 4'),
(53, 'XII AKL 5'),
(54, 'XII MPLB'),
(55, 'XII PM 1'),
(56, 'XII PM 2'),
(57, 'XII PM 3'),
(58, 'XII ULP 1'),
(59, 'XII ULP 2'),
(60, 'XII TJKT 1'),
(61, 'XII TJKT 2'),
(62, 'XII TJKT 3'),
(63, 'XII TJKT 4'),
(64, 'XII DKV 1'),
(65, 'XII DKV 2'),
(66, 'XII PPLG'),
(67, 'XII Pht 1'),
(68, 'XII Pht 2'),
(69, 'XII Pht 3'),
(70, 'XII Kul'),
(71, 'XII Bus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id`, `id_hari`, `nama_hari`, `id_kelas`, `nama_kelas`, `id_guru`, `nama_guru`) VALUES
(5, 1, 'Senin', 49, 'XII AKL 1', 138, 'Maryanah, S.Pd.'),
(6, 1, 'senin', 49, 'XII AKL 1', 3, 'Dzuli Kamala, M.Pd.I'),
(7, 1, 'Senin', 49, 'XII AKL 1', 26, 'Hj. Zahria Hadiyati, S.Pd'),
(8, 1, 'senin', 49, 'XII AKL 1', 16, 'Diah Indri Safitri, S.Pd'),
(9, 2, 'Selasa', 49, 'XII AKL 1', 76, 'Putri Ayu Eka Ramadhani, S.Pd, M,Pd'),
(10, 2, 'Selasa', 49, 'XII AKL 1', 79, 'Agustina Damayanti, S.Pd'),
(11, 3, 'Rabu', 49, 'XII AKL 1', 65, 'Sumiyati, S.Pd'),
(12, 3, 'Rabu', 49, 'XII AKL 1', 80, 'Dina Sundari, S.Pd'),
(13, 4, 'Kamis', 49, 'XII AKL 1', 64, 'Herlina S.Pd'),
(14, 4, 'Kamis', 49, 'XII AKL 1', 11, 'Ricadesta Amalia S.Pd'),
(15, 4, 'Kamis', 49, 'XII AKL 1', 69, 'Sri Mulaydina  S.Pd'),
(16, 4, 'Kamis', 49, 'XII AKL 1', 148, 'Yunita Sari, S.Pd'),
(17, 1, 'Senin', 50, 'XII AKL 2', 65, 'Sumiyati, S.Pd'),
(18, 1, 'Senin', 50, 'XII AKL 2', 148, 'Yunita Sari, S.Pd'),
(19, 1, 'Senin', 50, 'XII AKL 2', 3, 'Dzuli Kamala, M.Pd.I'),
(20, 2, 'Selasa', 50, 'XII AKL 2', 44, 'Sukmawati, S.Pd.'),
(21, 2, 'Selasa', 50, 'XII AKL 2', 73, 'Martono, S.E'),
(22, 2, 'Selasa', 50, 'XII AKL 2', 138, 'Maryanah, S.Pd.'),
(23, 3, 'Rabu', 50, 'XII AKL 2', 79, 'Agustina Damayanti, S.Pd'),
(24, 3, 'Rabu', 50, 'XII AKL 2', 16, 'Diah Indri Safitri, S.Pd'),
(25, 3, 'Rabu', 50, 'XII AKL 2', 26, 'Hj. Zahria Hadiyati, S.Pd'),
(26, 4, 'Kamis', 50, 'XII AKL 2', 69, 'Sri Mulaydina  S.Pd'),
(27, 4, 'Kamis', 50, 'XII AKL 2', 10, 'Mas Azizah, M.Pd'),
(28, 4, 'Kamis', 50, 'XII AKL 2', 66, 'Hj.Yasminarti, S.E.,M.M'),
(29, 1, 'Senin', 51, 'XII AKL 3', 80, 'Dina Sundari, S.Pd'),
(30, 1, 'Senin', 51, 'XII AKL 3', 32, 'Cucu Herlina S.Pd'),
(31, 1, 'Senin', 51, 'XII AKL 3', 2, 'Dzuli Kamala, M.Pd.I'),
(32, 2, 'Selasa', 51, 'XII AKL 3', 81, 'Ria Handayani, S.E'),
(33, 2, 'Selasa', 51, 'XII AKL 3', 67, 'Omy Firliany Hanafiah, S.Pd., M.Si'),
(34, 2, 'Selasa', 51, 'XII AKL 3', 28, 'Marlena S.Pd.'),
(35, 3, 'Rabu', 51, 'XII AKL 3', 69, 'Sri Mulaydina  S.Pd'),
(36, 3, 'Rabu', 51, 'XII AKL 3', 43, 'Dicky Sapto Tejo, S.Pd'),
(37, 3, 'Rabu', 51, 'XII AKL 3', 76, 'Putri Ayu Eka Ramadhani, S.Pd, M,Pd'),
(38, 4, 'Kamis', 51, 'XII AKL 3', 65, 'Sumiyati, S.Pd'),
(39, 4, 'Kamis', 51, 'XII AKL 3', 148, 'Yunita Sari, S.Pd'),
(40, 4, 'Kamis', 51, 'XII AKL 3', 11, 'Ricadesta Amalia S.Pd'),
(41, 4, 'Kamis', 51, 'XII AKL 3', 138, 'Maryanah, S.Pd.'),
(42, 1, 'Senin', 52, 'XII AKL 4', 79, 'Agustina Damayanti, S.Pd'),
(43, 1, 'Senin', 52, 'XII AKL 4', 74, 'Ngatimin, S.E'),
(44, 2, 'Selasa', 52, 'XII AKL 4', 77, 'Dwi Ralimawati, S.Pd'),
(45, 2, 'Selasa', 52, 'XII AKL 4', 43, 'Dicky Sapto Tejo, S.Pd'),
(46, 2, 'Selasa', 52, 'XII AKL 4', 69, 'Sri Mulaydina  S.Pd'),
(47, 2, 'Selasa', 52, 'XII AKL 4', 148, 'Yunita Sari, S.Pd'),
(48, 2, 'Selasa', 52, 'XII AKL 4', 55, 'Yuli Seti Purwaningsih, S.Pd'),
(49, 3, 'Rabu', 52, 'XII AKL 4', 70, 'Kartika Sari, S.Pd'),
(50, 3, 'Rabu', 52, 'XII AKL 4', 11, 'Ricadesta Amalia S.Pd'),
(51, 3, 'Rabu', 52, 'XII AKL 4', 73, 'Martono, S.E'),
(52, 4, 'Kamis', 52, 'XII AKL 4', 28, 'Marlena S.Pd.'),
(53, 4, 'Kamis', 52, 'XII AKL 4', 138, 'Maryanah, S.Pd.'),
(54, 4, 'Kamis', 52, 'XII AKL 4', 70, 'Kartika Sari, S.Pd'),
(55, 4, 'Kamis', 52, 'XII AKL 4', 2, 'Drs. Ismatullah'),
(56, 1, 'Senin', 53, 'XII AKL 5', 76, 'Putri Ayu Eka Ramadhani, S.Pd, M,Pd'),
(57, 1, 'Senin', 53, 'XII AKL 5', 32, 'Cucu Herlina S.Pd'),
(58, 1, 'Senin', 53, 'XII AKL 5', 47, 'Martalinda, S.Pd'),
(59, 2, 'Selasa', 53, 'XII AKL 5', 28, 'Marlena S.Pd.'),
(60, 2, 'Selasa', 53, 'XII AKL 5', 2, 'Drs. Ismatullah'),
(61, 2, 'Selasa', 53, 'XII AKL 5', 75, 'Reni Usman, S.Pd'),
(62, 3, 'Rabu', 53, 'XII AKL 5', 10, 'Mas Azizah, M.Pd'),
(63, 3, 'Rabu', 53, 'XII AKL 5', 69, 'Sri Mulaydina  S.Pd'),
(64, 3, 'Rabu', 53, 'XII AKL 5', 70, 'Kartika Sari, S.Pd'),
(65, 4, 'Kamis', 53, 'XII AKL 5', 79, 'Agustina Damayanti, S.Pd'),
(66, 4, 'Kamis', 53, 'XII AKL 5', 138, 'Maryanah, S.Pd.'),
(67, 4, 'Kamis', 53, 'XII AKL 5', 70, 'Kartika Sari, S.Pd'),
(68, 1, 'Senin', 54, 'XII MPLB', 83, 'Dra. Hj. Alina'),
(69, 1, 'Senin', 54, 'XII MPLB', 44, 'Sukmawati, S.Pd.'),
(70, 1, 'Senin', 54, 'XII MPLB', 148, 'Yunita Sari, S.Pd'),
(71, 2, 'Selasa', 54, 'XII MPLB', 9, 'Dwipa Fredy Putri, M.Pd.'),
(72, 2, 'Selasa', 54, 'XII MPLB', 3, 'Dzuli Kamala, M.Pd.I'),
(73, 2, 'Selasa', 54, 'XII MPLB', 82, 'Pungky Ayu Lestari, S.Pd'),
(74, 3, 'Rabu', 54, 'XII MPLB', 25, 'Dra. Hj. Ernita Wati'),
(75, 3, 'Rabu', 54, 'XII MPLB', 84, 'Hj. Siti Uswatun Khasanah, M.Pd'),
(76, 4, 'Kamis', 54, 'XII MPLB', 84, 'Hj. Siti Uswatun Khasanah, M.Pd'),
(77, 4, 'Kamis', 54, 'XII MPLB', 37, 'Sandria Febrianti, S.Si'),
(78, 4, 'Kamis', 54, 'XII MPLB', 83, 'Dra. Hj. Alina'),
(79, 4, 'Kamis', 54, 'XII MPLB', 16, 'Diah Indri Safitri, S.Pd'),
(80, 1, 'Senin', 55, 'XII PM 1', 148, 'Yunita Sari, S.Pd'),
(81, 1, 'Senin', 55, 'XII PM 1', 141, 'Laedy Puspita Putri Taupan, S.Pd.'),
(82, 1, 'Senin', 55, 'XII PM 1', 94, 'Kemala Saudi Rose S.E, M.M'),
(83, 2, 'Selasa', 55, 'XII PM 1', 24, 'Dra. Sri Wahyuni, M.M'),
(84, 2, 'Selasa', 55, 'XII PM 1', 93, 'Dwi Januari Siskasari, S.Pd'),
(85, 2, 'Selasa', 55, 'XII PM 1', 41, 'Sulasmi, S Pd. M M'),
(86, 3, 'Rabu', 55, 'XII PM 1', 11, 'Ricadesta Amalia S.Pd'),
(87, 3, 'Rabu', 55, 'XII PM 1', 88, 'Amelia Vidyastuti, M.Pd'),
(88, 3, 'Rabu', 55, 'XII PM 1', 34, 'Murniyati, S.Pd'),
(89, 3, 'Rabu', 55, 'XII PM 1', 15, 'Handayani, M.Pd'),
(90, 4, 'Kamis', 55, 'XII PM 1', 93, 'Dwi Januari Siskasari, S.Pd'),
(91, 4, 'Kamis', 55, 'XII PM 1', 122, 'Hary Widodo, S.Kom'),
(92, 5, 'Jum\'at', 55, 'XII PM 1', 87, 'Noffita Indah Furi, S.E, M.Pd'),
(93, 1, 'Senin', 56, 'XII PM 2', 88, 'Amelia Vidyastuti, M.Pd'),
(94, 1, 'Senin', 56, 'XII PM 2', 9, 'Dwipa Fredy Putri, M.Pd.'),
(95, 1, 'Senin', 56, 'XII PM 2', 24, 'Dra. Sri Wahyuni, M.M'),
(96, 2, 'Selasa', 56, 'XII PM 2', 16, 'Diah Indri Safitri, S.Pd'),
(97, 2, 'Selasa', 56, 'XII PM 2', 94, 'Kemala Saudi Rose S.E, M.M'),
(98, 3, 'Rabu', 56, 'XII PM 2', 34, 'Murniyati, S.Pd'),
(99, 3, 'Rabu', 56, 'XII PM 2', 91, 'Adha Marlins S.E'),
(100, 3, 'Rabu', 56, 'XII PM 2', 41, 'Sulasmi, S Pd. M M'),
(101, 4, 'Kamis', 56, 'XII PM 2', 4, 'Asvedia S.Pd.I'),
(102, 4, 'Kamis', 56, 'XII PM 2', 87, 'Noffita Indah Furi, S.E, M.Pd'),
(103, 4, 'Kamis', 56, 'XII PM 2', 141, 'Laedy Puspita Putri Taupan, S.Pd.'),
(104, 1, 'Senin', 57, 'XII PM 3', 75, 'Reni Usman, S.Pd'),
(105, 1, 'Senin', 57, 'Xii PM 3 ', 93, 'Dwi Januari Siskasari, S.Pd'),
(106, 2, 'Selasa', 57, 'XII PM 3', 80, 'Dina Sundari, S.Pd'),
(107, 2, 'Selasa', 57, 'XII PM 3', 148, 'Yunita Sari, S.Pd'),
(108, 2, 'Selasa', 57, 'XII PM 3', 88, 'Amelia Vidyastuti, M.Pd'),
(109, 2, 'Selasa', 57, 'XII PM 3', 93, 'Dwi Januari Siskasari, S.Pd'),
(110, 3, 'Rabu', 57, 'XII PM 3', 87, 'Noffita Indah Furi, S.E, M.Pd'),
(111, 3, 'Rabu', 57, 'XII PM 3', 4, 'Asvedia S.Pd.I'),
(112, 3, 'Rabu', 57, 'XII PM 3', 11, 'Ricadesta Amalia S.Pd'),
(113, 4, 'Kamis', 57, 'XII PM 3', 16, 'Diah Indri Safitri, S.Pd'),
(114, 4, 'Kamis', 57, 'XII PM 3', 24, 'Dra. Sri Wahyuni, M.M'),
(115, 4, 'Kamis', 57, 'XII PM 3', 45, 'Nuril Astuti, S.Pd'),
(116, 1, 'Senin', 58, 'XII ULP 1', 16, 'Diah Indri Safitri, S.Pd'),
(117, 1, 'Senin', 58, 'XII ULP 1', 99, 'Putri Auggraini, S.S'),
(118, 2, 'Selasa', 58, 'XII ULP 1', 142, 'Martini Indriani, S.Pd.'),
(119, 2, 'Selasa', 58, 'XII ULP 1', 97, 'Sugeng, S.Pd'),
(120, 2, 'Selasa', 58, 'XII ULP 1', 2, 'Drs. Ismatullah'),
(121, 2, 'Selasa', 58, 'XII ULP 1', 11, 'Ricadesta Amalia S.Pd'),
(122, 3, 'Rabu', 58, 'XII ULP 1', 96, 'Lindaningsili, S.Pd'),
(123, 3, 'Rabu', 58, 'XII ULP 1', 53, 'Yesi Puspitasari, S.Pd'),
(124, 4, 'Kamis', 58, 'XII ULP 1', 47, 'Martalinda, S.Pd'),
(125, 4, 'Kamis', 58, 'XII ULP 1', 95, 'Damaiyanti, S.S'),
(126, 1, 'Senin', 59, 'XII ULP 2', 18, 'Mutiara Iwana S.Pd'),
(127, 1, 'Senin', 59, 'XII ULP 2', 142, 'Martini Indriani, S.Pd.'),
(128, 1, 'Senin', 59, 'XII ULP 2', 2, 'Drs. Ismatullah'),
(129, 1, 'Senin', 59, 'XII ULP 2', 25, 'Dra. Hj. Ernita Wati'),
(130, 2, 'Selasa', 59, 'XII ULP 2', 99, 'Putri Auggraini, S.S'),
(131, 2, 'Selasa', 59, 'XII ULP 2', 98, 'Estianti, S.Pd'),
(132, 2, 'Selasa', 59, 'XII ULP 2', 148, 'Yunita Sari, S.Pd'),
(133, 3, 'Rabu', 59, 'XII ULP 2', 53, 'Yesi Puspitasari, S.Pd'),
(134, 3, 'Rabu', 59, 'XII ULP 2', 97, 'Sugeng, S.Pd'),
(135, 3, 'Rabu', 59, 'XII ULP 2', 78, 'Mutiara Iwana S.Pd'),
(136, 4, 'Kamis', 59, 'XII ULP 2', 96, 'Lindaningsili, S.Pd'),
(137, 4, 'Kamis', 59, 'XII ULP 2', 48, 'Dra. Rez Nurlela'),
(138, 1, 'Senin', 60, 'XII TJKT 1', 10, 'Mas Azizah, M.Pd'),
(139, 1, 'Senin', 60, 'XII TJKT 1', 112, 'Ayu Jayanti, S.Kom.'),
(140, 2, 'Selasa', 60, 'XII TJKT 1', 85, 'Devita Sari, S.Sos'),
(141, 2, 'Selasa', 60, 'XII TJKT 1', 115, 'Anggi Fratica S.Kom.'),
(142, 3, 'Rabu', 60, 'XII TJKT 1', 42, 'Wayan Sukanta M.Pd'),
(143, 3, 'Rabu', 60, 'XII TJKT 1', 114, 'Willy Audika Putri S.Kom'),
(144, 4, 'Kamis', 60, 'XII TJKT 1', 15, 'Handayani, M.Pd'),
(145, 4, 'Kamis', 60, 'XII TJKT 1', 114, 'Willy Audika Putri S.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_` int(11) NOT NULL,
  `m_code` varchar(2) NOT NULL,
  `m_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_`, `m_code`, `m_name`) VALUES
(1, '01', 'Januari'),
(2, '02', 'Februari'),
(3, '03', 'Maret'),
(4, '04', 'April'),
(5, '05', 'Mei'),
(6, '06', 'Juni'),
(7, '07', 'Juli'),
(8, '08', 'Agustus'),
(9, '09', 'September'),
(10, '10', 'Oktober'),
(11, '11', 'November'),
(12, '12', 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `session` int(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `email`, `password`, `session`, `role`) VALUES
(1, 'admin@adminabsen.com', '$2y$10$AtEAlsYB81ztb0xo1wZuVuveym6/c5AtzeeNRW9Ir4/y9MRv.hFWi', 0, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `data_hari`
--
ALTER TABLE `data_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_absensi`
--
ALTER TABLE `data_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `data_hari` (`id_hari`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `data_guru` (`id_guru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
