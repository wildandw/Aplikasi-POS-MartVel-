-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2023 pada 16.59
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pointofsale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `namaproduk` varchar(30) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `harga` int(9) NOT NULL,
  `sub_total` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_transaksi` varchar(14) NOT NULL,
  `namaproduk` varchar(30) NOT NULL,
  `harga` int(9) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `sub_total` int(9) NOT NULL,
  `total` int(9) NOT NULL,
  `bayar` int(9) NOT NULL,
  `kembalian` int(9) NOT NULL,
  `tgl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_transaksi`, `namaproduk`, `harga`, `jumlah`, `sub_total`, `total`, `bayar`, `kembalian`, `tgl`) VALUES
('TRX001', 'Coca Cola', 15000, 1, 15000, 88000, 100000, 12000, '12 August 2023'),
('TRX001', 'Pepsodent Sikat Gigi', 8000, 2, 16000, 88000, 100000, 12000, '12 August 2023'),
('TRX001', 'Sari Roti Sobek Coklat', 19000, 3, 57000, 88000, 100000, 12000, '12 August 2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kodeproduk` varchar(7) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `namaproduk` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kategori` enum('Makanan','Minuman','Kesehatan','Elektronik','Perawatan') NOT NULL,
  `harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kodeproduk`, `namaproduk`, `kategori`, `harga`) VALUES
('PROD001', 'Sprite', 'Minuman', 15000),
('PROD002', 'Coca Cola', 'Minuman', 15000),
('PROD003', 'Fanta Strawberry', 'Minuman', 15000),
('PROD004', 'Frestea Apel', 'Minuman', 15000),
('PROD005', 'Nutriboost Strawberry', 'Minuman', 7400),
('PROD006', 'Minute Maid Pulpy Orange', 'Minuman', 5600),
('PROD007', 'Sosro Teh Botol', 'Minuman', 3800),
('PROD008', 'Le Mineral Air Mineral', 'Minuman', 6700),
('PROD009', 'Ultra Milk Susu UHT Coklat', 'Minuman', 4000),
('PROD010', 'Teh Kotak Jasmine', 'Minuman', 4000),
('PROD011', 'Bear Brand Susu Original', 'Minuman', 10500),
('PROD012', 'Pocari Sweat ion Water', 'Minuman', 4000),
('PROD013', 'Frisisan Flag Susu UHT', 'Minuman', 7600),
('PROD014', 'Pucuk Harum Jasmine', 'Minuman', 4000),
('PROD015', 'Mizone Mood Up Cranberry', 'Minuman', 6500),
('PROD016', 'Pop Mie Pedas Gledeek Cup', 'Makanan', 5900),
('PROD017', 'Sarimi Goreng Isi Dua Ayam', 'Makanan', 4000),
('PROD018', 'Indomie Mi Instan Soto', 'Makanan', 4000),
('PROD019', 'Richeese Wafer Nabati', 'Makanan', 6100),
('PROD020', 'Tango Wafer Vanilla Milk ', 'Makanan', 15500),
('PROD021', 'Fitbar Snack Bar Tiramisu', 'Minuman', 5900),
('PROD022', 'Roma Biskuit Kelapa Cream ', 'Makanan', 10900),
('PROD023', 'Taro Net Snack Seaweed ', 'Makanan', 9200),
('PROD024', 'Qtela Keripik Tempe Cabai Rawi', 'Makanan', 8500),
('PROD025', 'Chitato Ayam Bumbu', 'Makanan', 12000),
('PROD026', 'Garuda Kacang Atom Rasa Pedas', 'Makanan', 10600),
('PROD027', 'Permen Kiss Grape', 'Makanan', 7100),
('PROD028', 'Mentos Permen Rainbow Stick', 'Makanan', 4700),
('PROD029', 'Yupi Gummy Mini Burger', 'Makanan', 13500),
('PROD030', 'Sari Roti Sobek Coklat', 'Makanan', 19000),
('PROD031', 'ABC Kecap Asin Botol ', 'Makanan', 5400),
('PROD032', 'ABC Saus Tomat', 'Makanan', 14600),
('PROD033', 'Royco Bumbu Kaldu Penyedap', 'Makanan', 6100),
('PROD034', 'Tropical Minyak Goreng Botol ', 'Makanan', 37600),
('PROD035', 'Dolpin Garam ', 'Makanan', 12500),
('PROD036', 'Oskadon Obat Sakit Kepala', 'Kesehatan', 1800),
('PROD037', 'Neurobion 10 Tablet', 'Kesehatan', 29900),
('PROD038', 'Kalpanax Salep', 'Kesehatan', 9400),
('PROD039', 'PROMAG Tablet Kunyah', 'Kesehatan', 9100),
('PROD040', 'Insto Cool Eye Drop', 'Kesehatan', 17500),
('PROD041', 'Komik Herbal Original', 'Kesehatan', 12000),
('PROD042', 'Salonpas Hot Koyo 10 Lembar', 'Kesehatan', 7800),
('PROD043', 'Betadin', 'Kesehatan', 8000),
('PROD044', 'Paracetamol Tablet ', 'Kesehatan', 8000),
('PROD045', 'Oralit Sachet ', 'Kesehatan', 1000),
('PROD046', 'Sidomuncul Tolak Angin Permen ', 'Kesehatan', 3400),
('PROD047', 'Panadol Extra 10 Kaplet ', 'Kesehatan', 13400),
('PROD048', 'Antangin Habbatussauda Sirup ', 'Kesehatan', 19900),
('PROD049', 'OBH Combi Batuk Berdahak ', 'Kesehatan', 18000),
('PROD050', 'Imboost Effervescent Vitamin C', 'Kesehatan', 44500),
('PROD051', 'Baterai ABC Biru', 'Elektronik', 7000),
('PROD052', 'Philips Senter Malam', 'Elektronik', 17500),
('PROD053', 'Lampu Philips 5 Watt', 'Elektronik', 18000),
('PROD054', 'Bohlam Bola Lampu Pijar 5 Watt', 'Elektronik', 4500),
('PROD055', 'Kabel Listrik', 'Elektronik', 15500),
('PROD056', 'Stop Kontak + Kabel 2 Lubang', 'Elektronik', 10500),
('PROD057', 'Sunlight Sabun Cuci Piring', 'Perawatan', 5000),
('PROD058', 'Ekonomi Sabun Cream Lemon', 'Perawatan', 5700),
('PROD059', 'Pepsodent Pasta Gigi', 'Perawatan', 11000),
('PROD060', 'Head & Shoulders Shampoo', 'Perawatan', 33900),
('PROD061', 'Pepsodent Sikat Gigi', 'Perawatan', 8000),
('PROD062', 'Lifebouy Body Wash Cool', 'Perawatan', 27500),
('PROD063', 'Rinso Anti Noda Detergen', 'Perawatan', 27800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'username',
  `password` varchar(8) CHARACTER SET latin1 NOT NULL COMMENT 'password sesuai nim',
  `namalengkap` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'namalengkap'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `namalengkap`) VALUES
('admin', '123456', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kodeproduk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
