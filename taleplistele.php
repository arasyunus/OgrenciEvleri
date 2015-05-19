<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Odasını değiştirmek isteyen öğrencilerin listesi.</h1>
        <hr class="cetvel" />
        
        
        <?php
            $connectDB = DBConnect();
            $ogrno = $_SESSION["userData"]["numara"];
            $sql = "SELECT * FROM odtalepleri JOIN users ON users.numara = odtalepleri.ogrno WHERE odtalepleri.ogrno!='".$_SESSION["userData"]["numara"]."'";
            $query = mysql_query($sql);
            if($query){
                if(mysql_num_rows($query) > 0){
                    while($result =  mysql_fetch_assoc($query)) {
                        
                        echo "
                            <div class='arizaBildirimi'>
                                <div class='ogrFoto'>
                                    <img src='$result[fotograf]' alt='Öğrencinin fotoğrafı'/>
                                </div>
                                <div class='ogrenciBilgileri'>
                                    <span class='ogrLbl'>Adı ve soyadı</span><span class='ogrBilgi'>$result[adsoyad]</span><br>
                                    <span class='ogrLbl'>Telefon</span><span class='ogrBilgi'>$result[telefon]</span><br>
                                    <span class='ogrLbl'>Blok</span><span class='ogrBilgi'>$result[blok]. Blok</span><br>
                                    <span class='ogrLbl'>Kat</span><span class='ogrBilgi'>$result[kat]. Kat</span><br>
                                    <span class='ogrLbl'>Oda</span><span class='ogrBilgi'>$result[oda] Numaralı Oda</span>
                                </div>
                                <div class='arizaicerigi ogrenciBilgileri'>
                                    <span class='ogrLbl'>Talep tarihi</span><span class='ogrBilgi'>$result[taleptarihi]</span><br>
                                    <span class='ogrLbl'>Oda değiştirme talebi</span><span class='ogrBilgi'>$result[talepmetni]</span><br>
                                </div>
                                <div class='clr'></div>
                            </div>
                        ";
                        
                    }
                    
                }else{
                    echo '<h2 class="h2Tag">Sistemimize bildrilen oda değişim talebi bulunmuyor.</h2>';
                }
            }  else {
                echo '<h2 class="h2Tag">Veritabanında veri bulunmuyor.</h2>';
            }
        ?>
</body>
</html>