-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Ağu 2024, 10:08:31
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `alt_kategorilers`
--

INSERT INTO `alt_kategorilers` (`id`, `kategori_id`, `altkategori_adi`, `altkategori_url`, `anahtar`, `aciklama`, `resim`, `created_at`, `updated_at`) VALUES
(21, 29, 'Güvenlik Sistemleri', 'guvenlik-sistemleri', 'Güvenlik Sistemleri', 'Güvenlik Sistemleri', 'upload/altkategoriler/1806280024365708.jpeg', '2024-08-02 09:47:47', NULL),
(23, 30, 'Kombi', 'kombi', 'Kombi', 'Kombi', 'upload/altkategoriler/1806283293255945.jpeg', '2024-08-02 10:39:45', NULL),
(24, 31, 'Top', 'top', 'Futbol , Basketbol , Buz Hokeyi , Judo', 'Oyun', 'upload/altkategoriler/1806283415203690.jpeg', '2024-08-02 10:41:41', NULL),
(25, 31, 'Logo', 'logo', 'Grafik Tasarım , Logo', 'Kurumsal', 'upload/altkategoriler/1806710701220353.jpeg', '2024-08-07 03:53:13', NULL),
(26, 30, 'Ulaşım', 'ulasim', 'Uçak , tren , karayolu', 'Hizmet', 'upload/altkategoriler/1806710793569658.jpg', '2024-08-07 03:54:41', NULL),
(37, 29, 'Portfolyo', 'portfolyo', 'Ulaşım , logo', 'Kurumsal', 'upload/altkategoriler/1806710904816297.jpeg', '2024-08-07 03:56:27', NULL);

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
(1, 'Size en iyi ürünü en kısa sürede vereceğim.', 'Temiz ve kullanıcı dostu deneyimler oluşturmaya odaklanmış Akara44 merkezli bir ürün tasarımı ve web tasarımcıyım', 'http://127.0.0.1:8000/', 'http://127.0.0.1:8000/dashboard', 'upload/banner/1806729014349017.jpeg', NULL, '2024-08-07 08:44:18');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategorilers`
--

INSERT INTO `kategorilers` (`id`, `kategori_adi`, `kategori_url`, `anahtar`, `aciklama`, `resim`, `created_at`, `updated_at`) VALUES
(29, 'Çalışmalarımız', 'calismalarimiz', 'Çalışmalarımız', 'Çalışmalarımız', 'upload/kategoriler/1806279781857533.jpeg', '2024-08-02 09:43:56', NULL),
(30, 'Çözümlerimiz', 'cozumlerimiz', 'Çözümlerimiz', 'Çözümlerimiz', 'upload/kategoriler/1806279811651140.jpeg', '2024-08-02 09:44:24', NULL),
(31, 'Ürünlerimiz', 'urunlerimiz', 'Ürünlerimiz', 'Ürünlerimiz', 'upload/kategoriler/1806279838601974.jpeg', '2024-08-02 09:44:50', NULL);

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
(8, '2024_08_07_080002_create_urunlers_table', 5);

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
  `metin` varchar(255) DEFAULT NULL,
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
(1, 0, 0, 'başlık', 'başlık', 'tag', NULL, NULL, 'metin', NULL, 1, 1, NULL, '2024-08-07 10:00:07');

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
(5, 'Deneme2', 'deneme2@gmail.com', '202408071148laravel.png', '2024-07-20 12:06:54', '$2y$10$x7nh6kaFZBdustwbzU5kxuabC7wglgb8f/7WhlWL/x7gCuJ2zOmve', '2qw9lOQRMsL0TMIjv0QraPYt0t49ScQfJtyXDwKYbJB10NllByF2VEMz6tqS', '2024-07-20 12:06:08', '2024-08-07 08:48:31'),
(6, 'Ahmet Kara', 'ahmetkara2044@gmail.com', '202407240943Adsız.png', '2024-07-24 06:37:14', '$2y$10$.QHfNFsfV8y4K6OPcdyYre7yhHhCl45C01pHi8tykwyt697eJz5Ga', NULL, '2024-07-24 06:08:14', '2024-07-31 03:19:05'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urunlers`
--
ALTER TABLE `urunlers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
