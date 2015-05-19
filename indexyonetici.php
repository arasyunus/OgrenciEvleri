<?php include 'inc/head.php';?>
<body style="background: url(images/bg_big.png) repeat-x">
<div class="Menu">
    <div class="hu_social">
        <a href="https://twitter.com/"><div class="social twitter"></div></a>
        <a href="https://www.facebook.com/groups/792380500841287/"><div class="social facebook"></div></a>
    </div>
    <ul class="menuUL">
        <li class="menuLI"><a class="bord">Kullanıcı işlemleri</a><span class="Boldweight">::</span>
            <ul class="altMenu">
                <li class="menuitem"><a class="altLink" href="ogrencisorgula.php">Öğrenci Sorgula</a></li>
                <li class="menuitem"><a class="altLink" href="yonsifredegistir.php">Şifre Değiştirme</a></li>
                <li class="menuitem"><a class="altLink" href="?oturumuKapat=kapat">Oturumu Kapat</a></li>
            </ul>
        </li>
        <li class="menuLI"><a class="bord" href="duyuruekle.php">Duyuru İşlemleri</a><span class="Boldweight">::</span>
            <ul class="altMenu">
                <li class="menuitem"><a class="altLink" href="duyuruekle.php">Duyuru Ekle</a></li>
                <li class="menuitem"><a class="altLink" href="duyuruduzenle.php">Duyuru Düzenle</a></li>
            </ul>
        </li>
        <li class="menuLI"><a class="bord" href="video.php">Nasıl kullanırım?</a><span class="Boldweight">::</span></li>
        <li class="menuLI"><a href="yonetici.php" class="yonetici">Yönetici Ekranına Geç</a></li>
    </ul>
</div>
<div class="banner">
    <a href="indexyonetici.php"><div class="hupng"></div></a>
    <div class="bannerMenu">
        <ul class="banMenu">
            <li class="banmenuitem"><a class="menuLink kesMenu" href="dilekceoku.php">Dilekçeleri Oku</a></li>
            <li class="banmenuitem"><a class="menuLink" href="camasirsirakontrol.php">Çamaşır Listesine Gözat</a></li>
            <li class="banmenuitem"><a class="menuLink" href="arizalar.php">Arıza Bildirimlerine Gözat</a></li>
            <li class="banmenuitem"><a class="menuLink" href="kargobildir.php">Gelen Kargo Bildir</a></li>
        </ul>
    </div>
</div>

<div class="slideshow">
    <div class="slides">
        <?php
            $connectDB = DBConnect();
            $sql = "SELECT * FROM slayt ORDER BY sira ASC";
            $query = mysql_query($sql);
            $count = mysql_num_rows($query);
            if($count > 0){
                while($resim =  mysql_fetch_assoc($query)) {
                    echo "<div class='slide'><a href='$resim[link]'><img src='$resim[resim]' alt='$resim[ekTarihi]' /></a></div>";
                }
            }else{
                echo "<div class='slide'><img src='slaytIMG/default.jpg' alt='Hacettepe Üniversitesi' /></div>";
            }            
            mysqlClose($connectDB);
        ?>
    </div>
    <div class="slideButtonWrp">
        <?php
            $connectDB = DBConnect();
            $sql = "SELECT * FROM slayt";
            $query = mysql_query($sql);
            $count = mysql_num_rows($query);
            $i = 0;
            if($count > 0){
                while($resim =  mysql_fetch_assoc($query)) {
                    $i++;
                    if($i == 1){$cls="sclicked";}else{$cls = "";}
                    echo "<a class='slideBtn $cls' href='#'>$i</a> ";
                }
            }    
            mysqlClose($connectDB);
        ?>
    </div>
</div>
    <div class="indexExtra">
        <div class="duyurular">
            <div class="indexWRP">
            <?php
                $connectDB = DBConnect();
                $sql = "SELECT * FROM duyurular ORDER BY sira ASC, duyurutarihi ASC";
                $query = mysql_query($sql);
                $count = mysql_num_rows($query);
                if($count > 0){
                    while($row =  mysql_fetch_assoc($query)) {
                        echo "<span class='duyuru $row[duyuruoncelik]'>$row[duyurumetni]<span class='duyuruTarihi'>$row[duyurutarihi]</span></span>";
                    }
                }else{
                    echo '<h2 class="h2Tag">Henüz duyuru bulunmuyor.</h2>';
                }            
                mysqlClose($connectDB);
            ?>
            </div>
        </div>
        <div class="hizmetler">
            <div class="indexWRP">
                <ul class="hizmetlerUL">
                    <li><a href="arizalar.php">Arıza Bildirim Sitemi</a></li>
                    <li><a href="camasirsiraal.php">Çamaşır Randevu Sistemi</a></li>
                    <li><a href="dilekceyaz.php">Dilekçe Yönetim Sitemi</a></li>
                    <li><a href="odadegisimtalebi.php">Oda Değişim Talepleri</a></li>
                    <li><a href="mesajlasma.php">Mesajlaşma Sistemi</a></li>
                    <li><a href="duyurular.php">Güncel Duyurular</a></li>
                </ul>
            </div>
        </div>       
    </div>
<script type="text/javascript">
    $(".slideBtn").on("click",function(e){
        $(".slideBtn").removeClass("sclicked");
        $(this).addClass("sclicked");
        var hiz = $(this).index() == 0 ? 800 : $(this).index() * 140;
       $(".slides").animate({
           "margin-left":"-"+$(this).index()*900+"px",
           opacity: '0.8'
       },hiz,"easeInOutQuint").animate({
           opacity: '1'
       },300,"easeOutQuart");
    e.preventDefault();
    });
</script>
</body>
</html>