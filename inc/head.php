<?php
/**
 * Bu sayfa ise bütün sayfalarda bulunan HEAD dediğimiz değişmez kısımları içerir.
 * Her sayfada include edilerek kalabalık sayfa yapısının önüne geçilmiştir.
 * Plugin(jQuery, jQuery UI, tinymce text editor) vs. eklentiler burada tanımlanmıştır.
 */
    session_start();
    ob_start();
    $basename = basename($_SERVER['PHP_SELF']);
?>
<?php include 'inc/dbFunctions.inc'; ?>
<?php oturumKapat(); ?>
<!DOCTYPE HTML>
<html lang="tr-TR">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    
    <!-- CSS Styles -->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
    <link rel="stylesheet" href="css/jquery-ui.min.css" />
    <link href="css/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="images/icon.ico" />
    <script src="script/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="script/jquery-ui.js"></script>
    <script src="script/tinymce/tinymce.min.js"></script>
    <script src="script/jquery.datetimepicker.js"></script>
    <script src="script/jquery.ui.datepicker-tr.js" type="text/javascript"></script>
    <script src="script/script.js" type="text/javascript"></script>
    <title>Hacettepe Üniversitesi - Öğrenci Evleri Yönetim Sitemi</title>
</head>