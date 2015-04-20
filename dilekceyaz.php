<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Dilekçenizi metin düzenleyici ile kurallara uygun olarak yazınız.</h1>
        <hr class="cetvel" />
        <form id="dilekceYaz" name="dilekceYaz" method="POST" action="#">
            <textarea name="dilekceMetni" id="dilekceMetni"></textarea>
            <input class="button" style="width: 100%; margin-top: 6px;" type="submit" name="dilekceYolla" value="Dilekçeyi yolla." />
        </form>
    </div>
    <?php
        if(isset($_POST["dilekceYolla"])){
            $connectDB = DBConnect();
            $sql = "INSERT INTO dilekceler VALUES ('".$_SESSION["userData"]["numara"]."', '".$_POST["dilekceMetni"]."', '', 'YENI', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', '')";
            $query = mysql_query($sql);
            if($query){
                $msgBox["title"] = "Dilekçe Gönderildi.";
                $msgBox["content"] = "Dilekçeniz yöneticiye gönderilmiştir. En kısa sürede değerlendirilerek cevabı sistem üzerinden yollanacaktır.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }else{
                $msgBox["title"] = "HATA!";
                $msgBox["content"] = "Dilekçeniz gönderilemedi! Tekrar göndermeye deneyebilir ve aynı hata ile karşılaşırsanız yönetici ile iletişime geçebilirsiniz.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
            mysqlClose($connectDB);
        }
    ?>
</body>
</html>