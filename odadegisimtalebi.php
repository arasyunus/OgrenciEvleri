<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Oda değişim talebinizi bu formu doldurarak bildirebilirsiniz.</h1>
        <hr class="cetvel" />
        <h2 class="h2Tag">Neden oda değiştirmek istediğinizi ve yeni oda arkadaşınızdan beklentilerinizi yazınız :</h2>
        <form id="odaDegisim" name="odaDegisim" method="POST" action="#">
            <textarea name="odaDegisimTxt" id="odaDegisimTxt" required title="Bir yazı yazmalısınız..."></textarea>
            <input class="button" type="submit" value="Oda değişim talebini kaydet." />
        </form>
    </div>

</body>
</html>