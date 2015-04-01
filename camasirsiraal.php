<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-kullanici.php'; ?>
    <?php include 'inc/userSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Çamaşır randevusu almak istediğiniz tarihi ve bloğunuzu seçerek randevu al butonuna tıklayınız.</h1>
        <hr class="cetvel" />

        <form id="camasir" class="camasir" action="#" method="POST">
            <label for="zaman" class="uyelikLabel">Gün seçiniz :</label><input class="inputText timepick" type="text" id="zaman" name="zaman" placeholder="Çamaşır randevu saatleri" />
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
            <tbody>
                <tr data-kat="1">
                    <th>I. Kat</th>
                    <td class="randevusaati musait"></td>
                    <td class="randevusaati musait"></td>
                    <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                    <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                </tr>
                <tr data-kat="2">
                    <th>II. Kat</th>
                    <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                    <td class="randevusaati musait"></td>
                    <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                    <td class="randevusaati musait"></td>
                </tr>
            </tbody>
        </table>
    </div>

<script type="text/javascript">
    var saatler = [null, "09.00 - 13.00", "13.00 - 16.00", "16.00 - 19.00", "19.00 - 22.00"];
    var tarih    = null;
    var blok    = null;
    var kat     = null;
    var saat    = null;
    var sql     = null;
    
    $(".randevusaati.musait").on("click", function(){
        tarih   = $("#zaman").val().split('/')[0].trim();
        blok    = $("#blok").val();
        kat     = $(this).parent("tr").attr("data-kat");
        saat    = saatler[$(this).index()];
        sql     = "INSERT INTO cmsiraal VALUES('21144319', '"+blok+"', '"+kat+"', '"+tarih+"', '"+saat+"')";
        console.log(sql);
    });

</script>

</body>
</html>