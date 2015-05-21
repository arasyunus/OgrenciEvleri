<?php
/**
 * Bu sayfada drag-drop ile reim yükleme işlemi için ayaranmıştır.
 * Ajax ile bu sayfaya $_FILES["files"] değişkeni aracılığıyla resim dosyası yollanır ve resimler upload edilir.
 */
header("Content-Type: application/json");

$allowed = explode(",", strtolower($_POST["allowExt"]));
$processed = array();

foreach ($_FILES["files"]["name"] as $fileKey => $fileName) {
    if($_FILES["files"]["error"][$fileKey] === 0){
        $temp = $_FILES["files"]["tmp_name"][$fileKey];
        $ext = explode(".", $fileName);
        $ext = strtolower($ext[count($ext)-1]);// $ext[count($ext)-1] === end($ext)
        $file = uniqid('', TRUE) . time() . "." . $ext;
    }
    if(in_array($ext, $allowed) && move_uploaded_file($temp, "../uploads/$file")){
        array_push($processed, array(
            'fileName' => $fileName,
            'file'     => $file,
            'uploaded' => TRUE
        ));
    }else{
        array_push($processed, array(
            'fileName' => $fileName,
            'uploaded' => FALSE
        ));
    }
}

echo json_encode($processed);

?>