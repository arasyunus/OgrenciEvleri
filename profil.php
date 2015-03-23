<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <div class="fotoKapsul">
            <img class="profilFoto" src="images/profil.png" alt="Profil Fotoğrafı"/>
        </div>
        <div class="profilBilgileri">
            <h1 class="h1Tag">Profil Bilgileriniz.</h1>
            <hr class="cetvel" />
            <form class="formKullaniciBilgileri" action="#" method="POST" id="formOgrBilgiler">
                <label for="adSoyad">Adınız ve Soyadınız : </label><input type="text" name="adSoyad" id="adSoyad" required placeholder="Mehmet Ahmet" required />
                <label for="ogrNo">Öğrenci Numaranız   : </label><input type="text" name="ogrNo" id="ogrNo" required placeholder="21143333" disabled="disabled" required />
                <label for="telefon">Telefon Numaranız : </label><input type="text" name="telefon" id="telefon" required placeholder="05343443434" disabled="disabled" required />
                <label for="eposta">Elektronik Posta Adresiniz: </label><input type="email" name="eposta" id="eposta" required placeholder="at@at.com" disabled="disabled" required />
                <label>Blok - Kat ve Oda Numaranız : </label><select name="blok" id="blok"  disabled="disabled">
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
                <select name="kat" id="kat"  disabled="disabled">
                    <option value="0" selected>Zemin</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select name="oda" id="oda"  disabled="disabled">
                    <option value="01" selected>01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                </select>
                <input type="submit" value="Profil Bilgilerimi Güncelle" class="button guncelle" disabled="disabled"/>
            </form>
            
        </div>
        <div class="clr"></div><br />
        <div class="profilBildirimleri">
            <h1 class="h1Tag">Profilinize Gelen Bildirimler.</h1>
            <hr class="cetvel" />
            <div class="bildirimDiv olumlu">Kargonuz Geldi</div>
            <div class="bildirimDiv olumsuz">Arızanızı Onaramıyoruz</div>
            <div class="bildirimDiv uyari">Sular 3 Gün Kesik</div>
        </div>
    </div>
    <script>
        $("#adSoyad").on("click",function (){
            $(this).attr("disabled","disabled");
        });
        $("#adSoyad").dblclick(function() {
            alert( "Handler for .dblclick() called." );
        });
    </script>
</body>
</html>