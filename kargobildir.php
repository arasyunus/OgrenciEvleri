<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Kargosu gelen öğrenciye bildirim yolla.</h1>
        <hr class="cetvel" />
        <form id="kargoBildir" class="kargoBildir" action="#" method="POST">
            <label for="ogrNo" class="uyelikLabel">Kargosu gelen öğrencinin numarası : </label>
            <input class="inputText"  type="text" name="ogrNo" id="ogrNo" required title="Öğrencinin numarasını girmelisiniz!" />
            <input class="button" type="submit" name="kargoBildir" value="Öğrenciye kargosunun geldiğini bildir." />
        </form>
    </div>

<?php
    /*
     * Gelen kargu durumları
     * 0 - Yeni
     * 1 - Silinmiş
    */
    if(isset($_POST["kargoBildir"])){
        $connectDB = DBConnect();
        $sql       = "SELECT * FROM users WHERE konum='ogrenci' AND numara=" . $_POST["ogrNo"];
        $query     = mysql_query($sql);
        if(mysql_num_rows($query)){
            $result    = mysql_fetch_assoc($query);
            $eposta    = "<div style='background-color: #F3E0FC;color: #934fa8; padding:50px; display:inline-block;'><h2>Kargonuz Gelmiştir.</h2><h3>Sayın $result[adsoyad], kargonuzu teslim almak için $result[blok] Blok kargo odasına uğramalısınız.</h3></div>";
            $sql       = "INSERT INTO kargolar VALUES('$_POST[ogrNo]', CURRENT_TIMESTAMP,'','Yeni','')";
            $query     = mysql_query($sql);
            if(mysql_affected_rows()){
                if(mailGonder("Öğrenci Evleri Kargo Sistemi: Kargonuz Geldi...", $eposta, $result["eposta"])){
                    $msgBox["title"] = "Bidirim Gönderildi.";
                    $msgBox["content"] = "Kargosu gelen öğrenciye başarılı bir şekilde bildirim yollandı.";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }else{
                    $msgBox["title"] = "Bidirim Kısmen Gönderildi.";
                    $msgBox["content"] = "Kargosu gelen öğrenciye profil bildirimi yollandı fakat eposta gönderilirken hata oluştu.";
                    $msgBox["buttonCenter"]["href"] = $basename;
                    $msgBox["buttonCenter"]["name"] = "Tamam";
                    echo showMsgBox($msgBox);
                }                
            }else{
                $msgBox["title"] = "HATA!";
                $msgBox["content"] = "Bidirim Gönderilirken HATA! oluştu.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
        }else{
            $msgBox["title"] = "HATA!";
            $msgBox["content"] = "Bu numara sisteme kayıtlı bir öğrenciye ait değildir!";
            $msgBox["buttonCenter"]["href"] = $basename;
            $msgBox["buttonCenter"]["name"] = "Tamam";
            echo showMsgBox($msgBox);
        }
        
        

        /*if(mysql_affected_rows()){

        }*/
        mysqlClose($connectDB);
    }
?>

</body>
</html>