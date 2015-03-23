<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>
    
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
                            <th> KAT </th>
                            <th>09.00 - 13.00</th>
                            <th>13.00 - 16.00</th>
                            <th>16.00 - 19.00</th>
                            <th>19.00 - 22.00</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>I. Kat</th>
                        <td class="randevusaati musait"></td>
                        <td class="randevusaati musait"></td>
                        <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                        <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                    </tr>
                    <tr>
                        <th>II. Kat</th>
                        <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                        <td class="randevusaati musait"></td>
                        <td class="randevusaati rezerve">Mehmet KARA<span class="tooltip">K Blok - 2 Numaralı oda</span></td>
                        <td class="randevusaati musait"></td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>
</html>