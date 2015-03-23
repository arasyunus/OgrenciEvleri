<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>

    <div class="kapsul">
        <h1 class="h1Tag">Üye olmak için formu eksiksiz doldurmalısınız.</h1>        
        <hr class="cetvel"/>
        <form id="formUyelik" class="uyelikFormu" action="#" method="POST">
            <label for="adSoyad" class="uyelikLabel">Adınız ve Soyadınız : </label>  <input class="inputText" type="text" name="adSoyad" id="adSoyad" title="Adınızı ve Soyadınızı girmeyi unutmayın." required />
            <label for="ogrenciNo" class="uyelikLabel">Öğrenci Numaranız : </label>  <input class="inputText" type="text" name="ogrenciNo" id="ogrenciNo"  title="Lütfen öğrenci numaranızı giriniz." required />
            <label for="sifre" class="uyelikLabel">Şifreniz : </label>  <input class="inputText"  type="password" name="sifre" id="sifre"  title="Şifre oluşturmalısınız." required />
            <label for="resifre" class="uyelikLabel">Şifreniz Tekrar : </label>  <input class="inputText"  type="password" name="resifre" id="resifre"  title="Şifrenizi tekrar girmelisiniz." required />
            <label for="telefon" class="uyelikLabel">Telefon Numaranız : </label>  <input class="inputText" type="text" name="telefon" id="telefon"  title="Telefon numaranız iletişim için gereklidir." required />
            <label for="eposta" class="uyelikLabel">E-posta Adresiniz : </label>  <input class="inputText"  type="email" name="eposta" id="eposta"  title="Geçerli bit elektronik posta adresi girmelisiniz." required />
            <label class="uyelikLabel">Blok / Kat / Oda numaranız : </label>
                <select id="blok" name="blok" class="selecting">
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
                <select id="kat" name="kat" class="selecting">
                    <option value="0" selected>Zemin</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select id="oda" name="oda" class="selecting">
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
            
            <label class="uyelikLabel" for="foto">Cinsiyet:</label>
            <input type="radio" name="cinsiyet" id="erkek" checked /><label for="erkek" class="cinsiyetLabel">Erkek</label>
            <input type="radio" name="cinsiyet" id="kadin" /><label for="kadin" class="cinsiyetLabel">Kadın</label>
            
            <label class="fileInputLabel" for="foto">Profil fotoğrafınızı yüklemek için tıklayınız...<div class="inputLabelDashed"></div> </label><input class="fileInput" type="file" name="foto" id="foto"  accept="image/x-png, image/jpeg" />
            <label class="textareaLabel" for="hakkinda">Kendinizi Tanıtın : </label>
            <textarea name="hakkinda" id="hakkinda"  title="Hakkınızda bir cümle de olsa birşeyler yazar mısınız?" required ></textarea>
            <input class="button" type="submit" value="Üye Ol" />
        </form>
    </div>

</body>
</html>