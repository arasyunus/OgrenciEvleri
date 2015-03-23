<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <h1 class="h1Tag">Şifrenizi öğrenmek için öğrenci numaranızı giriniz.</h1>        
        <hr class="cetvel"/>
        <form id="formSifremiUnuttum" class="uyelikFormu" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarası girmelisiniz." />
            <input class="button" type="submit" value="Şifremi eposta adresime yolla." />
        </form>
    </div>

</body>
</html>