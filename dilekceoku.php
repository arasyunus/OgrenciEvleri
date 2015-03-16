<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-yonetici.html'; ?>
    
    <div class="kapsul">
        <h1 class="h1Tag">Gönderilen dilekçeler listesi.</h1>
        <hr class="cetvel" />
        
        <div class="dilekceKapsul">
            <div class="ogrFoto">
                <img src="images/profil.png" alt="Öğrencinin fotoğrafı"/>
            </div>
            <div class="ogrenciBilgileri">
                <span class="ogrLbl">Adı ve soyadı</span><span class="ogrBilgi">Ahmet Karatoprak</span><br>
                <span class="ogrLbl">Numarası</span><span class="ogrBilgi">21143555</span><br>
                <span class="ogrLbl">Blok</span><span class="ogrBilgi">K Blok</span><br>
                <span class="ogrLbl">Kat</span><span class="ogrBilgi">5. Kat</span><br>
                <span class="ogrLbl">Oda</span><span class="ogrBilgi">6 Numaralı Oda</span>
            </div>
            <a href="?oku=oku"><div class="dilekceOkuBtn button">Dilekçesini Oku</div></a>
        </div>
        
        <div class="dilekceKapsul">
            <div class="ogrFoto">
                <img src="images/profil.png" alt="Öğrencinin fotoğrafı"/>
            </div>
            <div class="ogrenciBilgileri">
                <span class="ogrLbl">Adı ve soyadı</span><span class="ogrBilgi">Ahmet Karatoprak</span><br>
                <span class="ogrLbl">Numarası</span><span class="ogrBilgi">21143555</span><br>
                <span class="ogrLbl">Blok</span><span class="ogrBilgi">K Blok</span><br>
                <span class="ogrLbl">Kat</span><span class="ogrBilgi">5. Kat</span><br>
                <span class="ogrLbl">Oda</span><span class="ogrBilgi">6 Numaralı Oda</span>
            </div>
            <a href="?oku=oku"><div class="dilekceOkuBtn button">Dilekçesini Oku</div></a>
        </div>
        
    </div>
    

<?php
    if(isset($_GET["oku"])){
        if($_GET["oku"] == "oku"){
?>
<div class="dilekceOkumaSayfasi">
    <div class="a4Sayfa">
        <h2>SOSYAL BİLİMLER MESLEK YÜKSEKOKULU MÜDÜRLÜĞÜ’NE</h2>
        <p>Yüksekokulunuz…………………………………………..programı ……………nolu  öğrencisiyim.…../…../…….ile……/…../…….tarihleri arasında……………………………….  ………………………………………………………..programına katılacağım.</p>
	<p>Katılım belgemin ve Nüfus Cüzdanımın fotokopisi dilekçemin ekinde sunulmuştur. Emniyetten Harçsız pasaport alabilmem için gerekli belgenin tarafıma verilmesini arz ederim.</p>

            …../……/201
                                                                                            Adı ve Soyadı
                                                                                                 İmzası
            Dilekçe Eki: 1 Adet davet yazımın fotokopisi
                             1 Adet Nüfus Cüzdanı Fotokopisi
            Adres:
            Telefon:
            <a href="?oku=kapat"><div class="dilekceKapat">X</div></a>
            <a href="dilekceCevapla.php?id=234892374873249"><div class="dilekceCevapla button">Dilekçeyi cevapla</div></a>
    </div>
</div>
<?php 
        }
    }
?>
</body>
</html>