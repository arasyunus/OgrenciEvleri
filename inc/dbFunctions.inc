<?php
include 'configuration.inc';
    function DBConnect(){
        $connectDB      = mysql_connect(DBServer, DBUser, DBPass);
        $selectDB       = mysql_select_db(DBName);
        if(!$connectDB){
            die("Veritabanı bağlantı hatası! Configürasyon ayarlarını kontrol edin!") . mysql_error();
        }
        return $connectDB;
    }
    
    
    function createTable(){
        $conn = DBConnect();
        $isDB = mysql_query("CREATE DATABASE IF NOT EXISTS " . DBName);
        if(!$isDB){
            $fp = fopen(DBFile, 'r');
            $sql = fread($fp, filesize(DBFile));
            fclose($fp);
            $queryArray = explode(";", $sql);
            foreach ($queryArray as $key => $value) {
                if($value <> ""){
                    $retval = mysql_query( $value, $conn );   
                }
            }
        }
        mysqlClose();
    }
    function mysqlClose($conn){
        mysql_close($conn);
    }
    
    function fileUpload($fileOBJ, $fileName, $uploadDir){
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }
        if ($fileOBJ["error"] > 0){
            return FALSE;
        }else{
            $uploadSuccess = move_uploaded_file($fileOBJ["tmp_name"], $fileName);
            if($uploadSuccess){
                return TRUE;
            }            
        }
    }
    
    function showMsgBox($msgBoxContent) {
        $basename = basename($_SERVER['PHP_SELF']);
        $return = "<div class='modal'>
                    <div class='msgBox'>
                        <div class='msgTitle'>$msgBoxContent[title]<span class='closeModal'><a href='$basename'>X</a></span></div>
                        <div class='msgBody'>
                            <span class='msgContent'>$msgBoxContent[content]</span>";
        $return .= isset($msgBoxContent["buttonLeft"]) ? "<a class='modalButton left' href='". $msgBoxContent["buttonLeft"]["href"] ."'>". $msgBoxContent["buttonLeft"]["name"]."</a>":"";
        $return .= isset($msgBoxContent["buttonCenter"]) ? "<a class='modalButton center' href='". $msgBoxContent["buttonCenter"]["href"] ."'>". $msgBoxContent["buttonCenter"]["name"]."</a>":"";
        $return .= isset($msgBoxContent["buttonRight"]) ? "<a class='modalButton right' href='". $msgBoxContent["buttonRight"]["href"] ."'>". $msgBoxContent["buttonRight"]["name"]."</a>":"";
        $return .= "</div></div></div>";
        return $return;
    }
    
    function oturumKapat() {
        if(isset($_GET["oturumuKapat"])){
            if($_GET["oturumuKapat"] == "kapat"){
                session_destroy();
                header("Location: index.php");
            }                
        }
    }
    
    function mailGonder($mailTitle,$mailContent,$sendAdress) {
        require_once 'inc/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
        $mail->setLanguage("tr", "inc/PHPMailer/language");
        $mail->CharSet="UTF-8";
        $mail->IsHTML(true);
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = 'smtp.yandex.com';
        $mail->Port = 587;
	$mail->Username = "hacettepeetkinlik@yandex.com";
	$mail->Password = "hacettepeBote211";
	$mail->SetFrom("hacettepeetkinlik@yandex.com", "Yunus ARAS");
	$mail->Subject = $mailTitle;
	$mail->Body = $mailContent;
	$mail->AddAddress($sendAdress);
	if(!$mail->Send()) {
                return FALSE;
	} else {
		return TRUE;
	}
    }

    
    /*
         * mysql_affected_rows() bu fonksiyon başarılı mı kaç başarılı onu soyler
         * mysql_real_escape_string kaçış karakteri
         * 
    */
?>