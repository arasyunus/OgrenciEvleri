<div class="Menu">
    <div class="hu_social">
        <a href="https://twitter.com"><div class="social twitter"></div></a>
        <a href="https://www.facebook.com/groups/792380500841287"><div class="social facebook"></div></a>
    </div>
    <ul class="menuUL">
        <li class="menuLI"><a class="bord">Kullanıcı işlemleri</a><span class="Boldweight">::</span>
            <ul class="altMenu">
                <?php if(isset($_SESSION["userData"])){ echo '<li class="menuitem"><a class="altLink" href="profil.php">Profiline Git</a></li>'; }?>
                <?php if(!isset($_SESSION["userData"])){ echo '<li class="menuitem"><a class="altLink" href="uyegiris.php">Üye Girişi</a></li>'; }?>
                <?php if(!isset($_SESSION["userData"])){ echo '<li class="menuitem"><a class="altLink" href="uyeol.php">Üye Kaydı</a></li>'; }?>
                <li class="menuitem"><a class="altLink" href="sifredegistir.php">Şifre Değiştirme</a></li>
                <?php if(!isset($_SESSION["userData"])){ echo '<li class="menuitem"><a class="altLink" href="sifreunuttum.php">Şifremi Unuttum</a></li>'; }?>
                <?php if(isset($_SESSION["userData"])){ echo '<li class="menuitem"><a class="altLink" href="?oturumuKapat=kapat">Oturumu Kapat</a></li>'; }?>
            </ul>
        </li>
        <?php if(isset($_SESSION["userData"])){ echo '<li class="menuLI"><a class="bord" href="mesajlasma.php">Mesajlaşma</a><span class="Boldweight">::</span></li>';}?>
        <li class="menuLI"><a class="bord" href="duyurular.php">Duyurular</a><span class="Boldweight">::</span></li>
        <li class="menuLI"><a class="yonetici displaynone">Yönetici</a></li>
    </ul>
</div>
<div class="banner">

    <a href="index.php"><div class="hupng"></div></a>

    <div class="bannerMenu">
        <ul class="banMenu">
            <li class="banmenuitem"><a class="menuLink kesMenu">Oda Değişim Talebi</a>
                <ul class="bannerUL">
                    <li class="bannerLi"><a class="altMenuLink" href="odadegisimtalebi.php">Oda değişim talebi bildir</a></li>
                    <li class="bannerLi"><a class="altMenuLink" href="taleplistele.php">Değişim taleplerini listele</a></li>
                </ul>
            </li>
            <li class="banmenuitem"><a class="menuLink" href="dilekceyaz.php">Dilekçe Yaz</a></li>
            <li class="banmenuitem"><a class="menuLink" href="camasirsiraal.php">Çamaşır Odası Ayırt</a></li>
            <li class="banmenuitem"><a class="menuLink" href="arizabildir.php">Arıza Bildir</a></li>
        </ul>
    </div>

</div>
