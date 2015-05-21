<?php
    //header("Content-Type: application/json; charset=utf-8");
/**
 * Anasayfa slideShow ekranının ajax ile düzenlenmesinden sorumlu PHP Scriptidir.
 * $_POST["setOrder"] değişkeni resimlerin sıralamasını,
 * $_POST["deleteItem"] değişkeni ise silinecek değişkenin "id" sini bu scripte gönderir.
 * Sonuç olarak sıralama ve ya silme işlemi gerçekleştirilir.
 * Ve geriye işlemin gerçekleşip gerçekleşmediği üzere Boolean değer döndürülür.
 */
    include 'dbFunctions.inc'; 
    session_start();
    if($_POST["setOrder"]=="true"){
        $connectDB  = DBConnect();
        $orderArray = $_POST["orderArray"];
        foreach ($orderArray as $key => $value) {
            $sql        = "UPDATE slayt set sira='$key' WHERE INCREMENT='$value'";
            $query      = mysql_query($sql);
        }
        echo TRUE;
    }
    if($_POST["deleteItem"]=="true"){
        $connectDB  = DBConnect();
        $inc        = $_POST["itemIncrement"];
        $sql        = "DELETE FROM slayt WHERE INCREMENT='$inc'";
        $query      = mysql_query($sql);
        
        if(unlink("../".$_POST["deleteIMG"])){
            echo TRUE;
        }        
    }  
?>