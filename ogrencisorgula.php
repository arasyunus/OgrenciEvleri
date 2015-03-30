<?php include 'inc/head.php';?>
<body>
    <?php include 'inc/banner-menu-yonetici.php'; ?>
    <?php include 'inc/adminSessionManager.inc'; ?>
    <div class="kapsul">
        <h1 class="h1Tag">Öğrenci bilgilerini sorgula.</h1>
        <hr class="cetvel" />
        
        <form id="ogrenciSorgula" class="ogrenciSorgula" action="#" method="POST">
            <label for="ogrenciNo" class="uyelikLabel">Öğrencinin numarası : </label>
            <input class="inputText"  type="number" name="ogrenciNo" id="ogrenciNo" required title="Öğrenci numarasını girmelisiniz!" />
            <input name="ogrSorgula" class="button" type="submit" value="Öğrenci bilgilerini göster." />
        </form>
        
    </div>
    <?php
        if(isset($_POST["guncelle"])){
            $connectDB = DBConnect();
            $sql = "UPDATE users SET adsoyad='$_POST[adSoyad]',numara='$_POST[ogrNo]',telefon='$_POST[telefon]',eposta='$_POST[eposta]',blok='$_POST[blok]',kat='$_POST[kat]',oda='$_POST[oda]' WHERE numara='$_POST[ogrNo]'";
            $query = mysql_query($sql);
            if($query){
                $msgBox["title"] = "Bilgi Güncelleme Başarılı.";
                $msgBox["content"] = "Öğrencinin kişisel bilgileri başarıyla güncellenmiştir.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }  else {
                $msgBox["title"] = "Bilgi Güncellemeda HATA!";
                $msgBox["content"] = "Öğrencinin bilgileri güncellenememiştir.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Peki.";
                echo showMsgBox($msgBox);
            }
        }
        if(isset($_POST["kayitsil"])){
            $connectDB = DBConnect();
            $sql = "DELETE FROM users WHERE numara=".$_POST["ogrNo"];
            $query = mysql_query($sql);
            if($query){
                $msgBox["title"] = "Kayıt silindi!";
                $msgBox["content"] = "Öğrencinin kaydı silinmiştir.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }  else {
                $msgBox["title"] = "Kayıt silmede HATA!";
                $msgBox["content"] = "Öğrencinin kaydı silinememiştir.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Peki.";
                echo showMsgBox($msgBox);
            }
        }
    ?>
    <?php 
        if(isset($_POST["ogrSorgula"])){
            $connectDB = DBConnect();
            $sql = "SELECT * FROM users WHERE konum='ogrenci' AND numara=".$_POST["ogrenciNo"];
            $query = mysql_query($sql);
            if(mysql_num_rows($query) > 0){
                $result = mysql_fetch_assoc($query);
                echo "<div class='kapsul'>
                            <div class='fotoKapsul'>
                                <img class='profilFoto' src='$result[fotograf]' alt='Profil Fotoğrafı'/>
                            </div>
                            <div class='profilBilgileri'>
                                <h1 class='h1Tag'>Öğrenci kişsel bilgileri.</h1>
                                <hr class='cetvel' />
                                <form class='formKullaniciBilgileri' action='#' method='POST' id='formOgrBilgiler'>
                                    <label for='adSoyad'>Adınız ve Soyadınız : </label><input type='text' name='adSoyad' id='adSoyad' value='$result[adsoyad]' required />
                                    <label for='ogrNo'>Öğrenci Numaranız   : </label><input type='text' name='ogrNo' id='ogrNo' value='$result[numara]' required />
                                    <label for='telefon'>Telefon Numaranız : </label><input type='text' name='telefon' id='telefon' value='$result[telefon]' required />
                                    <label for='eposta'>Elektronik Posta Adresiniz: </label><input type='email' name='eposta' id='eposta' value='$result[eposta]' required />
                                    <label>Blok - Kat ve Oda Numaranız : </label><select name='blok' id='blok'>
                                        <option value='$result[blok]' selected>$result[blok]</option>
                                        <option value='B'>A Blok</option>
                                        <option value='B'>B Blok</option>
                                        <option value='C'>C Blok</option>
                                        <option value='D'>D Blok</option>
                                        <option value='E'>E Blok</option>
                                        <option value='F'>F Blok</option>
                                        <option value='G'>G Blok</option>
                                        <option value='ASTII'>AST I Blok</option>
                                        <option value='ASTI'>AST II Blok</option>
                                        <option value='J'>J Blok</option>
                                        <option value='K'>K Blok</option>
                                        <option value='L'>L Blok</option>
                                        <option value='M'>M Blok</option>
                                        <option value='N'>N Blok</option>
                                    </select>
                                    <select name='kat' id='kat'>
                                        <option value='$result[kat]' selected>$result[kat]</option>
                                        <option value='0'>0</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                    </select>
                                    <select name='oda' id='oda'>
                                        <option value='$result[oda]' selected>$result[oda]</option>
                                        <option value='01'>01</option>
                                        <option value='02'>02</option>
                                        <option value='03'>03</option>
                                        <option value='04'>04</option>
                                        <option value='05'>05</option>
                                        <option value='06'>06</option>
                                        <option value='07'>07</option>
                                        <option value='08'>08</option>
                                        <option value='09'>09</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>
                                        <option value='13'>13</option>
                                        <option value='14'>14</option>
                                        <option value='15'>15</option>
                                        <option value='16'>16</option>
                                        <option value='17'>17</option>
                                    </select>
                                    <input type='submit' name='guncelle' style='width: 240px;' value='Profil Bilgilerini Güncelle' class='button guncelle'/>
                                    <input type='submit' name='kayitsil' style='width: 240px;' value='Öğrencinin Kaydını Sil' class='button guncelle'/>
                                </form>
                            </div>
                            <div class='clr'></div><br />
                        </div>";
            }else{
                $msgBox["title"] = "Veri Yok!";
                $msgBox["content"] = "Öğrenci bilgileri bulunamadı. Öğrenci numarası yanlış olabilir. Tekrar doğru bir şekilde giriniz.";
                $msgBox["buttonCenter"]["href"] = $basename;
                $msgBox["buttonCenter"]["name"] = "Tamam";
                echo showMsgBox($msgBox);
            }
            mysqlClose($connectDB);
        }
    ?>
</body>
</html>