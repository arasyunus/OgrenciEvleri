<?php
    //header("Content-Type: application/json; charset=utf-8");
/**
 * Duyuru sıralamasının sürükle bırak yöntemiyle ayarlanmasını sağlayan PHP Scriptidir.
 * Ajax ile bu sayfaya $_POST["setOrder"] değişkeni değeri gönderilir ve veritabanında gerekli güncelleme yapılır.
 * Güncelleme sonucu olumlu ya da olumsuz geriye değer döndürür.
 */
    include 'dbFunctions.inc'; 
    session_start();
    if($_POST["setOrder"]=="true"){
        $connectDB  = DBConnect();
        $orderArray = $_POST["orderArray"];
        foreach ($orderArray as $key => $value) {
            $sql        = "UPDATE duyurular set sira='$key' WHERE INCREMENT='$value'";
            $query      = mysql_query($sql);
        }
        echo TRUE;
    }else{
        echo FALSE;
    }
?>