-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 06:43 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discover_jatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(4) NOT NULL,
  `administrator` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `administrator`, `password`, `foto_admin`) VALUES
('AD01', 'irsyad', 'irsyad', 'irsyad.jpg'),
('AD02', 'feinard', 'feinard', 'feinard.jpg'),
('AD03', 'dhimas', 'dhimas', 'dhimas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` char(6) NOT NULL,
  `nama_daerah` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id_daerah`, `nama_daerah`) VALUES
('3cce63', 'Surabaya'),
('952ec0', 'Pacitan'),
('d04e94', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pariwisata`
--

CREATE TABLE `detail_pariwisata` (
  `id_pariwisata` char(6) NOT NULL,
  `id_kategori` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pariwisata`
--

INSERT INTO `detail_pariwisata` (`id_pariwisata`, `id_kategori`) VALUES
('2d09f8', '525690'),
('2d09f8', '5df33d'),
('440191', '7aad3c'),
('440191', '525690'),
('8908da', '525690'),
('8908da', '5df33d'),
('97cd5d', '7aad3c'),
('9b6398', '7b6514'),
('9b6398', '24ff86'),
('bd1fc4', '7aad3c'),
('bd3c2d', '525690'),
('bd3c2d', '5df33d'),
('c654cd', '5df33d'),
('c654cd', '7aad3c'),
('ce255c', '7b6514'),
('d28d39', '7b6514'),
('ddaf83', '7b6514'),
('ddaf83', '525690');

-- --------------------------------------------------------

--
-- Table structure for table `foto_pariwisata`
--

CREATE TABLE `foto_pariwisata` (
  `id_foto` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `foto_pariwisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_pariwisata`
--

INSERT INTO `foto_pariwisata` (`id_foto`, `id_pariwisata`, `foto_pariwisata`) VALUES
('07b2ff', 'ddaf83', 'Museum Angkut 2.jpg'),
('0f12a9', '97cd5d', 'Kebunbibit2.jpg'),
('2f00b1', 'd28d39', 'houseofsampoerna1.jpg'),
('3a6d24', 'bd3c2d', 'tcarnival1.jpg'),
('5ecc15', '8908da', 'ciputra2.png'),
('5f9fa4', 'd28d39', 'houseofsampoerna2.jpg'),
('7869c2', '9b6398', 'siola1.jpg'),
('7f3113', '440191', 'binatang1.jpg'),
('998b8b', 'bd3c2d', 'tcarnival2.jpg'),
('a0af7f', 'ddaf83', 'Museum Angkut 1.jpg'),
('a1924a', 'c654cd', 'pantairia2.jpg'),
('ad7ef0', '2d09f8', 'bungkul1.jpg'),
('c2d156', '2d09f8', 'bungkul2.jpg'),
('c853bb', '97cd5d', 'Kebunbibit1.jpg'),
('c8618c', 'bd3c2d', 'tcarnival1.jpg'),
('d1221a', '440191', 'binatang2.jpg'),
('d828b9', 'c654cd', 'pantairia3.jpg'),
('d8974f', 'c654cd', 'pantairia1.jpg'),
('d92ed4', '8908da', 'ciputra1.png'),
('e1a998', 'd28d39', 'houseofsampoerna3.jpg'),
('ee94e2', '9b6398', 'siola2.jpg'),
('f7fa35', '440191', 'binatang3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `nama_hotel` varchar(30) NOT NULL,
  `alamat_hotel` varchar(50) NOT NULL,
  `bintang` int(5) NOT NULL,
  `deskripsi_hotel` text NOT NULL,
  `foto_hotel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `id_pariwisata`, `nama_hotel`, `alamat_hotel`, `bintang`, `deskripsi_hotel`, `foto_hotel`) VALUES
('29ff35', 'ddaf83', 'Aston Inn Hotel', 'Jl. Abdul Gani Atas No. 42 - 44, Batu, Malang, Jaw', 4, 'Aston Inn Batu di Batu, 400 meter dari Museum Angkut, menyediakan hotel bintang 4 dengan restoran, tempat parkir pribadi gratis, bar, layanan pramutamu, layanan kamar, kolam renang luar ruangan, resepsionis 24 jam, dan Wi-Fi gratis di seluruh areanya.', 'Aston Inn.jpg'),
('60fe10', '97cd5d', 'Pool Hotel Gunawangsa MERR', 'Jl No.96, Kedung Baruk, Kec. Rungkut, Kota SBY, Ja', 3, 'Hotel Gunawangsa Merr Surabaya adalah one stop living campuran - Bisnis, sekolah, hotel, kondotel, toko dan kantor di area eksklusif di Middle East Ring Road (MERR) Surabaya. Berlokasi strategis, dekat dengan Kawasan Industri Rungkut dan Dibutuhkan 30 menit berkendara dari Bandara Internasional Djuanda dan 25 menit dari stasiun kereta Gubeng.\r\n\r\nHotel Gunawangsa Merr Surabaya telah dirancang sedemikian rupa sehingga akan menawarkan kecepatan dan kenyamanan untuk tetap menikmati waktu berharga dalam bisnis dan liburan. Menghadirkan 135 kamar yang terdiri dari 109 kamar Deluxe, 6 kamar Eksekutif, 12 Junior Suite dan 8 Family suite dengan pemandangan kota dan kolam renang yang luar biasa.\r\n\r\nSemua jenis kamar dilengkapi dengan TV LED dengan saluran multibahasa, akses Internet gratis - WIFI, kontrol AC individu, fasilitas pembuat kopi dan teh, fasilitas kamar mandi standar dan fasilitas lainnya untuk memastikan masa menginap yang menyenangkan dan nyaman.\r\n', 'Pool Hotel.jpg'),
('6ba3f2', 'd28d39', 'Pesona Hotel Ampel Surabaya', 'Jl. Benteng No.1, Nyamplungan, Kec. Pabean Cantian', 0, 'Terletak di Surabaya Utara, hanya 30 menit dari Bandara Internasional Juanda, 10 menit dari Stasiun Kereta Pasar Turi dan 5 menit dari Pelabuhan Tanjung Perak. Hanya dengan sekali klik dari Jembatan Merah Plaza, atau Anda dapat menjelajahi Pasar Atom.\r\n\r\nRasakan suasana religius dengan Masjid dan Makam Sunan Ampel hanya beberapa langkah dari hotel. Nikmati angin laut yang segar di dekat Pantai Kenjeran dan Jembatan Suramadu yang hanya beberapa menit dari hotel kami. Untuk pengalaman kuliner Anda dapat mencoba Zangrandi Ice Cream sekolah lama atau Bebek Goreng atau Kambing Oven yang lezat di sekitar Wilayah Perak.\r\n', 'Hotel Ampel Surabaya.jpg'),
('7e76d6', 'c654cd', 'Zoom Hotel Dharmahusada', 'Jl. Dharmahusada Blok A-3 No.188, Mojo, Kec. Guben', 3, 'Menyediakan Wi-Fi gratis dan restoran, Zoom Dharmahusada Hotel adalah salah satu hotel ideal yang bisa Anda pilih saat berada di Surabaya. Setiap kamar dilengkapi TV layar datar dan kamar mandi pribadi yang di dalamnya terdapat shower. Untuk menambah kenyamanan Anda, tersedia pula sandal dan perlengkapan mandi gratis. Anda bisa memanfaatkan layanan resepsionis 24-jam di hotel ini. Monumen Kapal Selam berjarak 2,1 km dari Zoom Dharmahusada Hotel, sedangkan Monumen Bambu Bambu Runcing berjarak 3,8 km. Bandara Internasional Juanda dapat dijangkau dalam waktu 60 menit berkendara.', 'Zoon Hotel.jpg'),
('9512cc', 'bd1fc4', 'RedDoorz near Teleng Ria Beach', 'Jl. Pramuka no 31, Sidoharjo, Kec. Pacitan, Kabupa', 2, 'Gua Gong merupakan gua tercantik di Asia Tenggara yang menawarkan keindahan stalaktit dan stalakmit serta ukiran alam di dalamnya', 'RedDoorz Ria Beach.jpg'),
('ccac1c', '440191', 'TS Suites Surabaya', 'Jl. Hayam Wuruk No.6, Sawunggaling, Kec. Wonokromo', 4, '\r\nTS Suites Surabaya berlokasi nyaman di Town Square Surabaya, menawarkan akomodasi bergaya, dan berjarak hanya 30 menit berkendara dari Bandara Internasional Juanda serta pusat kota Surabaya. Akses internet tersedia gratis.\r\nSemua kamar bebas rokok di TS Suites Surabaya memiliki ruang terbuka yang dirancang indah dengan perabotan kontemporer. Kamar mandi modernnya menyediakan fasilitas mewah dan rainshower. Semua kamar dilengkapi dengan TV layar datar dan lemari es dengan minibar gratis.\r\nKompleks Surabaya Town Square menawarkan banyak pilihan tempat berbelanja dan bersantap. Pilihan tempat hiburannya termasuk Cineplex, Club, Lounge atau karaoke keluarga. Pusat kecantikan dan spa berlayanan lengkap juga tersedia di hotel.\r\nLayanan antar-jemput ke dan dari bandara dan stasiun kereta api ditawarkan dengan dikenakan biaya, sementara layanan parkir valet tersedia gratis.\r\nWonokromo adalah pilihan tepat buat wisatawan yang suka jalan-jalan murah, kuliner khas, dan makanan.\r\n', 'TS Suite.jpg'),
('d296bc', '8908da', 'Airy Citraland Internasional S', 'Internasional Village 1 Blok C1/3, Sambikerep, Sur', 3, 'Terletak di Surabaya, 11 km dari Monumen Bambu Runcing, Airy Citraland International Surabaya menawarkan kamar-kamar dengan AC. Akomodasi ini berjarak 11 km dari Monumen Kapal Selam serta 12 km dari Jembatan Merah Surabaya dan 12 km dari Masjid Ampel. Akomodasi ini berjarak 15 km dari Monumen Jalesveva Jayamahe - Monjaya.\r\n\r\nSetiap kamar di guest house ini menyediakan lemari pakaian, TV layar datar, dan kamar mandi pribadi.\r\nAiry Citraland International Surabaya menawarkan kolam renang luar ruangan.\r\nMasjid Al Akbar berjarak 9 km dari akomodasi. Bandara terdekat adalah Bandara Internasional Juanda, 19 km dari Airy Citraland International Surabaya.\r\nSambikerep adalah pilihan tepat buat wisatawan yang suka belanja, orang-orang yang ramah, dan wisata kuliner.\r\n', 'Airy Citraland.jpg'),
('f30e38', '2d09f8', ' Grand Darmo Suite', 'Jl. Progo No.1-3, Darmo, Kec. Wonokromo, Kota SBY,', 4, 'Berlokasi strategis di area utama Surabaya, Grand Darmo Suite Hotel menawarkan berbagai keuntungan. 20 menit dari Bandara Juanda Intl & 10 menit dari Stasiun Kereta Gubeng, hanya dalam jarak berjalan kaki dari Pusat Kuliner Surabaya, Taman Bungkul dan antar-jemput gratis ke Pusat Perbelanjaan.', 'Grand Darmo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_buka`
--

CREATE TABLE `jadwal_buka` (
  `id_jadwal` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `hari_buka` char(6) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_buka`
--

INSERT INTO `jadwal_buka` (`id_jadwal`, `id_pariwisata`, `hari_buka`, `jam_buka`, `jam_tutup`) VALUES
('07cd47', 'ce255c', 'Minggu', '08:00:00', '21:00:00'),
('0dbf16', 'bd3c2d', 'Senin', '15:00:00', '23:00:00'),
('10658c', '2d09f8', 'Selasa', '00:00:00', '00:00:00'),
('13e1a3', '8908da', 'Kamis', '13:00:00', '19:00:00'),
('14c01d', '440191', 'Jumat', '08:00:00', '16:00:00'),
('1571d2', '2d09f8', 'Sabtu', '00:00:00', '00:00:00'),
('15f655', '8908da', 'Jumat', '13:00:00', '19:00:00'),
('17af51', 'bd3c2d', 'Selasa', '15:00:00', '23:00:00'),
('195f1e', 'ce255c', 'Rabu', '08:00:00', '20:00:00'),
('1abd27', 'bd1fc4', 'Senin', '07:00:00', '16:00:00'),
('1db67f', 'ddaf83', 'Kamis', '08:00:00', '20:00:00'),
('1e0d0c', 'bd3c2d', 'Jumat', '15:00:00', '23:00:00'),
('249fba', 'ddaf83', 'Jumat', '08:00:00', '20:00:00'),
('28a2d4', 'd28d39', 'Sabtu', '09:00:00', '18:00:00'),
('2c9edf', '9b6398', 'Kamis', '09:00:00', '21:00:00'),
('2fa388', '8908da', 'Senin', '13:00:00', '19:00:00'),
('30ddd6', '2d09f8', 'Rabu', '00:00:00', '00:00:00'),
('333df0', '440191', 'Minggu', '07:30:00', '16:30:00'),
('33bae2', '440191', 'Rabu', '08:00:00', '16:00:00'),
('357a75', 'ddaf83', 'Senin', '08:00:00', '20:00:00'),
('36b726', '440191', 'Sabtu', '07:30:00', '16:30:00'),
('41daa2', '440191', 'Senin', '08:00:00', '16:00:00'),
('4f6eb9', '97cd5d', 'Selasa', '00:00:00', '00:00:00'),
('50ab47', 'bd3c2d', 'Minggu', '15:00:00', '23:00:00'),
('521676', 'd28d39', 'Senin', '09:00:00', '18:00:00'),
('58f9ff', 'bd3c2d', 'Rabu', '15:00:00', '23:00:00'),
('5e983f', 'd28d39', 'Rabu', '09:00:00', '18:00:00'),
('5f2b42', 'ce255c', 'Sabtu', '08:00:00', '21:00:00'),
('6358b7', 'ddaf83', 'Selasa', '08:00:00', '20:00:00'),
('639e86', 'd28d39', 'Kamis', '09:00:00', '18:00:00'),
('6a4284', '2d09f8', 'Senin', '00:00:00', '00:00:00'),
('6d4d1f', 'd28d39', 'Minggu', '09:00:00', '18:00:00'),
('6eac0e', 'c654cd', 'Sabtu', '09:00:00', '17:00:00'),
('700fcc', '97cd5d', 'Senin', '00:00:00', '00:00:00'),
('72db79', 'c654cd', 'Selasa', '09:00:00', '17:00:00'),
('740b9b', 'bd1fc4', 'Jumat', '07:00:00', '16:00:00'),
('744b62', 'bd3c2d', 'Sabtu', '15:00:00', '23:00:00'),
('746d9e', '8908da', 'Minggu', '10:00:00', '19:00:00'),
('749132', 'c654cd', 'Jumat', '09:00:00', '17:00:00'),
('7a4fb2', 'bd1fc4', 'Sabtu', '07:00:00', '16:00:00'),
('7b2cd4', '9b6398', 'Minggu', '09:00:00', '21:00:00'),
('7c8d4c', '97cd5d', 'Sabtu', '00:00:00', '00:00:00'),
('7f9682', '8908da', 'Selasa', '13:00:00', '19:00:00'),
('809871', 'ddaf83', 'Minggu', '08:00:00', '20:00:00'),
('841f1e', 'bd1fc4', 'Kamis', '07:00:00', '16:00:00'),
('88f559', 'bd1fc4', 'Minggu', '07:00:00', '16:00:00'),
('8a3170', 'c654cd', 'Senin', '09:00:00', '17:00:00'),
('8cbe4d', '440191', 'Selasa', '08:00:00', '16:00:00'),
('91c30e', '97cd5d', 'Minggu', '00:00:00', '00:00:00'),
('9892ba', '440191', 'Kamis', '08:00:00', '16:00:00'),
('98d546', 'ce255c', 'Selasa', '08:00:00', '20:00:00'),
('a301cb', '97cd5d', 'Jumat', '00:00:00', '00:00:00'),
('a33b3a', '9b6398', 'Selasa', '09:00:00', '21:00:00'),
('a798ce', 'ce255c', 'Jumat', '08:00:00', '20:00:00'),
('a86354', 'ce255c', 'Senin', '08:00:00', '20:00:00'),
('a8ceee', '9b6398', 'Sabtu', '09:00:00', '21:00:00'),
('b53827', '2d09f8', 'Minggu', '00:00:00', '00:00:00'),
('b677a8', 'ce255c', 'Kamis', '08:00:00', '20:00:00'),
('bbd21e', '2d09f8', 'Jumat', '00:00:00', '00:00:00'),
('c5fef2', 'c654cd', 'Rabu', '09:00:00', '17:00:00'),
('ccf03a', '97cd5d', 'Kamis', '00:00:00', '00:00:00'),
('ce07ef', 'bd1fc4', 'Rabu', '07:00:00', '20:00:00'),
('d27cbc', 'bd3c2d', 'Kamis', '15:00:00', '23:00:00'),
('d50231', 'd28d39', 'Selasa', '09:00:00', '18:00:00'),
('d75370', '8908da', 'Rabu', '13:00:00', '19:00:00'),
('d88b7d', '9b6398', 'Jumat', '09:00:00', '21:00:00'),
('dce037', '9b6398', 'Rabu', '09:00:00', '21:00:00'),
('e5de88', 'ddaf83', 'Rabu', '08:00:00', '20:00:00'),
('e8ee50', '8908da', 'Sabtu', '10:00:00', '19:00:00'),
('eb409e', 'c654cd', 'Kamis', '09:00:00', '17:00:00'),
('f2176a', 'd28d39', 'Jumat', '09:00:00', '18:00:00'),
('f8cf3a', 'bd1fc4', 'Selasa', '07:00:00', '16:00:00'),
('f91ccc', 'ddaf83', 'Sabtu', '08:00:00', '20:00:00'),
('fa81e8', '2d09f8', 'Kamis', '00:00:00', '00:00:00'),
('fdd49d', '97cd5d', 'Rabu', '00:00:00', '00:00:00'),
('fdd7d2', 'c654cd', 'Minggu', '09:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(6) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('24ff86', 'Budaya'),
('525690', 'Keluarga'),
('5df33d', 'Hiburan'),
('7aad3c', 'Alam'),
('7b6514', 'Edukasi');

-- --------------------------------------------------------

--
-- Table structure for table `pariwisata`
--

CREATE TABLE `pariwisata` (
  `id_pariwisata` char(6) NOT NULL,
  `id_daerah` char(6) NOT NULL,
  `nama_tempat` varchar(25) NOT NULL,
  `alamat_pariwisata` varchar(50) NOT NULL,
  `biaya_masuk` decimal(14,2) NOT NULL,
  `deskripsi_pariwisata` text NOT NULL,
  `avg_rating` decimal(14,2) DEFAULT NULL,
  `link_website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pariwisata`
--

INSERT INTO `pariwisata` (`id_pariwisata`, `id_daerah`, `nama_tempat`, `alamat_pariwisata`, `biaya_masuk`, `deskripsi_pariwisata`, `avg_rating`, `link_website`) VALUES
('2d09f8', '3cce63', 'Taman Bungkul', 'Jl. Taman Bungkul, Darmo, Kec. Wonokromo, Kota SBY', '0.00', 'Penat dengan hiruk pikuk kantor dan perkotaan? Yuk, nikmati rindangnya pepohonan di taman ini. Posisinya sangat strategis, yaitu berada di tengah kota, di Darmo, Wonokromo.\r\nTaman Bungkul sebenarnya adalah area wisata religi. Tempat ziarah ke makam Ki Ageng Supo atau Sunan Bungkul, salah satu ulama penyebar agama Islam. Namun, oleh pemerintah kota, lingkungan di sekitar kuburan dirapikan menjadi taman yang sangat menawan dengan fasilitas yang cukup komplet.\r\nSalah satu fasilitas yang ditawarkan tempat wisata di Surabaya ini adalah tempat bermain anak-anak seperti ayunan, perosotan, dan jungkat-jungkit. Tersedia pula arena bermain skateboard, BMX, dan jalur jogging. Pada bagian tengah, terdapat amfiteater terbuka bergaris tengah sepanjang 33 meter. Pada akhir pekan, di amfiteater ini sering digelar acara musik maupun pertunjukan menarik. Sarana taman juga semakin lengkap dengan adanya jaringan internet, keran air minum, dan penjaja beragam kuliner Surabaya yang tertata rapi.\r\n', NULL, '-'),
('440191', '3cce63', 'Kebun Binatang Surabaya', 'Jl. Setail No.1, Darmo, Kec. Wonokromo, Kota SBY, ', '15000.00', 'Posisinya berada di tengah kota, dekat dengan patung Sura dan Boyo, yaitu Jalan Setail No.1, Darmo, Wonokromo. Harga tiket masuk Kebun Binatang Surabaya adalah Rp. 15.000 pada hari kerja dan Rp. 20.000 pada akhir pekan dan libur nasional. Jam bukanya dari pukul 8 pagi sampai dengan pukul 5 sore.\r\nKoleksi satwa di Kebun Binatang Surabaya cukup lengkap, bahkan tempat wisata di Surabaya ini pernah menjadi kebun binatang terlengkap di Asia Tenggara dengan 351 jenis binatang. Karena hal inilah, tempat wisata ini adalah tempat yang sempurna untuk menambah wawasan diri dan mengenalkan buah hati tentang alam dan hewan.\r\nPemandangan asri dan tingkah laku para hewan yang menggemaskan akan membuat pikiran rileks dan lupa bahwa Anda sedang berada di tengah-tengah kota metropolitan. Seumpama kemari, disarankan untuk datang pada pagi hari karena kebun binatang ini cukup luas dan membutuhkan kurang lebih 2 jam untuk mengelilinginya.\r\n', NULL, 'http://www.surabayazoo.co.id/'),
('8908da', '3cce63', 'Ciputra Waterpark', 'Waterpark Boulevard Kav 1 CitraLand - \"The Singapo', '75000.00', 'Ciputra Waterpark adalah wana wisata air terbesar di Indonesia dan bahkan di Asia Tenggara. Terletak di Surabaya Barat, dan itu dibangun oleh Perusahaan Ciputra Grup di area Citraland.\r\nBerdiri di lahan seluas 5 hektar, Ciputra Waterpak adalah wahana permainan air yang terinspirasi dari dongeng petualangan Sinbad. Terdapat beberapa wahana di Waterpark ini, seperti Sirens River, Chimera Pool, Marina Lagoon, Sinbad Playground, Roc Tower dan Syracuse Beach.\r\nCiputra Waterpark di buka setiap hari selasa sampai Jumat mulai pukul 14.00-19.00, sedangkan pada akhir pekan dan hari libur dibuka lebih awal dari jam 8.00-20.00. Terdapat beberapa paket yang bisa dipilih oleh pengunjung, dimana setiap wahana menampilkan atraksi wahana yang menarik dan menggunakan tehnologi tinggi. Ditambah lagi, keamanan dari Waterpark ini sudah jelas terbukti, sehingga pengunjung tidak perlu khawatir.\r\n', NULL, 'http://www.ciputrawaterparksurabaya.com'),
('97cd5d', '3cce63', 'Kebun Bibit Wonorejo', 'Jl. Raya Marina Asri, Keputih, Kec. Sukolilo, Kota', '5000.00', 'Lahan yang berada di pusat kota bagian tenggara ini sering juga disebut sebagai Kebun Bibit 2. Sedangkan, Kebun Bibit 1nya adalah Taman Flora, sebuah taman di daerah Bratang. Sesuai namanya, tempat ini adalah lokasi bibit tanaman dikembangbiakkan sebelum ditanam di seluruh penjuru kota. \r\nWalaupun begitu, bukan hanya dipenuhi oleh tumbuhan, taman ini memiliki sarana rekreasi yang memadai. Contohnya ada area bermain anak, papan wall climbing anak, keran air minum, zona refleksi kaki, danau dengan dermaga kecil, rumah anggrek, rumah kompos, dan sentra wisata kuliner.\r\nWalaupun Surabaya panasnya menyengat, melihat pemandangan di kebun ini dijamin membuat hati terasa sejuk. Ditambah dengan kehadiran beberapa ekor satwa, seperti rusa dan bebek, menambah kesan natural pada alam sekitar tempat wisata di Surabaya ini. Beruntungnya, semua ini dapat dinikmati publik secara gratis dari pukul 8 pagi sampai dengan pukul 4 sore.\r\n', NULL, '-'),
('9b6398', '3cce63', 'Siola Museum Surabaya', 'Tunjungan St No.1, Genteng, Surabaya City, East Ja', '0.00', 'Tempat ini baru diresmikan pada tanggal 3 Mei 2015, tapi cukup menarik minat masyarakat untuk mendatanginya. Letaknya berada di tengah kota, yaitu di Gedung Siola, Jl. Tunjungan, Genteng. Museum Surabaya berada di lantai 1 bangunan tersebut, sisanya ditempati oleh beberapa kantor layanan masyarakat dan sentra UKM.\r\n\r\nSaat mengunjungi tempat ini, kita bisa melihat perkembangan kota Surabaya, serta barang-barang bernilai sejarah peninggalan masyarakat dan pemerintah kota sejak wali kota pertama hingga sekarang. Misalnya, meriam sewaktu perang, replika biola milik W. R. Supratman, meja dan kursi sekolah tahun 1950an, buku administrasi kependudukan jaman dahulu, ketel uap abad 18, dan lain-lain. Nah, koleksi tersebut dapat dinikmati setiap hari antara pukul 9 pagi sampai 9 malam secara cuma-cuma.', NULL, '-'),
('bd1fc4', '952ec0', 'Goa Gong Pacitan', 'Salam, Bomo, Punung, Pacitan Regency, East Java 63', '5000.00', 'Gua Gong merupakan gua tercantik di Asia Tenggara yang menawarkan keindahan stalaktit dan stalakmit serta ukiran alam di dalamnya', NULL, '-'),
('bd3c2d', '3cce63', 'Surabaya Carnival Park', 'Jl. Ahmad Yani No.333, Dukuh Menanggal, Kec. Gayun', '60000.00', 'Wahana permainannya cukup beragam, misalnya Kocar-Kacir, mobil-mobilan, roller coaster, perang laser, Gondal-Gandul, bianglala, dan lainnya. Selain dilengkapi dengan fasilitas yang bersih dan terawat, di tempat wisata ini juga tidak jarang ada parade aneka kostum yang unik. Tempat wisata di Surabaya ini adalah tempat yang sempurna untuk menghibur diri atau menghabiskan malam bersama orang terkasih.', NULL, '-'),
('c654cd', '3cce63', 'Pantai Ria Kenjeran Park', 'Sukolilo Baru, Bulak, Surabaya City, East Java 601', '125000.00', 'Posisinya berada di Kota Surabaya bagian timur laut. Sekitar 1 kilometer dari Pantai Kenjeran Lama. \r\nTempat wisata di Surabaya ini kamu dapat melihat indahnya langit saat matahari terbit atau tenggelam, berenang, bermain pasir di pantai, serta menikmati bangunan berarsitektur khas Tiongkok. Ada beberapa bangunan wihara yang memiliki desain apik. Misalnya, bangunan Tian Ti yang merupakan replika Temple of Heaven di Tiongkok, replika Buddha Catur Muka di Thailand, Sanggar Agung yang memiliki desain perpaduan Bali dan Tiongkok, serta patung Dewi Kwan Im dengan tinggi sekitar 20 meter yang disertai patung naga.\r\nDengan membayar sedikit biaya tambahan, kamu pun dapat mencoba aktivitas lain. Umpamanya bermain air di Kenjeran Waterpark dengan tiket Rp. 20.000 pada hari kerja atau Rp. 25.000 pada akhir pekan. Bisa juga mengunjungi arena berkuda, kolam pemancingan, arena go-kart, atau taman bermain.\r\nSeandainya datang berkunjung ke tempat wisata di Surabaya yang satu ini, jangan lewatkan berfoto dekat Jembatan Suroboyo dengan latar belakang Kampung Bulak. Wilayah tersebut dikenal dengan sebutan ‘Kampung Warna-Warni’. Pasalnya, rumah-rumah di sana dicat dengan warna terang yang ceria! Bagus sekali untuk lokasi foto!\r\n', NULL, 'https://atlantisland.id/'),
('ce255c', '3cce63', 'Monumen Kapal Selam', 'Jl. Pemuda No.39, Embong Kaliasin, Kec. Genteng, K', '10000.00', 'Surabaya dijuluki dengan sebutan Kota Pahlawan karena banyaknya peristiwa penting pengukir sejarah yang terjadi di kota ini. Karenanya, selagi di Surabaya, bagaimana kalau menyempatkan diri berwisata ke masa lalu? Salah satu caranya adalah dengan mengunjungi tempat yang terletak di daerah Genteng ini.\r\nMonumen ini memang kapal selam sungguhan bernama KRI Pasopati 410 yang dulu ikut digunakan dalam pembebasan Irian Barat dari Belanda, tetapi saat ini sudah dialihfungsikan menjadi sebuah museum. Di dalamnya, kita dapat melihat bagian dalam kapal yang berupa bilik-bilik kecil. Ada juga ruang audio visual yang menayangkan film dokumentasi tentang sejarah kapal ini.\r\n', NULL, 'http://monkasel.id/'),
('d28d39', '3cce63', 'House of Sampoerna', 'Taman Sampoerna No.6, Krembangan Utara, Kec. Pabea', '0.00', 'House of Sampoerna adalah sebuah museum tembakau dan markas besar Sampoerna yang terletak di Surabaya. Gaya arsitektur dari bangunan utamanya yang dipengaruhi oleh gaya kolonial Belanda dibangun pada 1862 dan sekarang menjadi situs sejarah. Sebelumnya dipakai sebagai panti asuhan yang diurus oleh Belanda, tempat tersebut dibeli pada 1932 oleh Liem Seeng Tee‚ pendiri Sampoerna‚ dengan tujuan dipakai sebagai fasilitas produksi rokok besar pertama Sampoerna.', NULL, 'houseofsampoerna.museum'),
('ddaf83', 'd04e94', 'Museum Angkut', 'Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu,', '70000.00', 'Museum ini didirikan dengan tujuan untuk memberikan apresiasi terhadap para pencipta berbagai jenis transportasi yang ada di dunia sekaligus mengabadikan proses perkembangan sarana transportasi di Indonesia dan juga di dunia\r\nMuseum ini memiliki jumlah koleksi sebanyak 525 alat transportasi yang terdiri dari 300 mobil dari berbagai merk dari berbagai negara serta 225 alat transportasi lain mulai dari tradisional sampai modern\r\n', NULL, 'https://jtp.id/museumangkut/');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(6) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `kata_sandi` varchar(12) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto_pengguna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `kata_sandi`, `no_telp`, `email`, `foto_pengguna`) VALUES
('U00001', 'Irsyadhani Dwi Shubhi', '12345678', '087655443322', 'butra@gmail.com', 'empty.jpg'),
('U00002', 'dimas', 'qwerty', '089977665544', 'rete@gmail.com', 'empty.jpg'),
('U00003', 'feinard', 'asdfghj', '087766554411', 'haha@gmail.com', 'empty.jpg'),
('U00004', 'Budi Santoso', 'sayabudi123', '081298874569', 'budisantoso@gmail.com', 'empty.jpg'),
('U00005', 'Arief Rahman', 'sayaarieflho', '082132424985', 'ariefbro@gmail.com', 'empty.jpg'),
('U00006', 'Denny Dendy', 'dennyaja', '082374728394', 'denndyatodendy@gmail.com', 'empty.jpg'),
('U00007', 'Istuti Juan', 'juanistutik', '08324857364', 'juanistutik@gmail.com', 'empty.jpg'),
('U00008', 'Andika Pranomo', 'andikapro', '082384940293', 'andikapurnama@gmail.com', 'Andhika Purnomo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` char(6) NOT NULL,
  `id_pengguna` char(6) NOT NULL,
  `id_pariwisata` char(6) NOT NULL,
  `status` enum('tampil','tidak tampil') NOT NULL,
  `rating_review` int(7) NOT NULL,
  `deskripsi_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_pengguna`, `id_pariwisata`, `status`, `rating_review`, `deskripsi_review`) VALUES
('220dea', 'U00004', '8908da', 'tampil', 4, 'Sepertinya tempat ini perlu perluasan, karena tempatnya terlalu padat ketika hari libur tiba, padahal banyak permainan yang bagus\r\n'),
('244ad7', 'U00007', 'd28d39', 'tampil', 4, 'Disini kita bisa melihat bagaimana suatu perusahaan berdiri sampai produksinya sekarang,  barang- barang yang ada masih autentik. Tidak hanya itu dengan tidak ada biayanya, rekomendasi banget tempat pariwisata ini '),
('2e0cad', 'U00006', 'd28d39', 'tampil', 5, 'Disini kita bisa melihat banyak benda-benda bersejarah dan menurutku itu sangat keren, apalagi dijaga dengan baik '),
('5befa5', 'U00005', '440191', 'tampil', 3, 'Saat kesini saya cukup kebingungan, tempat nya luas namun information centre nya tidak banyak. Sehingga sulit untuk bertanya atau mencari informasi'),
('689e6a', 'U00005', '9b6398', 'tampil', 4, 'Tempat yang keren untuk selfie '),
('73bf17', 'U00007', '2d09f8', 'tampil', 4, 'Harus dicoba pada malam hari, berbeda suasananya '),
('c7348b', 'U00008', '8908da', 'tampil', 3, 'Lumayan tetapi perlu ditambah fasilitaasnya'),
('ce9efe', 'U00007', '440191', 'tampil', 2, 'Kecewa dengan tempat ini, banyak sampah berserakan. Sepertinya tempat ini tidak terawat dengan baik '),
('e29c94', 'U00007', 'bd3c2d', 'tampil', 4, 'Tempat nya bagus, namun biaya masuk nya cukup mahal jika berkunjung bersama keluarga '),
('e4a704', 'U00004', '97cd5d', 'tampil', 5, 'Berasa didalam hutan lebat. Worth it '),
('ea1aca', 'U00005', 'ce255c', 'tampil', 5, 'Tempat parkir nya kurang besar, membutuhkan waktu yang lama untuk mencari tempat parkir. Namun tempat ini sangat bagus untuk dikunjungi. Karena banyak pemandangan bagus dan permainan untuk anak - anak ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `detail_pariwisata`
--
ALTER TABLE `detail_pariwisata`
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `foto_pariwisata`
--
ALTER TABLE `foto_pariwisata`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `jadwal_buka`
--
ALTER TABLE `jadwal_buka`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`id_pariwisata`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pariwisata`
--
ALTER TABLE `detail_pariwisata`
  ADD CONSTRAINT `detail_pariwisata_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `detail_pariwisata_ibfk_2` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `foto_pariwisata`
--
ALTER TABLE `foto_pariwisata`
  ADD CONSTRAINT `foto_pariwisata_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `jadwal_buka`
--
ALTER TABLE `jadwal_buka`
  ADD CONSTRAINT `jadwal_buka_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);

--
-- Constraints for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD CONSTRAINT `pariwisata_ibfk_1` FOREIGN KEY (`id_daerah`) REFERENCES `daerah` (`id_daerah`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id_pariwisata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
