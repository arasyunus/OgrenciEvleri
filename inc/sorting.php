<?php
    //header("Content-Type: application/json; charset=utf-8");
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