$(function() {


    $.ajaxSetup({
        //timeout: 4000,
        cache:false,
        crossDomain: false,
        jsonp: true,
        datatype:"jsonp"
    });
    
    
    var $editorPlaceholder = false;
    var $editorAciklama    = null;
    
    tinymce.init({
        selector:'#dilekceMetni',
        language : 'tr_TR',
        menubar : false,
        resize: false,
        statusbar: false,
        theme: "modern",
        plugins: ["autolink lists link preview wordcount fullscreen"],
        toolbar1: "undo redo | bold underline | alignleft aligncenter alignright | bullist numlist | styleselect | link unlink | preview | fullscreen",
        style_formats: [
            {title: 'Headers', items: [
            {title: 'Header 1', format: 'h2'},
            {title: 'Header 2', format: 'h3'},
        ]},
            {title: 'Inline', items: [
            {title: 'Bold', icon: 'bold', format: 'bold'},
            {title: 'Italic', icon: 'italic', format: 'italic'},
            {title: 'Underline', icon: 'underline', format: 'underline'},
            {title: 'Strikethrough', icon: 'strikethrough', format: 'strikethrough'},
            {title: 'Superscript', icon: 'superscript', format: 'superscript'},
            {title: 'Subscript', icon: 'subscript', format: 'subscript'},
            {title: 'Code', icon: 'code', format: 'code'}
        ]},
            {title: 'Alignment', items: [
                {title: 'Left', icon: 'alignleft', format: 'alignleft'},
                {title: 'Center', icon: 'aligncenter', format: 'aligncenter'},
                {title: 'Right', icon: 'alignright', format: 'alignright'},
                {title: 'Justify', icon: 'alignjustify', format: 'alignjustify'}
            ]}
        ],
        toolbar_items_size: 'middle',
        entity_encoding : "raw",
        setup: function (theEditor) {
            theEditor.on("submit", function(data) {
                $editorAciklama = tinyMCE.get('dilekceMetni').getContent();
                /*
                console.log($editorAciklama);
                return false;
                */
            });
            theEditor.on("focus",function(){
                if($editorPlaceholder == false){
                    $editorPlaceholder = true;
                    tinyMCE.activeEditor.setContent("");                    
                }
            });
            theEditor.on("blur",function(){
                $("#dilekceMetni").val(tinyMCE.get('dilekceMetni').getContent()); 
            });
            /*
            theEditor.on("blur",function(){
                if(tinyMCE.get('aciklama').getContent() == ""){
                    tinyMCE.activeEditor.setContent("LÃ¼tfen etkinliÄŸiniz hakkÄ±nda aÃ§Ä±klama giriniz.");
                }
            });
            */
        }
    });

    
    $.datepicker.setDefaults( $.datepicker.regional[ "tr" ] );
    $('#zaman').datepicker({
        dateFormat: "yy-mm-dd / DD",
        maxDate: "+2w",
        minDate: 0,
        defaultDate:0,
        onSelect: function(date){
            $("#listeGunu").html(date);
        }
    });
    $('#zaman').datepicker( "setDate" , new Date());
    $("#listeGunu").html($('#zaman').val());
    /*
    $("#camasirRandevusu").on("click",function(e){
        $("table.camasirTablosu.displaynon").removeClass("displaynon");
        return false;
        e.preventDefault();
    });
    */
   
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
   
   
   
});