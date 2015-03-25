<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <h1 class="h1Tag">Formu doldurarak arızanızı bildiriniz, kısa sürede çözüme kavuşturulacaktır.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="arizaTuru" class="uyelikLabel">Arızanız için bir kategori seçiniz : </label>
            <select class="selectBox" name="arizaTuru" id="arizaTuru">
                <option value="ariza-1" selected>ariza-1</option>
                <option value="ariza-2">ariza-2</option>
                <option value="ariza-3">ariza-3</option>
                <option value="ariza-4">ariza-4</option>
                <option value="ariza-5">ariza-5</option>
            </select><br />
            <label class="textareaLabel" for="hakkinda">Arızanız hakkında açıklama giriniz : </label>
            <textarea name="arizaBilgisi" id="arizaBilgisi" required title="Arızanız hakkında ayrıntı verir misiniz?"></textarea>
            <input class="button" type="submit" value="Arızayı bildir." />
        </form>
    </div>

</body>
</html>