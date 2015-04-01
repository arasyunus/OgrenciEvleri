-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Nis 2015, 16:15:25
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
CREATE DATABASE IF NOT EXISTS `dboevleri` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `arizalar`
--

INSERT INTO `arizalar` (`ogrencino`, `arizaturu`, `arizametni`, `olusmatarihi`, `onarimtarihi`, `arizadurumu`, `INCREMENT`) VALUES
(21144319, 'ariza-1', '1111111111', '2015-03-31 12:31:57', '2015-03-31 12:33:39', '3', 1),
(21144319, 'ariza-2', '2222222', '2015-03-31 12:32:01', '2015-03-31 12:32:01', '3', 2),
(21144319, 'ariza-3', '33333333333333', '2015-03-31 12:32:06', '2015-03-31 12:32:06', '3', 3),
(21144319, 'ariza-4', '444444444444', '2015-03-31 12:32:11', '2015-03-31 12:33:06', '3', 4),
(21144319, 'ariza-5', '55555', '2015-03-31 12:32:16', '2015-03-31 12:32:16', '3', 5),
(21144319, 'ariza-4', 'ed', '2015-03-31 12:35:02', '2015-03-31 12:35:02', '3', 6),
(21144319, 'ariza-4', 'sdfg', '2015-03-31 12:35:06', '2015-03-31 12:35:49', '3', 7),
(21144319, 'ariza-5', 'sdf', '2015-03-31 12:35:10', '2015-03-31 12:35:32', '3', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cmsiraal`
--

CREATE TABLE IF NOT EXISTS `cmsiraal` (
  `ogrno` int(8) NOT NULL,
  `blok` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `kat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `tarihi` date NOT NULL,
  `saati` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kargolar`
--

CREATE TABLE IF NOT EXISTS `kargolar` (
  `ogrenciNo` int(8) NOT NULL,
  `gelisTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gorulmeTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durumu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `kargolar`
--

INSERT INTO `kargolar` (`ogrenciNo`, `gelisTarihi`, `gorulmeTarihi`, `durumu`, `INCREMENT`) VALUES
(21144319, '2015-03-31 10:53:59', '2015-03-31 10:54:40', 'Silinmis', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odtalepleri`
--

CREATE TABLE IF NOT EXISTS `odtalepleri` (
  `ogrno` int(8) NOT NULL,
  `talepmetni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `taleptarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `talepdurumu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `odtalepleri`
--

INSERT INTO `odtalepleri` (`ogrno`, `talepmetni`, `taleptarihi`, `talepdurumu`, `INCREMENT`) VALUES
(21143811, 'asdasdasd asd', '2015-04-01 14:15:02', '0', 4),
(21144319, 'zsds\r\n', '2015-04-01 14:28:31', '0', 5),
(21143811, 'asdasd', '2015-04-01 15:01:31', '0', 6);

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
('Yoneticim', 911, '1111', 'admin@admin.key', '05440000000', 'A', 2, 1, 'kadin', 'images/profil.png', 'Yoneticiyim ben hafÃ„Â±z\r\n', 'yonetici'),
('Yunus ARAS', 21143811, '12345qwe', 'yunus.kariha@gmail.com', '05449422332', 'D', 3, 6, 'erkek', 'IMGProfil/21143811.jpg', 'Ben yunus haci', 'ogrenci'),
('Filiz UZUN', 21144319, '123123', 'yunus_338_aras@hotmail.com', '0544444444', 'D', 0, 7, 'kadin', 'images/profil.png', 'asdasdasd', 'ogrenci');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
