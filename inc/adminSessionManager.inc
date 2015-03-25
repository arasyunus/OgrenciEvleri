<?php
    if(isset($_SESSION["userData"])){
        if(isset($_SESSION["userData"]["adsoyad"])){
            if($_SESSION["userData"]["konum"] <> "yonetici"){
                $msgBox["title"] = "Erişim İzniniz Yok!";
                $msgBox["content"] = "Bu sayfaya erişim sağlayabilmek için <strong>yönetici</strong> girişi yapmalısınız!";
                $msgBox["buttonLeft"]["href"] = "uyegiris.php";
                $msgBox["buttonLeft"]["name"] = "Giriş yap";
                $msgBox["buttonRight"]["href"] = "index.php";
                $msgBox["buttonRight"]["name"] = "Anasayfaya git";
                echo showMsgBox($msgBox);
                exit();
            }
        }else{
            $msgBox["title"] = "Erişim İzniniz Yok!";
            $msgBox["content"] = "Bu sayfaya erişim sağlayabilmek için <strong>yönetici</strong> girişi yapmalısınız!";
            $msgBox["buttonLeft"]["href"] = "uyegiris.php";
            $msgBox["buttonLeft"]["name"] = "Giriş yap";
            $msgBox["buttonRight"]["href"] = "uyeol.php";
            $msgBox["buttonRight"]["name"] = "Kayıt ol";
            echo showMsgBox($msgBox);
            exit();
        }
    }else{
        $msgBox["title"] = "Erişim İzniniz Yok!";
        $msgBox["content"] = "Bu sayfaya erişim sağlayabilmek için <strong>yönetici</strong> girişi yapmalısınız!";
        $msgBox["buttonLeft"]["href"] = "uyegiris.php";
        $msgBox["buttonLeft"]["name"] = "Giriş yap";
        $msgBox["buttonRight"]["href"] = "uyeol.php";
        $msgBox["buttonRight"]["name"] = "Kayıt ol";
        echo showMsgBox($msgBox);
        exit();
    }
?>