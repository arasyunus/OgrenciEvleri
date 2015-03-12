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
                    <option value="A" selected>A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <select id="blok" name="kat" class="selecting">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <select id="blok" name="oda" class="selecting">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            <label class="fileInputLabel" for="foto">Profil fotoğrafınızı yüklemek için tıklayınız...<div class="inputLabelDashed"></div> </label><input class="fileInput" type="file" name="foto" id="foto"  accept="image/x-png, image/jpeg" />
            <label class="textareaLabel" for="hakkinda">Kendinizi Tanıtın : </label>
            <textarea name="hakkinda" id="hakkinda"  title="Hakkınızda bir cümle de olsa birşeyler yazar mısınız?" required ></textarea>
            <input class="button" type="submit" value="Üye Ol" />
        </form>
    </div>

</body>
</html>