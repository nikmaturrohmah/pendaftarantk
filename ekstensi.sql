-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 09:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbd_pengujian`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `bayarpendaftaran` ()  BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_pendaftaran, j.nama_jenis
    FROM pembayaran p LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa) 
    LEFT JOIN jenis_pembayaran j ON (j.id_jenis = p.id_jenis) 
    WHERE j.id_jenis ='JP0001';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `bayarspp` ()  BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_pendaftaran, j.nama_jenis
    FROM pembayaran p LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa) 
    RIGHT JOIN jenis_pembayaran j ON (j.id_jenis = p.id_jenis) 
    WHERE j.id_jenis ='JP0002';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datapembayaran` ()  BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_pendaftaran, j.nama_jenis
    FROM pembayaran p JOIN jenis_pembayaran j ON (j.id_jenis = p.id_jenis)
    LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa) ;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa_lulus` ()  BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, s.tgl_masuk, s.tgl_lulus, 
    s.alamat, w.nama_walmur FROM siswa s JOIN walimurid w 
    ON(s.NIK_walmur=w.NIK_walmur)
    WHERE tgl_lulus != '0000-00-00';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa_pindah` ()  BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, s.tgl_masuk, s.tgl_lulus, 
    s.alamat, w.nama_walmur FROM siswa s join walimurid w 
    on(s.NIK_walmur=w.NIK_walmur)
    where tgl_lulus = '0000-00-00';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` char(6) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `nama_jenis`, `status`) VALUES
('JP0001', 'Pembayaran Pendaftaran', 0),
('JP0002', 'Pembayaran SPP', 0),
('JP0003', 'Pembayaran daftar', 0),
('JP0004', 'bayar spp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_ruang_kelas` char(1) NOT NULL,
  `nama_ruang_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_ruang_kelas`, `nama_ruang_kelas`) VALUES
('J', 'Daisy'),
('L', 'Rose'),
('M', 'Melati');

-- --------------------------------------------------------

--
-- Table structure for table `kel_bljr`
--

CREATE TABLE `kel_bljr` (
  `tingkat_tk` tinyint(1) NOT NULL,
  `anggota_kel` char(10) NOT NULL,
  `ruang_kelas` char(1) NOT NULL,
  `guru` char(5) NOT NULL,
  `tahun_ajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kel_bljr`
--

INSERT INTO `kel_bljr` (`tingkat_tk`, `anggota_kel`, `ruang_kelas`, `guru`, `tahun_ajar`) VALUES
(1, '1234567890', 'J', '1M123', 2015456),
(1, '1234567890', 'J', '1M123', 2020456),
(2, '1234567891', 'L', '2LK89', 2015456),
(2, '1234567891', 'L', '2LK89', 2020456);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai_bulanan`
--

CREATE TABLE `kriteria_nilai_bulanan` (
  `id_kriteria_nilai_bulanan` char(3) NOT NULL,
  `nama_kriteria_bulanan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_nilai_bulanan`
--

INSERT INTO `kriteria_nilai_bulanan` (`id_kriteria_nilai_bulanan`, `nama_kriteria_bulanan`) VALUES
('KB1', 'Nilai Tugas'),
('KB2', 'Nilai Akhlak'),
('KB3', 'Nilai Kejujuran');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai_harian`
--

CREATE TABLE `kriteria_nilai_harian` (
  `id_kriteria_harian` char(3) NOT NULL,
  `nama_kriteria_harian` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_nilai_harian`
--

INSERT INTO `kriteria_nilai_harian` (`id_kriteria_harian`, `nama_kriteria_harian`) VALUES
('KH1', 'Nilai Ketepatan'),
('KH2', 'Nilai Keceriaan'),
('KH3', 'Nilai Keaktifan');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_bulanan`
--

CREATE TABLE `nilai_bulanan` (
  `id_nilai_bulanan` char(5) NOT NULL,
  `bulan_ambil_nilai` date NOT NULL,
  `nilai_bul_sis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_bulanan`
--

INSERT INTO `nilai_bulanan` (`id_nilai_bulanan`, `bulan_ambil_nilai`, `nilai_bul_sis`) VALUES
('NBUL1', '2020-07-07', '1234567890'),
('NBUL2', '2020-07-07', '1234567891'),
('NBUL3', '2020-07-07', '1234567892');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_harian`
--

CREATE TABLE `nilai_harian` (
  `id_nilai_harian` char(8) NOT NULL,
  `tgl_ambil_nilai` date NOT NULL,
  `krit_nil_har` char(3) NOT NULL,
  `nil_har_sis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_harian`
--

INSERT INTO `nilai_harian` (`id_nilai_harian`, `tgl_ambil_nilai`, `krit_nil_har`, `nil_har_sis`) VALUES
('NHAR1', '0000-00-00', 'KH1', '1234567890'),
('NHAR2', '0000-00-00', 'KH2', '1234567891');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip_peg` char(5) NOT NULL,
  `nama_peg` varchar(50) NOT NULL,
  `jk_peg` tinyint(1) NOT NULL,
  `alamat_peg` varchar(100) NOT NULL,
  `notelp_peg` varchar(15) NOT NULL,
  `email_peg` varchar(40) DEFAULT NULL,
  `tglmasuk_peg` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip_peg`, `nama_peg`, `jk_peg`, `alamat_peg`, `notelp_peg`, `email_peg`, `tglmasuk_peg`, `username`, `password`) VALUES
('PG001', 'nikma', 1, 'Juwingan', '081216489645', 'nikma@gmail.com', '2021-01-01', 'nikma', 'nikma123');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_bayar` char(10) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `noinduk_siswa` char(10) NOT NULL,
  `id_jenis` char(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_bayar`, `tgl_pendaftaran`, `tgl_bayar`, `jumlah_bayar`, `noinduk_siswa`, `id_jenis`, `status`) VALUES
('BYR0001', '2019-12-31', '2020-01-13', 6000, 'SW0007', 'JP0002', 0),
('BYR0002', '2021-01-03', '2020-02-13', 50000, 'SW0002', 'JP0002', 0),
('BYR0003', '2020-12-03', '2020-12-05', 4000, 'SW0003', 'JP0001', 1),
('BYR0004', '2021-01-11', '2020-03-13', 50000, 'SW0010', 'JP0001', 0),
('BYR0005', '2020-12-03', '2020-12-12', 40000, 'SW0005', 'JP0001', 0),
('BYR0006', '2021-01-04', '2021-01-05', 200000, 'SW0004', 'JP0001', 0),
('BYR0007', '2021-01-03', '2021-01-04', 50000, 'SW0008', 'JP0001', 0),
('BYR0008', '2021-01-04', '0000-00-00', 50000, 'SW0009', 'JP0001', 0),
('BYR0009', '2021-01-06', '0000-00-00', 100000, 'SW0011', 'JP0003', 0),
('BYR0010', '2021-01-05', '2021-01-06', 50000, 'SW0014', 'JP0002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prakarya`
--

CREATE TABLE `prakarya` (
  `id_prakarya` char(10) NOT NULL,
  `tgl_prakarya` date NOT NULL,
  `filepath_prakarya` varchar(100) NOT NULL,
  `noinduk_siswa1` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prakarya`
--

INSERT INTO `prakarya` (`id_prakarya`, `tgl_prakarya`, `filepath_prakarya`, `noinduk_siswa1`) VALUES
('PRK01', '2020-06-09', 'prakarya1', '1234567891'),
('PRK56', '2020-06-09', 'prakarya1', '1234567893'),
('PRK67', '2020-06-09', 'prakarya1', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `rapot`
--

CREATE TABLE `rapot` (
  `id_rapot` char(5) NOT NULL,
  `cat_rapor` varchar(100) NOT NULL,
  `rapor_siswa` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rapot`
--

INSERT INTO `rapot` (`id_rapot`, `cat_rapor`, `rapor_siswa`) VALUES
('R01', 'belajar lagi ya', '1234567890'),
('R02', 'belajar lagi ya', '1234567891'),
('R03', 'belajar lagi ya', '1234567892');

-- --------------------------------------------------------

--
-- Table structure for table `rekapspp`
--

CREATE TABLE `rekapspp` (
  `id_spp` int(11) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `no_bayar` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `noinduk_siswa` char(10) NOT NULL,
  `id_jenis` char(6) NOT NULL,
  `STATUS` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_daftar`
--

CREATE TABLE `rekap_daftar` (
  `id_pendaftaran` int(11) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `no_bayar` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `noinduk_siswa` char(10) NOT NULL,
  `id_jenis` char(6) NOT NULL,
  `STATUS` text NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `noinduk_siswa` char(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `anakke` int(11) DEFAULT NULL,
  `NIK_walmur` char(18) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`noinduk_siswa`, `nama_siswa`, `jk`, `tgl_lahir`, `tgl_masuk`, `tgl_lulus`, `alamat`, `anakke`, `NIK_walmur`, `status`) VALUES
('SW0001', 'raihan', 'L', '2020-12-15', '2020-12-03', '2020-12-04', 'GSI', 1, '123456789012345671', 0),
('SW0002', 'salsabila', 'P', '2015-02-23', '2018-10-18', '2020-10-20', 'Surabaya', 2, '123456789012345673', 0),
('SW0003', 'Nikma', 'P', '2015-07-12', '2018-10-18', '2020-10-20', 'Surabaya', 1, '123456789012345674', 0),
('SW0004', 'Rohmah', 'P', '2020-12-10', '2020-12-12', '2020-12-09', 'surabaya', 2, '123456789012345673', 0),
('SW0005', 'Elik', 'L', '2000-10-01', '2005-06-16', '2007-07-19', 'Kedung Baruk', 2, '123456789012345671', 0),
('SW0006', 'Gita', 'P', '2015-02-11', '2018-03-16', '2020-06-02', 'Kertajaya', 2, '123456789012345674', 0),
('SW0007', 'Rohman', 'L', '2012-07-31', '2018-02-08', '0000-00-00', 'Kedung Baruk', 3, '123456789012345675', 0),
('SW0008', 'Sultan', 'L', '2013-06-02', '2018-07-11', '0000-00-00', 'Delta Sari', 3, '123456789012345671', 0),
('SW0009', 'Arum', 'P', '2021-01-04', '2021-01-07', '2021-01-09', 'Kertajaya', 3, '123456789012345673', 0),
('SW0010', 'Izzatul', 'P', '2013-06-17', '2018-07-11', '2020-07-09', 'Juwingan', 2, '123456789012345675', 0),
('SW0011', 'nikmut', 'P', '2021-01-05', '2021-01-07', '2021-01-11', 'Kedung Baruk', 1, '123456789012344569', 0),
('SW0012', 'dea', 'P', '2021-01-04', '2021-01-13', '0000-00-00', 'GSI', 1, '123456789012345674', 0),
('SW0013', 'Rohmah', 'P', '2015-03-06', '2020-07-06', '2021-01-08', 'Kedung Baruk', 1, '123456789012345673', 0),
('SW0014', 'rara', 'P', '2016-03-07', '2020-03-11', '0000-00-00', 'Kertajaya', 1, '123456789012345676', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahunajar` int(11) NOT NULL,
  `tahun_ajar` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahunajar`, `tahun_ajar`) VALUES
(2015456, '2015'),
(2016456, '2016'),
(2017456, '2017');

-- --------------------------------------------------------

--
-- Table structure for table `terdapat`
--

CREATE TABLE `terdapat` (
  `id_kriteria_nilai_bulanan` char(3) NOT NULL,
  `nilai_bul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terdapat`
--

INSERT INTO `terdapat` (`id_kriteria_nilai_bulanan`, `nilai_bul`) VALUES
('KB1', 90),
('KB2', 90),
('KB3', 95);

-- --------------------------------------------------------

--
-- Table structure for table `terdiri`
--

CREATE TABLE `terdiri` (
  `id_kriteria_harian` char(3) NOT NULL,
  `id_nilai_harian` char(8) NOT NULL,
  `nilai_har` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `walimurid`
--

CREATE TABLE `walimurid` (
  `NIK_walmur` varchar(20) NOT NULL,
  `nama_walmur` varchar(50) NOT NULL,
  `pekerjaan_walmur` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walimurid`
--

INSERT INTO `walimurid` (`NIK_walmur`, `nama_walmur`, `pekerjaan_walmur`, `status`) VALUES
('123456789012344568', 'Dedy', 'guru', 0),
('123456789012344569', 'Tri', 'Pramugari', 0),
('123456789012345671', 'Sapari', 'Pegawai Negeri', 1),
('123456789012345673', 'Sinta', 'Dokter', 0),
('123456789012345674', 'Budi', 'Programmer', 0),
('123456789012345675', 'Suparji', 'TNI', 0),
('123456789012345676', 'Joko', 'Pegawai Negeri', 0),
('123456789012345689', 'Wahyu', 'guru', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_ruang_kelas`);

--
-- Indexes for table `kel_bljr`
--
ALTER TABLE `kel_bljr`
  ADD PRIMARY KEY (`anggota_kel`,`ruang_kelas`,`guru`,`tahun_ajar`),
  ADD KEY `ruang_kelas` (`ruang_kelas`),
  ADD KEY `guru` (`guru`),
  ADD KEY `tahun_ajar` (`tahun_ajar`);

--
-- Indexes for table `kriteria_nilai_bulanan`
--
ALTER TABLE `kriteria_nilai_bulanan`
  ADD PRIMARY KEY (`id_kriteria_nilai_bulanan`);

--
-- Indexes for table `kriteria_nilai_harian`
--
ALTER TABLE `kriteria_nilai_harian`
  ADD PRIMARY KEY (`id_kriteria_harian`);

--
-- Indexes for table `nilai_bulanan`
--
ALTER TABLE `nilai_bulanan`
  ADD PRIMARY KEY (`id_nilai_bulanan`),
  ADD KEY `nilai_bul_sis` (`nilai_bul_sis`);

--
-- Indexes for table `nilai_harian`
--
ALTER TABLE `nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`),
  ADD KEY `krit_nil_har` (`krit_nil_har`),
  ADD KEY `nil_har_sis` (`nil_har_sis`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip_peg`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_bayar`),
  ADD KEY `fk_no_siswa` (`noinduk_siswa`),
  ADD KEY `fk_id_jenis` (`id_jenis`);

--
-- Indexes for table `prakarya`
--
ALTER TABLE `prakarya`
  ADD PRIMARY KEY (`id_prakarya`),
  ADD KEY `noinduk_siswa1` (`noinduk_siswa1`);

--
-- Indexes for table `rapot`
--
ALTER TABLE `rapot`
  ADD PRIMARY KEY (`id_rapot`),
  ADD KEY `rapor_siswa` (`rapor_siswa`);

--
-- Indexes for table `rekapspp`
--
ALTER TABLE `rekapspp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `no_siswa` (`noinduk_siswa`),
  ADD KEY `jns_pembayaran` (`id_jenis`);

--
-- Indexes for table `rekap_daftar`
--
ALTER TABLE `rekap_daftar`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `induk_siswa` (`noinduk_siswa`),
  ADD KEY `jenis_bayar` (`id_jenis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`noinduk_siswa`),
  ADD KEY `fk_NIK_walmur` (`NIK_walmur`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahunajar`);

--
-- Indexes for table `terdapat`
--
ALTER TABLE `terdapat`
  ADD PRIMARY KEY (`id_kriteria_nilai_bulanan`);

--
-- Indexes for table `terdiri`
--
ALTER TABLE `terdiri`
  ADD PRIMARY KEY (`id_kriteria_harian`,`id_nilai_harian`),
  ADD KEY `id_nilai_harian` (`id_nilai_harian`);

--
-- Indexes for table `walimurid`
--
ALTER TABLE `walimurid`
  ADD PRIMARY KEY (`NIK_walmur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekapspp`
--
ALTER TABLE `rekapspp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekap_daftar`
--
ALTER TABLE `rekap_daftar`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekapspp`
--
ALTER TABLE `rekapspp`
  ADD CONSTRAINT `jns_pembayaran` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pembayaran` (`id_jenis`),
  ADD CONSTRAINT `no_siswa` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`);

--
-- Constraints for table `rekap_daftar`
--
ALTER TABLE `rekap_daftar`
  ADD CONSTRAINT `induk_siswa` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`),
  ADD CONSTRAINT `jenis_bayar` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pembayaran` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
