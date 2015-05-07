<?php
    //header("Content-Type: application/json; charset=utf-8");
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