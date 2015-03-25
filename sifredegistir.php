<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php
        if(isset($_POST["sifredegistir"])){
            if($_POST["yeniSifre"] == $_POST["yeniSifreTekrar"]){
                $row = array();
                $connectDB = DBConnect();
                $sql = "SELECT * FROM users";
                $query = mysql_query($sql);
                $isSession = FALSE;
                while($row =  mysql_fetch_assoc($query)) {
                    if($_POST["ogrenciNo"] == $row["numara"] && $_POST["sifre"] == $row["sifre"]){
                        $isSession = TRUE;
                    }
                }
                if($isSession){
                    $sql = "UPDATE users SET sifre='$_POST[yeniSifre]' WHERE numara=$_POST[ogrenciNo]";
                    $sifreDegistir = mysql_query($sql);
                    mysqlClose($connectDB);
                    session_destroy();
                    if($sifreDegistir){
                        $msgBox["title"] = "Şifreniz değiştirildi.";
                        $msgBox["content"] = "Şifreniz başarılı bir şekilde değiştirilmiştir.";
                        $msgBox["buttonLeft"]["href"] = "uyegiris.php";
                        $msgBox["buttonLeft"]["name"] = "Giriş yap";
                        $msgBox["buttonRight"]["href"] = "index.php";
                        $msgBox["buttonRight"]["name"] = "Anasayfaya git";
                        echo showMsgBox($msgBox);
                    }else{
                        $msgBox["title"] = "HATA!";
                        $msgBox["content"] = "Şifreniz değiştirilirken hata oluştu. Formu dikkatlice tekrar doldurunuz.";
                        $msgBox["buttonLeft"]["href"] = "uyeol.php";
                        $msgBox["buttonLeft"]["name"] = "Kayıt ol";
                        $msgBox["buttonRight"]["href"] = "sifredegistir.php";
                        $msgBox["buttonRight"]["name"] = "Kapat";
                        echo showMsgBox($msgBox);
                    }
                    
                }else{
                    $msgBox["title"] = "Üye Kaydı Bulunamadı!";
                    $msgBox["content"] = "Sayın, kullanıcı sistemde kayıtlı üyeliğiniz bulunmamaktadır!";
                    $msgBox["buttonLeft"]["href"] = "uyeol.php";
                    $msgBox["buttonLeft"]["name"] = "Kayıt ol";
                    $msgBox["buttonRight"]["href"] = "sifredegistir.php";
                    $msgBox["buttonRight"]["name"] = "Kapat";
                    echo showMsgBox($msgBox);
                }
            }else{
                $msgBox["title"] = "HATA!";
                $msgBox["content"] = "Sayın, kullanıcı girdiğiniz şifreler uyuşmamaktadır. Formu dikkatlice tekrar doldurmalısınız.";
                $msgBox["buttonLeft"]["href"] = "uyeol.php";
                $msgBox["buttonLeft"]["name"] = "Kayıt ol";
                $msgBox["buttonRight"]["href"] = "sifredegistir.php";
                $msgBox["buttonRight"]["name"] = "Kapat";
                echo showMsgBox($msgBox);
            }
        }
    ?>
    <div class="kapsul">
        <h1 class="h1Tag">Şifre değiştirmek için formu doldurmalısınız.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarası gereklidir!" />
            <label for="sifre" class="uyelikLabel">Eski Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre" required title="Önceki şifrenizi girmelisiniz." />
            <label for="yeniSifre" class="uyelikLabel">Yeni Şifreniz : </label>  <input class="inputText"  type="password" name="yeniSifre" id="yeniSifre" required title="Yeni bir şifre oluşturmalısınız." />
            <label for="yeniSifreTekrar" class="uyelikLabel">Yeni Şifreniz Tekrar : </label>  <input class="inputText"  type="password" name="yeniSifreTekrar" id="yeniSifreTekrar" required title="Oluşturduğunuz yeni şifreyi tekrarlayın." />
            <input class="button" type="submit" name="sifredegistir" value="Şifremi değiştir." />
        </form>
    </div>

</body>
</html>