-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2020 pada 13.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfors_1_`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'admin2', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_made` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basket`
--

INSERT INTO `basket` (`id`, `customer_name`, `contact_number`, `total`, `status`, `date_made`) VALUES
(17, 'Seulgi', '7', '8000', 'paidoff', '2020-05-12 14:42:41'),
(18, 'Bae Joo Hyun', '3', '25000', 'pending', '2020-05-12 15:09:01'),
(19, 'Suho', '1', '10000', 'pending', '2020-05-12 18:22:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `customer_name`, `subject`, `email`, `message`) VALUES
(1, 'Adam Abdulrahman', 'Late Delivery', 'abdulflezy13@yahoo.com', 'Please ensure that your delivery guys deliver the meals at the required time because they are often late.'),
(2, 'Zainab Adamu', 'Late Delivery', 'Zee@yahoo.com', 'I need an email of the GM if possible');

-- --------------------------------------------------------

--
-- Struktur dari tabel `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_price` varchar(255) NOT NULL,
  `food_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_price`, `food_description`) VALUES
(7, 'Jellyfish', 'Makan Siang', '8000', 'ager ager'),
(8, 'Ice Cream', 'Spesial', '14000', 'IceCream dengan topping stobery dan coklat'),
(9, 'Pounded Yam', 'Makan Malam', '28000', 'Ini adalah salah satu makanan terbaik kami dan disiapkan dengan lezat untuk Anda'),
(10, 'Eba and Vegetable', 'Makan Malam', '16000', 'Ini adalah kombinasi yang sangat bagus'),
(12, 'Nasi Telur Ceplok', 'Sarapan', '10000', 'Nasi dengan celur ceplok '),
(13, 'Rolade Tahu Sayur', 'Sarapan', '12000', 'Menu sarapan pagi satu ini begitu praktis dan mudah cara membuatnya. rolade tahu dengan sosis dan berbagai macam sayuran bisa menjadi pilihan yang bagus untuk sarapan sehat bersama keluarga. Kandungan gizinya lebih dari cukup untuk aktivitas sehari-hari'),
(15, 'Egg Sandwich Telur', 'Sarapan', '15000', 'Menu sarapan pagi dengan egg sandwich ini mempunyai kandungan gizi, vitamin dan mineral yang lengkap. Selain bisa memberkan karbohidrat yang cukup, kadar lemaknya juga rendah karena kita menggunakan roti gandum. '),
(16, 'Omelet Nasi', 'Sarapan', '18000', 'Bahan bahannya hanya telur ayam, nasi, kaldu bubuk, garam dan merica kalau suka. Bisa ditambahaj juga irisan sosis dan wortel sebagai pelengkap. Cara membuatnya sangata mudah, semua bahan tinggal dicampur menjadi satu dan digoreng sampai matang.'),
(17, 'Veggie Burgers &ndash; Burgreens', 'Makan Siang', '25000', 'ni dia nih tempat di mana makanan sehat semuanya terasa lezat.  Semua menu di sini berbahan dasar sayuran dan buah. Buat yang nyari burger versi sehat, kamu mesti cobain aneka Veggie Burgers ala Burgreens. Ada Mushroom Burger yang punya mushroom patty dengan rasa yang mirip banget kayak beef beneran. Cocok banget deh buat vegetarian yang lagi kangen daging atau buat yang lagi hamil dan ngidam junkfood.'),
(18, 'Hamburger', 'Makan Siang', '20000', 'Hamberger enak dengan roti, daging, salad, saus, keju, tomat '),
(19, 'Pizza', 'Makan Siang', '50000', 'Pizza dengan topping sosis dan keju'),
(21, 'Baked Kentang Keju', 'Sarapan', '15000', 'Menu sarapan satu ini pasti menggugah selera. Kentang yang dipanggang dengan oven dan dimasak menggunakan keju quick melt pasti sangat disukai oleh suami dan anak-anak. Bukan hanya untuk sarapan pagi, menu makanan ini juga sehat dan bergizi untuk bekal anak sekolah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `globals`
--

CREATE TABLE `globals` (
  `global_id` int(11) NOT NULL,
  `global_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `globals`
--

INSERT INTO `globals` (`global_id`, `global_amt`) VALUES
(1, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `food`, `qty`) VALUES
(1, '13', 'pizza', '2'),
(2, '14', 'salad', '1'),
(3, '15', 'spicyburger', '1'),
(4, '16', 'Nasi Telur Ceplok', '3'),
(5, '17', 'Jellyfish', '1'),
(6, '18', 'Veggie Burgers &ndash; Burgreens', '1'),
(7, '19', 'Nasi Telur Ceplok', '1'),
(8, '19', ' Ice Cream', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `no_of_guest` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_res` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `meja` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `suggestions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `no_of_guest`, `name`, `phone`, `date_res`, `time`, `meja`, `status`, `suggestions`) VALUES
(13, '4', 'Seulginanjar', '12345', '2021-01-01', '11:20', '6', 'Diterima', 'no'),
(16, '2', 'Wendy', '087626537172', '2020-05-12', '20:20', '2', 'Diterima', 'no'),
(18, '2', 'Irene', '082121212121', '2020-05-20', '19:30', '1', 'Diterima', 'no');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`global_id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `globals`
--
ALTER TABLE `globals`
  MODIFY `global_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
