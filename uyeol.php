<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Üye olmak için formu eksiksiz doldurmalısınız.</h1>        
        <hr class="cetvel"/>
        <form enctype="multipart/form-data" id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="adSoyad" class="uyelikLabel">Adınız ve Soyadınız : </label>  <input class="inputText" type="text" name="adSoyad" id="adSoyad" title="Adınızı ve Soyadınızı girmeyi unutmayın." required pattern="^[A-Za-zöçşığüÖÇŞİĞÜ]{3,}\s[A-Za-zöçşığüÖÇŞİĞÜ]{3,}" title="Adınız ve soyadınız arasında bir tane boşluk bırakmalısınız!" />
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo"  title="Lütfen öğrenci numaranızı giriniz." maxlength="8" pattern="^[0-9]{8}$" required />
            <label for="sifre" class="uyelikLabel">Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre"  title="5 karakterden fazla içeren şifre oluşturmalısınız." pattern='.{5,}' required />
            <label for="resifre" class="uyelikLabel">Şifreniz Tekrar : </label>  <input class="inputText"  type="password" name="resifre" id="resifre"  title="Şifrenizi tekrar girmelisiniz." required />
            <label for="telefon" class="uyelikLabel">Telefon Numaranız : </label>  <input class="inputText" type="text" name="telefon" id="telefon"  title="Telefon numaranız iletişim için gereklidir." pattern="^[0]{1}[5]{1}[0-9]{9}$" maxlength="11" required />
            <label for="eposta" class="uyelikLabel">E-posta Adresiniz : </label>  <input class="inputText"  type="email" name="eposta" id="eposta"  title="Geçerli bit elektronik posta adresi girmelisiniz." pattern="^[A-Za-z0-9._-]+\@[a-z]+\.[a-z]{2,3}$" required />
            <label class="uyelikLabel">Blok / Kat / Oda numaranız : </label>
                <select id="blok" name="blok" class="selecting">
                    <option value="A" selected>A Blok</option>
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
                <select id="kat" name="kat" class="selecting">
                    <option value="0" selected>Zemin</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select id="oda" name="oda" class="selecting">
                    <option value="01" selected>01</option>
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
            
            <label class="uyelikLabel">Cinsiyet:</label>
            <input type="radio" name="cinsiyet" id="erkek" value="erkek" checked /><label for="erkek" class="cinsiyetLabel">Erkek</label>
            <input type="radio" name="cinsiyet" id="kadin" value="kadin" /><label for="kadin" class="cinsiyetLabel">Kadın</label>
            
            <label class="fileInputLabel" for="foto">Profil fotoğrafınızı yüklemek için tıklayınız...<div class="inputLabelDashed"></div> </label><input class="fileInput" type="file" name="foto" id="foto"  accept="image/x-png, image/jpeg" />
            <label class="textareaLabel" for="hakkinda">Kendinizi Tanıtın : </label>
            <textarea name="hakkinda" id="hakkinda" maxlength="500"  title="Hakkınızda bir cümle de olsa birşeyler yazar mısınız?" required ></textarea>
            <input class="button" type="submit" name="uyeol" value="Üye Ol" />
        </form>
    </div>

    <?php
        $msgBoxDisplay = FALSE;
        if(isset($_POST["uyeol"])){
            if($_POST["sifre"] == $_POST["resifre"]){
                if(isset($_FILES["foto"])){
                    $fotografURL = UPLOADDir . $_POST["ogrenciNo"] . ".jpg";
                    if(fileUpload($_FILES["foto"], $fotografURL, UPLOADDir)){
                        echo "<H1>OKEYYYYYYYY</H1>";
                    }else{
                        $fotografURL = "images/profil.png";
                    }
                }else{
                    $fotografURL = "images/profil.png";
                }
                $connectDB = DBConnect();
                $sql = "INSERT INTO users (adsoyad, numara, sifre, eposta, telefon, blok, kat, oda, cinsiyet, fotograf, hakkinda, konum) "
                        . "VALUES ('$_POST[adSoyad]', '$_POST[ogrenciNo]}', '$_POST[sifre]', '$_POST[eposta]', '$_POST[telefon]', '$_POST[blok]', '$_POST[kat]', '$_POST[oda]', '$_POST[cinsiyet]', '$fotografURL', '$_POST[hakkinda]', 'ogrenci')";
                $query = mysql_query($sql);
                $resultAffect = mysql_affected_rows();
                if($resultAffect == 1){
                    $msgBox["title"] = "Üye Kaydı Tamamlandı";
                    $msgBox["content"] = "Sayın, $_POST[adSoyad] üyeliğiniz tamamlanmıştır. Giriş yaparak sistemi kullanmaya başlayabilirsiniz.";
                    $msgBox["buttonLeft"]["href"] = "uyegiris.php";
                    $msgBox["buttonLeft"]["name"] = "Giriş yap";
                    $msgBox["buttonRight"]["href"] = "uyeol.php";
                    $msgBox["buttonRight"]["name"] = "Kapat";
                    echo showMsgBox($msgBox);
                }else{
                    $msgBox["title"] = "Hata Oluştu!";
                    $msgBox["content"] = "Sayın, $_POST[adSoyad] üye kaydınız gerçekleştirilirken bir hata oluşmuştur. Formu dikkatlice tekrar doldurmalısınız.";
                    $msgBox["buttonLeft"]["href"] = "uyeol.php";
                    $msgBox["buttonLeft"]["name"] = "Tamam";
                    $msgBox["buttonRight"]["href"] = "index.php";
                    $msgBox["buttonRight"]["name"] = "Anasayfaya git";
                    echo showMsgBox($msgBox);
                }
                mysqlClose($connectDB);
            }else{
                $msgBox["title"] = "Üye Kayıt Ekranı.";
                $msgBox["content"] = "Sayın, $_POST[adSoyad] girdiğiniz şifreler uyuşmuyor dikkatlice formu tekrardan doldurmalısınız.";
                $msgBox["buttonLeft"]["href"] = "uyeol.php";
                $msgBox["buttonLeft"]["name"] = "Tamam";
                $msgBox["buttonRight"]["href"] = "index.php";
                $msgBox["buttonRight"]["name"] = "Anasayfaya git";
                echo showMsgBox($msgBox);
            }
        }
    ?>

</body>
</html>
<!--
    
    ******* MESAJ KUTUSU ******

<div class="modal">
    <div class="msgBox">
        <div class="msgTitle">Deneme Başlık Mesajı<span class="closeModal">X</span></div>
        <div class="msgBody">
            <span class="msgContent">Bir hata oluştu</span>
            <a class="modalButton left" href="#">Tamam</a>
            <a class="modalButton center" href="#">Tamam</a>
            <a class="modalButton right" href="#">Kapat</a>
        </div>
    </div>
</div>

    *****************************
    $msgBox = array(
        "title"         => "Üye Kayıt Ekranı",
        "content"       => "",
        "buttonLeft"    => array("href" => "", "name" => "Giriş yap"),
        "buttonCenter"  => array("href" => "", "name" => "Tamam"),
        "buttonRight"   => array("href" => "", "name" => "Kapat"),
    );
-->