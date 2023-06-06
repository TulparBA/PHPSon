-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2023, 19:51:58
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
-- Veritabanı: `deneme_1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgisayarlar`
--

CREATE TABLE `bilgisayarlar` (
  `id` int(10) NOT NULL,
  `marka` varchar(100) NOT NULL,
  `islemci` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `depolama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bilgisayarlar`
--

INSERT INTO `bilgisayarlar` (`id`, `marka`, `islemci`, `ram`, `depolama`) VALUES
(14, 'Asus', 'İ7-7700KF', '32GB', '1TB');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor`
--

CREATE TABLE `monitor` (
  `id` int(10) NOT NULL,
  `marka` varchar(100) NOT NULL,
  `hertz` varchar(100) NOT NULL,
  `yanit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `sur_name`, `mail`, `faculty`, `telephone`, `section`, `class`) VALUES
(1, 'burak', '12345', 'Burak', 'Arzuman', 'arzumanburak06@mail.edu.tr', 'TBMYO', '3125867877', 'SBST', 'F408'),
(2, 'mete', '142536', 'Mete', 'Han', 'metehan@mail.edu.tr', 'Mühendislik', '5054125869', 'Bilgisayar Mühendisliği', 'E302'),
(3, 'tuba', '142536', 'Tuğba', 'Altındağ', 'tuba@mail.edu.tr', 'TBMYO', '5367892575', 'Bİlgisayar Programcılığı', 'F105');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazicilar`
--

CREATE TABLE `yazicilar` (
  `id` int(10) NOT NULL,
  `marka` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `renkli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bilgisayarlar`
--
ALTER TABLE `bilgisayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazicilar`
--
ALTER TABLE `yazicilar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bilgisayarlar`
--
ALTER TABLE `bilgisayarlar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `yazicilar`
--
ALTER TABLE `yazicilar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
