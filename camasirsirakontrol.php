<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
       <h1 class="h1Tag">Çamaşır randevularının listesi.</h1>
       <hr class="cetvel" />
            <?php
            //Eski çamaşır randevuları siliniyorr...
            $connectDB = DBConnect();
            if(isset($_GET["silcmsr"])){
                $sql = "DELETE FROM cmsiraal WHERE cmsrINCREMENT=".$_GET["silcmsr"];
                $query = mysql_query($sql);
            }
            $sql = "SELECT * FROM cmsiraal";
            $query = mysql_query($sql);
            $randevuSayisi = mysql_num_rows($query);
            while($record =  mysql_fetch_assoc($query)) {
                date_default_timezone_set('Europe/Istanbul');
                $gunfarki = floor((time() - strtotime($record["cmsrtarihi"]))/(60*60*24));
                if($gunfarki>0){
                    $silSQL = "DELETE FROM cmsiraal WHERE cmsrINCREMENT=".$record["cmsrINCREMENT"];
                    mysql_query($silSQL);
                }
            }
            mysqlClose($connectDB);
        ?>
        <?php
            if($randevuSayisi > 0){
                $connectDB = DBConnect();
                $tableHeader = "<table class='camasirTablosu' cellspacing='0'>
                            <thead><tr><th colspan='7'>Öğrenci Evleri Çamaşır Listesi</th></tr><tr>
                                <th colspan='3'>Öğrenci Bilgileri</th>
                                <th colspan='4'>Çamaşır Randevu Bilgileri</th>
                                </tr><tr>
                                <th colspan='2'>Kişisel Bilgiler</th>
                                <th>Öğrencinin Odası</th>
                                <th>Randevu Tarihi</th>
                                <th>Randevu Saati</th>
                                <th>Çamaşır Blok-Kat</th>
                                <th>Sil</th>
                                </tr></thead><tbody>";
                $tableFooter = "</tbody></table>";
                $sql = "SELECT * FROM cmsiraal JOIN users ON users.numara = cmsiraal.cmsrogrno ORDER BY cmsiraal.cmsrkat ASC , cmsiraal.cmsrsaati ASC";
                $query = mysql_query($sql);
                echo $tableHeader;
                while($record =  mysql_fetch_assoc($query)) {
                    //var_dump($record);
                    $record["kat"] = $record["kat"] == "0" ? "Zemin": $record["kat"];
                    echo "<tr><td  class='randevusaati rezerve boldd'>$record[adsoyad] <span class='tooltip'><strong>E-posta:</strong> $record[eposta]<br/><strong>Telefon Numarası:</strong> $record[telefon]</span> </td><td class='randevusaati rezerve boldd'>$record[numara]</td><td class='randevusaati rezerve boldd'>$record[blok] blok $record[kat] kat $record[oda]. oda</td><td class='randevusaati rezerve boldd'>$record[cmsrtarihi]</td><td class='randevusaati rezerve boldd'>$record[cmsrsaati]</td><td class='randevusaati rezerve boldd'>$record[cmsrblok] Blok - $record[cmsrkat].Kat</td><td class='randevusaati musait silbtn'><a href='?silcmsr=$record[cmsrINCREMENT]'>x</a></td></tr>";
                }
                echo $tableFooter;
                mysqlClose($connectDB);
            }  else {
                echo '<h2 class="h2Tag">Çamaşır Randevusu Bulunmuyor.</h2>';
            }
        ?>
    </div>
</body>
</body>
</html>