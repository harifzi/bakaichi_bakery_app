-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 12:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3bakaichi_bakery_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `INVOICE_ID` char(67) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `INVOICE_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`INVOICE_ID`, `USER_ID`, `INVOICE_CREATED_AT`) VALUES
('invc5d3bf50a87a1914cbd0dc18a64d1f636424829d66afba5f5a7897beef3757c5', '2ac179637c18da014121799746e1a5f9', '2018-07-13 03:49:47'),
('invd4a275e9b83947a32207b2d0560909eb5e122474c8de8e5fd0517b876117d38a', '5eff68af3bc31730f7e70f9cf0e39093', '2018-07-25 17:57:26'),
('inve7bb364761e5164f087a4117c47f4cd89087017d95ec90eafdbe6f91734bbd3f', '0c5ea8d884533461731461caed5e38a4', '2018-07-24 12:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_history`
--

CREATE TABLE `invoice_history` (
  `INVOICE_HISTORY_ID` char(71) NOT NULL,
  `INVOICE_ID` char(67) NOT NULL,
  `USER_ID_BACKUP` char(32) NOT NULL,
  `INVOICE_CREATED_AT_BACKUP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kue`
--

CREATE TABLE `jenis_kue` (
  `JENIS_KUE_ID` int(11) NOT NULL,
  `JENIS_KUE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kue`
--

INSERT INTO `jenis_kue` (`JENIS_KUE_ID`, `JENIS_KUE`) VALUES
(0, 'Kue Basah'),
(1, 'Kue Kering');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_kritik`
--

CREATE TABLE `komentar_kritik` (
  `KOMENTAR_KRITIK_ID` char(32) NOT NULL,
  `KRITIK_SARAN_ID` char(32) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `KOMENTAR` text NOT NULL,
  `KOMENTAR_KRITIK_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `KOMENTAR_KRITIK_UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `KRITIK_SARAN_ID` char(32) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `KRITIK_SARAN` text NOT NULL,
  `RATE` int(11) NOT NULL,
  `KRITIK_SARAN_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `KRITIK_SARAN_UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kue`
--

CREATE TABLE `kue` (
  `KUE_ID` int(11) NOT NULL,
  `JENIS_KUE_ID` int(11) NOT NULL,
  `NAMA_KUE` varchar(25) NOT NULL,
  `HARGA_KUE` int(11) NOT NULL,
  `GAMBAR_KUE` varchar(255) NOT NULL,
  `DESKRIPSI_KUE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kue`
--

INSERT INTO `kue` (`KUE_ID`, `JENIS_KUE_ID`, `NAMA_KUE`, `HARGA_KUE`, `GAMBAR_KUE`, `DESKRIPSI_KUE`) VALUES
(4, 1, 'Rocky Cookie Mini', 70000, 'assets/gallery/5b40d93fb6c4d2.72074807.jpg', ''),
(5, 0, 'Tora Tiramisu', 140000, 'assets/gallery/5b40d96ab39923.38186899.jpg', 'Kue keju khas Italia dengan taburan bubuk kakao di atasnya'),
(6, 0, 'Black Forest Everest', 180000, 'assets/gallery/5b469ccaba0546.08678227.jpg', 'Kue kebanggaan Jerman yang terbuat dari bolu coklat yang dilapisi krim segar, serutan coklat dan ceri yang direndam dalam Kirschwasser, schnapps ceri jernih khas daerah SchwarzwÃ¤lder (Black Forest)');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `KURIR_ID` int(11) NOT NULL,
  `KURIR` varchar(100) NOT NULL,
  `BIAYA_KURIR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`KURIR_ID`, `KURIR`, `BIAYA_KURIR`) VALUES
(0, 'JNE', 18000),
(1, 'POS INDONESIA', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ORDER_ID` char(67) NOT NULL,
  `PAYMENT_ID` char(67) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `INVOICE_ID` char(67) NOT NULL,
  `ORDER_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ORDER_ID`, `PAYMENT_ID`, `USER_ID`, `INVOICE_ID`, `ORDER_CREATED_AT`) VALUES
('odr356b0a279b6a89633eff243588cdbdc4386e28a5aca59b4b3212612a2ea3265e', 'pay25b2cf4aa33f95ac7c44cbca6aebd07e2c43f768a4ce58f222e4845e1a19b375', '2ac179637c18da014121799746e1a5f9', 'invc5d3bf50a87a1914cbd0dc18a64d1f636424829d66afba5f5a7897beef3757c5', '2018-07-13 03:49:47'),
('odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 'pay3d5cee4585196e1112dda3f2288b1e83d75c409c33b99ca321b674d5ed3cabc6', '0c5ea8d884533461731461caed5e38a4', 'inve7bb364761e5164f087a4117c47f4cd89087017d95ec90eafdbe6f91734bbd3f', '2018-07-24 13:33:06'),
('odrb5aa267cee2e26051269868ebc57b5a05a3e1282a25b8d3becb3406db46ac892', 'pay52ad42f59bebfc9dd1bf3982d10828f32874ee041635bfe2a32d9d5269f15863', '5eff68af3bc31730f7e70f9cf0e39093', 'invd4a275e9b83947a32207b2d0560909eb5e122474c8de8e5fd0517b876117d38a', '2018-07-25 17:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `ORDER_ITEM_ID` char(69) NOT NULL,
  `ORDER_ID` char(67) NOT NULL,
  `KUE_ID` int(11) NOT NULL,
  `TOTAL_ORDER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`ORDER_ITEM_ID`, `ORDER_ID`, `KUE_ID`, `TOTAL_ORDER`) VALUES
('odrit1a67ce0dcb7d0b48cb183bfdc3250a96ce98cfc5f6d65e93e6f9e10d5516d807', 'odrb5aa267cee2e26051269868ebc57b5a05a3e1282a25b8d3becb3406db46ac892', 6, 2),
('odrit1c5118a301115bc80349bd030b557c0e0845e254c5d06dd71825cfd80b34cb7c', 'odr356b0a279b6a89633eff243588cdbdc4386e28a5aca59b4b3212612a2ea3265e', 5, 2),
('odrit3c42cbd6cca833f42c96d633421c2332ab11d4176cd89f2f114f1dbc33aa9e62', 'odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 5, 1),
('odrit415e1b03c63bedd92cde47d7586e9bb4ada0e56e318dcac861690770700b7a4f', 'odrb5aa267cee2e26051269868ebc57b5a05a3e1282a25b8d3becb3406db46ac892', 5, 1),
('odrit7ad9cd8cbbea421b08f61797ca516c74dd51a44c723620628045c15adc869820', 'odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 6, 2),
('odritaeca151a69a8c39a84becdf3cbed8cb79ee34b31b64b2a0279e39e86caffb41e', 'odr356b0a279b6a89633eff243588cdbdc4386e28a5aca59b4b3212612a2ea3265e', 4, 1),
('odritdda58189b0551d48a559ced16c0faf7676f3b661f314fa72afb1c5442c677d1c', 'odrb5aa267cee2e26051269868ebc57b5a05a3e1282a25b8d3becb3406db46ac892', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_item_history`
--

CREATE TABLE `order_item_history` (
  `ORDER_ITEM_HISTORY_ID` char(73) NOT NULL,
  `ORDER_ITEM_ID` char(69) NOT NULL,
  `KUE_ID_BACKUP` int(11) NOT NULL,
  `BANYAK_PEMESANAN_BACKUP` int(11) NOT NULL,
  `ORDER_ID_BACKUP` char(67) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` char(67) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `TOTAL_PAYMENT` int(11) NOT NULL,
  `STATUS_PAYMENT` tinyint(1) NOT NULL,
  `PAYMENT_EXPIRED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `USER_ID`, `TOTAL_PAYMENT`, `STATUS_PAYMENT`, `PAYMENT_EXPIRED_AT`) VALUES
('pay25b2cf4aa33f95ac7c44cbca6aebd07e2c43f768a4ce58f222e4845e1a19b375', '2ac179637c18da014121799746e1a5f9', 365000, 0, '2018-07-26 22:49:47'),
('pay3d5cee4585196e1112dda3f2288b1e83d75c409c33b99ca321b674d5ed3cabc6', '0c5ea8d884533461731461caed5e38a4', 518000, 0, '2018-08-06 20:04:41'),
('pay52ad42f59bebfc9dd1bf3982d10828f32874ee041635bfe2a32d9d5269f15863', '5eff68af3bc31730f7e70f9cf0e39093', 658000, 0, '2018-08-07 20:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `SHIPPING_ID` char(67) NOT NULL,
  `KURIR_ID` int(11) NOT NULL,
  `INVOICE_ID` char(67) NOT NULL,
  `ORDER_ID` char(67) NOT NULL,
  `STATUS_SHIPPING` tinyint(1) NOT NULL,
  `CATATAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`SHIPPING_ID`, `KURIR_ID`, `INVOICE_ID`, `ORDER_ID`, `STATUS_SHIPPING`, `CATATAN`) VALUES
('shp2e7b8a0fbdcd42594919ce11ce546f8e7880efdc291db23e9e31e3a521436360', 0, 'inve7bb364761e5164f087a4117c47f4cd89087017d95ec90eafdbe6f91734bbd3f', 'odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 0, 'Tidak ada catatan'),
('shp34a3c92e71568ad5082e1c610e1b90c5c41f8dff78bebb53aa2db62ab905b953', 0, 'invd4a275e9b83947a32207b2d0560909eb5e122474c8de8e5fd0517b876117d38a', 'odrb5aa267cee2e26051269868ebc57b5a05a3e1282a25b8d3becb3406db46ac892', 0, 'Tidak ada catatan'),
('shp4dd8724a96f7d44967fa6a7fe65cfdd6fa0b52c2b8a240e6578d8df121462ccf', 1, 'invc5d3bf50a87a1914cbd0dc18a64d1f636424829d66afba5f5a7897beef3757c5', 'odr356b0a279b6a89633eff243588cdbdc4386e28a5aca59b4b3212612a2ea3265e', 0, 'Tidak ada catatan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` char(32) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAMA_DEPAN` varchar(25) NOT NULL,
  `NAMA_BELAKANG` varchar(25) NOT NULL,
  `ROLE` tinyint(1) NOT NULL,
  `TELEPON` varchar(15) NOT NULL,
  `ALAMAT` varchar(70) NOT NULL,
  `KODE_POS` int(11) NOT NULL,
  `USER_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `NAMA_DEPAN`, `NAMA_BELAKANG`, `ROLE`, `TELEPON`, `ALAMAT`, `KODE_POS`, `USER_CREATED_AT`, `USER_UPDATED_AT`) VALUES
('0c5ea8d884533461731461caed5e38a4', 'admin', 'mgdgsd.mgmt@gmail.com', '$2y$10$SNuM/XjLdLk7Dbir6iMZguCsAObHaX6QaUrer578xH63FttFh6j3e', 'Mas', 'Mas Admin', 1, '08578467563', 'Jl. Sukorejo Indramayu / 12', 60563, '2018-07-18 05:41:32', '2018-07-18 05:41:32'),
('2ac179637c18da014121799746e1a5f9', 'bimo', 'bdup@gmail.com', '$2y$10$KT4RjLN.omcT3ndyHual8uV/znlJ.6l5j5zh.XIBlY/wZqkVmDkYG', 'Bimo Bdup', 'Gedih', 0, '089373743423', 'Jl. Jakabudaya Timur / No. 12', 64562, '2018-07-27 03:48:38', '0000-00-00 00:00:00'),
('5eff68af3bc31730f7e70f9cf0e39093', 'erwin', 'erwindanjo@gmail.com', '$2y$10$dtjhkaFC91.S9iX2DrIC1OvrV4UxZhd17vQflFJaFzN1rul4PAA62', 'Erwin', 'Santoso', 0, '08854573712', 'Jl. Gatau Lah Surabaya Pokoknya / 20', 65653, '2018-07-22 22:15:38', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_14` (`USER_ID`);

--
-- Indexes for table `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD PRIMARY KEY (`INVOICE_HISTORY_ID`),
  ADD KEY `FK_RELATIONSHIP_15` (`INVOICE_ID`);

--
-- Indexes for table `jenis_kue`
--
ALTER TABLE `jenis_kue`
  ADD PRIMARY KEY (`JENIS_KUE_ID`);

--
-- Indexes for table `komentar_kritik`
--
ALTER TABLE `komentar_kritik`
  ADD PRIMARY KEY (`KOMENTAR_KRITIK_ID`),
  ADD KEY `FK_RELATIONSHIP_17` (`KRITIK_SARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_18` (`USER_ID`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`KRITIK_SARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_16` (`USER_ID`);

--
-- Indexes for table `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_1` (`JENIS_KUE_ID`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`KURIR_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `FK_RELATIONSHIP_13` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_19` (`PAYMENT_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`USER_ID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ORDER_ITEM_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`ORDER_ID`);

--
-- Indexes for table `order_item_history`
--
ALTER TABLE `order_item_history`
  ADD PRIMARY KEY (`ORDER_ITEM_HISTORY_ID`),
  ADD KEY `FK_RELATIONSHIP_21` (`ORDER_ITEM_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `FK_RELATIONSHIP_20` (`USER_ID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`SHIPPING_ID`),
  ADD KEY `FK_RELATIONSHIP_11` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_12` (`ORDER_ID`),
  ADD KEY `FK_RELATIONSHIP_24` (`KURIR_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`);

--
-- Constraints for table `komentar_kritik`
--
ALTER TABLE `komentar_kritik`
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`KRITIK_SARAN_ID`) REFERENCES `kritik_saran` (`KRITIK_SARAN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `kue`
--
ALTER TABLE `kue`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`JENIS_KUE_ID`) REFERENCES `jenis_kue` (`JENIS_KUE_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`PAYMENT_ID`) REFERENCES `payment` (`PAYMENT_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`KUE_ID`) REFERENCES `kue` (`KUE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ORDER_ID`) REFERENCES `order` (`ORDER_ID`);

--
-- Constraints for table `order_item_history`
--
ALTER TABLE `order_item_history`
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ORDER_ITEM_ID`) REFERENCES `order_item` (`ORDER_ITEM_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ORDER_ID`) REFERENCES `order` (`ORDER_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`KURIR_ID`) REFERENCES `kurir` (`KURIR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
