<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="wrpMesaj">
            
        <div class="yoneticiProfile">
            <?php
                $connectDB = DBConnect();
                $sql    = "SELECT * FROM users WHERE konum='yonetici' AND numara!=".$_SESSION["userData"]["numara"];
                $query  = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    while($user =  mysql_fetch_assoc($query)) {
                        echo "<div data-id='$user[numara]' class='mesajProfil'>
                                <img src='$user[fotograf]' alt='Profil resmi'/>
                                <span>$user[adsoyad]</span>
                            </div>";
                    }
                }else{
                    echo "<h2 style='margin-left:10px' class='h2Tag'>Yönetici Bulunmuyor</h2>";
                }
                mysqlClose($connectDB);
            ?>

        </div>

        <div class="ogrenciProfile">

            <?php
                $connectDB = DBConnect();
                $sql    = "SELECT * FROM users WHERE konum='ogrenci' AND numara!=".$_SESSION["userData"]["numara"];
                $query  = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    while($user =  mysql_fetch_assoc($query)) {
                        echo "<div data-id='$user[numara]' class='mesajProfil'>
                                <img src='$user[fotograf]' alt='Profil resmi'/>
                                <span>$user[adsoyad]</span>
                            </div>";
                    }
                }else{
                    echo "<h2 style='margin-left:10px' class='h2Tag'>Öğrenci Bulunmuyor</h2>";
                }
                mysqlClose($connectDB);
            ?>
            
        </div>

    </div>
    <div class="kapsul">
        <h1 class="h1Tag">Yöneticilere ve ya öğrencilere mesaj göndermek için mesaj göndereceğiniz kişiyi seçiniz.</h1>
        <hr class="cetvel" />
        <form class="uyelikFormu" name="frmMesaj" id="frmMesaj" action="mesajlasma.php" method="POST">
            <img id="ogrencinumarasi" data-id="<?php echo $_SESSION['userData']['numara']?>" src="<?php echo $_SESSION['userData']['fotograf']?>" class="profileMe" />
            <img id="kime" data-id="" src="" class="profileYou kimseyok" />
            <div class="mesajGorWrp">
                
            </div>
            <textarea placeholder="Mesajınızı buraya giriniz..." class="txtMesajlasma msjAlaniKayip" name="mesajMetni" id="mesajMetni"></textarea>
            <span class="msgError">Mesaj Gönderilemedi!</span>
        </form>
        
    </div>
    
</body>
</html>