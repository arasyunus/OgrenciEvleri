<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Gönderilen dilekçeler listesi.</h1>
        <hr class="cetvel" />
        <?php
            if(isset($_GET["silDilekce"])){
                $connectDB = DBConnect();
                $sql = "UPDATE dilekceler SET dDurumu='SILINMIS' WHERE INCREMENT=$_GET[inc]";
                $query = mysql_query($sql);
                mysqlClose($connectDB);
            }
            $connectDB = DBConnect();
            $sql = "SELECT * FROM users JOIN dilekceler ON users.numara = dilekceler.dOgrNo WHERE dilekceler.dDurumu = 'YENI'";
            $query = mysql_query($sql);
            if(mysql_num_rows($query) > 0){
                while($row =  mysql_fetch_assoc($query)) {
                    echo "<div class='dilekceKapsul'>
                            <div class='ogrFoto'>
                                <img src='".$row["fotograf"]."' alt='Öğrencinin fotoğrafı'/>
                            </div>
                            <div class='ogrenciBilgileri'>
                                <span class='ogrLbl'>Adı ve soyadı</span><span class='ogrBilgi'>".$row["adsoyad"]."</span><br>
                                <span class='ogrLbl'>Numarası</span><span class='ogrBilgi'>".$row["numara"]."</span><br>
                                <span class='ogrLbl'>Blok</span><span class='ogrBilgi'>".$row["blok"]."</span><br>
                                <span class='ogrLbl'>Kat</span><span class='ogrBilgi'>".$row["kat"]."</span><br>
                                <span class='ogrLbl'>Oda</span><span class='ogrBilgi'>".$row["oda"]." Numaralı Oda</span>
                            </div>
                            <a href='?oku=oku&inc=".$row["INCREMENT"]."'><div class='dilekceOkuBtn button'>Dilekçesini Oku</div></a>
                            <span class='kapatSil'><a href='?silDilekce=sil&inc=".$row["INCREMENT"]."'>X</a></span>
                        </div>";
                }
            }else{
                echo '<h2 class="h2Tag">Cevaplanmamış dilekçe bulunmuyor.</h2>';
            }            
            mysqlClose($connectDB);
        ?>
    </div>
<?php

    if(isset($_GET["oku"])){
        if($_GET["oku"] == "oku"){
            $connectDB = DBConnect();
            $sql = "SELECT * FROM dilekceler WHERE INCREMENT=$_GET[inc] LIMIT 1";
            $query = mysql_query($sql);
            $dilekce = mysql_fetch_assoc($query);

            echo "<div class='dilekceOkumaSayfasi'>
                    <div class='a4Sayfa'>
                    $dilekce[dMetni]
                    <a href='?oku=kapat'><div class='dilekceKapat'>X</div></a>
                    <a href='dilekcevapla.php?inc=$dilekce[INCREMENT]'><div class='dilekceCevapla button'>Dilekçeyi cevapla</div></a>
                    </div>
                </div>";
            mysqlClose($connectDB);
        }
    }
?>
</body>
</html>