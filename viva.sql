-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Oca 2023, 01:25:32
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `den2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sh_duyuru`
--

CREATE TABLE `sh_duyuru` (
  `id` int(11) NOT NULL,
  `d_icerik` varchar(255) NOT NULL,
  `d_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sh_duyuru`
--

INSERT INTO `sh_duyuru` (`id`, `d_icerik`, `d_time`) VALUES
(51, 'discord.gg/viva5005', '21.01.2023'),
(54, 'PREMİUM BAKIMDA', '24.01.2023'),
(56, 'GSM SORGULARI AKTİF', '25.01.2023');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sh_kullanici`
--

CREATE TABLE `sh_kullanici` (
  `id` int(11) NOT NULL,
  `k_rol` enum('0','1','2') NOT NULL DEFAULT '0',
  `k_log` varchar(32) NOT NULL,
  `u_time` varchar(32) NOT NULL,
  `k_browser` varchar(32) NOT NULL,
  `k_os` varchar(32) NOT NULL,
  `k_time` varchar(32) NOT NULL,
  `k_key` varchar(255) NOT NULL,
  `k_verified` varchar(255) NOT NULL,
  `k_adi` varchar(255) NOT NULL,
  `k_lastlogin` varchar(255) NOT NULL,
  `k_ekleyen` varchar(255) NOT NULL,
  `k_cooldown` varchar(255) NOT NULL,
  `k_cooldown_bypass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sh_kullanici`
--

INSERT INTO `sh_kullanici` (`id`, `k_rol`, `k_log`, `u_time`, `k_browser`, `k_os`, `k_time`, `k_key`, `k_verified`, `k_adi`, `k_lastlogin`, `k_ekleyen`, `k_cooldown`, `k_cooldown_bypass`) VALUES
(1, '1', '85.96.105.247', '1', 'Google Chrome', 'Windows 10', '', 'admin', 'true', 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '', '1654443682', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sh_log`
--

CREATE TABLE `sh_log` (
  `id` int(11) NOT NULL,
  `k_adi` varchar(32) NOT NULL,
  `k_ip` varchar(32) NOT NULL,
  `k_city` varchar(32) NOT NULL,
  `k_country` varchar(32) NOT NULL,
  `k_acent` varchar(256) NOT NULL,
  `k_time` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sh_duyuru`
--
ALTER TABLE `sh_duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sh_kullanici`
--
ALTER TABLE `sh_kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sh_log`
--
ALTER TABLE `sh_log`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sh_duyuru`
--
ALTER TABLE `sh_duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Tablo için AUTO_INCREMENT değeri `sh_kullanici`
--
ALTER TABLE `sh_kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
