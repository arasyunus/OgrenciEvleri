<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Gönderilen dilekçeler listesi.</h1>
        <hr class="cetvel" />
        <div class="infoIcons">
            <img src="images/repairBIG.png" alt=""/><span class="infoIconSpan">Arızanın çözümüne yönelik görevlendirme yapıldığına dair öğrenciye mesaj iletmek için tıklamalısınız.</span><div class="clr"></div>
            <img src="images/checkBIG.png" alt=""/><span class="infoIconSpan">Arızanın çözüldüğü mesajını öğrenciye iletmek için bu simgeye tıklamalı ve öğrenciyi bu şekilde bilgilendirmelisiniz.</span>
            <span class="iconInfoClose">X</span>
        </div>
        <?php
            
            if(isset($_GET["arizaCheck"])){
                $basename = basename($_SERVER['PHP_SELF']);
                $connectDB = DBConnect();
                $sql = "UPDATE  arizalar SET arizadurumu='2' WHERE INCREMENT=".$_GET["arizaCheck"];
                //$sql = "DELETE FROM arizalar WHERE INCREMENT=" . $_GET["sil"];
                $query = mysql_query($sql);
                if($query){
                    $msgBox["title"] = "Arıza Onarıldı.";
                    $msgBox["content"] = "Arızanın onarımının sona erdiği mesajı yollandı.";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }else{
                    $msgBox["title"] = "HATA!";
                    $msgBox["content"] = "Arıza onarıldı mesajı yollanırken hata oluştu!";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }
                mysqlClose($connectDB);
            }
            
            if(isset($_GET["onar"])){
                $basename = basename($_SERVER['PHP_SELF']);
                $connectDB = DBConnect();
                $sql = "UPDATE  arizalar SET arizadurumu='1' WHERE INCREMENT=".$_GET["onar"];
                //$sql = "DELETE FROM arizalar WHERE INCREMENT=" . $_GET["sil"];
                $query = mysql_query($sql);
                if($query){
                    $msgBox["title"] = "Görevli Görevlendirme Başarılı.";
                    $msgBox["content"] = "Onarım için bi görevli görevlendirdiniz.";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }else{
                    $msgBox["title"] = "HATA!";
                    $msgBox["content"] = "Onarım için görevli yollamada hata oluştu. Tekrar dener misiniz?";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }
                mysqlClose($connectDB);
            }
        
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
            $sql = "SELECT * FROM users JOIN arizalar ON users.numara = arizalar.ogrencino WHERE arizalar.arizadurumu<'3' ORDER BY arizalar.arizadurumu ASC, arizalar.olusmatarihi DESC";
            $query = mysql_query($sql);
            $count = mysql_num_rows($query);
            if($count > 0){
                //echo "";
                while($row =  mysql_fetch_assoc($query)) {
                    if($row["arizadurumu"] == 0){
                        $border = "redBorder";
                        $arizaDurumu = "<span class='gorevliYolla'><a alt='Onarmak için görevliy yolla.' href='arizalar.php?onar=$row[INCREMENT]'></a></span>";
                    }else{
                        $arizaDurumu = "";
                        $border = "orangeBorder";
                        $arizaDurumu = "<span class='arizaSil'><a alt='Onarmak için görevliy yolla.' href='arizalar.php?arizaCheck=$row[INCREMENT]'></a></span>";
                    }
                    if($row["arizadurumu"] == 2){
                        $border = "greenBorder";
                    }
                    echo "<div class='arizaBildirimi $border'>
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
                            <span class='kapatSil'><a alt='Arıza bildirimini yoksay' href='arizalar.php?sil=$row[INCREMENT]'>X</a></span>
                            $arizaDurumu
                        </div>";  
                }
            }else{
                echo '<h2 class="h2Tag">Arıza bildiren olmamış.</h2>';
            }            
            mysqlClose($connectDB);
        ?>
    </div>
<script type="text/javascript">
    $(".iconInfoClose").on("click", function(){
        $(".infoIcons").fadeOut(1000);
    });
</script>
</body>
</html>