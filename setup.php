<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php
        $basename = basename($_SERVER['PHP_SELF']);
        if(createDatabaseAndTables()){
            $msgBox["title"] = "Veritabanı oluşturuldu.";
            $msgBox["content"] = "Veritabanı kurulumunuz başarılı bir şekilde yapılmıştır. Sistemi kullanmaya başlayabilirsiniz.";
            $msgBox["buttonCenter"]["href"] = "index.php";
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }else{
            $msgBox["title"] = "Veritabanı Hatası!.";
            $msgBox["content"] = "Veritabanı kurulumunuz gerçekleştirilememiştir. Veritabanı zaten kurulu olabilir ya da veritabanı konfigürasyon ayarları yapılmamış olabilir. Lütfen <i>inc</i> klasörü altındaki <i>configuration.php</i> dosyasındaki ayarları güncelleyerek tekrar deneyiniz!";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }
    ?>
</body>
</html>
