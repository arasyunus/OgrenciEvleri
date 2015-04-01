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
            <input class="button" type="submit" name="talepBildir" value="Oda değişim talebini kaydet." />
        </form>
    </div>
    <?php
    if(isset($_POST["talepBildir"])){
        $connectDB = DBConnect();
        $ogrno = $_SESSION["userData"]["numara"];
        $sql = "INSERT INTO odtalepleri VALUES ('$ogrno', '$_POST[odaDegisimTxt]',CURRENT_TIMESTAMP,'0','')";
        $query = mysql_query($sql);
        if($query){
            $msgBox["title"] = "Talebin iletildi.";
            $msgBox["content"] = "Oda değişim talebin iletilmiştir. Talebinle ilgilenen öğrencilerimiz sizinle iletişime geçecektir.";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }else{
            $msgBox["title"] = "HATA!.";
            $msgBox["content"] = "Oda değişim talebi iletilirken bir hata oluştu. Talebinizi tekrar göndermeyi deneyiniz, tekrar sorun yaşarsanız yönetici ile iletişime geçiniz.";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }
    }
    ?>
</body>
</html>