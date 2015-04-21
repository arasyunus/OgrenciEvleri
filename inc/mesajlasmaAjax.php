<?php
    //header("Content-Type: application/json; charset=utf-8");
    include 'dbFunctions.inc';
    session_start();
    if($_POST["insert"]=="true"){
        $connectDB = DBConnect();
        //$kime   = $_POST["kime"];
        //$msj    = $_POST["msj"];
        //$sql    = "INSERT INTO mesajlasma VALUES ('".$_SESSION["userData"]["numara"]."','$kime','$msj',CURRENT_TIMESTAMP,'')";
        $sql    = $_POST["sql"];
        $query  = mysql_query($sql);
        if($query){
            echo json_encode(array("sonuc" => TRUE));
        }else{
            echo json_encode(array("sonuc" => FALSE));
        }
        mysqlClose($connectDB);
    }
    if($_POST["mesajoku"]=="true"){
        $mesajlar = array();
        $connectDB = DBConnect();
        $iletisimNo = $_POST["kimlen"];
        $sql    = "SELECT * FROM mesajlasma WHERE (gonderenNo='".$_SESSION["userData"]["numara"]."' AND alanNo='$iletisimNo') OR (gonderenNo='$iletisimNo' AND alanNo='".$_SESSION["userData"]["numara"]."')";
        //$sql    = "INSERT INTO mesajlasma VALUES ('".$_SESSION["userData"]["numara"]."','21144319','asasd asdasd asdasdasd',CURRENT_TIMESTAMP,'')";
        $query  = mysql_query($sql);
        while ($mesaj = mysql_fetch_assoc($query)) {
            if($mesaj["gonderenNo"] == $_SESSION["userData"]["numara"]){
                //array_push($mesajlar, "<span data-id='$mesaj[INCREMENT]' class='mesajGiden'>$mesaj[mesaj]<i>$mesaj[msjTarihi]</i></span><div class='clr'></div>");
                array_push($mesajlar, $mesaj);
            }
            if($mesaj["alanNo"] == $_SESSION["userData"]["numara"]){
                //array_push($mesajlar, "<span data-id='$mesaj[INCREMENT]' class='mesajGiden'>$mesaj[mesaj]<i>$mesaj[msjTarihi]</i></span><div class='clr'></div>");
                array_push($mesajlar, $mesaj);
            }
        }
        echo json_encode($mesajlar);
        mysqlClose($connectDB);
    }
    
?>