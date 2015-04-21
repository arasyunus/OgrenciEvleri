-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 Nis 2015, 12:57:47
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

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
(21144319, 'ariza-5', 'sdf', '2015-03-31 12:35:10', '2015-03-31 12:35:32', '3', 8),
(21143811, 'ariza-1', 'as', '2015-04-20 12:28:44', '2015-04-20 12:29:06', '3', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cmsiraal`
--

CREATE TABLE IF NOT EXISTS `cmsiraal` (
  `cmsrogrno` int(8) NOT NULL,
  `cmsrblok` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrkat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrtarihi` date NOT NULL,
  `cmsrsaati` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrINCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cmsrINCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dilekceler`
--

CREATE TABLE IF NOT EXISTS `dilekceler` (
  `dOgrNo` int(8) NOT NULL,
  `dMetni` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dCevabi` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dDurumu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `dYazmaTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dOkumaTarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `dilekceler`
--

INSERT INTO `dilekceler` (`dOgrNo`, `dMetni`, `dCevabi`, `dDurumu`, `dYazmaTarihi`, `dOkumaTarihi`, `INCREMENT`) VALUES
(21143811, '<h2 style="text-align: center;"><strong>Hacettepe Ã–ÄŸrenci Evleri MÃ¼dÃ¼rlÃ¼ÄŸÃ¼ne<br /></strong></h2>\r\n<p style="text-align: right;"><strong>12.13.1992</strong></p>\r\n<p style="text-align: left;"><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim turpis at orci eleifend, ac posuere metus elementum. Integer quis augue cursus, aliquam felis in, pharetra justo. Integer nibh odio, porttitor sed turpis sed, laoreet tempus massa. Vestibulum id nisl arcu. Curabitur pharetra felis dui, at tincidunt orci mollis nec. Etiam consectetur aliquam lectus, in venenatis nulla condimentum eu. Nullam tincidunt lacus magna, vitae feugiat purus auctor sit amet. Integer augue quam, scelerisque congue leo vel, sodales venenatis felis. Donec eu neque a justo fringilla semper faucibus sed ex.</span></p>\r\n<p style="text-align: left;"><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">GereÄŸini arz ederim.</span></p>\r\n<p style="text-align: left;"><strong><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Tel:Â </span></strong><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">0534433223423</span></p>\r\n<p style="text-align: right;"><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Yunus ARAS</span></p>\r\n<p style="text-align: right;"><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">21143811</span></p>\r\n<p>Â </p>', '<h3>0LUR YAP YAP</h3>\r\n<p>ASSS ffff</p>', 'SILINMIS', '2015-04-21 07:40:31', '2015-04-21 07:40:17', 2);

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
-- Tablo için tablo yapısı `mesajlasma`
--

CREATE TABLE IF NOT EXISTS `mesajlasma` (
  `gonderenNo` int(8) NOT NULL,
  `alanNo` int(8) NOT NULL,
  `mesaj` varchar(140) COLLATE utf8_turkish_ci NOT NULL,
  `msjTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `mesajlasma`
--

INSERT INTO `mesajlasma` (`gonderenNo`, `alanNo`, `mesaj`, `msjTarihi`, `INCREMENT`) VALUES
(21143811, 911, 'merhabaaa', '2015-04-21 12:32:32', 1),
(911, 21143811, 'ass', '2015-04-21 12:33:05', 2),
(21143811, 911, 'asdasd', '2015-04-21 12:35:07', 3),
(21143811, 911, 'a', '2015-04-21 12:37:28', 4),
(21143811, 21144319, 'sddf', '2015-04-21 12:40:02', 5),
(21143811, 21144319, 'asdasd', '2015-04-21 12:44:59', 6),
(21143811, 911, 'dddddddddddddddddddddddddd', '2015-04-21 12:45:03', 7);

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
('Hasan Bayhan', 911, '1111', 'admin@admin.key', '05440000000', 'A', 2, 1, 'kadin', 'images/profil.png', 'Yoneticiyim ben hafÃ„Â±z\r\n', 'yonetici'),
('Yunus ARAS', 21143811, '12345qwe', 'yunus.kariha@gmail.com', '05449422332', 'D', 3, 6, 'erkek', 'IMGProfil/21143811.jpg', 'Ben yunus haci', 'ogrenci'),
('Filiz UZUN', 21144319, '123123', 'yunus_338_aras@hotmail.com', '0544444444', 'D', 0, 7, 'kadin', 'images/profil.png', 'asdasdasd', 'ogrenci');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
