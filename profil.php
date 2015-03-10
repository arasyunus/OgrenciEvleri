<!DOCTYPE HTML>
<html lang="tr-TR">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    
    <!-- CSS Styles -->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="images/icon.ico" />
    
    <title>Hacettepe Üniversitesi Öğrenci Evleri</title>
</head>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <div class="fotoKapsul">
            <img class="profilFoto" src="images/profil.png" alt="Profil Fotoğrafı"/>
        </div>
        <div class="profilBilgileri">
            <h1 class="h1Tag">Profil Bilgileriniz.</h1>
            <hr class="cetvel" />
            <form class="formKullaniciBilgileri" action="#" method="POST" id="formOgrBilgiler">
                <label for="adSoyad">Adınız ve Soyadınız : </label><input type="text" name="adSoyad" id="adSoyad" required placeholder="Mehmet Ahmet"  />
                <label for="ogrNo">Öğrenci Numaranız   : </label><input type="text" name="ogrNo" id="ogrNo" required placeholder="21143333" disabled="disabled" />
                <label for="telefon">Telefon Numaranız : </label><input type="text" name="telefon" id="telefon" required placeholder="05343443434" disabled="disabled" />
                <label for="eposta">Elektronik Posta Adresiniz: </label><input type="email" name="eposta" id="eposta" required placeholder="at@at.com" disabled="disabled" />
                <label>Blok - Kat ve Oda Numaranız : </label><select name="blok" id="blok"  disabled="disabled">
                    <option selected value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <select name="kat" id="kat"  disabled="disabled">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <select name="oda" id="oda"  disabled="disabled">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" value="Profil Bilgilerimi Güncelle" class="button guncelle" disabled="disabled"/>
            </form>
            
        </div>
        <div class="clr"></div><br />
        <div class="profilBildirimleri">
            <h1 class="h1Tag">Profilinize Gelen Bildirimler.</h1>
            <hr class="cetvel" />
            <div class="bildirimDiv olumlu">Kargonuz Geldi</div>
            <div class="bildirimDiv olumsuz">Arızanızı Onaramıyoruz</div>
            <div class="bildirimDiv uyari">Sular 3 Gün Kesik</div>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
        $("#adSoyad").on("click",function (){
            $(this).attr("disabled","disabled");
        });
        $("#adSoyad").dblclick(function() {
            alert( "Handler for .dblclick() called." );
        });
    </script>
</body>
</html>