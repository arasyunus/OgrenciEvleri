<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    
    <div class="kapsul">
        <h1 class="h1Tag">Öğrenci evleri güncel duyuruları.</h1>
        <hr class="cetvel" />
        <?php
            $connectDB = DBConnect();
            $sql = "SELECT * FROM duyurular ORDER BY sira ASC, duyurutarihi ASC";
            $query = mysql_query($sql);
            $count = mysql_num_rows($query);
            if($count > 0){
                while($row =  mysql_fetch_assoc($query)) {
                    echo "<span class='duyuru $row[duyuruoncelik]'>$row[duyurumetni]<span class='duyuruTarihi'>$row[duyurutarihi]</span></span>";
                }
            }else{
                echo '<h2 class="h2Tag">Henüz duyuru bulunmuyor.</h2>';
            }            
            mysqlClose($connectDB);
        ?>
</body>
</html>