<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Formu doldurarak arızanızı bildiriniz, kısa sürede çözüme kavuşturulacaktır.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="arizaTuru" class="uyelikLabel">Arızanız için bir kategori seçiniz : </label>
            <select class="selectBox" name="arizaTuru" id="arizaTuru">
                <option value="Mobilya" selected>Mobilya</option>
                <option value="Elektrik">Elektrik</option>
                <option value="Su">Su</option>
                <option value="İnternet">İnternet</option>
                <option value="Diğer">Diğer</option>
            </select><br />
            <label class="textareaLabel" for="arizaBilgisi">Arızanız hakkında açıklama giriniz : </label>
            <textarea name="arizaBilgisi" id="arizaBilgisi" required title="Arızanız hakkında ayrıntı verir misiniz?"></textarea>
            <input class="button" name="arizaBildir" type="submit" value="Arızayı bildir." />
        </form>
    </div>

<?php
    /*
     * ARIZA DURUMLARI
     * ---YENI      = 0
     * ---BAKIMDA   = 1
     * ---ONARILMIS = 2
     * ---SILINMIS  = 3
     */
    if (isset($_POST["arizaBildir"])) {
        $connectDB = DBConnect();
        $sql = "INSERT INTO arizalar VALUES('".$_SESSION['userData']['numara']."','".$_POST['arizaTuru']."','".$_POST['arizaBilgisi']."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP, '0','')";
        $query = mysql_query($sql);
        $basename = basename($_SERVER['PHP_SELF']);
        if($query){
            $msgBox["title"] = "Arıza Bildirildi.";
            $msgBox["content"] = "Arızanız yetkililere bildirilmiştir. En kısa sürede görevliler sizinle iletişime geçecek ve arızanızı giderecektirler.";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }else{
            $msgBox["title"] = "HATA!";
            $msgBox["content"] = "Arıza bildirimi gerçekleştirilirken hata meydana geldi.";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }
        mysqlClose($connectDB);
    }
    
    ?>

</body>
</html>