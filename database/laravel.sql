-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2023 at 01:57 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `date` varchar(15) NOT NULL,
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activation_code` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`date`, `id`, `username`, `password`, `email`, `gender`, `activation_code`) VALUES
('0000-00-00', 'admin-1-4-7-12', 'admin', '$2y$10$lpHQh9PGMWJCWjqIf2SymuPgzkpEKnocb0kOpO9y6DR4iFXJ9djAe', 'admin@gmail.com', 'Laki-laki', 'ADMIN'),
('2023/04/26', 'baronian-4-7-9-11', 'baronn', '$2y$10$LlSRH4Sbs2KT6S0/zq359uYYpfQjMMwiG3ZwvqeH3mccTXLsZ/tfm', 'baronn@gmail.com', 'Laki-laki', 'activated'),
('2023/04/30', 'bebek_kuat-1-6-7-8', 'bebek_kuat', '$2y$10$t/vSf5W108aum0vF3LHG9ejgbuMFGlTFstuDsdKSHtFNqslosuecy', 'bebek@gmail.com', 'Laki-laki', 'activated'),
('2023/04/30', 'Es_coklat-3-5-7-8', 'Es_coklat', '$2y$10$uCIbCsoUdm0p3qp2lPQ2xOMQCiHumbIt/NwnYQkpcSPZ4.OdPG0t.', 'coklat@gmail.com', 'Laki-laki', 'activated'),
('2023/04/30', 'mariimas-2-3-5-8', 'mariimas', '$2y$10$CwigYjwEGolE1KiTJi.4K.Gj1b7YrnWwxTbDo3qUYKLx4IkrT/TaG', 'marima@gmail.com', 'Laki-laki', 'activated'),
('2023/05/01', 'matabulan-0-5-7-10', 'matabulan', '$2y$10$RfonUHytI2xOoBAlGNFNteImzLKUVNgdSDuAKMlG6bAHe6ef5A36C', 'bulan@gmail.com', 'Laki-laki', 'activated'),
('2023/05/01', 'nasi_goreng-0-1-2-7', 'nasi_goreng', '$2y$10$ocBboArJJUh5T3VRBRmdXOy1nj28TesPBuCloBuHIOO1N0qI4Nbni', 'goreng@gmail.com', 'Laki-laki', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

DROP TABLE IF EXISTS `tb_gejala`;
CREATE TABLE IF NOT EXISTS `tb_gejala` (
  `Id_gejala` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gejala` varchar(77) NOT NULL,
  UNIQUE KEY `IDgejala` (`Id_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`Id_gejala`, `gejala`) VALUES
('G01', 'Sering buang air, terutama malam hari(poliuri)'),
('G02', 'Sering haus(Polidipsi)'),
('G03', 'Sering lapar(Polifagi)'),
('G04', 'Mudah lelah'),
('G05', 'Sering kesemutan'),
('G06', 'Sering mual'),
('G07', 'Sering muntah'),
('G08', 'Memiliki penyakit turunan'),
('G09', 'Mata kabur'),
('G10', 'Mudah pusing'),
('G11', 'Sering mengalami sesak nafas'),
('G12', 'Kulit pucat'),
('G13', 'Berat badan turun tanpa sebab yang jelas'),
('G14', 'Luka tidak kunjung sembuh'),
('G15', 'Sedang mengalami bersin/batuk'),
('G16', 'Hambatan seksual'),
('G17', 'Telah/akan melahirkan'),
('G18', 'Sedang mengandung'),
('P01', 'Mudah terpapar virus'),
('P02', 'Diabetes Melitus Tipe 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsul`
--

DROP TABLE IF EXISTS `tb_konsul`;
CREATE TABLE IF NOT EXISTS `tb_konsul` (
  `date` date NOT NULL,
  `id_pasien` varchar(40) NOT NULL,
  `id_gejala` varchar(77) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_penyakit` varchar(15) NOT NULL,
  `penyakit` varchar(77) NOT NULL,
  UNIQUE KEY `id_pasien` (`id_pasien`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_konsul`
--

INSERT INTO `tb_konsul` (`date`, `id_pasien`, `id_gejala`, `id_penyakit`, `penyakit`) VALUES
('2023-04-30', 'baronian-4-7-9-11', 'G14,G15,G16,P02', 'P03', 'Diabetes Melitus Tipe 2'),
('2023-04-30', 'mariimas-2-3-5-8', 'G01,G02,G03,G07,G09,G11,G12,G16,G17,P01,P02', 'G00', 'Gejala tidak terdefinisi'),
('2023-05-01', 'matabulan-0-5-7-10', 'G04,G06,G07,G09,G15', 'P1', 'Influenza');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
