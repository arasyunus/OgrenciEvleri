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
        <h1 class="h1Tag">Üye girişi sayfası.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" />
            <label for="sifre" class="uyelikLabel">Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre" />
            <br/><a href="#" class="linkStyle">Şifremi Unuttum.</a><br/>
            <input class="button" type="submit" value="Giriş Yap" />
        </form>
    </div>

</body>
</html>