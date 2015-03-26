<?php
    if(isset($_SESSION["userData"])){
        if(isset($_SESSION["userData"]["adsoyad"])){
//            if($_SESSION["userData"]["konum"] <> "ogrenci"){
//                header("Locatin: uyegiris.php");
//            }
        }else{
            $msgBox["title"] = "Erişim İzniniz Yok!";
            $msgBox["content"] = "Bu sayfaya erişim sağlayabilmek için kullanıcı girişi yapmalısınız! Kullanıcı verilerinize erişilemiyor...";
            $msgBox["buttonLeft"]["href"] = "uyegiris.php";
            $msgBox["buttonLeft"]["name"] = "Giriş yap";
            $msgBox["buttonRight"]["href"] = "uyeol.php";
            $msgBox["buttonRight"]["name"] = "Kayıt ol";
            echo showMsgBox($msgBox);
            exit();
        }
    }else{
        $msgBox["title"] = "Erişim İzniniz Yok!";
        $msgBox["content"] = "Bu sayfaya erişim sağlayabilmek için kullanıcı girişi yapmalısınız!";
        $msgBox["buttonLeft"]["href"] = "uyegiris.php";
        $msgBox["buttonLeft"]["name"] = "Giriş yap";
        $msgBox["buttonRight"]["href"] = "uyeol.php";
        $msgBox["buttonRight"]["name"] = "Kayıt ol";
        echo showMsgBox($msgBox);
        exit();
    }
?>