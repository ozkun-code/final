-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 08:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `first_name`, `last_name`, `contact`) VALUES
(3, 49, 'fahrul', 'rozi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kecamatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama_desa`, `kecamatan_id`) VALUES
(15, 'Banyuasih', 1),
(16, 'Cicinde Selatan', 1),
(17, 'Cicinde Utara', 1),
(18, 'Gembongan', 1),
(19, 'Gempol', 1),
(20, 'Gempolkolot', 1),
(21, 'Jayamukti', 1),
(22, 'Kutaraharja', 1),
(23, 'Mekarasih', 1),
(24, 'Pamekaran', 1),
(25, 'Talunjaya', 1),
(26, 'Tanjung', 1),
(27, 'Batujaya', 2),
(28, 'Baturaden', 2),
(29, 'Karyabakti', 2),
(30, 'Karyamakmur', 2),
(31, 'Karyamulya', 2),
(32, 'Kutaampel', 2),
(33, 'Segaran', 2),
(34, 'Segarjaya', 2),
(35, 'Telukambulu', 2),
(36, 'Telukbango', 2),
(37, 'Kutamekar', 3),
(38, 'Kutanegara', 3),
(39, 'Kutapohaci', 3),
(40, 'Mulyasari', 3),
(41, 'Mulyasejati', 3),
(42, 'Parungmulya', 3),
(43, 'Tegalega', 3),
(44, 'Cemarajaya', 4),
(45, 'Cibuaya', 4),
(46, 'Gebangjaya', 4),
(47, 'Jayamulya', 4),
(48, 'Kalidungjaya', 4),
(49, 'Kedungjaya', 4),
(50, 'Kedungjeruk', 4),
(51, 'Kertarahayu', 4),
(52, 'Pejaten', 4),
(53, 'Sedari', 4),
(54, 'Sukasari', 4),
(55, 'Cikampek Barat', 5),
(56, 'Cikampek Kota', 5),
(57, 'Cikampek Pusaka', 5),
(58, 'Cikampek Selatan', 5),
(59, 'Cikampek Timur', 5),
(60, 'Dawuan Barat', 5),
(61, 'Dawuan Tengah', 5),
(62, 'Dawuan Timur', 5),
(63, 'Kalihurip', 5),
(64, 'Kamojing', 5),
(65, 'Bayur Kidul', 6),
(66, 'Bayur Lor', 6),
(67, 'Kiara', 6),
(68, 'Langensari', 6),
(69, 'Manggungjaya', 6),
(70, 'Muktijaya', 6),
(71, 'Pasirjaya', 6),
(72, 'Pasirukem', 6),
(73, 'Sukajaya', 6),
(74, 'Sukamulya', 6),
(75, 'Sumurgede', 6),
(76, 'Tegalurung', 6),
(77, 'Cikalong', 7),
(78, 'Cikarang', 7),
(79, 'Cilamaya', 7),
(80, 'Mekarmaya', 7),
(81, 'Muara', 7),
(82, 'Muarabaru', 7),
(83, 'Rawagempol Kulon', 7),
(84, 'Rawagempol Wetan', 7),
(85, 'Sukakerta', 7),
(86, 'Sukatani', 7),
(87, 'Tegalsari', 7),
(88, 'Tegalwaru', 7),
(89, 'Cikande', 8),
(90, 'Ciptamargi', 8),
(91, 'Kertamukti', 8),
(92, 'Kosambibatu', 8),
(93, 'Mekarpohaci', 8),
(94, 'Pusakajaya Selatan', 8),
(95, 'Pusakajaya Utara', 8),
(96, 'Rawasari', 8),
(97, 'Sukaratu', 8),
(98, 'Tanjungsari', 8),
(99, 'Balonggandu', 9),
(100, 'Barugbug', 9),
(101, 'Cikalongsari', 9),
(102, 'Cirejag', 9),
(103, 'Jatibaru', 9),
(104, 'Jatiragas', 9),
(105, 'Jatisari', 9),
(106, 'Jatiwangi', 9),
(107, 'Kalijati', 9),
(108, 'Mekarsari', 9),
(109, 'Pacing', 9),
(110, 'Situdam', 9),
(111, 'Sukamekar', 9),
(112, 'Telarsari', 9),
(113, 'Ciptamarga', 10),
(114, 'Jayakerta', 10),
(115, 'Jayamakmur', 10),
(116, 'Kampungsawah', 10),
(117, 'Kemiri', 10),
(118, 'Kertajaya', 10),
(119, 'Makmurjaya', 10),
(120, 'Medangasem', 10),
(121, 'Adiarsa Barat', 11),
(122, 'Karangpawitan', 11),
(123, 'Karawang Kulon', 11),
(124, 'Mekarjati', 11),
(125, 'Nagasari', 11),
(126, 'Tanjungmekar', 11),
(127, 'Tanjungpura', 11),
(128, 'Tunggakjati', 11),
(129, 'Kondangjaya', 12),
(130, 'Margasari', 12),
(131, 'Tegalsawah', 12),
(132, 'Warungbambu', 12),
(133, 'Adiarsa Timur', 12),
(134, 'Karawang Wetan', 12),
(135, 'Palumbonsari', 12),
(136, 'Plawad', 12),
(137, 'Anggadita', 13),
(138, 'Belendung', 13),
(139, 'Cibalongsari', 13),
(140, 'Cimahi', 13),
(141, 'Curug', 13),
(142, 'Duren', 13),
(143, 'Gintungkerta', 13),
(144, 'Karanganyar', 13),
(145, 'Kiarapayung', 13),
(146, 'Klari', 13),
(147, 'Pancawati', 13),
(148, 'Sumurkondang', 13),
(149, 'Walahar', 13),
(150, 'Cikampek Utara', 14),
(151, 'Jomin Barat', 14),
(152, 'Jomin Timur', 14),
(153, 'Pangulah Baru', 14),
(154, 'Pangulah Selatan', 14),
(155, 'Pangulah Utara', 14),
(156, 'Pucung', 14),
(157, 'Sarimulya', 14),
(158, 'Wancimekar', 14),
(159, 'Kutagandok', 15),
(160, 'Kutajaya', 15),
(161, 'Kutakarya', 15),
(162, 'Kutamukti', 15),
(163, 'Kutaraja', 15),
(164, 'Mulyajaya', 15),
(165, 'Sampalan', 15),
(166, 'Sindangkarya', 15),
(167, 'Sindangmukti', 15),
(168, 'Sindangmulya', 15),
(169, 'Sindangsari', 15),
(170, 'Waluya', 15),
(171, 'Ciwaringin', 16),
(172, 'Karangtanjung', 16),
(173, 'Karyamukti', 16),
(174, 'Kedawung', 16),
(175, 'Lemahabang', 16),
(176, 'Lemahmukti', 16),
(177, 'Pasirtanjung', 16),
(178, 'Pulojaya', 16),
(179, 'Pulokalapa', 16),
(180, 'Pulomulya', 16),
(181, 'Waringinkarya', 16),
(182, 'Bengle', 17),
(183, 'Ciranggon', 17),
(184, 'Lemahmulya', 17),
(185, 'Majalaya', 17),
(186, 'Pasirjengkol', 17),
(187, 'Pasirmulya', 17),
(188, 'Sarijaya', 17),
(189, 'Solokan', 18),
(190, 'Talagajaya', 18),
(191, 'Tanahbaru', 18),
(192, 'Tanjungbungin', 18),
(193, 'Tanjungmekar', 18),
(194, 'Tanjungpakis', 18),
(195, 'Telukbuyung', 18),
(196, 'Telukjaya', 18),
(197, 'Cintaasih', 19),
(198, 'Ciptasari', 19),
(199, 'Jatilaksana', 19),
(200, 'Kertasari', 19),
(201, 'Medalsari', 19),
(202, 'Mulangsari', 19),
(203, 'Tamanmekar', 19),
(204, 'Tamansari', 19),
(205, 'Dongkal', 20),
(206, 'Jatimulya', 20),
(207, 'Karangjaya', 20),
(208, 'Kedaljaya', 20),
(209, 'Kertamulya', 20),
(210, 'Kertaraharja', 20),
(211, 'Labanjaya', 20),
(212, 'Malangsari', 20),
(213, 'Payungsari', 20),
(214, 'Puspasari', 20),
(215, 'Randumulya', 20),
(216, 'Sungaibuntu', 20),
(217, 'Cengkong', 21),
(218, 'Darawolong', 21),
(219, 'Karangsari', 21),
(220, 'Mekarjaya', 21),
(221, 'Purwasari', 21),
(222, 'Sukasari', 21),
(223, 'Tamelang', 21),
(224, 'Tegalsari', 21),
(225, 'Balongsari', 22),
(226, 'Cibadak', 22),
(227, 'Gombongsari', 22),
(228, 'Kutawargi', 22),
(229, 'Mekarjaya', 22),
(230, 'Panyingkiran', 22),
(231, 'Pasirawi', 22),
(232, 'Pasirkaliki', 22),
(233, 'Purwamekar', 22),
(234, 'Sekarwangi', 22),
(235, 'Sukamerta', 22),
(236, 'Sukapura', 22),
(237, 'Sukaraja', 22),
(238, 'Amansari', 23),
(239, 'Dewisari', 23),
(240, 'Dukuhkarya', 23),
(241, 'Kalangsari', 23),
(242, 'Kalangsuria', 23),
(243, 'Karyasari', 23),
(244, 'Kertasari', 23),
(245, 'Rengasdengklok Selatan', 23),
(246, 'Rengasdengklok Utara', 23),
(247, 'Cigunungsari', 24),
(248, 'Cintalaksana', 24),
(249, 'Cintalanggeng', 24),
(250, 'Cintawargi', 24),
(251, 'Cipurwasari', 24),
(252, 'Kutalanggeng', 24),
(253, 'Kutamaneuh', 24),
(254, 'Mekarbuana', 24),
(255, 'Wargasetra', 24),
(256, 'Cadaskertajaya', 25),
(257, 'Cariumulya', 25),
(258, 'Cilewo', 25),
(259, 'Ciwulan', 25),
(260, 'Kalibuaya', 25),
(261, 'Kalijaya', 25),
(262, 'Kalisari', 25),
(263, 'Linggarsari', 25),
(264, 'Pasirkamuning', 25),
(265, 'Pasirmukti', 25),
(266, 'Pasirtalaga', 25),
(267, 'Pulosari', 25),
(268, 'Talagamulya', 25),
(269, 'Talagasari', 25),
(270, 'Karangligar', 26),
(271, 'Karangmulya', 26),
(272, 'Margakaya', 26),
(273, 'Margamulya', 26),
(274, 'Mekarmulya', 26),
(275, 'Mulyajaya', 26),
(276, 'Parungsari', 26),
(277, 'Wanajaya', 26),
(278, 'Wanakerta', 26),
(279, 'Wanasari', 26),
(280, 'Pinayungan', 27),
(281, 'Purwadana', 27),
(282, 'Puseurjaya', 27),
(283, 'Sirnabaya', 27),
(284, 'Sukaharja', 27),
(285, 'Sukaluyu', 27),
(286, 'Sukamakmur', 27),
(287, 'Telukjambe', 27),
(288, 'Wadas', 27),
(289, 'Cikuntul', 28),
(290, 'Ciparagejaya', 28),
(291, 'Dayeuhluhur', 28),
(292, 'Jayanagara', 28),
(293, 'Lemahduhur', 28),
(294, 'Lemahkarya', 28),
(295, 'Lemahmakmur', 28),
(296, 'Lemahsubur', 28),
(297, 'Pagadungan', 28),
(298, 'Pancakarya', 28),
(299, 'Purwajaya', 28),
(300, 'Sumberjaya', 28),
(301, 'Tanjungjaya', 28),
(302, 'Tempuran', 28),
(303, 'Bolang', 29),
(304, 'Gempolkarya', 29),
(305, 'Kutamakmur', 29),
(306, 'Medankarya', 29),
(307, 'Pisangsambo', 29),
(308, 'Sabajaya', 29),
(309, 'Srijaya', 29),
(310, 'Srikamulyan', 29),
(311, 'Sumurlaban', 29),
(312, 'Tambaksari', 29),
(313, 'Tambaksumur', 29),
(354, 'Bolang', 30),
(355, 'Gempolkarya', 30),
(356, 'Kutamakmur', 30),
(357, 'Medankarya', 30),
(358, 'Pisangsambo', 30),
(359, 'Sabajaya', 30),
(360, 'Srijaya', 30),
(361, 'Srikamulyan', 30),
(362, 'Sumurlaban', 30),
(363, 'Tambaksari', 30),
(364, 'Tambaksumur', 30);

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `specialty` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `specialty`) VALUES
(12, 26, 'fahrul1', 'rozi gans banget', '123', 'ngorol133'),
(32, 47, 'muid', 'muid', '123', '123'),
(33, 48, 'fahrul', 'rozi', '123', '12323');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `expayer_date` date DEFAULT NULL,
  `status_deactived` tinyint(4) NOT NULL DEFAULT 0,
  `status_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`id`, `nama_obat`, `harga_beli`, `admin_id`, `harga_jual`, `stok`, `expayer_date`, `status_deactived`, `status_deleted`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 'paracetamol', 19000, 3, 25000, 5, NULL, 0, 0, '0', '2023-12-22 12:32:53', '0', '2023-12-22 12:34:06'),
(3, 'antangin', 20000, 3, 27000, 3, '2024-01-20', 0, 0, 'Muhid', '2023-12-22 12:41:32', 'Muhid', '2023-12-22 12:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`) VALUES
(1, 'Banyusari'),
(2, 'Batujaya'),
(3, 'Ciampel'),
(4, 'Cibuaya'),
(5, 'Cikampek'),
(6, 'Cilamaya Kulon'),
(7, 'Cilamaya Wetan'),
(8, 'Cilebar'),
(9, 'Jatisari'),
(10, 'Jayakerta'),
(11, 'Karawang Barat'),
(12, 'Karawang Timur'),
(13, 'Klari	'),
(14, 'Kotabaru'),
(15, 'Kutawaluya'),
(16, 'Lemahabang'),
(17, 'Majalaya'),
(18, 'Pakisjaya'),
(19, 'Pangkalan'),
(20, 'Pedes'),
(21, 'Purwasari'),
(22, 'Rawamerta'),
(23, 'Rengasdengklok'),
(24, 'Tegalwaru'),
(25, 'Talagasari'),
(26, 'Telukjambe Barat'),
(27, 'Telukjambe Timur'),
(28, 'Tempuran'),
(29, 'Tirtajaya'),
(30, 'Tirtamulya');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `contact` varchar(75) NOT NULL,
  `address` varchar(225) NOT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `kecamatan_id`, `desa_id`, `first_name`, `last_name`, `gender`, `contact`, `address`, `date_of_birth`) VALUES
(2, 7, 0, 0, 'sisakit', 'sipaling', 'Male', '08548497328947', 'dusun karajan a rt 002/001 desa kertasari kec rengasdengklokk kab karawang ', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id_profile` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('super_admin','doctor','patient','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(5, 'pemilik@gmail.com', '$2y$10$wH/yX.Av1bQijx76jj96guZeJw3Qid1RPO5IR5WYIGXQstp7KahKC', 'super_admin'),
(7, 'p1@sicare.com', '$2y$10$40yX3VsSbAiKm8qOB8NQ4.O87ePTQtzcHGvN9XjcF9vbZgzEyeOiS', 'patient'),
(21, 'digiarts1222@gmail.com', '$2y$10$wnGU1yEgkEfRylSLUtCvGO.oHXT0zBPq7r6g1HFOQ4fwESLhbZoJ.', 'doctor'),
(26, 'jaja@gmail.com', '$2y$10$5KIDWd01QgObU6wR0fkyceKjqCUcMfTlLH2kwruRDOF3RY5SvDrjm', 'doctor'),
(35, 'anggi@gmail.com', '$2y$10$LduLcZ6J5vgyszNt1SjnEOB5omPkHif.jz3hrE1w4m/dUkO8jOHSq', 'doctor'),
(45, '1@a.com', '$2y$10$fryND.FfaE0KuCvJCZqg.OhUFev90V16HcWjztTh1vwzxjwK2Gkc.', 'patient'),
(46, 'huf@gmail.com', '$2y$10$yLtocFYUwb9BvrtnuCLw8eqV9HrOKJpoMhf6PdWoroto4zm0XYs4a', 'doctor'),
(47, 'mudi@gmail.com', '$2y$10$zw4NiJpZoA9mTm1odV4mOOUKWnghtIOXexBQ7dxyjy5Uz6erUJxyG', 'doctor'),
(48, 'digiarts12222@gmail.com', '$2y$10$BFsHJ1zkzmPw6u4bR9zmzOLz3ZbtHFuYQvyjOVjhVa3EsESHTy5hK', 'doctor'),
(49, 'if22.fahrulrozi@mhs.ubpkarawang.ac.id', '$2y$10$CBJfoaMFAv5EW30W5lR.RehK2BHukcA9PqllD2KybeM9PaxdfrBc6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `diagnoses_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `drug`
--
ALTER TABLE `drug`
  ADD CONSTRAINT `drug_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD CONSTRAINT `super_admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
