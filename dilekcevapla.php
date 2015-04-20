<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Dilekçenin cevabını metin düzenleyici ile yazarak öğrenciyi bilgilendiriniz.</h1>
        <hr class="cetvel" />
        <form id="dilekceYaz" name="dilekceYaz" method="POST" action="#">
            <textarea name="dilekceMetni" id="dilekceMetni"></textarea>
            <input class="button" style="width: 100%; margin-top: 6px;" type="submit" name="dilekceCevapla" value="Dilekçeyi cevapla." />
        </form>
    </div>
    <?php
        if(isset($_POST["dilekceCevapla"])){
            $connectDB = DBConnect();
            $sql = "UPDATE dilekceler SET dCevabi='$_POST[dilekceMetni]', dDurumu='CEVAPLANMIS', dOkumaTarihi=CURRENT_TIMESTAMP WHERE INCREMENT=$_GET[inc]";
            $query = mysql_query($sql);
            if($query){
                $msgBox["title"] = "İletildi.";
                $msgBox["content"] = "Dilekçenin cevabı öğrenciye başarılı bir şekilde iletilmiştir.";
                $msgBox["buttonCenter"]["href"] = "dilekceoku.php";
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }else{
                $msgBox["title"] = "HATA!";
                $msgBox["content"] = "Dilekçenin cevabı öğrenciye yollanırken hata oluştu! Tekrar göndermeye deneyebilir ve aynı hata ile karşılaşırsanız teknik eleman ile iletişime geçebilirsiniz.";
                $msgBox["buttonCenter"]["href"] = "dilekceoku.php";
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
            mysqlClose($connectDB);
        }
    ?>
</body>
</html>