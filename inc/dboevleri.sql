-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 25 Mar 2015, 08:03:13
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
('Yakup Kadir ULUDAĞ', 21143911, '12345qwe', 'yakubkadir@gmail.com', '05343119212', 'K', 2, 16, 'erkek', 'images/fotograf.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ullamcorper metus quis sem tincidunt, vitae finibus erat commodo. Pellentesque et nisi ultricies, lacinia ante sed, gravida turpis. Vivamus ultricies turpis eget finibus scelerisque. Nam sit amet mi molestie, elementum enim id, molestie quam. Quisque non nibh dui. Quisque leo purus, tempor id gravida vel, elementum vel neque. Duis iaculis interdum ligula molestie tincidunt. Integer pretium iaculis rutrum. Ut gravida nunc metus, vel', 'ogrenci'),
('Damla AKDULUM', 211441231, 'ajs.d-uıa_hsı21', 'damla@akdulum.com', '0534344334', 'A', 0, 4, 'kadin', 'images/askdjaksldjasd.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ullamcorper metus quis sem tincidunt, vitae finibus erat commodo. Pellentesque et nisi ultricies, lacinia ante sed, gravida turpis. Vivamus ultricies turpis eget finibus scelerisque. Nam sit amet mi molestie, elementum enim id, molestie quam. Quon nibh dui. Quisque leo purus, tempor id gravida vel, elementum vel neque. ', 'ogrenci');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
