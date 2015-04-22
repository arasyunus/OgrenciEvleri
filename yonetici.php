<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <div class="yontabmenu">
            <div id="tab1" class="tab selectedtab">Resim Ekle</div>
            <div id="tab2" class="tab">Galeriyi Düzenle</div>
            <div class="clr"></div>
        </div>
        <h1 class="h1Tag">Anasayfada bulunan resim galerisini düzenleme sayfase.</h1>
        <hr class="cetvel" />
        <div class="resimekle">
            <form action="yonetici.php" method="POST" enctype="multipart/form-data">
                <h2 class="h2Tag">Bir ve ya birden çok resim yükleybilirsiniz.<br>Yüklemek için resim dosyası seçmelisiniz.<br>Resim dosyasının boyutları 900x275 px boyutlarında  olalıdır.</h2>
                <label  class="uyelikLabel">Link vermek için URL giriniz: <input class="inputText" type="text" name="linking" id="linking" /></label><br/>
                <input type="file" name="slaytResmi[]" id="slaytResmi" multiple="" accept="image/x-png, image/jpeg"/><br>
                <input style="width: 200px;margin-top:15px" type="submit" value="EKLE" name="slaytEkle" class="button" />
            </form>
        </div>
        <?php
        if(isset($_POST["slaytEkle"])){
            $klasor = "slaytIMG";
            $dosya_sayi=count($_FILES['slaytResmi']['name']);
                for($i=0;$i<$dosya_sayi;$i++){
                    if(!empty($_FILES['slaytResmi']['name'][$i])){
                        $resim = "$klasor/". $_FILES["slaytResmi"]["name"][$i];
                        $linkk = $_POST["linking"] <> "" ? $_POST["linking"] : "#";
                        move_uploaded_file($_FILES['slaytResmi']['tmp_name'][$i],$klasor."/".$_FILES['slaytResmi']['name'][$i]);
                        $connectDB = DBConnect();
                        $sql = "INSERT INTO slayt VALUES('$resim','$linkk','CURRENT_TIMESTAMP','0','')";
                        $query = mysql_query($sql);
                    }
                }
        }
        ?>
        <div class="sortingWrp">
        <h2 class="h2Tag">Sürükleyip bırakarak istediğiniz sıralamayı ayarlayabilir, üzerine çift tıklayarak resmi kaldırabilirsiniz.</h2><hr class="cetvel" />
            <?php
                $connectDB = DBConnect();
                $sql = "SELECT * FROM slayt ORDER BY sira ASC";
                $query = mysql_query($sql);
                $count = mysql_num_rows($query);
                if($count > 0){
                    while($resim =  mysql_fetch_assoc($query)) {
                        echo "<div data-id='$resim[INCREMENT]' class='slaytItem'>
                                    <img src='$resim[resim]' alt='$resim[ekTarihi]'/>
                                </div>";
                    }
                }    
                mysqlClose($connectDB);
            ?>
        </div>
    </div>
    <script type="text/javascript">
        $(".sortingWrp").css("display","none");
        $("#tab1").on("click",function(){
            $(this).addClass("selectedtab");
            $("#tab2").removeClass("selectedtab");
            $(".resimekle").fadeIn(1000);
            $(".sortingWrp").css("display","none");
        });
        $("#tab2").on("click",function(){
            $(this).addClass("selectedtab");
            $("#tab1").removeClass("selectedtab");
            $(".sortingWrp").fadeIn(1000);
            $(".resimekle").css("display","none");
        });
        
        $(".sortingWrp").sortable({
            axis:"y",
            opacity:"0.5"
        });
        $( ".sortingWrp" ).on( "sortactivate", function( event, ui ) {
            var order = $(event.target).sortable("toArray",{attribute:"data-id"});
            
        });
        $( ".sortingWrp" ).on( "sortupdate", function( event, ui ) {
            var order = $(event.target).sortable("toArray",{attribute:"data-id"});
                    $.ajax({
                        type: "POST",
                        url: "inc/sorting.php",
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
        
        $(".slaytItem").dblclick(function() {
            var dataid = $(this).attr("data-id")
            var $this = $(this);
                $.ajax({
                    type: "POST",
                    url: "inc/sorting.php",
                    data: {
                        deleteItem: "true",
                        itemIncrement: dataid,
                        setOrder: "false",
                        orderArray: "",
                        deleteIMG: $(this).children("img").attr("src")
                    },
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        if(data){
                            $this.remove();
                        }
                    }
                });
                
        });
        
        
    </script>
</body>
</html>