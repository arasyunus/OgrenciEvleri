<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php
        if(isset($_POST["girisyap"])){
            $connectDB = DBConnect();
            $sql = "SELECT * FROM users";
            $query = mysql_query($sql);
            $isSession = FALSE;
            while($row =  mysql_fetch_assoc($query)) {
                if($_POST["ogrenciNo"] == $row["numara"] && $_POST["sifre"] == $row["sifre"]){
                    $isSession = TRUE;
                    $_SESSION["userData"] = $row;
                }
            }
            mysqlClose($connectDB);
            if($isSession){
                if($_SESSION["userData"]["konum"] == "yonetici"){
                    $hreff = "yonetici.php";
                    $yonMsg = "Yönetici ekranına git";
                }else{
                    $hreff = "profil.php";
                    $yonMsg = "Profiline git";
                }
                $msgBox["title"] = "Üye Girişi Yapıldı.";
                $msgBox["content"] = "Hoşgeldiniz Sayın, ". $_SESSION["userData"]["adsoyad"] .". Üye girişiniz yapılmıştır. Sistem kullanmaya başlayabilirsiniz";
                $msgBox["buttonLeft"]["href"] = "index.php";
                $msgBox["buttonLeft"]["name"] = "Anasayfaya git";
                $msgBox["buttonRight"]["href"] = "$hreff";
                $msgBox["buttonRight"]["name"] = $yonMsg;
                echo showMsgBox($msgBox);
            }else{
                $msgBox["title"] = "Üye Kaydı Bulunamadı!";
                $msgBox["content"] = "Sayın, kullanıcı sistemde kayıtlı üyeliğiniz bulunmamaktadır!";
                $msgBox["buttonLeft"]["href"] = "uyeol.php";
                $msgBox["buttonLeft"]["name"] = "Kayıt ol";
                $msgBox["buttonRight"]["href"] = "uyegiris.php";
                $msgBox["buttonRight"]["name"] = "Giriş yap";
                echo showMsgBox($msgBox);
            }
        }
        
    ?>
    <div class="kapsul">
        <h1 class="h1Tag">Üye girişi sayfası.</h1>        
        <hr class="cetvel"/>
        <form id="formUyegiris" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarası giriş yapabilmeniz için gereklidir!" />
            <label for="sifre" class="uyelikLabel">Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre" required title="Şifrenizi girin lütfen." />
            <br/><a href="sifreunuttum.php" class="linkStyle">Şifremi Unuttum.</a><br/>
            <input class="button" name="girisyap" type="submit" value="Giriş Yap" />
        </form>
    </div>

</body>
</html>