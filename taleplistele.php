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
        <!--
        <div class='arizaBildirimi'>
            <div class='ogrFoto'>
                <img src='images/profil.png' alt='Öğrencinin fotoğrafı'/>
            </div>
            <div class='ogrenciBilgileri'>
                <span class='ogrLbl'>Adı ve soyadı</span><span class='ogrBilgi'>Ahmet Karatoprak</span><br>
                <span class='ogrLbl'>Telefon</span><span class='ogrBilgi'>05345343221</span><br>
                <span class='ogrLbl'>Blok</span><span class='ogrBilgi'>K Blok</span><br>
                <span class='ogrLbl'>Kat</span><span class='ogrBilgi'>5. Kat</span><br>
                <span class='ogrLbl'>Oda</span><span class='ogrBilgi'>6 Numaralı Oda</span>
            </div>
            <div class='arizaicerigi ogrenciBilgileri'>
                <span class='ogrLbl'>Oda değiştirme talebi</span><span class='ogrBilgi'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id nibh nec erat pharetra tempor a at justo. Vivamus malesuada turpis sed sapien mollis, nec posuere ligula imperdiet. Integer sit amet mattis dolor. Nam faucibus sed sem eu eleifend. Curabitur dignissim tellus sapien, in faucibus eros facilisis sed. Donec in ligula eget leo scelerisque tristique. In efficitur lectus vel neque laoreet pulvinar. Quisque convallis, ex vel commodo porta, ligula arcu hendrerit neque, sit amet tempus velit orci a felis. Fusce in pretium nisl. Maecenas feugiat aliquam varius. Ut arcu nunc, semper vel aliquet a, ullamcorper nec massa. Suspendisse iaculis nunc in suscipit pharetra. Aliquam rhoncus tortor vitae nibh varius sollicitudin.</span><br>
            </div>
            <div class='clr'></div>
            <span class='kapatSil'><a href='#'>X</a></span>
        </div>
        -->
</body>
</html>