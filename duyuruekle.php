<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Formu doldurarak güncel bir duyuru ekleyebilirsiniz.</h1>        
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
            <input class="button" type="submit" name="duyuruEkle" value="Duyuru ekle." />
        </form>
    </div>
    <?php
    
    if (isset($_POST["duyuruEkle"])) {
        $connectDB = DBConnect();
        $sql = "INSERT INTO duyurular VALUES('".$_POST["duyuruMetni"]."', CURRENT_TIMESTAMP,'".$_POST["aciliyet"]."','".$_SESSION["userData"]["numara"]."','')";
        $query = mysql_query($sql);
        $basename = basename($_SERVER['PHP_SELF']);
        if($query){
            $msgBox["title"] = "Duyuru eklendi.";
            $msgBox["content"] = "Duyuru ekleme işleminiz gerçekleştirilmiştir.";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }else{
            $msgBox["title"] = "HATA!";
            $msgBox["content"] = "Duyuru ekleme gerçekleştirilirken hata meydana geldi.";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }
        mysqlClose($connectDB);
    }
    
    ?>
</body>
</html>