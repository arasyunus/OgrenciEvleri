<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-yonetici.html'; ?>
    
    <div class="kapsul">
        <h1 class="h1Tag">Öğrenci bilgilerini sorgula.</h1>
        <hr class="cetvel" />
        
        <form id="ogrenciSorgula" class="ogrenciSorgula" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Kargosu gelen öğrencinin numarası : </label>
            <input class="inputText"  type="number" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarasını girmelisiniz!" />
            <input class="button" type="submit" value="Öğrenciye kargosunun geldiğini bildir." />
        </form>
        
    </div>

    <?php if(isset($_POST["ogrenciNo"])){ ?>

    <div class="kapsul">
        <div class="fotoKapsul">
            <img class="profilFoto" src="images/profil.png" alt="Profil Fotoğrafı"/>
        </div>
        <div class="profilBilgileri">
            <h1 class="h1Tag">Profil Bilgileriniz.</h1>
            <hr class="cetvel" />
            <form class="formKullaniciBilgileri" action="#" method="POST" id="formOgrBilgiler">
                <label for="adSoyad">Adınız ve Soyadınız : </label><input type="text" name="adSoyad" id="adSoyad" placeholder="Mehmet Ahmet" required disabled="disabled" />
                <label for="ogrNo">Öğrenci Numaranız   : </label><input type="text" name="ogrNo" id="ogrNo" placeholder="21143333" disabled="disabled" required />
                <label for="telefon">Telefon Numaranız : </label><input type="text" name="telefon" id="telefon" placeholder="05343443434" disabled="disabled" required />
                <label for="eposta">Elektronik Posta Adresiniz: </label><input type="email" name="eposta" id="eposta" placeholder="at@at.com" disabled="disabled" required />
                <label>Blok - Kat ve Oda Numaranız : </label><select name="blok" id="blok"  disabled="disabled">
                    <option selected value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <select name="kat" id="kat"  disabled="disabled">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <select name="oda" id="oda"  disabled="disabled">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" name="guncelle" style="width: 240px;" value="Profil Bilgilerini Güncelle" class="button guncelle" disabled="disabled"/>
                <input type="submit" name="kayitsil" style="width: 240px;" value="Öğrencinin Kaydını Sil" class="button guncelle" disabled="disabled"/>
            </form>
            
        </div>
        <div class="clr"></div><br />
    </div>

    <?php }?>
</body>
</html>