<?php
    //header("Content-Type: application/json; charset=utf-8");
/**
 * Çamaşır sırası alma, çamaşır listeleme işlemlerinin ajax ile gerçekleştirilmesi bu PHP Scripti ile sağlanır
 * $_POST["insert"] değişkeni ile çamaşır sırası alma işlemine başlanır.
 * Kullanıcı bilgileri $_SESSION['userData'] değişkeninde saklanır ve kullanıcı bilgilerine buradan ulaşılır.
 * $_POST["select"] değişkeni ise seçilen tarihteki çamaşır listesinin dolu olup olmadığını listeler ve Javascript tarafına gönderir.
 */
    include 'dbFunctions.inc'; 
    session_start();
    if($_POST["insert"]=="true"){
        $connectDB = DBConnect();
        
        $countSQL = "SELECT * FROM cmsiraal WHERE cmsrogrno=".$_SESSION['userData']["numara"];
        $queryCount = mysql_query($countSQL);
        if(mysql_num_rows($queryCount) < CamasirSiniri ){
            $sql = $_POST["sql"];
            $query = mysql_query($sql);

            if(mysql_affected_rows()){
                echo json_encode(array(
                    "sonuc" => TRUE,
                    "veri"  => ""
                ));
            }else{
                echo json_encode(array(
                    "sonuc" => FALSE,
                    "veri"  => "ERROR"
                ));
            }
        }  else {
            echo json_encode(array(
                    "sonuc" => FALSE,
                    "veri"  => "FAZLA"
                ));
        }

    }
    if($_POST["select"]=="true"){
        $connectDB = DBConnect();
        $sql = $_POST["sql"];
        $query = mysql_query($sql);

        if(mysql_num_rows($query) > 0){
            $results = [];
            while ($record = mysql_fetch_assoc($query)) {
                array_push($results, $record);
            }
            echo json_encode(array(
                    "sonuc" => TRUE,
                    "veri"  => $results
                ));
        }else{
            echo json_encode(array(
                    "sonuc" => FALSE,
                    "veri"  => FALSE
                ));
        }
        //SELECT * FROM cmsiraal JOIN users ON users.numara = cmsiraal.ogrno WHERE arizalar.arizadurumu<'3'
    }
    
    
?>