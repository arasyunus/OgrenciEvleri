<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    
    <div class="kapsul">
        <h1 class="h1Tag">Şifrenizi öğrenmek için öğrenci numaranızı giriniz.</h1>        
        <hr class="cetvel"/>
        <form id="formSifremiUnuttum" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarası girmelisiniz." />
            <input class="button" type="submit" name="sifrehatirlat" value="Şifremi eposta adresime yolla." />
        </form>
    </div>
    <?php
        if(isset($_POST["sifrehatirlat"])){
            $connectDB = DBConnect();
            $sql = "SELECT * FROM users";
            $query = mysql_query($sql);
            $isSession = FALSE;
            $userData = array();
            while($row =  mysql_fetch_assoc($query)) {
                if($_POST["ogrenciNo"] == $row["numara"]){
                    $isSession = TRUE;
                    $userData = $row;
                }
            }
            mysqlClose($connectDB);
            if($isSession){
                
                $mailTitle      = "Hacettepe Üniversitesi Öğrenci Evleri Yönetim Sistemi - Şifre hatırlatma mesajı";
                $mailContent = "<div style='background-color: #F3E0FC;color: #934fa8; padding:50px; display:inline-block;'><h2 style='display:inline-block;'>Şifreniz :</h2><h3 style='display:inline-block;'> $userData[sifre]</h3></div>";
                $sendAdress = $userData["eposta"];
                $basename = basename($_SERVER['PHP_SELF']);
                        
                if(mailGonder($mailTitle, $mailContent, $sendAdress)){
                    $msgBox["title"] = "Hatırlatma Başarılı.";
                    $msgBox["content"] = "Sayın, $userData[adsoyad]. Şifreniz başarılı bir şekilde eposta adresinize gönderilmiştir.";
                    $msgBox["buttonLeft"]["href"] = $basename;
                    $msgBox["buttonLeft"]["name"] = "Tamam";
                    $msgBox["buttonRight"]["href"] = "index.php";
                    $msgBox["buttonRight"]["name"] = "Anasayfaya git";
                    echo showMsgBox($msgBox);
                }else{
                    $msgBox["title"] = "Hatırlatma Başarısız!";
                    $msgBox["content"] = "Sayın, $userData[adsoyad]. Şifreniz eposta adresinize gönderilirken hata oluştu.";
                    $msgBox["buttonLeft"]["href"] = $basename;
                    $msgBox["buttonLeft"]["name"] = "Tamam";
                    $msgBox["buttonRight"]["href"] = "index.php";
                    $msgBox["buttonRight"]["name"] = "Anasayfaya git";
                    echo showMsgBox($msgBox);
                }
                
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
</body>
</html>