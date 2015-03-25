<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <h1 class="h1Tag">Şifre değiştirmek için formu doldurmalısınız.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarası gereklidir!" />
            <label for="sifre" class="uyelikLabel">Eski Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre" required title="Önceki şifrenizi girmelisiniz." />
            <label for="yeniSifre" class="uyelikLabel">Yeni Şifreniz : </label>  <input class="inputText"  type="password" name="yeniSifre" id="yeniSifre" required title="Yeni bir şifre oluşturmalısınız." />
            <label for="yeniSifreTekrar" class="uyelikLabel">Yeni Şifreniz Tekrar : </label>  <input class="inputText"  type="password" name="yeniSifreTekrar" id="yeniSifreTekrar" required title="Oluşturduğunuz yeni şifreyi tekrarlayın." />
            <input class="button" type="submit" value="ifremi değiştir." />
        </form>
    </div>

</body>
</html>