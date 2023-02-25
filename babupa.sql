-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2023 pada 14.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babupa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `gambar`, `deskripsi`) VALUES
(4, 'budaya.jpeg', 'banjaran'),
(5, 'budaya3.jpg', 'jaipong'),
(8, 'budaya5.jpeg', 'terompet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE `tb_review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `review_ulasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_review`
--

INSERT INTO `tb_review` (`id_review`, `id_user`, `id_wisata`, `nama`, `review_ulasan`) VALUES
(11, 27, 13, 'pengguna', 'seru'),
(12, 27, 10, 'pengguna', 'keren'),
(13, 29, 12, 'akbar', 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alamat_lengkap` varchar(100) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `jumlah_tiket` int(100) NOT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status_transaksi` varchar(100) NOT NULL DEFAULT 'Belum Bayar',
  `file_tiket` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_pemesanan`, `id_user`, `id_wisata`, `tanggal_pemesanan`, `alamat_lengkap`, `no_tlp`, `nama_wisata`, `jumlah_tiket`, `bukti_transfer`, `status_transaksi`, `file_tiket`, `total_harga`) VALUES
(41, 27, 23, '2023-02-15 17:00:00', 'jl peta', '08149194214', '23', 3, 'IMG20230210110938.jpg', 'Pending', '', 120000),
(43, 27, 22, '2023-02-16 05:32:35', 'ajoajdjjdajdadajdo', 'aadaoadoa', '22', 10, NULL, 'Belum Bayar', '', 200000),
(44, 27, 24, '2023-02-16 11:34:42', 'adaaadaodkadaok', '0190291009102', '24', 9, NULL, 'Belum Bayar', '', 90000),
(45, 27, 22, '2023-02-17 07:38:14', 'rumah', '08941941567', '22', 2, NULL, 'Belum Bayar', '', 80000),
(46, 27, 23, '2023-02-17 08:28:59', 'home', '018407510750', '23', 3, NULL, 'Belum Bayar', '', 120000),
(47, 27, 24, '2023-02-18 17:05:30', 'desa', '086754643', '24', 3, NULL, 'Belum Bayar', '', 30000),
(48, 27, 24, '2023-02-19 16:01:52', 'bandung', '0812832104', '24', 2, 'IMG20230210110938.jpg', 'Sudah Bayar', 'Tiket_Masuk_Villa_Pasir_Bungur.png', 20000),
(49, 27, 25, '2023-02-22 03:24:26', 'dirumah', '018140024951', '25', 3, 'IMG20230210110938.jpg', 'Pending', '', 90000),
(50, 27, 22, '2023-02-24 10:56:14', 'dimana', '08919149596', '22', 3, 'IMG20230210110938.jpg', 'Sudah Bayar', 'Waterboom_Cahaya_Abadi.jpg', 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `usertype`, `fullname`, `email`, `foto`) VALUES
(26, 'admin', '$2y$10$cXVuVo3JQVc857iBtIg2MOWdDmCiAIMVQh6bSm86rQd5YVbks8sQi', 'Admin', 'admin', 'admin@gmail.com', 'default.png'),
(27, 'pengguna', '$2y$10$MVfxDqGGuwYVEUTrjsEXzOfq282voQWIMYGEV4COvnBwK5TSa9HsK', 'Pengguna', 'pengguna', 'pengguna@gmail.com', 'beach-sand-hd-brown-sand-wallpaper-preview.jpg'),
(28, 'pengelola', '$2y$10$jm49GZ5axyuWOUYcIhfnyu8bkidA5AJFziKkZSqeaGvBE4xsrxE3e', 'Pengelola', 'Patrick', 'pengelola@gmail.com', 'Tiket_Masuk_Villa_Pasir_Bungur3.png'),
(29, 'akbarrr', '$2y$10$oI5ohnRT0Qw7pK8HORvwMOm28VsdJYlp/OhhQQcEH4Dyl3C.r5uBq', 'Pengelola', 'akbar', 'akbar@gmail.com', 'default.png'),
(34, 'ujang', '$2y$10$Q9EMwlKHjWSn48Ru4DUC5eGTuPJEoni1xSmxvMJfDmZBsi0qIvIgC', 'Pengelola', 'ujang', 'ujang@gmail.com', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `fasilitas` text NOT NULL,
  `deskripsi_lainnya` text NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `id_pengelola`, `nama_wisata`, `deskripsi`, `fasilitas`, `deskripsi_lainnya`, `harga_tiket`, `gambar`) VALUES
(22, 28, 'Kolam Renang Cahaya Abadi', 'Waterboom Cahaya Abadi - sebuah tempat berenang sekaligus tempat wisata keluarga yang berada di Banjaran ini sekarang lagi hits dan populer di Bandung terutama masyarakat Banjaran.\r\nTempat berenang waterboom yang dekat dengan lokasi sekitar Banjaran ini selalu ramai di kunjungi setiap hari terutama saat libur akhir pekan atau liburan panjang. Tiket masuk Waterboom Cahaya Abadi terbilang cukup murah sangat terjangkau oleh kalangan menengah ke bawah.\r\nKolam renang Waterboom Cahaya Abadi menjadi alternatif pilihan bagi warga Bandung Selatan yang mencari tempat rekreasi terdekat. Waterboom Cahaya Abadi juga terkenal dengan sebutan Villa Buaya karena selain tempat berenang tempat ini juga menyediakan vila penginapan untuk pengunjung.\r\n', '- Kolam renang Waterboom yang lengkap untuk anak dan dewasa\r\n- Seluncuran air dengan berbagai macam bentuk\r\n- Vila Penginapan\r\n- Taman Bermain\r\n- Kereta Mini untuk anak\r\n- Spot Foto yang menarik', '- Harga : Rp. 20.000\r\n- Sewa vila kisaran Rp.100.000 - Rp.250.000\r\n- Tarif parkir : motor Rp. 2.000, Mobil Rp. 5.000', 20000, 'Waterboom_Cahaya_Abadi.jpg'),
(23, 29, 'Arjasari Rock Hill', 'Arjasari Rock Hill ditulis adalah tempat wisata terbaru di Kabupaten Bandung Provinsi Jawa Barat.', '-Area parkir yang luas\r\n-Toilet\r\n-Mushola\r\n', 'Tiket masuk atau HTM Arjasari Rock Hill Rp. 40.000 per orang (Harga tiket tersebut sudah termasuk biaya naik mobil khusus pengantar wisatawan ke lokasi utama)\r\n', 40000, 'Arjasari_Rock_Hill.jpg'),
(24, 34, 'Kolam Renang Hadiana', 'Kolam Renang Hadiana termasuk kolam renang yang ada di kecamatan banjaran dengan harga yang relatif murah dan terjangkau', '- tempat lumayan luas\r\n- tersedia kolam renang  anak dan dewasa\r\n', 'parkiran luas', 10000, 'Kolam_Renang_Hadiana.jpg'),
(25, 28, 'simfay kimfa', 'bagus banget', 'banyak', 'banyak sekali', 30000, 'Waterboom_Cahaya_Abadi1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_wisata`) REFERENCES `tb_wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD CONSTRAINT `tb_wisata_ibfk_1` FOREIGN KEY (`id_pengelola`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
