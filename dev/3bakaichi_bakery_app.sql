-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2018 pada 09.38
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

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
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `INVOICE_ID` char(67) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `INVOICE_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`INVOICE_ID`, `USER_ID`, `INVOICE_CREATED_AT`) VALUES
('inve7bb364761e5164f087a4117c47f4cd89087017d95ec90eafdbe6f91734bbd3f', '0c5ea8d884533461731461caed5e38a4', '2018-07-24 12:32:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_history`
--

CREATE TABLE `invoice_history` (
  `INVOICE_HISTORY_ID` char(71) NOT NULL,
  `INVOICE_ID` char(67) NOT NULL,
  `USER_ID_BACKUP` char(32) NOT NULL,
  `INVOICE_CREATED_AT_BACKUP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kue`
--

CREATE TABLE `jenis_kue` (
  `JENIS_KUE_ID` int(11) NOT NULL,
  `JENIS_KUE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kue`
--

INSERT INTO `jenis_kue` (`JENIS_KUE_ID`, `JENIS_KUE`) VALUES
(0, 'Kue Basah'),
(1, 'Kue Kering');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_kritik`
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
-- Struktur dari tabel `kritik_saran`
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
-- Struktur dari tabel `kue`
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
-- Dumping data untuk tabel `kue`
--

INSERT INTO `kue` (`KUE_ID`, `JENIS_KUE_ID`, `NAMA_KUE`, `HARGA_KUE`, `GAMBAR_KUE`, `DESKRIPSI_KUE`) VALUES
(4, 1, 'Rocky Cookie Mini', 70000, 'assets/gallery/5b40d93fb6c4d2.72074807.jpg', ''),
(5, 0, 'Tora Tiramisu', 140000, 'assets/gallery/5b40d96ab39923.38186899.jpg', 'Kue keju khas Italia dengan taburan bubuk kakao di atasnya'),
(6, 0, 'Black Forest Everest', 180000, 'assets/gallery/5b469ccaba0546.08678227.jpg', 'Kue kebanggaan Jerman yang terbuat dari bolu coklat yang dilapisi krim segar, serutan coklat dan ceri yang direndam dalam Kirschwasser, schnapps ceri jernih khas daerah SchwarzwÃ¤lder (Black Forest)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `KURIR_ID` int(11) NOT NULL,
  `KURIR` varchar(100) NOT NULL,
  `BIAYA_KURIR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`KURIR_ID`, `KURIR`, `BIAYA_KURIR`) VALUES
(0, 'JNE', 18000),
(1, 'POS INDONESIA', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `ORDER_ID` char(67) NOT NULL,
  `PAYMENT_ID` char(67) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `INVOICE_ID` char(67) NOT NULL,
  `ORDER_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`ORDER_ID`, `PAYMENT_ID`, `USER_ID`, `INVOICE_ID`, `ORDER_CREATED_AT`) VALUES
('odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 'pay3d5cee4585196e1112dda3f2288b1e83d75c409c33b99ca321b674d5ed3cabc6', '0c5ea8d884533461731461caed5e38a4', 'inve7bb364761e5164f087a4117c47f4cd89087017d95ec90eafdbe6f91734bbd3f', '2018-07-24 13:33:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE `order_item` (
  `ORDER_ITEM_ID` char(69) NOT NULL,
  `ORDER_ID` char(67) NOT NULL,
  `KUE_ID` int(11) NOT NULL,
  `TOTAL_ORDER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_item`
--

INSERT INTO `order_item` (`ORDER_ITEM_ID`, `ORDER_ID`, `KUE_ID`, `TOTAL_ORDER`) VALUES
('odrit3c42cbd6cca833f42c96d633421c2332ab11d4176cd89f2f114f1dbc33aa9e62', 'odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 5, 1),
('odrit7ad9cd8cbbea421b08f61797ca516c74dd51a44c723620628045c15adc869820', 'odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item_history`
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
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` char(67) NOT NULL,
  `USER_ID` char(32) NOT NULL,
  `TOTAL_PAYMENT` int(11) NOT NULL,
  `STATUS_PAYMENT` tinyint(1) NOT NULL,
  `PAYMENT_EXPIRED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `USER_ID`, `TOTAL_PAYMENT`, `STATUS_PAYMENT`, `PAYMENT_EXPIRED_AT`) VALUES
('pay3d5cee4585196e1112dda3f2288b1e83d75c409c33b99ca321b674d5ed3cabc6', '0c5ea8d884533461731461caed5e38a4', 518000, 0, '2018-08-06 20:04:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping`
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
-- Dumping data untuk tabel `shipping`
--

INSERT INTO `shipping` (`SHIPPING_ID`, `KURIR_ID`, `INVOICE_ID`, `ORDER_ID`, `STATUS_SHIPPING`, `CATATAN`) VALUES
('shp2e7b8a0fbdcd42594919ce11ce546f8e7880efdc291db23e9e31e3a521436360', 0, 'inve7bb364761e5164f087a4117c47f4cd89087017d95ec90eafdbe6f91734bbd3f', 'odraf597457bf7dc76d53a962b5a50e1d9e0f64a04249cbd43343a0aeaf3989378f', 0, 'Tidak ada catatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `NAMA_DEPAN`, `NAMA_BELAKANG`, `ROLE`, `TELEPON`, `ALAMAT`, `KODE_POS`, `USER_CREATED_AT`, `USER_UPDATED_AT`) VALUES
('0c5ea8d884533461731461caed5e38a4', 'admin', 'mgdgsd.mgmt@gmail.com', '$2y$10$SNuM/XjLdLk7Dbir6iMZguCsAObHaX6QaUrer578xH63FttFh6j3e', 'Mas', 'Mas Admin', 1, '08578467563', 'Jl. Sukorejo Indramayu / 12', 60563, '2018-07-18 05:41:32', '2018-07-18 05:41:32'),
('5eff68af3bc31730f7e70f9cf0e39093', 'erwin', 'erwindanjo@gmail.com', '$2y$10$dtjhkaFC91.S9iX2DrIC1OvrV4UxZhd17vQflFJaFzN1rul4PAA62', 'Erwin', 'Santoso', 0, '08854573712', 'Jl. Gatau Lah Surabaya Pokoknya / 20', 65653, '2018-07-22 22:15:38', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_14` (`USER_ID`);

--
-- Indeks untuk tabel `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD PRIMARY KEY (`INVOICE_HISTORY_ID`),
  ADD KEY `FK_RELATIONSHIP_15` (`INVOICE_ID`);

--
-- Indeks untuk tabel `jenis_kue`
--
ALTER TABLE `jenis_kue`
  ADD PRIMARY KEY (`JENIS_KUE_ID`);

--
-- Indeks untuk tabel `komentar_kritik`
--
ALTER TABLE `komentar_kritik`
  ADD PRIMARY KEY (`KOMENTAR_KRITIK_ID`),
  ADD KEY `FK_RELATIONSHIP_17` (`KRITIK_SARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_18` (`USER_ID`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`KRITIK_SARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_16` (`USER_ID`);

--
-- Indeks untuk tabel `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_1` (`JENIS_KUE_ID`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`KURIR_ID`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `FK_RELATIONSHIP_13` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_19` (`PAYMENT_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`USER_ID`);

--
-- Indeks untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ORDER_ITEM_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`ORDER_ID`);

--
-- Indeks untuk tabel `order_item_history`
--
ALTER TABLE `order_item_history`
  ADD PRIMARY KEY (`ORDER_ITEM_HISTORY_ID`),
  ADD KEY `FK_RELATIONSHIP_21` (`ORDER_ITEM_ID`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `FK_RELATIONSHIP_20` (`USER_ID`);

--
-- Indeks untuk tabel `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`SHIPPING_ID`),
  ADD KEY `FK_RELATIONSHIP_11` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_12` (`ORDER_ID`),
  ADD KEY `FK_RELATIONSHIP_24` (`KURIR_ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`);

--
-- Ketidakleluasaan untuk tabel `komentar_kritik`
--
ALTER TABLE `komentar_kritik`
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`KRITIK_SARAN_ID`) REFERENCES `kritik_saran` (`KRITIK_SARAN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel `kue`
--
ALTER TABLE `kue`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`JENIS_KUE_ID`) REFERENCES `jenis_kue` (`JENIS_KUE_ID`);

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`PAYMENT_ID`) REFERENCES `payment` (`PAYMENT_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`KUE_ID`) REFERENCES `kue` (`KUE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ORDER_ID`) REFERENCES `order` (`ORDER_ID`);

--
-- Ketidakleluasaan untuk tabel `order_item_history`
--
ALTER TABLE `order_item_history`
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ORDER_ITEM_ID`) REFERENCES `order_item` (`ORDER_ITEM_ID`);

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ORDER_ID`) REFERENCES `order` (`ORDER_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`KURIR_ID`) REFERENCES `kurir` (`KURIR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
