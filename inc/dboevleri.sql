CREATE DATABASE IF NOT EXISTS `dboevleri` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `dboevleri`;

CREATE TABLE IF NOT EXISTS `arizalar` (
  `ogrencino` int(8) NOT NULL,
  `arizaturu` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `arizametni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `olusmatarihi` timestamp NOT NULL,
  `onarimtarihi` timestamp NOT NULL,
  `arizadurumu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `cmsiraal` (
  `cmsrogrno` int(8) NOT NULL,
  `cmsrblok` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrkat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrtarihi` date NOT NULL,
  `cmsrsaati` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrINCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cmsrINCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `dilekceler` (
  `dOgrNo` int(8) NOT NULL,
  `dMetni` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dCevabi` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dDurumu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `dYazmaTarihi` timestamp NOT NULL,
  `dOkumaTarihi` timestamp NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `duyurular` (
  `duyurumetni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `duyurutarihi` timestamp NOT NULL,
  `duyuruoncelik` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `duyuruekleyen` int(8) NOT NULL,
  `INCREMENT` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `kargolar` (
  `ogrenciNo` int(8) NOT NULL,
  `gelisTarihi` timestamp NOT NULL,
  `gorulmeTarihi` timestamp NOT NULL,
  `durumu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `mesajlasma` (
  `gonderenNo` int(8) NOT NULL,
  `alanNo` int(8) NOT NULL,
  `mesaj` varchar(140) COLLATE utf8_turkish_ci NOT NULL,
  `msjTarihi` timestamp NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `odtalepleri` (
  `ogrno` int(8) NOT NULL,
  `talepmetni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `taleptarihi` timestamp NOT NULL,
  `talepdurumu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `slayt` (
  `resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `ekTarihi` timestamp NOT NULL,
  `sira` int(2) NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

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