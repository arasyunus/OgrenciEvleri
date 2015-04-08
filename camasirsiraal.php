<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <?php
        $connectDB = DBConnect();
        $sql = "SELECT * FROM cmsiraal";
        $query = mysql_query($sql);
        while($record =  mysql_fetch_assoc($query)) {
            date_default_timezone_set('Europe/Istanbul');
            $gunfarki = floor((time() - strtotime($record["cmsrtarihi"]))/(60*60*24));
            if($gunfarki>0){
                $silSQL = "DELETE FROM cmsiraal WHERE cmsrINCREMENT=".$record["cmsrINCREMENT"];
                mysql_query($silSQL);
            }
        }
        mysqlClose($connectDB);
    ?>
    <div class="kapsul">
        <h1 class="h1Tag">Çamaşır randevusu almak istediğiniz tarihi ve bloğunuzu seçerek randevu al butonuna tıklayınız.</h1>
        <hr class="cetvel" />

        <form id="camasir" class="camasir" action="#" method="POST">
            <label for="zaman" class="uyelikLabel">Gün seçiniz : </label><input class="inputText timepick" type="text" id="zaman" name="zaman" placeholder="Çamaşır randevu saatleri" />
            <label class="uyelikLabel">Blok seçiniz</label>
            <select id="blok" name="blok" class="selecting camasirblok">
                <option value="A" selected>A Blok</option>
                <option value="B">B Blok</option>
                <option value="C">C Blok</option>
                <option value="D">D Blok</option>
                <option value="E">E Blok</option>
                <option value="F">F Blok</option>
                <option value="G">G Blok</option>
                <option value="ASTII">AST I Blok</option>
                <option value="ASTI">AST II Blok</option>
                <option value="J">J Blok</option>
                <option value="K">K Blok</option>
                <option value="L">L Blok</option>
                <option value="M">M Blok</option>
                <option value="N">N Blok</option>
            </select>
            <input type="hidden" id="ogrencinumarasi" name="ogrencinumarasi" value="<?php echo $_SESSION['userData']['numara']?>" />
            <input id="camasirRandevusu" class="button camasirbuton" type="submit" value="Çamaşır randevusu al." />
        </form>

        <table class="camasirTablosu displaynon" cellspacing="0">
            <thead>
                    <tr>
                        <th colspan="15">Çamaşır Listesi<span id="listeGunu"></span></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>09.00 - 13.00</th>
                        <th>13.00 - 16.00</th>
                        <th>16.00 - 19.00</th>
                        <th>19.00 - 22.00</th>
                    </tr>
            </thead>
            <tbody></tbody>
        </table>
        
        <div class="ajaxLoader">
            <img src="images/712.GIF" alt=""/>
        </div>       
        
    </div>

<script type="text/javascript">
    var saatler = [null, "09.00 - 13.00", "13.00 - 16.00", "16.00 - 19.00", "19.00 - 22.00"];
    var tarih   = null;
    var blok    = null;
    var kat     = null;
    var saat    = null;
    var sql     = null;
    var ogrNo   = $("#ogrencinumarasi").val();
    
    
    
    $(document).on("click", ".randevusaati.musait", function(){
        tarih   = $("#zaman").val().split('/')[0].trim();
        blok    = $("#blok").val();
        kat     = $(this).parent("tr").attr("data-kat");
        saat    = saatler[$(this).index()];
        sql     = "INSERT INTO cmsiraal VALUES('"+ogrNo+"', '"+blok+"', '"+kat+"', '"+tarih+"', '"+saat+"','')";

        $.ajax({
            type: "POST",
            url: "inc/camasirAjax.php",
            data: {
                sql: sql,
                insert: "true",
                select: "false"
            },
            cache: false,
            beforeSend:function(){
                $(".ajaxLoader").addClass("load");
            },
            success: function(data) {
                data = JSON.parse(data);
                var message = "";
                if(data.sonuc){
                    message = "<div class='modal'><div class='msgBox'><div class='msgTitle'>Çamaşır Randevusu Alındı<span class='closeModal'>X</span></div><div class='msgBody'><span class='msgContent'>Çamaşır randevunuz sisteme kayıt edilmiştir. Günü ve saatini geçirmeden çamaşır randevunuza uygun bir şekilde çamaşır odasını kullanınız.</span><a class='modalButton center' href='"+ window.location.href +"'>Kapat</a></div></div></div>";
                    $(document.body).append(message);
                }else{
                    if(data.veri == "FAZLA"){
                        message = "<div class='modal'><div class='msgBox'><div class='msgTitle'>HATA!<span class='closeModal'>X</span></div><div class='msgBody'><span class='msgContent'>2'den fazla çamaşır randevusu talep edemezsiniz. Sistemde kayıtlı randevularınızın günü geçtikten sonra yeniden deneyiniz.</span><a class='modalButton center' href='"+ window.location.href +"'>Kapat</a></div></div></div>";
                    }else{
                        message = "<div class='modal'><div class='msgBox'><div class='msgTitle'>HATA!<span class='closeModal'>X</span></div><div class='msgBody'><span class='msgContent'>Çamaşır randevunuz kayıt edilememiştir. Lütfen tekrar deneyiniz. Eğer yine arıza ile karşılaşırsanız yöneticiye bildiriniz.</span><a class='modalButton center' href='"+ window.location.href +"'>Kapat</a></div></div></div>";
                    }
                    $(document.body).append(message);
                }
            },
            complete: function(){
                $(".ajaxLoader").removeClass("load");
            }
        });
        
        

    });
    
    
    //SELECT CAMARSIR LISTS
    $(document).on("click", "#camasirRandevusu", function(e){
        var tarih   = $("#zaman").val().split('/')[0].trim();
        var blok    = $("#blok").val();
        var sql     = "SELECT * FROM cmsiraal JOIN users ON users.numara = cmsiraal.cmsrogrno WHERE cmsiraal.cmsrblok='" + blok + "' AND cmsiraal.cmsrtarihi='" + tarih +"' ORDER BY cmsiraal.cmsrkat ASC , cmsiraal.cmsrsaati ASC";
        
        var tableOfAppointment = {
            1: {
                1:null,
                2:null,
                3:null,
                4:null,
            },
            2: {
                1:null,
                2:null,
                3:null,
                4:null,
            }
        }
        //-----------------
        var tableOfAppointmentObj = {
            1: {
                1:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                },
                2:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                },
                3:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                },
                4:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                }
            },
            2: {
                1:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                },
                2:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                },
                3:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                },
                4:{
                    isim    :null,
                    numara  :null,
                    telefon :null,
                    blodkat :null
                }
            }
        }
        //-----------------
        $.ajax({
            type: "POST",
            url: "inc/camasirAjax.php",
            data: {
                sql: sql,
                insert: "false",
                select: "true"
            },
            cache: false,
            beforeSend:function(){
                //console.log(sql);
                $(".ajaxLoader").addClass("load");
            },
            success: function(data) {
                data = JSON.parse(data);
                if(data.sonuc){
                    var DBData = data.veri;
                    for(var i = 0; i < DBData.length; i++){
                        
                        //1.katlar
                        if(DBData[i]["cmsrkat"] == "1" && DBData[i]["cmsrsaati"] == "09.00 - 13.00"){
                            //tableOfAppointment[1][1] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][1]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[1][1]["telefon"] = "<strong>Telefon: </strong>" + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][1]["numara"] = "<strong>Numara: </strong>" +  DBData[i]["numara"];
                            tableOfAppointmentObj[1][1]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        if(DBData[i]["cmsrkat"] == "1" && DBData[i]["cmsrsaati"] == "13.00 - 16.00"){
                            //tableOfAppointment[1][2] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][2]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[1][2]["telefon"] = "<strong>Telefon: </strong>" + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][2]["numara"] = "<strong>Numara: </strong>" +  DBData[i]["numara"];
                            tableOfAppointmentObj[1][2]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        if(DBData[i]["cmsrkat"] == "1" && DBData[i]["cmsrsaati"] == "16.00 - 19.00"){
                            //tableOfAppointment[1][3] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][3]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[1][3]["telefon"] = "<strong>Telefon: </strong>" + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][3]["numara"] = "<strong>Numara: </strong>" +  DBData[i]["numara"];
                            tableOfAppointmentObj[1][3]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        if(DBData[i]["cmsrkat"] == "1" && DBData[i]["cmsrsaati"] == "19.00 - 22.00"){
                            //tableOfAppointment[1][4] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][4]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[1][4]["telefon"] = "<strong>Telefon: </strong>" + DBData[i]["telefon"];
                            tableOfAppointmentObj[1][4]["numara"] = "<strong>Numara: </strong>" +  DBData[i]["numara"];
                            tableOfAppointmentObj[1][4]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        //2.katlar
                        if(DBData[i]["cmsrkat"] == "2" && DBData[i]["cmsrsaati"] == "09.00 - 13.00"){
                            //tableOfAppointment[2][1] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[2][1]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[2][1]["numara"] = "<strong>Telefon: </strong>" + DBData[i]["numara"];
                            tableOfAppointmentObj[2][1]["telefon"] = "<strong>Numara: </strong>" +  DBData[i]["telefon"];
                            tableOfAppointmentObj[2][1]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        if(DBData[i]["cmsrkat"] == "2" && DBData[i]["cmsrsaati"] == "13.00 - 16.00"){
                            //tableOfAppointment[2][2] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[2][2]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[2][2]["numara"] = "<strong>Telefon: </strong>" + DBData[i]["numara"];
                            tableOfAppointmentObj[2][2]["telefon"] = "<strong>Numara: </strong>" +  DBData[i]["telefon"];
                            tableOfAppointmentObj[2][2]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        if(DBData[i]["cmsrkat"] == "2" && DBData[i]["cmsrsaati"] == "16.00 - 19.00"){
                            //tableOfAppointment[2][3] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[2][2]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[2][3]["numara"] = "<strong>Telefon: </strong>" + DBData[i]["numara"];
                            tableOfAppointmentObj[2][3]["telefon"] = "<strong>Numara: </strong>" +  DBData[i]["telefon"];
                            tableOfAppointmentObj[2][3]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        if(DBData[i]["cmsrkat"] == "2" && DBData[i]["cmsrsaati"] == "19.00 - 22.00"){
                            //tableOfAppointment[2][4] = DBData[i]["adsoyad"] + " - " + DBData[i]["telefon"];
                            tableOfAppointmentObj[2][4]["isim"] = DBData[i]["adsoyad"];
                            tableOfAppointmentObj[2][4]["numara"] = "<strong>Telefon: </strong>" + DBData[i]["numara"];
                            tableOfAppointmentObj[2][4]["telefon"] = "<strong>Numara: </strong>" +  DBData[i]["telefon"];
                            tableOfAppointmentObj[2][4]["blodkat"] = "<strong>Blok / Kat / Oda: </strong>" + DBData[i]["blok"] + " Blok " + DBData[i]["kat"] + ".Kat " + DBData[i]["oda"] + ". Oda";
                        }
                        
                        
                    }
                    //console.log(tableOfAppointmentObj);
                    //console.log(tableOfAppointment);
                    //object data fetch to table contents
                    $("table.camasirTablosu tbody").empty();
                    var tbodyy = "";
                    
                    tableOfAppointmentObj[1][1]["isim"] != null ? tbodyy += "<tr data-kat='1'><th>I. Kat</th><td class='randevusaati rezerve'>"+tableOfAppointmentObj[1][1]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[1][1]["numara"]+"<br/>"+tableOfAppointmentObj[1][1]["telefon"]+"<br/>"+tableOfAppointmentObj[1][1]["blodkat"]+"</span></td>" : tbodyy += "<tr data-kat='1'><th>I. Kat</th><td class='randevusaati musait'></td>";
                    tableOfAppointmentObj[1][2]["isim"] != null ? tbodyy += "<td class='randevusaati rezerve'>"+tableOfAppointmentObj[1][2]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[1][2]["numara"]+"<br/>"+tableOfAppointmentObj[1][2]["telefon"]+"<br/>"+tableOfAppointmentObj[1][2]["blodkat"]+"</span></td>" : tbodyy += "<td class='randevusaati musait'></td>";
                    tableOfAppointmentObj[1][3]["isim"] != null ? tbodyy += "<td class='randevusaati rezerve'>"+tableOfAppointmentObj[1][3]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[1][3]["numara"]+"<br/>"+tableOfAppointmentObj[1][3]["telefon"]+"<br/>"+tableOfAppointmentObj[1][3]["blodkat"]+"</span></td>" : tbodyy += "<td class='randevusaati musait'></td>";
                    tableOfAppointmentObj[1][4]["isim"] != null ? tbodyy += "<td class='randevusaati rezerve'>"+tableOfAppointmentObj[1][4]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[1][4]["numara"]+"<br/>"+tableOfAppointmentObj[1][4]["telefon"]+"<br/>"+tableOfAppointmentObj[1][4]["blodkat"]+"</span></td>" : tbodyy += "<td class='randevusaati musait'></td></tr>";
                    
                    tableOfAppointmentObj[2][1]["isim"] != null ? tbodyy += "<tr data-kat='2'><th>I. Kat</th><td class='randevusaati rezerve'>"+tableOfAppointmentObj[2][1]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[2][1]["numara"]+"<br/>"+tableOfAppointmentObj[2][1]["telefon"]+"<br/>"+tableOfAppointmentObj[2][1]["blodkat"]+"</span></td>" : tbodyy += "<tr data-kat='2'><th>II. Kat</th><td class='randevusaati musait'></td>";
                    tableOfAppointmentObj[2][2]["isim"] != null ? tbodyy += "<td class='randevusaati rezerve'>"+tableOfAppointmentObj[2][2]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[2][2]["numara"]+"<br/>"+tableOfAppointmentObj[2][2]["telefon"]+"<br/>"+tableOfAppointmentObj[2][2]["blodkat"]+"</span></td>" : tbodyy += "<td class='randevusaati musait'></td>";
                    tableOfAppointmentObj[2][3]["isim"] != null ? tbodyy += "<td class='randevusaati rezerve'>"+tableOfAppointmentObj[2][3]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[2][3]["numara"]+"<br/>"+tableOfAppointmentObj[2][3]["telefon"]+"<br/>"+tableOfAppointmentObj[2][3]["blodkat"]+"</span></td>" : tbodyy += "<td class='randevusaati musait'></td>";
                    tableOfAppointmentObj[2][4]["isim"] != null ? tbodyy += "<td class='randevusaati rezerve'>"+tableOfAppointmentObj[2][4]["isim"]+"<span class='tooltip'>"+tableOfAppointmentObj[2][4]["numara"]+"<br/>"+tableOfAppointmentObj[2][4]["telefon"]+"<br/>"+tableOfAppointmentObj[2][4]["blodkat"]+"</span></td>" : tbodyy += "<td class='randevusaati musait'></td></tr>";
                    
                    $("table.camasirTablosu tbody").append(tbodyy);
                    
                    
                    
                }else{
                    $("table.camasirTablosu tbody").empty();
                    $("table.camasirTablosu tbody").append("<tr data-kat='1'><th>I. Kat</th><td class='randevusaati musait'></td><td class='randevusaati musait'></td><td class='randevusaati musait'></td><td class='randevusaati musait'></td></tr><tr data-kat='2'><th>II. Kat</th><td class='randevusaati musait'></td><td class='randevusaati musait'></td><td class='randevusaati musait'></td><td class='randevusaati musait'></td></tr>");
                }
            },
            complete: function(){
                $("table.camasirTablosu").removeClass("displaynon");
                $(".ajaxLoader").removeClass("load");
            }
        });
        
        e.preventDefault();
        
    });
    //CAMASIR LISTS ENDED
    
    $(document).ready(function() {
        //--
    });
</script>

</body>
</html>