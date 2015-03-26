-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Mar 2015, 13:44:49
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `dboevleri`
--
CREATE DATABASE IF NOT EXISTS `dboevleri` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `dboevleri`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arizalar`
--

CREATE TABLE IF NOT EXISTS `arizalar` (
  `ogrencino` int(8) NOT NULL,
  `arizaturu` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `arizametni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `olusmatarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onarimtarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arizadurumu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `arizalar`
--

INSERT INTO `arizalar` (`ogrencino`, `arizaturu`, `arizametni`, `olusmatarihi`, `onarimtarihi`, `arizadurumu`, `INCREMENT`) VALUES
(999, 'ariza-4', 'ARIZA SILINMIS', '2015-03-26 13:23:31', '2015-03-26 13:23:31', '3', 5),
(999, 'ariza-4', 'ARIZA YENI -2', '2015-03-26 13:32:07', '2015-03-26 13:32:07', '3', 6),
(999, 'ariza-3', 'ARIZA YENI - 1\r\n', '2015-03-26 13:34:05', '2015-03-26 13:34:05', '3', 7),
(999, 'ariza-5', 'asd', '2015-03-26 13:34:49', '2015-03-26 13:34:49', '3', 8),
(999, 'ariza-2', 'asd', '2015-03-26 13:42:00', '2015-03-26 13:42:00', '3', 9),
(999, 'ariza-1', 'ads', '2015-03-26 13:42:05', '2015-03-26 13:42:05', '3', 10),
(999, 'ariza-2', 'asd', '2015-03-26 13:42:09', '2015-03-26 13:42:09', '3', 11),
(999, 'ariza-3', 'asd', '2015-03-26 13:42:12', '2015-03-26 13:42:12', '3', 12),
(999, 'ariza-4', 'asd', '2015-03-26 13:42:15', '2015-03-26 13:42:15', '3', 13),
(999, 'ariza-5', 'asdasd', '2015-03-26 13:42:20', '2015-03-26 13:42:20', '3', 14),
(999, 'ariza-2', 'asdasd', '2015-03-26 13:44:20', '2015-03-26 13:44:20', '3', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE IF NOT EXISTS `duyurular` (
  `duyurumetni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `duyurutarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duyuruoncelik` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `duyuruekleyen` int(8) NOT NULL,
  `INCREMENT` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `adsoyad` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `numara` int(8) NOT NULL,
  `sifre` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `blok` varchar(6) COLLATE utf8_turkish_ci NOT NULL,
  `kat` int(1) NOT NULL,
  `oda` int(2) NOT NULL,
  `cinsiyet` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `fotograf` varchar(120) COLLATE utf8_turkish_ci NOT NULL,
  `hakkinda` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `konum` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`numara`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`adsoyad`, `numara`, `sifre`, `eposta`, `telefon`, `blok`, `kat`, `oda`, `cinsiyet`, `fotograf`, `hakkinda`, `konum`) VALUES
('Yonetici', 999, '1111', 'admin@admin.com', '05445445444', 'A', 0, 1, 'kadin', 'images/profil.png', 'Yoneticiyim ben hafÄ±z\r\n', 'yonetici'),
('Yunus ARAS', 21143811, '12345qwe', 'yunus.kariha@gmail.com', '05444444444', 'D', 3, 9, 'erkek', 'IMGProfil/21143811.jpg', '..............................', 'ogrenci'),
('Filiz UZUN', 21144319, '123123', 'filiz@uzun.com', '05444444444', 'ASTI', 1, 9, 'kadin', 'images/profil.png', 'asdasdasd', 'ogrenci');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
