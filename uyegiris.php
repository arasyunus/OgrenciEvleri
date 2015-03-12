<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <h1 class="h1Tag">Üye girişi sayfası.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarası giriş yapabilmeniz için gereklidir!" />
            <label for="sifre" class="uyelikLabel">Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre" required title="Şifrenizi girin lütfen." />
            <br/><a href="#" class="linkStyle">Şifremi Unuttum.</a><br/>
            <input class="button" type="submit" value="Giriş Yap" />
        </form>
    </div>

</body>
</html>