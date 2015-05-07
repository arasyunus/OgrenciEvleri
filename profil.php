<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    
    <?php
        $connectDB = DBConnect();
        $sql = "SELECT * FROM cmsiraal";
        $query = mysql_query($sql);
        while($record =  mysql_fetch_assoc($query)) {
            date_default_timezone_set('Europe/Istanbul');
            $gunfarki = floor((time() - strtotime($record["cmsrtarihi"]))/(60*60*24));
            if($gunfarki>0){
                $silSQL = "DELETE FROM cmsiraal WHERE cmsrINCREMENT=".$record["cmsrINCREMENT"];
                mysql_query($silSQL);
            }
        }
        mysqlClose($connectDB);
        
        
        if(isset($_GET["cmsrndsil"])){
            $connectDB = DBConnect();
            $sql = "DELETE FROM cmsiraal WHERE cmsrINCREMENT=".$_GET["cmsrndsil"];
            $query = mysql_query($sql);
            mysqlClose($connectDB);
        }
        
        if(isset($_GET["silKargo"])){
            $connectDB = DBConnect();
            $sql = "UPDATE kargolar SET durumu='Silinmis', gorulmeTarihi=CURRENT_TIMESTAMP WHERE INCREMENT=".$_GET["silKargo"];
            $query = mysql_query($sql);
            if(mysql_affected_rows()){
                $msgBox["title"] = "Kargo bildirimi silindi.";
                $msgBox["content"] = "Profilinizdeki kargo bldirimi silindi. Bir dahaki kargo bildirimine kadar profilinizde gözükmeyecek.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
            mysqlClose($connectDB);
        }
        if(isset($_GET["silAriza"])){
            $connectDB = DBConnect();
            $sql = "UPDATE arizalar SET arizadurumu='3', onarimtarihi=CURRENT_TIMESTAMP WHERE INCREMENT=".$_GET["silAriza"];
            $query = mysql_query($sql);
            if(mysql_affected_rows()){
                $msgBox["title"] = "Arızanız giderildi.";
                $msgBox["content"] = "Profilinizdeki arıza bldirimi silindi. Arızanız tekrar oluştuğu taktirde tekrar bildirimle bulunursanız en kısa sürede ilgileneceğiz.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
            mysqlClose($connectDB);
        }
        if(isset($_GET["silDilekce"])){
            $connectDB = DBConnect();
            $sql = "UPDATE dilekceler SET dDurumu='SILINMIS' WHERE INCREMENT=".$_GET["silDilekce"];
            $query = mysql_query($sql);
            if(mysql_affected_rows()){
                $msgBox["title"] = "Dilekçe bildirimi silindi.";
                $msgBox["content"] = "Profilinizdekidilekçe bldirimi silindi. Bir dahaki dilekçe bildirimine kadar profilinizde gözükmeyecek.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
            mysqlClose($connectDB);
        }
    ?>
    
    <?php
        if(isset($_POST["profilGuncelle"])){
            $row = array();
            $connectDB = DBConnect();
            $sql = "UPDATE users SET adsoyad='$_POST[adSoyad]',numara='$_POST[ogrNo]',telefon='$_POST[telefon]',eposta='$_POST[eposta]',blok='$_POST[blok]',kat='$_POST[kat]',oda='$_POST[oda]' WHERE numara='$_POST[ogrNo]'";
            $query = mysql_query($sql);
            mysqlClose($connectDB);
            if($query){
                $msgBox["title"] = "Profiliniz güncellendi.";
                $msgBox["content"] = "Profil bilgileriniz gerektiği gibi güncellenmiştir.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
                
                $connectingDB = DBConnect();
                $sql = "SELECT * FROM users";
                $query = mysql_query($sql);
                while($row =  mysql_fetch_assoc($query)) {
                    if($_POST["ogrNo"] == $row["numara"]){
                        $_SESSION["userData"] = $row;
                    }
                }
                mysqlClose($connectingDB);
            }else{
                $msgBox["title"] = "HATA!";
                $msgBox["content"] = "Profil bilgileriniz güncellenirken hata oluştu.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
        }
    ?>

    <div class="kapsul">
        <div class="fotoKapsul">
            <img class="profilFoto" src="<?php echo $_SESSION['userData']['fotograf']; ?>" alt="Profil Fotoğrafı"/>
        </div>
        <div class="profilBilgileri">
            <h1 class="h1Tag">Profil Bilgileriniz.</h1>
            <hr class="cetvel" />
            <form class="formKullaniciBilgileri" action="#" method="POST" id="formOgrBilgiler">
                <label for="adSoyad">Adınız ve Soyadınız : </label><input type="text" name="adSoyad" id="adSoyad" value="<?php echo $_SESSION['userData']['adsoyad']; ?>" required />
                <label for="ogrNo">Öğrenci Numaranız   : </label><input type="text" name="ogrNo" id="ogrNo" value="<?php echo $_SESSION['userData']['numara']; ?>" required />
                <label for="telefon">Telefon Numaranız : </label><input type="text" name="telefon" id="telefon" value="<?php echo $_SESSION['userData']['telefon']; ?>" required />
                <label for="eposta">Elektronik Posta Adresiniz: </label><input type="email" name="eposta" id="eposta" value="<?php echo $_SESSION['userData']['eposta']; ?>" required />
                <label>Blok - Kat ve Oda Numaranız : </label><select name="blok" id="blok">
                    <option value="<?php echo $_SESSION['userData']['blok']; ?>" selected><?php echo $_SESSION['userData']['blok']; ?></option>
                    <option value="B">A Blok</option>
                    <option value="B">B Blok</option>
                    <option value="C">C Blok</option>
                    <option value="D">D Blok</option>
                    <option value="E">E Blok</option>
                    <option value="F">F Blok</option>
                    <option value="G">G Blok</option>
                    <option value="ASTII">AST I Blok</option>
                    <option value="ASTI">AST II Blok</option>
                    <option value="J">J Blok</option>
                    <option value="K">K Blok</option>
                    <option value="L">L Blok</option>
                    <option value="M">M Blok</option>
                    <option value="N">N Blok</option>
                </select>
                <select name="kat" id="kat">
                    <option value="<?php echo $_SESSION['userData']['kat']; ?>" selected><?php echo $_SESSION['userData']['kat']; ?></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select name="oda" id="oda">
                    <option value="<?php echo $_SESSION['userData']['oda']; ?>" selected><?php echo $_SESSION['userData']['oda']; ?></option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                </select>
                <input id="profilGuncelle" name="profilGuncelle" type="submit" value="Profil Bilgilerimi Güncelle" class="button guncelle" disabled="disabled"/>
            </form>
            
        </div>
        <div class="clr"></div><br />
        <div class="profilBildirimleri">
            <h1 class="h1Tag">Profilinize Gelen Bildirimler.</h1>
            <hr class="cetvel" />
            <?php
                // * * * Kargo Bildirimleri
                $connectDB  = DBConnect();
                $sql        = "SELECT * FROM kargolar WHERE durumu='Yeni' AND ogrenciNo=".$_SESSION['userData']['numara'] . " LIMIT 1";
                $query      = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $kargo      = mysql_fetch_assoc($query);
                    echo "<div class='bildirimDiv olumlu'>Kargonuz Geldi<span class='bildirimKapat curpoint'><a href='?silKargo=$kargo[INCREMENT]'>X</a></span></div>";
                }
                // * * * Arıza Bildirimleri
                $sql        = "SELECT * FROM arizalar WHERE arizadurumu='1' AND ogrenciNo=".$_SESSION['userData']['numara'] . " LIMIT 1";
                $query      = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $ariza  = mysql_fetch_assoc($query);
                    echo "<div class='bildirimDiv uyari'>Arızanızı Görevlilere Bildirildi.</span></div>";
                }
                
                $sql        = "SELECT * FROM arizalar WHERE arizadurumu='2' AND ogrenciNo=".$_SESSION['userData']['numara'] . " LIMIT 1";
                $query      = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $ariza  = mysql_fetch_assoc($query);
                    echo "<div class='bildirimDiv olumlu'>Arızanızı Onarıldı.<span class='bildirimKapat curpoint'><a href='?silAriza=$ariza[INCREMENT]'>X</a></span></div>";
                }
                // * * * Çamaşır Bildirimleri
                $sql        = "SELECT * FROM cmsiraal WHERE cmsrogrno=".$_SESSION['userData']["numara"]." ORDER BY cmsiraal.cmsrkat ASC , cmsiraal.cmsrsaati ASC";
                $query      = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $camasir  = mysql_fetch_assoc($query);
                    echo "<div class='bildirimDiv uyari'>Çamaşır Randevunuz: &nbsp; $camasir[cmsrblok] Blok - $camasir[cmsrkat] Kat &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;  $camasir[cmsrtarihi] / $camasir[cmsrsaati]<span class='bildirimKapat curpoint'><a href='?cmsrndsil=$camasir[cmsrINCREMENT]'>X</a></span></div>";
                }
                // * * * Dilekçe Bildirimleri
                $sql        = "SELECT * FROM dilekceler WHERE dDurumu NOT IN ('SILINMIS','YENI') AND dOgrNo=".$_SESSION['userData']["numara"];
                $query      = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $dilekce  = mysql_fetch_assoc($query);
                    echo "<div class='bildirimDiv uyari'><a class='dilekceokua' href='?dilekceOku=$dilekce[INCREMENT]'>Dilekceniz Cevaplandı</a><span class='bildirimKapat curpoint'><a href='?silDilekce=$dilekce[INCREMENT]'>X</a></span></div>";
                }
                mysqlClose($connectDB);
            ?>
            <!--
            <div class="bildirimDiv olumlu">Kargonuz Geldi</div>
            <div class="bildirimDiv olumsuz">Arızanızı Onaramıyoruz<span class='bildirimKapat'><a href='#'>X</a></span></div>
            <div class="bildirimDiv uyari">Sular 3 Gün Kesik<span class='bildirimKapat'><a href='#'>X</a></span></div>
            -->
        </div>
    </div>
<?php
    if(isset($_GET["dilekceOku"])){
        $connectDB = DBConnect();
        $sql = "SELECT * FROM dilekceler WHERE INCREMENT=$_GET[dilekceOku] LIMIT 1";
        $query = mysql_query($sql);
        $dilekce = mysql_fetch_assoc($query);

        echo "<div class='dilekceOkumaSayfasi'>
                <div class='a4Sayfa'>
                $dilekce[dMetni]
                <hr>
                $dilekce[dCevabi]
                <a href='?oku=kapat'><div class='dilekceKapat'>X</div></a>
                </div>
            </div>";
        mysqlClose($connectDB);
    }
?>
    <script>
        var oldInputValues = {
                "adSoyad"   : $("#adSoyad").val(),
                "ogrNo"     : $("#ogrNo").val(),
                "telefon"   : $("#telefon").val(),
                "eposta"    : $("#eposta").val(),
                "blok"      : $("#blok").val(),
                "kat"       : $("#kat").val(),
                "oda"       : $("#oda").val()
            }
            $("input").keyup(changed);
            $("select").change(changed);
            function changed(){
                $this = $(this);
                if(oldInputValues.adSoyad != $("#adSoyad").val() || oldInputValues.ogrNo != $("#ogrNo").val() || oldInputValues.telefon != $("#telefon").val()  || oldInputValues.eposta != $("#eposta").val() || oldInputValues.blok != $("#blok").val() || oldInputValues.kat != $("#kat").val() || oldInputValues.oda != $("#oda").val()){
                    $("#profilGuncelle").removeAttr("disabled");                    
                }else{
                    $("#profilGuncelle").attr("disabled","disabled");
                }
                /*
                if(oldInputValues[$this.attr("name")] != $this.val()){
                    $("#profilGuncelle").removeAttr("disabled");
                }else{
                    $("#profilGuncelle").attr("disabled","disabled");
                }
                */
            }
    </script>
</body>
</html>