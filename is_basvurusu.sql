-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Eki 2020, 19:07:44
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `is_basvurusu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) NOT NULL,
  `mus_adi` varchar(255) NOT NULL,
  `mus_soyadi` varchar(255) NOT NULL,
  `mus_mail` varchar(255) NOT NULL,
  `mus_tc` varchar(255) NOT NULL,
  `mus_adres` varchar(255) NOT NULL,
  `mus_tel` varchar(255) NOT NULL,
  `musteri_eklenme_tarihi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `mus_adi`, `mus_soyadi`, `mus_mail`, `mus_tc`, `mus_adres`, `mus_tel`, `musteri_eklenme_tarihi`) VALUES
(1, 'osman', 'mahmutcepoglu', 'osmanmahmutcepoglu@gmail.com', '12345678911', 'kağıthane', '05448305353', '2020-10-19'),
(10, 'qweqweqwe', 'asdasd', 'aaaa@hotmail.com', 'qweqwe', 'qweqwe', 'qweqweq', '2020-10-20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparişler`
--

CREATE TABLE `siparişler` (
  `siparis_id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `siparis_tarih` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparişler`
--

INSERT INTO `siparişler` (`siparis_id`, `musteri_id`, `urun_id`, `urun_adet`, `siparis_tarih`) VALUES
(17, 9, 1, 1, '2020-10-20'),
(18, 9, 2, 2, '2020-10-20'),
(19, 14, 2, 3, '2020-10-20'),
(20, 13, 5, 5, '2020-10-20'),
(21, 14, 1, 9, '2020-10-20'),
(23, 9, 3, 2, '2020-10-20'),
(43, 0, 1, 3, '2020-10-20'),
(44, 0, 1, 12312312, '2020-10-20'),
(45, 0, 1, 76, '2020-10-20'),
(51, 0, 1, 4545, '2020-10-20'),
(52, 0, 10, 5, '2020-10-20'),
(53, 0, 1, 123456789, '2020-10-20'),
(54, 0, 10, 45345, '2020-10-20'),
(55, 0, 1, 45435, '2020-10-20'),
(56, 0, 1, 2147483647, '2020-10-20'),
(57, 0, 10, 2147483647, '2020-10-20'),
(89, 10, 1, 122, '2020-10-20'),
(90, 10, 2, 123123, '2020-10-20'),
(91, 10, 3, 12312, '2020-10-20'),
(92, 10, 4, 2147483647, '2020-10-20'),
(93, 10, 5, 1234, '2020-10-20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(255) NOT NULL,
  `urun_fiyati` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urun_adi`, `urun_fiyati`) VALUES
(1, 'Bilgisayar', '350'),
(2, 'Mause', '250'),
(3, 'Klavye', '400'),
(4, 'Monitör', '150'),
(5, 'Mause Pad', '50');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparişler`
--
ALTER TABLE `siparişler`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `siparişler`
--
ALTER TABLE `siparişler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
