-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Okt 2022 pada 12.31
-- Versi server: 10.3.36-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adriansa_qgames`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `sort` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category`, `sort`) VALUES
(1, 'Populer', 1),
(2, 'New Games', 2),
(3, 'Top-Up Game Langsung', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `title`, `content`) VALUES
(5, 'BAGAIMANA JIKA PRODUK TIDAK TERKIRIM', 'Tenang kalian boleh hubungi admin di bagian menu kontak\r\n'),
(6, 'PEMBAYARAN', 'Untuk metode pembayaran kami menyediakan hampir semua bank dan ewallet\r\n'),
(7, 'BINGUNG GIMANA CARA TOPUP NYA', 'Kalian boleh hubungi kontak admin untuk dibantu mengenai cara topup\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `images` varchar(250) NOT NULL,
  `category` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `target` varchar(250) NOT NULL,
  `sort` bigint(20) NOT NULL,
  `validasi_status` enum('Y','N') NOT NULL,
  `validasi_kode` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `games`
--

INSERT INTO `games` (`id`, `name`, `slug`, `images`, `category`, `content`, `target`, `sort`, `validasi_status`, `validasi_kode`) VALUES
(1, 'MOBILE LEGEND', 'mobile-legend', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '1', '<p>Top up ML Diamond hanya dalam hitungan detik!</p>\r\n\r\n<p>Cukup masukan Username MLBB Kamu, pilih jumlah Diamond yang Kamu inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun Mobile Legends Kamu.</p>\r\n', 'B', 2, 'Y', 'ml'),
(5, 'FREE FIRE', 'free-fire', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/free_fire_new_tile.png', '1', '<p>Top Up Diamond Free Fire (FF) Kamu hanya dalam hitungan detik!</p>\r\n\r\n<p>Cukup masukkan Player ID Free Fire Kamu, pilih jumlah Diamond yang Kamu inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun Free Fire Kamu.</p>\r\n', 'A', 2, 'Y', 'ff'),
(7, 'VALORANT', 'valorant', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/valorant_tile.jpg', '1', '', 'A', 8, 'N', ''),
(8, 'Ragnarok X: Next Generation', 'ragnarok-x-next-generation', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/ragnarok_x_tile.jpg', '1', '', 'A', 10, 'N', ''),
(9, 'League of Legends: Wild Rift', 'league-of-legends-wild-rift', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/lolwildrift_tile.png', '1', '', 'A', 9, 'N', ''),
(10, 'Genshin Impact', 'genshin-impact', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/genshin_tile.png', '1', '', 'A', 7, 'N', ''),
(11, 'Higgs Domino', 'higgs-domino', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/higgs_domino_tile.jpg', '1', '', 'A', 4, 'N', ''),
(12, 'Call of Duty Mobile', 'call-of-duty-mobile', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/codmobile_tile.jpg', '1', '', 'A', 6, 'N', ''),
(13, 'PUBG Mobile', 'pubg-mobile', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/pubgm_rps_tile.jpg', '1', '', 'A', 5, 'N', ''),
(14, 'HAGO', 'hago', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/hago_tile.jpg', '1', '', 'A', 11, 'N', ''),
(15, 'ZEPETO', 'zepeto', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/zepeto_tile.png', '1', '', 'A', 12, 'N', ''),
(16, 'Tinder', 'tinder', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/tinder_tile.jpg', '1', '', 'A', 13, 'N', ''),
(17, 'Sprite Fantasia', 'sprite-fantasia', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/spritefantasia_tile.png', '1', '', 'A', 14, 'N', ''),
(18, 'Grand Theft Auto V: Premium Online Edition', 'grand-theft-auto-v-premium-online-edition', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/gtav_sale_tile.jpg', '1', '', 'A', 15, 'N', ''),
(19, 'Grand Theft Auto Online: Shark Cash Cards', 'grand-theft-auto-online-shark-cash-cards', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/gtavsc_tile.png', '1', '', 'A', 16, 'N', ''),
(20, 'CocoFun', 'coco-fun', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/cocofun_tile.png', '1', '', 'A', 17, 'N', ''),
(21, 'Wild Hunter: Goddess', 'wild-hunter-goddess', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/wild_hunter_tile.png', '2', '', 'A', 18, 'N', ''),
(22, 'The Lord of the Rings: Rise to War', 'the-lord-of-the-rings-rise-to-war', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/lord_of_the_rings_tile.jpg', '2', '', 'A', 19, 'N', ''),
(23, 'Cave Shooter', 'cave-shooter', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/caveshooter_tile.png', '2', '', 'A', 20, 'N', ''),
(24, 'Cloud Song: Saga of Skywalkers', 'cloud-song-saga-of-skywalkers', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/cloud_song_tile.png', '2', '', 'A', 21, 'N', ''),
(25, '8 Ball Pool', '8-ball-pool', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/8_ball_pool_tile.jpg', '2', '', 'A', 22, 'N', ''),
(26, 'Auto Chess', 'auto-chess', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/auto_chess_tile.png', '2', '', 'A', 23, 'N', ''),
(27, 'Red Dead Redemption 2', 'red-dead-redemption-2', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/rdr2_tile_sale.png', '2', '', 'A', 24, 'N', ''),
(28, 'NBA 2K22 Steam', 'nba-2k22-steam', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/NBA2K22_OnSale.jpeg', '2', '', 'A', 25, 'N', ''),
(29, 'Dark Nemesis: Infinite Quest', 'dark-nemesis-infinite-quest', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/DarkNemesis_Tile.png', '2', '', 'A', 26, 'N', ''),
(30, 'Bullet Angel', 'bullet-angel', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/bulletangel_tile.png', '3', '', 'A', 27, 'N', ''),
(31, 'MARVEL Strike Force', 'marvel-strike-force', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/scopely_msf_tile.png', '3', '', 'A', 28, 'N', ''),
(32, 'MU Archangel', 'mu-archangel', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mua_tile.png', '3', '', 'A', 29, 'N', ''),
(33, 'Top Eleven', 'top-eleven', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/TopEleven_tile.jpg', '3', '', 'A', 30, 'N', ''),
(34, 'Legends of Runeterra', 'legends-of-runeterra', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/lor_tile.jpg', '3', '', 'A', 31, 'N', ''),
(35, 'Island King', 'island-king', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/islandking_tile.png', '3', '', 'A', 32, 'N', ''),
(36, 'Dragon Raja', 'dragon-raja', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/dragonraja_tile.png', '3', '', 'A', 33, 'N', ''),
(37, 'Football Master 2', 'football-master-2', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/football_master_2_tile.png', '3', '', 'A', 34, 'N', ''),
(38, 'EOS RED', 'eos-red', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/eos_tile.jpg', '3', '', 'A', 35, 'N', ''),
(39, 'Neverland Era', 'neverland-era', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/neverlandera_tile.png', '3', '', 'A', 36, 'N', ''),
(41, 'World War Heroes', 'world-war-heroes', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/WWH_tile.png', '3', '', 'A', 37, 'N', ''),
(42, 'Omega Legends', 'omega-legends', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/omegalegends_tile.png', '3', '', 'A', 38, 'N', ''),
(43, 'Need for Speed No Limits', 'need-for-speed-no-limits', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/nfs_tile.jpg', '3', '', 'A', 39, 'N', ''),
(44, 'Mobile Legends: Adventure', 'mobile-legends-adventure', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/ml_adventure_tile.png', '3', '', 'A', 40, 'N', ''),
(45, 'Basketrio', 'basketrio', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/basketrio_tile.png', '3', '', 'A', 41, 'N', ''),
(46, 'MoeGirl Go!', 'moegirl-go!', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mgg_tile.png', '3', '', 'A', 42, 'N', ''),
(47, 'Cooking Adventure', 'cooking-adventure', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/cookingadventure_tile.png', '3', '', 'A', 43, 'N', ''),
(48, 'Asphalt 9: Legends', 'asphalt-9-legends', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/a9_70off_tile.jpeg', '3', '', 'A', 44, 'N', ''),
(49, 'Modern Combat 5: Blackout', 'modern-combat-5-blackout', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mc5_tile.png', '3', '', 'A', 45, 'N', ''),
(50, 'Badlanders', 'badlanders', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/badlanders_tile.jpg', '3', '', 'A', 46, 'N', ''),
(51, 'Rules of Survival', 'rules-of-survival', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/ros_tile.jpg', '3', '', 'A', 47, 'N', ''),
(52, 'Heroes Evolved', 'heroes-evolved', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/he_tile.jpg', '3', '', 'A', 48, 'N', ''),
(53, 'POINT BLANK', 'point-blank', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/PointBlank_ID_tile.jpg', '1', '', 'A', 2, 'N', ''),
(54, 'GARENA', 'garena', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/garena_shells_tile.jpg', '1', '', 'A', 2, 'N', ''),
(55, 'Lords Mobile', 'lords-mobile', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/lords_mobile_tile.png', '1', '', 'A', 2, 'N', ''),
(56, 'Speed Drifters', 'speed-drifters', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/speed_drifter_tile.jpg', '1', '', 'A', 2, 'N', ''),
(57, 'Boyaa Capsa Susun', 'boyaa-capsa-susun', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/capsasusun_tile.png', '1', '', 'A', 2, 'N', ''),
(59, 'LifeAfter Credits', 'lifeafter', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/lifeafter_tile.jpeg', '1', '', 'A', 2, 'N', ''),
(60, 'Scroll of Onmyoji', 'scroll-of-onmyoji', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/Scroll%20of%20Onmyoji_tile.jpg', '1', '', 'A', 2, 'N', ''),
(61, 'Marvel Super War', 'marvel-super-war', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/MARVELsuperwar_tile.png', '1', '', 'A', 2, 'N', ''),
(62, 'Tom and Jerry Chase', 'tom-and-jerry-chase', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/tjc_tile.jpg', '1', '', 'A', 1, 'N', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `images` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `method`
--

INSERT INTO `method` (`id`, `name`, `images`, `code`, `provider`) VALUES
(16, 'BRI', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/2560px-BANK_BRI_logo.svg.png', 'BRIVA', 'Tripay'),
(17, 'BNI', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/1200px-BNI_logo.svg.png', 'BNIVA', 'Tripay'),
(18, 'Mandiri', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/1200px-Bank_Mandiri_logo_2016.svg.png', 'MANDIRIVA', 'Tripay'),
(19, 'Bank BSI', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Bank_Syariah_Indonesia.svg/1200px-Bank_Syariah_Indonesia.svg.png', 'BSIVA', 'Tripay'),
(20, 'Alfamart', 'https://upload.wikimedia.org/wikipedia/commons/8/86/Alfamart_logo.svg', 'ALFAMART', 'Tripay'),
(21, 'Indomaret', 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Logo_Indomaret.png', 'INDOMARET', 'Tripay'),
(22, 'OVO', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/2560px-Logo_ovo_purple.svg.png', 'OVO', 'Tripay'),
(23, 'QRIS', 'https://seeklogo.com/images/Q/quick-response-code-indonesia-standard-qris-logo-F300D5EB32-seeklogo.com.png', 'QRISC', 'Tripay'),
(24, 'ShopeePay', 'https://obrolanbisnis.com/wp-content/uploads/2021/04/Logo-ShopeePay.png', 'SHOPEEPAY', 'Tripay');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `wa` varchar(100) NOT NULL,
  `order_id` varchar(55) NOT NULL,
  `email_account` varchar(250) NOT NULL,
  `email_invoice` varchar(200) NOT NULL,
  `games` varchar(200) NOT NULL,
  `games_id` varchar(100) NOT NULL,
  `games_img` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `note` varchar(250) NOT NULL,
  `price` bigint(20) NOT NULL,
  `target` varchar(55) NOT NULL,
  `data_no` varchar(100) NOT NULL,
  `data_zone` varchar(100) NOT NULL,
  `provider_order_id` varchar(250) NOT NULL,
  `method` varchar(100) NOT NULL,
  `method_id` int(11) NOT NULL,
  `payment_code` varchar(100) NOT NULL,
  `payment_url` varchar(250) NOT NULL,
  `status` enum('Pending','Processing','Completed','Canceled') NOT NULL,
  `ip` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `wa`, `order_id`, `email_account`, `email_invoice`, `games`, `games_id`, `games_img`, `product`, `sku`, `note`, `price`, `target`, `data_no`, `data_zone`, `provider_order_id`, `method`, `method_id`, `payment_code`, `payment_url`, `status`, `ip`, `provider`, `date_create`, `date_update`) VALUES
(13, '085293026542', '39762727', 'admin@qgames.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '600 Diamond', 'ML600', 'Menunggu Pembayaran', 135000, '92064360912646', '920643609', '12646', '', '', 23, '', 'https://tripay.co.id/checkout/T161824504647JVNBT', 'Pending', '36.73.32.170', 'DF', '2022-10-19 21:17:15', '2022-10-19 21:17:15'),
(14, '085293026542', '72421899', 'admin@qgames.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '514 Diamond', 'ML514', 'Menunggu Pembayaran', 120330, '92064360912646', '920643609', '12646', '', '', 22, '', 'https://tripay.co.id/checkout/T161824505054T94UW', 'Pending', '36.73.32.170', 'DF', '2022-10-19 22:03:51', '2022-10-19 22:03:51'),
(15, '089636879138', '36299989', 'bysirramadhan@gmail.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'Menunggu Pembayaran', 4000, '5320396028128', '532039602', '8128', '', '', 23, '', 'https://tripay.co.id/checkout/T161824505625ATRMW', 'Pending', '103.144.179.98', 'DF', '2022-10-19 23:31:40', '2022-10-19 23:31:40'),
(16, '089636879138', '19230963', 'bysirramadhan@gmail.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'Menunggu Pembayaran', 4000, '5320396028128', '532039602', '8128', '', '', 23, '', 'https://tripay.co.id/checkout/T161824505626VLQDC', 'Pending', '103.144.179.98', 'DF', '2022-10-19 23:31:40', '2022-10-19 23:31:40'),
(17, '089636879138', '33174908', 'bysirramadhan@gmail.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'IP Anda tidak kami kenali: 103.147.154.77', 4000, '5320396028128', '532039602', '8128', '', '', 23, '', 'https://tripay.co.id/checkout/T161824505628AIVV3', 'Pending', '116.206.36.37', 'DF', '2022-10-19 23:32:09', '2022-10-19 23:32:09'),
(18, '085293026542', '53762468', 'admin@qgames.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'IP Anda tidak kami kenali: 103.147.154.77', 4000, '1957556299002', '195755629', '9002', '', '', 23, '', 'https://tripay.co.id/checkout/T161824505756L90NK', 'Pending', '36.73.32.170', 'DF', '2022-10-19 23:55:55', '2022-10-19 23:55:55'),
(19, '085293026542', '00129105', 'admin@qgames.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'ORDER16661992533MS', 4000, '1957556299002', '195755629', '9002', '', '', 23, '', 'https://tripay.co.id/checkout/T161824505791VMIWI', 'Completed', '36.73.32.170', 'DF', '2022-10-20 00:06:54', '2022-10-20 00:06:54'),
(20, '089636879138', '45682725', 'bysirramadhan@gmail.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'ORDER1666230103QAY', 4000, '1957556299002', '195755629', '9002', '', '', 23, '', 'https://tripay.co.id/checkout/T161824507380LQCVL', 'Completed', '103.144.179.98', 'DF', '2022-10-20 08:41:21', '2022-10-20 08:41:21'),
(21, '089636879138', '66571032', 'bysirramadhan@gmail.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'ORDER1666230418HAU', 4000, '5320396028128', '532039602', '8128', '', '', 23, '', 'https://tripay.co.id/checkout/T161824507415YRQEA', 'Completed', '103.144.179.98', 'DF', '2022-10-20 08:46:24', '2022-10-20 08:46:24'),
(23, '085293026542', '52115181', 'admin@qgames.com', 'default@email.io', 'MOBILE LEGEND', '1', 'https://cdn1.codashop.com/S/content/mobile/images/product-tiles/mlbb_tile.jpg', '14 Diamond', 'ML14', 'Menunggu Pembayaran', 4000, '92064360912646', '920643609', '12646', '', '', 23, '', 'https://tripay.co.id/checkout/T161824507549YUI5T', 'Pending', '36.73.32.38', 'DF', '2022-10-20 09:09:16', '2022-10-20 09:09:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `method_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `price`
--

INSERT INTO `price` (`id`, `method_id`, `product_id`, `price`) VALUES
(2, 1, 3, 9000),
(10, 2, 4, 1000),
(11, 1, 4, 4500),
(14, 2, 2, 2000),
(15, 1, 2, 1500),
(17, 1, 17, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `games_id` bigint(20) NOT NULL,
  `product` varchar(250) NOT NULL,
  `price` bigint(20) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `provider` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `games_id`, `product`, `price`, `sku`, `provider`) VALUES
(1, 53, '1200 PB Cash', 9700, 'PB1200', 'DF'),
(2, 54, 'Garena 330 Shell', 92550, 'GRN330', 'DF'),
(3, 1, '6050 Diamond', 1400025, 'MLB6050', 'DF'),
(4, 1, '4830 Diamond', 1095025, 'MLB4830', 'DF'),
(5, 1, '1159 Diamond', 314150, 'MLB1159', 'DF'),
(6, 1, '568 Diamond', 150018, 'MLB568', 'DF'),
(7, 1, '370 Diamond', 104845, 'MLB370', 'DF'),
(8, 1, '296 Diamond', 83920, 'MLB296', 'DF'),
(9, 1, '222 Diamond', 63045, 'MLB222', 'DF'),
(10, 1, '185 Diamond', 46025, 'MLB185', 'DF'),
(11, 1, '170 Diamond', 45947, 'MLB170', 'DF'),
(12, 1, '85 Diamond', 23155, 'MLB85', 'DF'),
(13, 1, '74 Diamond', 20010, 'MLB74', 'DF'),
(14, 1, '67 Diamond', 19000, 'MLB67', 'DF'),
(15, 1, '59 Diamond', 16000, 'MLB59', 'DF'),
(16, 1, '36 Diamond', 10625, 'MLB36', 'DF'),
(18, 1, '5408 Diamond + Starlight Member', 1426905, 'MLB5408+', 'DF'),
(19, 1, 'MOBILELEGEND Twilight Pass', 145500, 'TWP', 'DF'),
(20, 53, '12000 PB Cash', 97000, 'PB12000', 'DF'),
(21, 53, '6000 PB Cash', 48500, 'PB6000', 'DF'),
(22, 53, '2400 PB Cash', 19400, 'PB2400', 'DF'),
(23, 5, 'Free Fire 73100 Diamond', 9700000, 'FFD73100', 'DF'),
(24, 5, 'Free Fire 36500 Diamond', 4700000, 'FFD36500', 'DF'),
(25, 5, 'Free Fire 7290 Diamond', 925950, 'FFD7290', 'DF'),
(26, 5, 'Free Fire 3640 Diamond', 485000, 'FFD3640', 'DF'),
(27, 5, 'Free Fire 3310 Diamond', 450025, 'FFD3310', 'DF'),
(28, 5, 'Free Fire 2180 Diamond', 278475, 'FFD2180', 'DF'),
(29, 5, 'Free Fire 2000 Diamond', 260970, 'FFD2000', 'DF'),
(30, 5, 'Free Fire 1975 Diamond', 251728, 'FFD1975', 'DF'),
(31, 5, 'Free Fire 1875 Diamond', 259025, 'FFD1875', 'DF'),
(32, 5, 'Free Fire 1450 Diamond', 186125, 'FFD1450', 'DF'),
(33, 5, 'Free Fire 1200 Diamond', 160425, 'FFD1200', 'DF'),
(34, 5, 'Free Fire 1080 Diamond', 143525, 'FFD1080', 'DF'),
(35, 5, 'Free Fire 1075 Diamond', 135995, 'FFD1075', 'DF'),
(36, 5, 'Free Fire 925 Diamond', 130025, 'FFD925', 'DF'),
(37, 5, 'Free Fire 720 Diamond', 93025, 'FFD720', 'DF'),
(38, 5, 'Free Fire 510 Diamond', 68525, 'FFD510', 'DF'),
(39, 5, 'Free Fire 355 Diamond', 46525, 'FFD355', 'DF'),
(40, 5, 'Free Fire 210 Diamond', 28390, 'FFD210', 'DF'),
(41, 5, 'Free Fire 130 Diamond', 18000, 'FFD130', 'DF'),
(42, 5, 'Free Fire 100 Diamond', 14010, 'FFD100', 'DF'),
(43, 5, 'Free Fire 95 Diamond', 13500, 'FFD95', 'DF'),
(44, 5, 'Free Fire 55 Diamond', 8880, 'FFD55', 'DF'),
(45, 5, 'Free Fire 70 Diamond', 9700, 'FFD70', 'DF'),
(46, 5, 'Free Fire 50 Diamond', 7760, 'FFD50', 'DF'),
(47, 5, 'Free Fire 20 Diamond', 3005, 'FFD20', 'DF'),
(48, 5, 'Free Fire 12 Diamond', 1940, 'FFD12', 'DF'),
(49, 5, 'Free Fire 5 Diamond', 970, 'FFD5', 'DF'),
(50, 13, 'PUBG MOBILE 35 UC', 7600, 'PM35', 'DF'),
(51, 13, 'PUBG MOBILE 50 UC', 9595, 'PM50', 'DF'),
(52, 13, 'PUBG MOBILE 70 UC', 14155, 'PM70', 'DF'),
(53, 13, 'PUBG MOBILE 100 UC', 19105, 'PM100', 'DF'),
(54, 13, 'PUBG MOBILE 125 UC', 23255, 'PM125', 'DF'),
(55, 13, 'PUBG MOBILE 150 UC', 31520, 'PM150', 'DF'),
(56, 13, 'PUBG MOBILE 210 UC', 41225, 'PM210', 'DF'),
(57, 13, 'PUBG MOBILE 500 UC', 92100, 'PM500', 'DF'),
(58, 13, 'PUBG MOBILE 250 UC', 45770, 'PM250', 'DF'),
(59, 13, 'PUBG MOBILE 700 UC', 134500, 'PM700', 'DF'),
(60, 13, 'PUBG MOBILE 1250 UC', 261570, 'PM1250', 'DF'),
(61, 13, 'PUBG MOBILE 1750 UC', 333000, 'PM1750', 'DF'),
(62, 13, 'PUBG MOBILE 2500 UC', 487070, 'PM2500', 'DF'),
(63, 13, 'PUBG MOBILE 3500 UC', 671500, 'PM3500', 'DF'),
(64, 13, 'PUBG MOBILE 7000 UC', 1329800, 'PM7000', 'DF'),
(65, 12, 'COD 26', 4850, 'COD26', 'DF'),
(66, 12, 'COD 53', 9700, 'COD53', 'DF'),
(67, 12, 'COD 106', 19400, 'COD106', 'DF'),
(68, 12, 'COD 264', 48500, 'COD264', 'DF'),
(69, 12, 'COD 528', 97000, 'COD528', 'DF'),
(70, 12, 'COD 1056', 194000, 'COD1056', 'DF'),
(71, 12, 'COD 1584', 291000, 'COD1584', 'DF'),
(72, 12, 'COD 2640', 485000, 'COD2640', 'DF'),
(73, 12, 'COD 5280', 970000, 'COD5280', 'DF'),
(74, 12, 'COD 10560', 1940000, 'COD10560', 'DF'),
(75, 12, 'COD 26400', 4850000, 'COD26400', 'DF'),
(76, 12, 'COD 52800', 9700000, 'COD52800', 'DF'),
(77, 55, 'Lords Mobile 3352 Diamonds', 485000, 'LM3352D', 'DF'),
(78, 55, 'Lords Mobile 2011 Diamonds', 291000, 'LM2011D', 'DF'),
(79, 55, 'Lords Mobile 670 Diamonds', 97000, 'LM670D', 'DF'),
(80, 55, 'Lords Mobile 335 Diamonds', 48500, 'LM335D', 'DF'),
(81, 55, 'Lords Mobile 134 Diamonds', 19400, 'LM134D', 'DF'),
(82, 55, 'Lords Mobile 67 Diamonds', 9700, 'LM67D', 'DF'),
(83, 56, 'Speed Drifters 63000 Diamonds', 9700000, 'SD63000D', 'DF'),
(84, 56, 'Speed Drifters 31450 Diamonds', 4850000, 'SD31450D', 'DF'),
(85, 56, 'Speed Drifters 6279 Diamonds', 970000, 'SD6279D', 'DF'),
(86, 56, 'Speed Drifters 3134 Diamonds', 485000, 'SD3134D', 'DF'),
(87, 56, 'Speed Drifters 1845 Diamonds', 291000, 'SD1845D', 'DF'),
(88, 56, 'Speed Drifters 1230 Diamonds', 194000, 'SD1230D', 'DF'),
(89, 56, 'Speed Drifters 579 Diamonds', 97000, 'SD579D', 'DF'),
(90, 56, 'Speed Drifters 282 Diamonds', 48500, 'SD282D', 'DF'),
(91, 56, 'Speed Drifters 112 Diamonds', 19400, 'SD112D', 'DF'),
(92, 56, 'Speed Drifters 56 Diamonds', 9700, 'SD56D', 'DF'),
(93, 56, 'Speed Drifters 25 Diamonds', 4850, 'SD25D', 'DF'),
(94, 56, 'Speed Drifters 10 Diamonds', 1940, 'SD10D', 'DF'),
(95, 57, 'Boyaa Capsa Susun 45.5M Koin', 4850, 'BCS45.5', 'DF'),
(96, 57, 'Boyaa Capsa Susun 50M Koin', 5335, 'BCS50', 'DF'),
(97, 57, 'Boyaa Capsa Susun 97.5M Koin', 9700, 'BCS97.5', 'DF'),
(98, 57, 'Boyaa Capsa Susun 107.2M Koin', 10670, 'BCS107.2', 'DF'),
(99, 57, 'Boyaa Capsa Susun 200.2M Koin', 19400, 'BCS200.2', 'DF'),
(100, 57, 'Boyaa Capsa Susun 220.2M Koin', 21340, 'BCS220.2', 'DF'),
(101, 57, 'Boyaa Capsa Susun 338.9M Koin', 32010, 'BCS338.9', 'DF'),
(102, 57, 'Boyaa Capsa Susun 533M Koin', 48500, 'BCS533', 'DF'),
(103, 57, 'Boyaa Capsa Susun 586.3M Koin', 53350, 'BCS586.3', 'DF'),
(104, 57, 'Boyaa Capsa Susun 819M Koin', 72750, 'BCS819', 'DF'),
(105, 57, 'Boyaa Capsa Susun 1.12B Koin', 97000, 'BCS1.12B', 'DF'),
(106, 57, 'Boyaa Capsa Susun 1.23B Koin', 106700, 'BCS1.23B', 'DF'),
(107, 57, 'Boyaa Capsa Susun 13B Koin', 970000, 'BCS13B', 'DF'),
(108, 57, 'Boyaa Capsa Susun 6.18B Koin', 485000, 'BCS6.18B', 'DF'),
(109, 57, 'Boyaa Capsa Susun 3.99B Koin', 320100, 'BCS3.99B', 'DF'),
(110, 57, 'Boyaa Capsa Susun 3.63B Koin', 291000, 'BCS3.63B', 'DF'),
(111, 57, 'Boyaa Capsa Susun 2.29B Koin', 194000, 'BCS2.29B', 'DF'),
(112, 59, 'LifeAfter 7768 Credits', 1406500, 'LAC7768', 'DF'),
(113, 59, 'LifeAfter 5768 Credits', 1054875, 'LAC5768', 'DF'),
(114, 59, 'LifeAfter 3468 Credits', 661055, 'LAC3468', 'DF'),
(115, 59, 'LifeAfter 2268 Credits', 421950, 'LAC2268', 'DF'),
(116, 59, 'LifeAfter 1108 Credits', 210975, 'LAC1108', 'DF'),
(117, 59, 'LifeAfter 558 Credits', 112520, 'LAC558', 'DF'),
(118, 59, 'LifeAfter 330 Credits', 70325, 'LAC330', 'DF'),
(119, 59, 'LifeAfter 65 Credits', 14065, 'LAC65', 'DF'),
(120, 60, 'Sakura & Sword 10000 Gioks', 1406500, 'SO10000', 'DF'),
(121, 60, 'Sakura & Sword 5000 Gioks', 703250, 'SO5000', 'DF'),
(122, 60, 'Sakura & Sword 1840 Gioks', 281300, 'SO1840', 'DF'),
(123, 60, 'Sakura & Sword 1350 Gioks', 210975, 'SO1350', 'DF'),
(124, 60, 'Sakura & Sword 900 Gioks', 140650, 'SO900', 'DF'),
(125, 60, 'Sakura & Sword 450 Gioks', 70325, 'SO450', 'DF'),
(126, 60, 'Sakura & Sword 90 Gioks', 14065, 'SO90', 'DF'),
(127, 61, 'Marvel Super War 6000 Star Credits', 1454030, 'MSW6000', 'DF'),
(128, 61, 'Marvel Super War 2950 Star Credits', 716830, 'MSW2950', 'DF'),
(129, 61, 'Marvel Super War 1765 Star Credits', 425830, 'MSW1765', 'DF'),
(130, 61, 'Marvel Super War 1155 Star Credits', 290030, 'MSW1155', 'DF'),
(131, 61, 'Marvel Super War 565 Star Credits', 144530, 'MSW565', 'DF'),
(132, 61, 'Marvel Super War 275 Star Credits', 72750, 'MSW275', 'DF'),
(133, 61, 'Marvel Super War 55 Star Credits', 14550, 'MSW55', 'DF'),
(134, 14, 'Hago 3300 Diamonds', 1100025, 'HGD3300', 'DF'),
(135, 14, 'Hago 1650 Diamonds', 550025, 'HGD1650', 'DF'),
(136, 14, 'Hago 900 Diamonds', 300025, 'HGD900', 'DF'),
(137, 14, 'Hago 375 Diamonds', 125025, 'HGD375', 'DF'),
(138, 14, 'Hago 225 Diamonds', 80925, 'HGD225', 'DF'),
(139, 14, 'Hago 90 Diamonds', 35925, 'HGD90', 'DF'),
(140, 14, 'Hago 45 Diamonds', 16410, 'HGD45', 'DF'),
(141, 13, 'PUBG MOBILE 1000 UC', 184650, 'PM1000', 'DF'),
(142, 65, 'PLN 20.000', 20100, 'PLN20', 'VR'),
(143, 1, '3 diamonds', 1000, 'Nogi-1000', 'DF'),
(144, 10, '60 Genesis Crystals', 11564, 'GI60-S24', 'VR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `provider` varchar(55) NOT NULL,
  `status` enum('On','Off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provider`
--

INSERT INTO `provider` (`id`, `provider`, `status`) VALUES
(1, 'DF', 'On'),
(4, 'AG', 'On');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `topup_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `metode` varchar(250) NOT NULL,
  `metode_id` int(11) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `target` varchar(250) NOT NULL,
  `status` enum('Pending','Success','Canceled') NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`id`, `topup_id`, `email`, `metode`, `metode_id`, `quantity`, `balance`, `target`, `status`, `date_create`) VALUES
(2, '10774', 'member@vigames.com', 'BRI', 12, 10000, 10000, 'bri', 'Success', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` enum('Member','Admin') NOT NULL,
  `status` enum('On','Off') NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `last_ip` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`, `password`, `level`, `status`, `ip`, `date_create`, `last_ip`, `last_login`) VALUES
(4, 'Member', 'member@vigames.com', 0, '$2y$10$W6Jr1mBg7AGeKeXyG5zAo.FuRpLGKZbINKM9T3j2lbZJv2H1hV/yK', 'Member', 'On', '', '2022-03-01 00:20:47', '0.0.0.0', '2022-06-27 10:04:01'),
(5, 'Administrator', 'admin@vigames.com', 0, '$2y$10$we7pWUWk6uJGk3Q7f0xJneIBNJUXEPVcRqJuI2KkqqEMef08waiqG', 'Admin', 'On', '', '2022-06-26 22:10:49', '36.73.34.223', '2022-10-21 09:14:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `utility`
--

CREATE TABLE `utility` (
  `id` int(11) NOT NULL,
  `u_key` varchar(250) NOT NULL,
  `u_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `utility`
--

INSERT INTO `utility` (`id`, `u_key`, `u_value`) VALUES
(1, 'web-title', 'QGames - Topup Game Termurah #1 Di Indonesia'),
(2, 'web-icon', 'https://i.postimg.cc/QdNXz4Gv/qgamesico.png '),
(3, 'web-logo', 'https://i.postimg.cc/WprbqqwY/qgames.png'),
(4, 'web-author', 'Renaldi Adriansah'),
(5, 'web-keywords', 'jasa topup game online tercepat'),
(6, 'web-description', 'Jasa top up games tercepat se jagad raya'),
(7, 'tripay_api', '-'),
(8, 'tripay_private', '-'),
(9, 'tripay_merchant', '-'),
(10, 'slide-1', '-'),
(11, 'slide-2', '-'),
(12, 'slide-3', '-'),
(13, 'digi_user', '-'),
(14, 'digi_key', '-'),
(15, 'doc_tutor', '<ol>\n	<li>Silahkan masuk ke menu <a href=\"/\">Top Up</a></li>\n	<li>Pilih Games</li>\n	<li>Masukan ID Akun</li>\n	<li>Pilih nominal Top Up</li>\n	<li>Pilih metode pembayaran</li>\n	<li>Lakukan pembayaran</li>\n	<li>Selesai</li>\n</ol>\n'),
(16, 'doc_terms', '<h2><strong>Terms and Conditions</strong></h2>\r\n\r\n<p>Welcome to Bysstoreid!</p>\r\n\r\n<p>These terms and conditions outline the rules and regulations for the use of Byssto reidWebsite, located at https://bysstoreid.com</p>\r\n\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use VIGame if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &quot;Client&quot;, &quot;You&quot; and &quot;Your&quot; refers to you, the person log on this website and compliant to the Company&rsquo;s terms and conditions. &quot;The Company&quot;, &quot;Ourselves&quot;, &quot;We&quot;, &quot;Our&quot; and &quot;Us&quot;, refers to our Company. &quot;Party&quot;, &quot;Parties&quot;, or &quot;Us&quot;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>We employ the use of cookies. By accessing Bysstoreid, you agreed to use cookies in agreement with the Bysstoreid Privacy Policy.</p>\r\n\r\n<p>Most interactive websites use cookies to let us retrieve the user&rsquo;s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n\r\n<h3><strong>License</strong></h3>\r\n\r\n<p>Unless otherwise stated, VIGame and/or its licensors own the intellectual property rights for all material on Bysstoreid. All intellectual property rights are reserved. You may access this from Bysstoreid for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n\r\n<p>You must not:</p>\r\n\r\n<ul>\r\n	<li>Republish material from Bysstoreid</li>\r\n	<li>Sell, rent or sub-license material from Bysstoreid</li>\r\n	<li>Reproduce, duplicate or copy material from Bysstoreid</li>\r\n	<li>Redistribute content from Bysstoreid</li>\r\n</ul>\r\n\r\n<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href=\"https://www.privacypolicies.com/blog/sample-terms-conditions-template/\">Terms And Conditions Template</a>.</p>\r\n\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. VIGame does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of VIGame,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, VIGame shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n\r\n<p>Bysstoreid reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n\r\n<p>You warrant and represent that:</p>\r\n\r\n<ul>\r\n	<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n	<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n	<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n	<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n\r\n<p>You hereby grant Bysstoreid a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n\r\n<ul>\r\n	<li>Government agencies;</li>\r\n	<li>Search engines;</li>\r\n	<li>News organizations;</li>\r\n	<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n	<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n\r\n<ul>\r\n	<li>commonly-known consumer and/or business information sources;</li>\r\n	<li>dot.com community sites;</li>\r\n	<li>associations or other groups representing charities;</li>\r\n	<li>online directory distributors;</li>\r\n	<li>internet portals;</li>\r\n	<li>accounting, law and consulting firms; and</li>\r\n	<li>educational institutions and trade associations.</li>\r\n</ul>\r\n\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Bysstoreid; and (d) the link is in the context of general resource information.</p>\r\n\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Bysstoreid. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n\r\n<ul>\r\n	<li>By use of our corporate name; or</li>\r\n	<li>By use of the uniform resource locator being linked to; or</li>\r\n	<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party&rsquo;s site.</li>\r\n</ul>\r\n\r\n<p>No use of VIGame&#39;s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n\r\n<h3><strong>Content Liability</strong></h3>\r\n\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n\r\n<h3><strong>Your Privacy</strong></h3>\r\n\r\n<p>Please read Privacy Policy</p>\r\n\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it&rsquo;s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n\r\n<ul>\r\n	<li>limit or exclude our or your liability for death or personal injury;</li>\r\n	<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n	<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n	<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>\r\n'),
(17, 'help_email', 'topupbysstore@gmail.com'),
(18, 'help_telpon', '+62 823 85558 2832'),
(19, 'games_token', '-'),
(21, 'pay-saldo', 'On'),
(23, 'v_id', '-'),
(24, 'v_key', '-'),
(25, 's_host', 'mail.bysstoreid.com'),
(26, 's_user', 'cs@bysstoreid.com'),
(27, 's_pass', '*F33S;Q7E3wixh'),
(28, 's_port', '465'),
(29, 'chat_id', '-'),
(30, 'api_secret', '-'),
(31, 'api_merchant', '-'),
(32, 'fonnte_key', '-'),
(33, 'wa_order_status', 'On'),
(34, 'wa_order_msg', '-'),
(35, 'wa_pay_status', 'On'),
(36, 'wa_pay_msg', '-'),
(37, 'wa_success_status', 'On'),
(38, 'wa_success_msg', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `utility`
--
ALTER TABLE `utility`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT untuk tabel `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `utility`
--
ALTER TABLE `utility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
