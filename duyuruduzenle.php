<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    
    <div class="kapsul">
        <h1 class="h1Tag">Öğrenci evleri güncel duyuruları.</h1>
        <hr class="cetvel" />
        <h2 class="h2Tag">Duyuruların sıralamasını sürükle bırak yaparak düzenleyebilirsiniz.</h2>
        <?php
            $connectDB = DBConnect();
            
            if(isset($_GET["duyuruSil"])){
                $sql = "DELETE FROM duyurular WHERE INCREMENT=".$_GET["duyuruSil"];
                $query = mysql_query($sql);
            }
            
            
            $sql = "SELECT * FROM duyurular ORDER BY sira ASC, duyurutarihi ASC";
            $query = mysql_query($sql);
            $count = mysql_num_rows($query);
            if($count > 0){
                echo '<ul class="duyuruduzenle">';
                while($row =  mysql_fetch_assoc($query)) {
                    echo "<li data-id='$row[INCREMENT]' class='duyuru $row[duyuruoncelik]'>$row[duyurumetni]<span class='duyuruTarihi'>$row[duyurutarihi]</span><a href='?duyuruSil=$row[INCREMENT]'>X</a></li>";
                }
                echo '</ul>';
            }else{
                echo '<h2 class="h2Tag">Henüz duyuru bulunmuyor.</h2>';
            }            
            mysqlClose($connectDB);
        ?>
        <script type="text/javascript">
            $(".duyuruduzenle").sortable({
                axis:"y",
                opacity:"0.5"
            });
            $( ".duyuruduzenle" ).on( "sortactivate", function( event, ui ) {
                var order = $(event.target).sortable("toArray",{attribute:"data-id"});

            });
            $( ".duyuruduzenle" ).on( "sortupdate", function( event, ui ) {
                var order = $(event.target).sortable("toArray",{attribute:"data-id"});
                        $.ajax({
                            type: "POST",
                            url: "inc/duyuruajax.php",
                            data: {
                                setOrder: "true",
                                orderArray: order,
                                deleteItem: "false",
                                itemIncrement: "",
                            },
                            cache: false,
                            success: function(data) {
                                //console.log(data);
                            }
                        });
            });
        </script>
</body>
</html>