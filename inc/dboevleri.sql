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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

INSERT INTO `arizalar` (`ogrencino`, `arizaturu`, `arizametni`, `olusmatarihi`, `onarimtarihi`, `arizadurumu`, `INCREMENT`) VALUES
(21143811, 'Mobilya', 'asdasd', '2015-05-19 04:52:43', '2015-05-19 04:52:43', '0', 1),
(21144319, 'Mobilya', 'Komidin kÄ±rÄ±ldÄ± bir bakar mÄ±sÄ±nÄ±z rica edersem.', '2015-05-28 05:58:16', '2015-05-28 05:58:16', '0', 2),
(21143767, 'Elektrik', 'DolabÄ±n altÄ±ndaki elektrik prizinden elektrik Ã§arpÄ±yor. 3 kez Ã§arpÄ±ldÄ±m onarabilirmisiniz?', '2015-05-28 06:18:11', '2015-05-28 06:18:11', '0', 3),
(21144305, 'Ä°nternet', 'Ä°nternet bir gelip bir gidiyor gelince de Ã§ok yavaÅŸ zaten. Ä°lgilenir misiniz?', '2015-05-28 15:07:39', '2015-05-28 15:07:39', '0', 4);

CREATE TABLE IF NOT EXISTS `cmsiraal` (
  `cmsrogrno` int(8) NOT NULL,
  `cmsrblok` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrkat` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrtarihi` date NOT NULL,
  `cmsrsaati` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cmsrINCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cmsrINCREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

INSERT INTO `cmsiraal` (`cmsrogrno`, `cmsrblok`, `cmsrkat`, `cmsrtarihi`, `cmsrsaati`, `cmsrINCREMENT`) VALUES
(21144319, 'K', '2', '2015-05-31', '16.00 - 19.00', 1),
(21144319, 'A', '1', '2015-06-10', '09.00 - 13.00', 2),
(21143767, 'G', '1', '2015-06-04', '19.00 - 22.00', 3),
(21144305, 'F', '2', '2015-05-28', '13.00 - 16.00', 4),
(21144305, 'K', '1', '2015-05-31', '09.00 - 13.00', 5),
(21144161, 'E', '2', '2015-05-30', '13.00 - 16.00', 6),
(21144123, 'E', '2', '2015-06-11', '13.00 - 16.00', 7);

CREATE TABLE IF NOT EXISTS `dilekceler` (
  `dOgrNo` int(8) NOT NULL,
  `dMetni` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dCevabi` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dDurumu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `dYazmaTarihi` timestamp NOT NULL,
  `dOkumaTarihi` timestamp NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

INSERT INTO `dilekceler` (`dOgrNo`, `dMetni`, `dCevabi`, `dDurumu`, `dYazmaTarihi`, `dOkumaTarihi`, `INCREMENT`) VALUES
(21144319, '<h2 style="text-align: center;"><strong><br /><br />HU Ã–ÄŸrenci Evleri MÃ¼dÃ¼rlÃ¼ÄŸÃ¼ne</strong></h2>\r\n<p>Â </p>\r\n<p>Ã–ÄŸrenci evlerinin 21144811 numaralÄ± Ã¶ÄŸrencisiyim, K Blok 2. Kat 10 numaralÄ± odada kalÄ±yorum. 04.06.2015 PerÅŸembe gÃ¼nÃ¼ Hacettepe Ãœniversitesi EÄŸitim FakÃ¼ltesi Balosuna katÄ±lmak Ã¼zere belirtilen tarihte izinli sayÄ±lmam hususunda;</p>\r\n<p style="text-align: center;">GereÄŸinin yapÄ±lmasÄ±nÄ± arz ederim. Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â </p>\r\n<p style="text-align: left;">Â </p>\r\n<p style="text-align: left;">Adres: AkÅŸemsetin Mah. Tuzla Cad. AslÄ± Sok. No: 29 Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Mehmet KAPLAN</p>\r\n<p style="text-align: left;">Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â Ã‡ankaya/ANKARA</p>\r\n<p style="text-align: left;">Tel Â  : 05449449494</p>\r\n<p>Â </p>', '', 'YENI', '2015-05-28 06:04:22', '0000-00-00 00:00:00', 1),
(21144123, '<p>Â </p>\r\n<p>Â </p>\r\n<h2 style="text-align: center;">Hacettepe Ãœniversitesi Ã–ÄŸrenci Evleri MÃ¼dÃ¼rlÃ¼ÄŸÃ¼ne</h2>\r\n<p>Â </p>\r\n<p>BenÂ 21144123 bunaralÄ± Ã¶ÄŸrencinizim. 25.06.2015 tarihi itibarÄ±yla yurttan kaydÄ±mÄ±n silinmesini talep ediyorum.</p>\r\n<p>Â  Â GereÄŸinin yapÄ±lmasÄ±nÄ± arz ederim.</p>\r\n<p>Â </p>\r\n<p>Adres: Â ALTINDAÄž MAH. 153 SOK. NO: 1 KAT: 1 DAÄ°RE: 3 VURAL APT Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  Â  OSMAN KUZGUN</p>\r\n<p>Tel Â  Â : 05445444444</p>', '', 'YENI', '2015-05-28 15:18:16', '0000-00-00 00:00:00', 2);

CREATE TABLE IF NOT EXISTS `duyurular` (
  `duyurumetni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `duyurutarihi` timestamp NOT NULL,
  `duyuruoncelik` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `duyuruekleyen` int(8) NOT NULL,
  `sira` int(2) NOT NULL,
  `INCREMENT` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

INSERT INTO `duyurular` (`duyurumetni`, `duyurutarihi`, `duyuruoncelik`, `duyuruekleyen`, `sira`, `INCREMENT`) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lorem nulla, feugiat a ligula et, dapibus rutrum nulla. Aenean rutrum ante ac consequat malesuada. Aenean in blandit mi. Aliquam leo urna, condimentum eget metus et, dictum maximus ex. Vivamus venenatis lorem eu odio hendrerit maximus non ac ipsum. Integer semper scelerisque sapien non elementum.', '2015-05-07 12:47:32', 'bilgi', 6800, 0, 6),
('Fusce pellentesque tellus eu justo bibendum, et pellentesque lectus tempus. Vivamus varius suscipit arcu, vel ultrices erat posuere ac. Proin pulvinar diam tellus. Quisque sed laoreet neque, id accumsan velit.', '2015-05-07 12:47:32', 'soru', 6800, 1, 7),
('Vel ultrices erat posuere ac. Proin pulvinar diam tellus. Quisque sed laoreet neque, id accumsan velit.', '2015-05-07 12:47:32', 'normal', 6800, 2, 8);

CREATE TABLE IF NOT EXISTS `kargolar` (
  `ogrenciNo` int(8) NOT NULL,
  `gelisTarihi` timestamp NOT NULL,
  `gorulmeTarihi` timestamp NOT NULL,
  `durumu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `mesajlasma` (
  `gonderenNo` int(8) NOT NULL,
  `alanNo` int(8) NOT NULL,
  `mesaj` varchar(140) COLLATE utf8_turkish_ci NOT NULL,
  `msjTarihi` timestamp NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `odtalepleri` (
  `ogrno` int(8) NOT NULL,
  `talepmetni` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `taleptarihi` timestamp NOT NULL,
  `talepdurumu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

INSERT INTO `odtalepleri` (`ogrno`, `talepmetni`, `taleptarihi`, `talepdurumu`, `INCREMENT`) VALUES
(21144319, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis condimentum nulla. In at ligula nibh. Morbi risus velit, imperdiet eget facilisis sed, accumsan vel lorem. Morbi mattis elementum rhoncus. Cras mollis libero id turpis ultricies, hendrerit elementum libero blandit. Phasellus sollicitudin euismod nibh in auctor. Cras ut lacus consequat, posuere orci non, fringilla augue. Integer sed urna justo. Cras euismod est eu posuere suscipit. Donec convallis tellus at dictum fermentum.\r\n\r\nNulla lacus nunc, convallis sit amet mollis vitae, bibendum a elit. Mauris fermentum bibendum mau', '2015-05-28 06:05:36', '0', 1),
(21143767, 'Ben oda arkadaÅŸÄ±mdan ÅŸikayetÃ§iyim yeni bir odaya geÃ§mek istiyorum sigara iÃ§meyen ve dÃ¼zenli birisi benimle iletiÅŸime geÃ§ebilir mi?', '2015-05-28 06:19:23', '0', 2),
(21144161, 'Oda arkadaÅŸÄ±m Ã§ok geÃ§ yatÄ±yor ve Ä±ÅŸÄ±k kapalÄ± uyuyamÄ±yor. Bende Ä±ÅŸÄ±k varken uyuyamÄ±yorum. Bu sorunu yaÅŸamayacaÄŸÄ±m bir oda arkadaÅŸÄ± varsa bana ulaÅŸabilir mi?', '2015-05-28 15:09:35', '0', 3),
(21144123, 'Oda arkadaÅŸÄ±m horluyor. Horlamayan oda arkadaÅŸÄ± arÄ±yorum.', '2015-05-28 15:18:54', '0', 4);

CREATE TABLE IF NOT EXISTS `slayt` (
  `resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `ekTarihi` timestamp NOT NULL,
  `sira` int(2) NOT NULL,
  `INCREMENT` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INCREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=0 ;

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
  `hakkinda` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `konum` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`numara`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `users` (`adsoyad`, `numara`, `sifre`, `eposta`, `telefon`, `blok`, `kat`, `oda`, `cinsiyet`, `fotograf`, `hakkinda`, `konum`) VALUES
('Yonetici Bey', 6800, '12345qwe', 'yunus.aras@mynet.com', '05445444444', '-', 0, 0, 'erkek', 'images/profil.png', 'Öğrenci Evleri Yönetim Sistemi Koordinatörü.', 'yonetici'),
('Damla AKDULUM', 21143767, '123456', 'damlaakdulum@gmail.com', '05449559595', 'J', 3, 4, 'kadin', 'IMGProfil/21143767.jpg', '', 'ogrenci'),
('Yunus ARAS', 21143811, '123456', 'yunus.kariha@gmail.com', '05440000000', 'D', 3, 10, 'erkek', 'IMGProfil/21143811.jpg', 'BOTE', 'ogrenci'),
('Burak KARADAÅž', 21144013, '12345', 'burak.krds@gmail.com', '05345434343', 'K', 2, 15, 'erkek', 'IMGProfil/21144013.jpg', '', 'ogrenci'),
('Osman KUZGUN', 21144123, '12345', 'kuzgunosman@gmail.com', '05354354534', 'B', 0, 16, 'erkek', 'IMGProfil/21144123.jpg', '', 'ogrenci'),
('Ä°pek Ã–ZCAN', 21144161, '12345', 'ipekozcn@hotmail.com', '05053242123', 'M', 0, 14, 'kadin', 'IMGProfil/21144161.jpg', '', 'ogrenci'),
('Yakup ULUDAÄž', 21144305, '12345', 'ykpkadir@gmail.com', '05445444444', 'D', 2, 2, 'erkek', 'IMGProfil/21144305.jpg', '', 'ogrenci'),
('Filiz UZUN', 21144319, 'fu1234', 'filizuzun@gmail.com', '05423233223', 'K', 2, 14, 'kadin', 'IMGProfil/21144319.jpg', '', 'ogrenci');
