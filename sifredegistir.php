<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <h1 class="h1Tag">Üye girişi sayfası.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" />
            <label for="sifre" class="uyelikLabel">Eski Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre" />
            <label for="yeniSifre" class="uyelikLabel">Yeni Şifreniz : </label>  <input class="inputText"  type="password" name="yeniSifre" id="yeniSifre" />
            <label for="yeniSifreTekrar" class="uyelikLabel">Yeni Şifreniz Tekrar : </label>  <input class="inputText"  type="password" name="yeniSifreTekrar" id="yeniSifreTekrar" />
            <input class="button" type="submit" value="Giriş Yap" />
        </form>
    </div>

</body>
</html>