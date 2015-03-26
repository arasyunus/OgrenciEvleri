<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Gönderilen dilekçeler listesi.</h1>
        <hr class="cetvel" />
        <?php
            if(isset($_GET["sil"])){
                $basename = basename($_SERVER['PHP_SELF']);
                $connectDB = DBConnect();
                $sql = "UPDATE  arizalar SET arizadurumu='3' WHERE INCREMENT=".$_GET["sil"];
                //$sql = "DELETE FROM arizalar WHERE INCREMENT=" . $_GET["sil"];
                $query = mysql_query($sql);
                if($query){
                    $msgBox["title"] = "Silme İşlemi Başarılı.";
                    $msgBox["content"] = "Arıza bildirimi başarıyla silinmiştir.";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }else{
                    $msgBox["title"] = "HATA!";
                    $msgBox["content"] = "Arıza bildirimi silinememiştir. Silme işlemi hatalı!";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }
                mysqlClose($connectDB);
            }
            
            $connectDB = DBConnect();
            $sql = "SELECT * FROM users JOIN arizalar ON users.numara = arizalar.ogrencino WHERE arizalar.arizadurumu<>'3' ORDER BY arizalar.arizadurumu ASC, arizalar.olusmatarihi DESC";
            $query = mysql_query($sql);
            $count = mysql_num_rows($query);
            if($count > 0){
                while($row =  mysql_fetch_assoc($query)) {
                    echo "<div class='arizaBildirimi'>
                            <div class='ogrFoto'>
                                <img src='$row[fotograf]' alt='Öğrencinin fotoğrafı'/>
                            </div>
                            <div class='ogrenciBilgileri'>
                                <span class='ogrLbl'>Adı ve soyadı</span><span class='ogrBilgi'>$row[adsoyad]</span><br>
                                <span class='ogrLbl'>Numarası</span><span class='ogrBilgi'>$row[numara]</span><br>
                                <span class='ogrLbl'>Blok</span><span class='ogrBilgi'>$row[blok]. Blok</span><br>
                                <span class='ogrLbl'>Kat</span><span class='ogrBilgi'>$row[kat]. Kat</span><br>
                                <span class='ogrLbl'>Oda</span><span class='ogrBilgi'>$row[oda] Numaralı Oda</span>
                            </div>
                            <div class='arizaicerigi ogrenciBilgileri'>
                                <span class='ogrLbl'>Arıza Kategorisi</span><span class='ogrBilgi'>$row[arizaturu]</span><br>
                                <span class='ogrLbl'>Arıza Ayrıntıları</span><span class='ogrBilgi'>$row[arizametni]</span><br>
                                <span class='ogrLbl'>Arıza Bildirim Tarihi</span><span class='ogrBilgi'>$row[olusmatarihi]</span><br>
                                <span class='ogrLbl'>Arıza Onarım Tarihi</span><span class='ogrBilgi'>$row[onarimtarihi]</span><br>
                            </div>
                            <div class='clr'></div>
                            <span class='kapatSil'><a href='arizalar.php?sil=$row[INCREMENT]'>X</a></span>
                        </div>";  
                }
            }else{
                echo '<h2 class="h2Tag">Arıza bildiren olmamış.</h2>';
            }            
            mysqlClose($connectDB);
        ?>
        
        
        <!--
        <div class="arizaBildirimi">
            <div class="ogrFoto">
                <img src="images/profil.png" alt="Öğrencinin fotoğrafı"/>
            </div>
            <div class="ogrenciBilgileri">
                <span class="ogrLbl">Adı ve soyadı</span><span class="ogrBilgi">Ahmet Karatoprak</span><br>
                <span class="ogrLbl">Numarası</span><span class="ogrBilgi">21143555</span><br>
                <span class="ogrLbl">Blok</span><span class="ogrBilgi">K Blok</span><br>
                <span class="ogrLbl">Kat</span><span class="ogrBilgi">5. Kat</span><br>
                <span class="ogrLbl">Oda</span><span class="ogrBilgi">6 Numaralı Oda</span>
            </div>
            <div class="arizaicerigi ogrenciBilgileri">
                <span class="ogrLbl">Arıza Kategorisi</span><span class="ogrBilgi">ARIZA - 1</span><br>
                <span class="ogrLbl">Arıza Ayrıntıları</span><span class="ogrBilgi">Lorem Suspendisse iaculis nunc in Suspendisse iaculis nunc in iaculis nunc in iaculis nunc in iaculis nunc in suscipit pharetra. Aliquam rhoncus tortor vitae nibh varius sollicitudin.</span><br>
            </div>
            <div class="clr"></div>
            <span class="kapatSil"><a href="#">X</a></span>
        </div>
        -->
    </div>
</body>
</html>