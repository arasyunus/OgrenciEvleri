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
            <span class="videotag" data-id="10">Etiket - 01</span>
            <span class="videotag" data-id="20">Etiket - 02</span>
            <span class="videotag" data-id="30">Etiket - 03</span>
            <span class="videotag" data-id="40">Etiket - 04</span>
            <span class="videotag" data-id="50">Etiket - 05</span>
            <span class="videotag" data-id="60">Etiket - 06</span>
            <span class="videotag" data-id="70">Etiket - 07</span
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