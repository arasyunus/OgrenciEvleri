<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="wrpMesaj">
            
        <div class="yoneticiProfile">
            <?php
            
                $connectDB = DBConnect();
                $sql    = "SELECT * FROM users WHERE konum='yonetici' AND numara!=".$_SESSION["userData"]["numara"];
                $query  = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    while($user =  mysql_fetch_assoc($query)) {
                        
                        $comeCount = 0;
                        $sqlComing = "SELECT * FROM mesajlasma WHERE (gonderenNo='".$_SESSION["userData"]["numara"]."' AND alanNo='$user[numara]') OR (gonderenNo='$user[numara]' AND alanNo='".$_SESSION["userData"]["numara"]."')";
                        $query  = mysql_query($sqlComing);
                        while ($mesaj = mysql_fetch_assoc($query)) {
                            if($mesaj["gonderenNo"] == $_SESSION["userData"]["numara"]){
                                $comeCount = 0;
                            }
                            if($mesaj["alanNo"] == $_SESSION["userData"]["numara"]){
                                $comeCount++;
                            }
                        }
                        
                        $comeCount > 0 ? $msjIncoming = "<div class='msgIncoming'>$comeCount</div>" : $msjIncoming = "";
                        
                        echo "<div data-id='$user[numara]' class='mesajProfil'>
                                <img src='$user[fotograf]' alt='Profil resmi'/>
                                <span>$user[adsoyad]</span>
                                $msjIncoming
                            </div>";
                    }
                }else{
                    echo "<h2 style='margin-left:10px' class='h2Tag'>Yönetici Bulunmuyor</h2>";
                }
                mysqlClose($connectDB);
            ?>

        </div>

        <div class="ogrenciProfile">

            <?php
                $connectDB = DBConnect();

                $msjIncoming = "<div class='msgIncoming'>12</div>";
                
                $sql    = "SELECT * FROM users WHERE konum='ogrenci' AND numara!=".$_SESSION["userData"]["numara"];
                $query  = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    while($user =  mysql_fetch_assoc($query)) {
                        
                        
                        $comeCount = 0;
                        $sqlComing = "SELECT * FROM mesajlasma WHERE (gonderenNo='".$_SESSION["userData"]["numara"]."' AND alanNo='$user[numara]') OR (gonderenNo='$user[numara]' AND alanNo='".$_SESSION["userData"]["numara"]."')";
                        $query  = mysql_query($sqlComing);
                        while ($mesaj = mysql_fetch_assoc($query)) {
                            if($mesaj["gonderenNo"] == $_SESSION["userData"]["numara"]){
                                $comeCount = 0;
                            }
                            if($mesaj["alanNo"] == $_SESSION["userData"]["numara"]){
                                $comeCount++;
                            }
                        }
                        
                        $comeCount > 0 ? $msjIncoming = "<div class='msgIncoming'>$comeCount</div>" : $msjIncoming = "";
                        
                        
                        echo "<div data-id='$user[numara]' class='mesajProfil'>
                                <img src='$user[fotograf]' alt='Profil resmi'/>
                                <span>$user[adsoyad]</span>
                                $msjIncoming                                    
                            </div>";
                    }
                }else{
                    echo "<h2 style='margin-left:10px' class='h2Tag'>Öğrenci Bulunmuyor</h2>";
                }
                mysqlClose($connectDB);
            ?>
            
        </div>

    </div>
    <div class="kapsul">
        <h1 class="h1Tag">Yöneticilere ve ya öğrencilere mesaj göndermek için mesaj göndereceğiniz kişiyi seçiniz.</h1>
        <hr class="cetvel" />
        <form class="uyelikFormu" name="frmMesaj" id="frmMesaj" action="mesajlasma.php" method="POST">
            <img id="ogrencinumarasi" data-id="<?php echo $_SESSION['userData']['numara']?>" src="<?php echo $_SESSION['userData']['fotograf']?>" class="profileMe" />
            <img id="kime" data-id="" src="" class="profileYou kimseyok" />
            <div class="mesajGorWrp">
                
            </div>
            <textarea placeholder="Mesajınızı buraya giriniz..." class="txtMesajlasma msjAlaniKayip" name="mesajMetni" id="mesajMetni"></textarea>
            <span class="msgError">Mesaj Gönderilemedi!</span>
        </form>
        
    </div>
<script type="text/javascript">
$("div.wrpMesaj").height($(window).height() - 118);
   
   
   $(".mesajProfil").on("click",function(){
       $("#kime").attr("src", $(this).children("img").attr("src"));
       $("#kime").attr("data-id", $(this).attr("data-id"));
       $("#kime").removeClass("kimseyok");
       $("#mesajMetni").removeClass("msjAlaniKayip");
   });
   
   
   $("textarea.txtMesajlasma").keypress(function(e){
	if (e.which == 13 && !e.shiftKey){
            //console.log(e.currentTarget.value)
            //$("#frmMesaj").submit();
            if($("#mesajMetni").val().trim()=="" || $("kime").attr("data-id") == ""){return false;}
            var sql = "INSERT INTO mesajlasma VALUES ('"+$("#ogrencinumarasi").attr("data-id")+"','"+$("#kime").attr("data-id")+"','"+$("#mesajMetni").val()+"',CURRENT_TIMESTAMP,'')";
            
            $.ajax({
                type: "POST",
                url: "inc/mesajlasmaAjax.php",
                data: {
                    sql: sql,
                    insert: "true",
                    mesajoku: "false"
                },
                cache: false,
                
                success: function(data) {
                    data = JSON.parse(data);
                    if(data.sonuc){
                        $("#mesajMetni").val("");
                        $(".msgError").css('display','none');
                        var dataiid=$("#kime").attr("data-id");
                        $(".mesajProfil[data-id='"+dataiid+"']").children(".msgIncoming").remove();
                    }else{
                        $(".msgError").fadeIn(400);
                    }
                }
                
            });
            
            return false; 
	}        
   });
   
   
   
    setInterval(function(){

        if($("#kime").attr("data-id").trim() != ""){
           $.ajax({
            type: "POST",
            url: "inc/mesajlasmaAjax.php",
            data: {
                kimlen: $("#kime").attr("data-id"),
                insert: "false",
                mesajoku: "true"
            },
            cache: false,

            success: function(data) {
                data = JSON.parse(data);
                var msj = "";
                $(".mesajGorWrp").empty();
                data.forEach(function(el){
                    $(".mesajGorWrp").empty();
                    //console.log(el)
                    if(el.gonderenNo == $("#ogrencinumarasi").attr("data-id")){
                        msj += "<span data-id='"+el["INCREMENT"]+"' class='mesajGelen'>"+el["mesaj"]+"<i>"+el["msjTarihi"]+"</i></span><div class='clr'></div>";
                    }else{
                        msj += "<span data-id='"+el["INCREMENT"]+"' class='mesajGiden'>"+el["mesaj"]+"<i>"+el["msjTarihi"]+"</i></span><div class='clr'></div>";
                    }
                });
                $(".mesajGorWrp").append(msj);
                $(".mesajGorWrp").animate({'scrollTop': $(".mesajGorWrp").outerHeight()*999999}, 300);
            }

        });
       }
      
    }, 800);
</script>
</body>
</html>