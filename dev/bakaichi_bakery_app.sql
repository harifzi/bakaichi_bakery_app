-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2018 pada 16.32
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
-- Database: `bakaichi_bakery_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_detail`
--

CREATE TABLE `cart_detail` (
  `CART_DETAIL_ID` int(11) NOT NULL,
  `KUE_ID` int(11) NOT NULL,
  `FEATURE_CART_ID` int(11) NOT NULL,
  `CART_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BANYAK_CART` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feature_cart`
--

CREATE TABLE `feature_cart` (
  `FEATURE_CART_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `FEATURE_ACTIVE` smallint(6) NOT NULL,
  `FEATURE_CART_EXPIRED_AT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `INVOICE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `INVOICE_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_history`
--

CREATE TABLE `invoice_history` (
  `INVOICE_KUE_HISTORY_ID` int(11) NOT NULL,
  `INVOICE_ID` int(11) NOT NULL,
  `USER_ID_BACKUP` int(11) NOT NULL,
  `INVOICE_CEATED_AT_BACKUP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `KOMENTAR_KRITIK_ID` int(11) NOT NULL,
  `KRITIK_SARAN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `KOMENTAR` longtext NOT NULL,
  `KOMENTAR_KRITIK_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `KRITIK_SARAN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `KRITIK_SARAN` longtext NOT NULL,
  `RATE` int(11) NOT NULL,
  `KRITIK_SARAN_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `DESKRIPSI_KUE` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kue`
--

INSERT INTO `kue` (`KUE_ID`, `JENIS_KUE_ID`, `NAMA_KUE`, `HARGA_KUE`, `GAMBAR_KUE`, `DESKRIPSI_KUE`) VALUES
(4, 1, 'Rocky Cookie Mini', 70000, 'assets/gallery/5b40d93fb6c4d2.72074807.jpg', ''),
(5, 0, 'Tora Tiramisu', 140000, 'assets/gallery/5b40d96ab39923.38186899.jpg', 'Kue keju khas Italia dengan taburan bubuk kakao di atasnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `PEMESANAN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `INVOICE_ID` int(11) NOT NULL,
  `TOTAL_PEMESANAN` int(11) NOT NULL,
  `PEMESANAN_CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PEMESANAN_UPDATE_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_kue`
--

CREATE TABLE `pemesanan_kue` (
  `PEMESANAN_KUE_ID` int(11) NOT NULL,
  `PEMESANAN_ID` int(11) NOT NULL,
  `KUE_ID` int(11) NOT NULL,
  `BANYAK_PEMESANAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_kue_history`
--

CREATE TABLE `pemesanan_kue_history` (
  `PEMESANAN_KUE_HISTORY_ID` int(11) NOT NULL,
  `PEMESANAN_KUE_ID` int(11) NOT NULL,
  `KUE_ID_BACKUP` int(11) NOT NULL,
  `PEMESANAN_ID_BACKUP` int(11) NOT NULL,
  `BANYAK_PEMESANAN_BACKUP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan_kue`
--

CREATE TABLE `pengambilan_kue` (
  `PENGAMBILAN_KUE_ID` int(11) NOT NULL,
  `INVOICE_ID` int(11) NOT NULL,
  `PEMESANAN_ID` int(11) NOT NULL,
  `PENGAMBILAN_KUE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `VIA_PENGIRIMAN` smallint(6) NOT NULL,
  `CHARGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `NAMA_DEPAN` varchar(25) NOT NULL,
  `NAMA_BELAKANG` varchar(25) NOT NULL,
  `ROLE` smallint(6) NOT NULL,
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
(0, 'mgdgsd', 'mgdgsd.mgmt@gmail.com', 'adminhaha', 'Madyana', 'Wijaya Pancasilais', 1, '089898989821', 'Jl. Wonorejo 3 No. 28', 656645, '2018-06-21 00:32:44', '2018-05-29 09:26:50'),
(1, 'dandika', 'andika.gonz@gmail.com', 'lalaland', 'Andika', 'Supriyanto Gonzales', 0, '085847373434', 'Jl. Diponegoro / 232', 656645, '2018-05-29 09:28:52', '2018-05-29 09:28:52'),
(2, 'igafitriaa', 'igaa.fitria@gmail.com', 'lalaland', 'Iga', 'Fitria Sukmawati', 0, '085824117943', 'Jl. Kenjeran Gang Pocong / 12', 65235, '2018-05-29 09:31:24', '2018-05-29 09:30:45'),
(3, 'erwinsantoso', 'erwinsantoso@gmail.com', 'lalaland', 'Erwin', 'Santoso Pusoko', 0, '0858421345356', 'Jl. Sukorejo / 321', 63454, '2018-05-29 09:33:09', '2018-05-29 09:33:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`CART_DETAIL_ID`),
  ADD KEY `CART_DETAIL_ID` (`CART_DETAIL_ID`),
  ADD KEY `FK_RELATIONSHIP_20` (`FEATURE_CART_ID`),
  ADD KEY `FK_RELATIONSHIP_22` (`KUE_ID`);

--
-- Indeks untuk tabel `feature_cart`
--
ALTER TABLE `feature_cart`
  ADD PRIMARY KEY (`FEATURE_CART_ID`),
  ADD KEY `FEATURE_CART_ID` (`FEATURE_CART_ID`),
  ADD KEY `FK_RELATIONSHIP_19` (`USER_ID`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`INVOICE_ID`),
  ADD KEY `INVOICE_ID` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_14` (`USER_ID`);

--
-- Indeks untuk tabel `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD PRIMARY KEY (`INVOICE_KUE_HISTORY_ID`),
  ADD KEY `INVOICE_KUE_HISTORY_ID` (`INVOICE_KUE_HISTORY_ID`),
  ADD KEY `FK_RELATIONSHIP_15` (`INVOICE_ID`);

--
-- Indeks untuk tabel `jenis_kue`
--
ALTER TABLE `jenis_kue`
  ADD PRIMARY KEY (`JENIS_KUE_ID`),
  ADD KEY `JENIS_KUE_ID` (`JENIS_KUE_ID`);

--
-- Indeks untuk tabel `komentar_kritik`
--
ALTER TABLE `komentar_kritik`
  ADD PRIMARY KEY (`KOMENTAR_KRITIK_ID`),
  ADD KEY `KOMENTAR_KRITIK_ID` (`KOMENTAR_KRITIK_ID`),
  ADD KEY `FK_RELATIONSHIP_17` (`KRITIK_SARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_18` (`USER_ID`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`KRITIK_SARAN_ID`),
  ADD KEY `KRITIK_SARAN_ID` (`KRITIK_SARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_16` (`USER_ID`);

--
-- Indeks untuk tabel `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`KUE_ID`),
  ADD KEY `KUE_ID` (`KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_1` (`JENIS_KUE_ID`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`PEMESANAN_ID`),
  ADD KEY `PEMESANAN_ID` (`PEMESANAN_ID`),
  ADD KEY `FK_RELATIONSHIP_13` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`USER_ID`);

--
-- Indeks untuk tabel `pemesanan_kue`
--
ALTER TABLE `pemesanan_kue`
  ADD PRIMARY KEY (`PEMESANAN_KUE_ID`),
  ADD KEY `PEMESANAN_KUE_ID` (`PEMESANAN_KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`PEMESANAN_ID`);

--
-- Indeks untuk tabel `pemesanan_kue_history`
--
ALTER TABLE `pemesanan_kue_history`
  ADD PRIMARY KEY (`PEMESANAN_KUE_HISTORY_ID`),
  ADD KEY `PEMESANAN_KUE_HISTORY_ID` (`PEMESANAN_KUE_HISTORY_ID`),
  ADD KEY `FK_RELATIONSHIP_21` (`PEMESANAN_KUE_ID`);

--
-- Indeks untuk tabel `pengambilan_kue`
--
ALTER TABLE `pengambilan_kue`
  ADD PRIMARY KEY (`PENGAMBILAN_KUE_ID`),
  ADD KEY `PENGAMBILAN_KUE_ID` (`PENGAMBILAN_KUE_ID`),
  ADD KEY `FK_RELATIONSHIP_11` (`INVOICE_ID`),
  ADD KEY `FK_RELATIONSHIP_12` (`PEMESANAN_ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `CART_DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feature_cart`
--
ALTER TABLE `feature_cart`
  MODIFY `FEATURE_CART_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice_history`
--
ALTER TABLE `invoice_history`
  MODIFY `INVOICE_KUE_HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_kue`
--
ALTER TABLE `jenis_kue`
  MODIFY `JENIS_KUE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar_kritik`
--
ALTER TABLE `komentar_kritik`
  MODIFY `KOMENTAR_KRITIK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `KRITIK_SARAN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kue`
--
ALTER TABLE `kue`
  MODIFY `KUE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `PEMESANAN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_kue`
--
ALTER TABLE `pemesanan_kue`
  MODIFY `PEMESANAN_KUE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_kue_history`
--
ALTER TABLE `pemesanan_kue_history`
  MODIFY `PEMESANAN_KUE_HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengambilan_kue`
--
ALTER TABLE `pengambilan_kue`
  MODIFY `PENGAMBILAN_KUE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`FEATURE_CART_ID`) REFERENCES `feature_cart` (`FEATURE_CART_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`KUE_ID`) REFERENCES `kue` (`KUE_ID`);

--
-- Ketidakleluasaan untuk tabel `feature_cart`
--
ALTER TABLE `feature_cart`
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

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
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_kue`
--
ALTER TABLE `pemesanan_kue`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`KUE_ID`) REFERENCES `kue` (`KUE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`PEMESANAN_ID`) REFERENCES `pemesanan` (`PEMESANAN_ID`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_kue_history`
--
ALTER TABLE `pemesanan_kue_history`
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`PEMESANAN_KUE_ID`) REFERENCES `pemesanan_kue` (`PEMESANAN_KUE_ID`);

--
-- Ketidakleluasaan untuk tabel `pengambilan_kue`
--
ALTER TABLE `pengambilan_kue`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`INVOICE_ID`) REFERENCES `invoice` (`INVOICE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`PEMESANAN_ID`) REFERENCES `pemesanan` (`PEMESANAN_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
