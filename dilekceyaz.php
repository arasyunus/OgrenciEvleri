<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Dilekçenizi metin düzenleyici ile kurallara uygun olarak yazınız.</h1>
        <hr class="cetvel" />
        <form id="dilekceYaz" name="dilekceYaz" method="POST" action="#">
            <textarea name="dilekceMetni" id="dilekceMetni"></textarea>
            <input class="button" style="width: 100%; margin-top: 6px;" type="submit" value="Dilekçeyi yolla." />
        </form>
    </div>
</body>
</html>