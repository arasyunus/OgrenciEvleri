<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <video id="video" controls width="500">  
            <source src="video/video.mp4#t=30,50" type="video/mp4" />  
            <object type="application/x-shockwave-flash" data="player.swf" width="854" height="504">
                <param name="allowfullscreen" value="true">
                <param name="allowscriptaccess" value="always">
                <param name="flashvars" value="file=video/video.mp4">
                <h2 class="h2Tag">Tarayıcınız video çalıştırmıyor!</h2>
            </object>
        </video>
        <div class="justifydiv">
            <span class="videotag" data-id="0">Sisteme Giriş & Oturum Açma</span>
            <span class="videotag" data-id="38">Kargo Bildirmi Yollamak</span>
            <span class="videotag" data-id="67">Arıza Bildirimi Göndermek</span>
            <span class="videotag" data-id="117">Çamaşır Listesini Kontrol Etmek</span>
            <span class="videotag" data-id="137">Dilekçeleri Okumak</span>
            <span class="videotag" data-id="158">Duyuru İşlemleri</span>
        </div>
    </div>
    <script type="text/javascript">
        var vidyo = document.getElementById("video");
        $(".videotag").on("click",function(){
            var seektime = $(this).attr("data-id");
            vidyo.currentTime = seektime;
        });
    </script>
</body>
</html>