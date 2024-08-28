-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ağu 2024, 13:48:27
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kurumsal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alt_kategorilers`
--

CREATE TABLE `alt_kategorilers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `altkategori_adi` varchar(255) DEFAULT NULL,
  `altkategori_url` varchar(255) DEFAULT NULL,
  `anahtar` varchar(255) DEFAULT NULL,
  `aciklama` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `durum` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `alt_kategorilers`
--

INSERT INTO `alt_kategorilers` (`id`, `kategori_id`, `altkategori_adi`, `altkategori_url`, `anahtar`, `aciklama`, `resim`, `durum`, `created_at`, `updated_at`) VALUES
(21, 29, 'Güvenlik Sistemleri', 'guvenlik-sistemleri', 'Güvenlik Sistemleri', 'Güvenlik Sistemleri', 'upload/altkategoriler/1806280024365708.jpeg', 1, '2024-08-02 09:47:47', '2024-08-28 08:41:41'),
(23, 30, 'Kombi', 'kombi', 'Kombi', 'Kombi', 'upload/altkategoriler/1806283293255945.jpeg', 1, '2024-08-02 10:39:45', '2024-08-28 08:41:41'),
(24, 31, 'Top', 'top', 'Futbol , Basketbol , Buz Hokeyi , Judo', 'Oyun', 'upload/altkategoriler/1806283415203690.jpeg', 1, '2024-08-02 10:41:41', '2024-08-28 08:41:40'),
(25, 31, 'Logo', 'logo', 'Grafik Tasarım , Logo', 'Kurumsal', 'upload/altkategoriler/1806710701220353.jpeg', 1, '2024-08-07 03:53:13', '2024-08-28 08:41:39'),
(26, 30, 'Ulaşım', 'ulasim', 'Uçak , tren , karayolu', 'Hizmet', 'upload/altkategoriler/1806710793569658.jpg', 1, '2024-08-07 03:54:41', '2024-08-28 08:41:38'),
(37, 29, 'Portfolyo', 'portfolyo', 'Ulaşım , logo', 'Kurumsal', 'upload/altkategoriler/1806710904816297.jpeg', 1, '2024-08-07 03:56:27', '2024-08-28 08:41:38'),
(39, 29, 'Yapı', 'yapi', 'Uçak , tren , karayolu,Köprü', 'Yapılar', 'upload/altkategoriler/1808003434178753.jpeg', 1, '2024-08-21 10:20:39', '2024-08-28 08:41:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baslik` varchar(255) DEFAULT NULL,
  `alt_baslik` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `banners`
--

INSERT INTO `banners` (`id`, `baslik`, `alt_baslik`, `url`, `video_url`, `resim`, `created_at`, `updated_at`) VALUES
(1, 'Size en iyi ürünü en kısa sürede vereceğim.', 'Temiz ve kullanıcı dostu deneyimler oluşturmaya odaklanmış Akara44 merkezli bir ürün tasarımı ve web tasarımcıyım.', 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/dashboard', 'upload/banner/1807444613276527.png', NULL, '2024-08-15 06:18:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategorilers`
--

CREATE TABLE `kategorilers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_adi` varchar(255) DEFAULT NULL,
  `kategori_url` varchar(255) DEFAULT NULL,
  `anahtar` varchar(255) DEFAULT NULL,
  `aciklama` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `durum` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategorilers`
--

INSERT INTO `kategorilers` (`id`, `kategori_adi`, `kategori_url`, `anahtar`, `aciklama`, `resim`, `durum`, `created_at`, `updated_at`) VALUES
(29, 'Çalışmalarımız', 'calismalarimiz', 'Çalışmalarımız', 'Size En iyi deneyimlerinizi sunmak için durmadan gelişiyoruz.', 'upload/kategoriler/1806279781857533.jpeg', 1, '2024-08-02 09:43:56', '2024-08-28 08:41:32'),
(30, 'Çözümlerimiz', 'cozumlerimiz', 'Çözümlerimiz', 'Size En iyi deneyimlerinizi sunmak için durmadan gelişiyoruz.', 'upload/kategoriler/1806279811651140.jpeg', 1, '2024-08-02 09:44:24', '2024-08-28 08:41:31'),
(31, 'Ürünlerimiz', 'urunlerimiz', 'Ürünlerimiz', 'Size En iyi deneyimlerinizi sunmak için durmadan gelişiyoruz.', 'upload/kategoriler/1806279838601974.jpeg', 1, '2024-08-02 09:44:50', '2024-08-28 08:41:31'),
(35, 'Teknolojilerimiz', 'teknolojilerimiz', 'Teknoloji', 'Size En iyi deneyimlerinizi sunmak için durmadan gelişiyoruz.', 'upload/kategoriler/1806895810613089.jpeg', 1, '2024-08-09 04:55:27', '2024-08-28 08:41:30'),
(36, 'Hizmetlerimiz', 'hizmetlerimiz', 'Hizmetlerimiz', 'Size En iyi deneyimlerinizi sunmak için durmadan gelişiyoruz.', 'upload/kategoriler/1806895876562787.jpeg', 1, '2024-08-09 04:56:30', '2024-08-28 08:41:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_24_115725_create_banners_table', 2),
(6, '2024_07_31_093650_create_kategorilers_table', 3),
(7, '2024_08_01_104036_create_alt_kategorilers_table', 4),
(8, '2024_08_07_080002_create_urunlers_table', 5),
(9, '2024_08_22_074127_create_blogkategorilers_table', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunlers`
--

CREATE TABLE `urunlers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `altkategori_id` int(11) NOT NULL,
  `baslik` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `anahtar` varchar(255) DEFAULT NULL,
  `aciklama` varchar(255) DEFAULT NULL,
  `metin` text DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT 0,
  `sirano` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunlers`
--

INSERT INTO `urunlers` (`id`, `kategori_id`, `altkategori_id`, `baslik`, `url`, `tag`, `anahtar`, `aciklama`, `metin`, `resim`, `durum`, `sirano`, `created_at`, `updated_at`) VALUES
(13, 30, 23, 'deneme', 'deneme', 'Editör,Laravel', 'deneme', 'deneme', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non quam ullamcorper, tempor massa quis, egestas velit. In hac habitasse platea dictumst. Nullam sed metus pharetra, euismod risus nec, pellentesque ligula. Nam sit amet purus feugiat, feugiat enim id, pulvinar nibh. In lacinia accumsan ante et ullamcorper. Aenean et molestie ligula. Pellentesque fermentum sapien sed purus bibendum, at rutrum turpis feugiat. Phasellus tristique magna vitae quam cursus dictum. Vestibulum pharetra condimentum pulvinar. Ut eleifend ligula ut dui interdum auctor. Sed porta, felis eu mollis rhoncus, libero metus faucibus tortor, at rhoncus nisl eros ac sem. Integer ut lacinia est.</p>\r\n<p>Aliquam id laoreet ante. Cras accumsan massa sed augue sodales, vel blandit leo viverra. Pellentesque ornare mauris eu eros iaculis dignissim id eget nulla. Vivamus dignissim placerat odio, id placerat ante sagittis ac. Donec pharetra, quam eu semper convallis, velit diam mattis quam, sit amet hendrerit diam leo quis risus. Nam fermentum venenatis justo nec porttitor. Donec eu libero massa.</p>\r\n<p>Maecenas ut facilisis ex. In hac habitasse platea dictumst. Curabitur a blandit orci, et elementum tortor. Mauris maximus massa massa. Aliquam malesuada scelerisque fringilla. Sed ut mattis quam. Aliquam vehicula ipsum accumsan arcu tincidunt eleifend. Nulla vitae nunc vulputate, accumsan eros quis, dapibus turpis. Donec quis varius mauris. Suspendisse tincidunt, leo sed ultrices sagittis, erat arcu pharetra diam, nec vestibulum turpis nibh a turpis.</p>', 'upload/urunler/1807978007487493.jpeg', 1, 4, '2024-08-21 03:36:30', '2024-08-28 08:16:43'),
(14, 30, 26, 'Kurumsal Log', 'kurumsal-log', 'Adobe ,luustrator', 'Kurumsal LoGO', 'logo', '<p>Deneme</p>', 'upload/urunler/1807978678067033.png', 1, 8, '2024-08-21 03:47:10', '2024-08-28 08:16:43'),
(15, 30, 26, 'Taşımacılık', 'tasimacilik', 'Editör,Laravel,Taşıyoruz', 'Uçak , tren , karayolu', 'Taşımacılık Nedir?', '<p style=\"font-weight: 400;\"><strong>Taşımacılık Nedir?</strong></p>\r\n<p style=\"font-weight: 400;\">Herhangi bir malın ya da y&uuml;k&uuml;n bir yerden ama&ccedil;lanan başka bir yere nakliye edilmesi durumuna taşıma adı verilmektedir. Taşımacılık işinde &ouml;nemli olan nokta, y&uuml;k&uuml;n taşınacağı yere hi&ccedil;bir zarar almadan ve hızlı bir şekilde ulaştırılmasıdır. Uluslararası taşımacılık nedir? Şeklindeki bir soruya da cevap olarak ; iki &uuml;lke arasındaki herhangi bir taşıma işi olarak tanımlanmaktadır. Bu taşıma işi deniz yolu, hava yolu ve kara yolu olarak ger&ccedil;ekleştirilmektedir.</p>\r\n<p style=\"font-weight: 400;\">Bir &uuml;lkeden başka bir &uuml;lkeye yapılması planlanan nakliye işinden malların minimum derecede dikkatli bir şekilde ve titizlik ile muhafaza edilmesi gerekmektedir. G&uuml;nlerce s&uuml;ren hatta ve hatta belki de haftalar s&uuml;ren bu zorlu seyahatte eşyaların hasar g&ouml;rme olasılığı son derece y&uuml;ksek bir ihtimaldir. B&uuml;t&uuml;n bunlar değerlendirildiği zaman ise kurumsal ve bu işi profesyonel bir şekilde ger&ccedil;ekleştiren firmaların tercih edilmesi &ccedil;ok daha uygun olacaktır.</p>', 'upload/urunler/1808001013577365.jpg', 1, 5, '2024-08-21 09:42:11', '2024-08-28 08:16:42'),
(17, 29, 39, 'Yavuz Sultan Selim Köprüsü', 'yavuz-sultan-selim-koprusu', 'Köprü,Ulaşım,Kamu,HGS', 'Uçak , tren , karayolu,Zincirleme', 'Kamu', '<p>T&uuml;rkiye\'deki 3. k&ouml;pr&uuml;, resm&icirc; adıyla <strong>Yavuz Sultan Selim K&ouml;pr&uuml;s&uuml;</strong> olarak bilinir. İstanbul\'da, Avrupa ve Asya kıtalarını birleştiren &uuml;&ccedil;&uuml;nc&uuml; boğaz k&ouml;pr&uuml;s&uuml;d&uuml;r.</p>', 'upload/urunler/1808003525667381.jpeg', 1, 3, '2024-08-21 10:22:06', '2024-08-28 08:16:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `resim`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Ahmet Kara', 'ahmetkara2044@gmail.com', '202408221049Vesikalık Eras 2021.jpg', '2024-07-24 06:37:14', '$2y$10$ThVbC/Ag4bFjDmQGYd7a2e9HRwMGuJTWcBx0VJZXh7k.HsI/9sgVS', 'WpyRU4gxlpG6xL7evPeSAoWrCA2rUmJb8DfCVV4jcaJap63lav7VFGLlYYMF', '2024-07-24 06:08:14', '2024-08-22 07:49:21'),
(7, 'deneme22', 'deneme22@gmail.com', NULL, NULL, '$2y$10$ppXvOSxCIXo/9afBr2HXU.AfRaOGGO9JrcD1S8Q2GabrCAIzBwt5i', NULL, '2024-07-24 06:30:35', '2024-07-24 06:30:35');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alt_kategorilers`
--
ALTER TABLE `alt_kategorilers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `kategorilers`
--
ALTER TABLE `kategorilers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `urunlers`
--
ALTER TABLE `urunlers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alt_kategorilers`
--
ALTER TABLE `alt_kategorilers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategorilers`
--
ALTER TABLE `kategorilers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urunlers`
--
ALTER TABLE `urunlers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
