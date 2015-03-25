<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Formu doldurarak arızanızı bildiriniz, kısa sürede çözüme kavuşturulacaktır.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="aciliyet" class="uyelikLabel">Duyurunun aciliyet durumu: </label>
            <select class="selectBox" name="aciliyet" id="aciliyet">
                <option value="acil" selected>Acil Duyuru</option>
                <option value="soru">Soru Duyurusu</option>
                <option value="bilgi">Bilgi Duyurusu</option>
                <option value="normal">Normal Duyuru</option>
            </select><br />
            <label class="textareaLabel" for="duyuruMetni">Duyuru metnini buraya giriniz : </label>
            <textarea name="duyuruMetni" id="duyuruMetni" required title="Duyuru içerik mesajını girmelisiniz!"></textarea>
            <input class="button" type="submit" value="Duyuru ekle." />
        </form>
    </div>

</body>
</html>