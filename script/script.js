$(function() {


    $.ajaxSetup({
        //timeout: 4000,
        cache:false,
        crossDomain: false,
        jsonp: false,
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
                console.log($editorAciklama);
                return false;
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
        dateFormat: "yy.mm.dd - DD",
        maxDate: "+2w",
        minDate: 0,
        defaultDate:0,
        onSelect: function(date){
            $("#listeGunu").html(date);
        }
    });
    $('#zaman').datepicker( "setDate" , new Date());
    $("#listeGunu").html($('#zaman').val());
    
    $("#camasir").on("click",function(e){
        
        $("table.camasirTablosu.displaynon").removeClass("displaynon");
        
        return false;
        e.preventDefault();
    });
});