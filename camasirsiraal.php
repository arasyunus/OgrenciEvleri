<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-kullanici.html'; ?>
    
        <div class="kapsul">
            <h1 class="h1Tag">Çamaşır randevusu almak için bir tarih seçerek istediğiniz saate tıklayınız.</h1>
            <hr class="cetvel" />

            <form id="camasir" class="camasir" action="#" method="POST">
                <label for="zaman" class="uyelikLabel">Gün seçiniz :</label><input class="inputText timepick" type="text" id="zaman" name="zaman" placeholder="Çamaşır randevu saatleri" />
            </form>
            
            <table class="camasirTablosu" cellspacing="0">
                <thead>
                        <tr>
                            <th colspan="10">Çamaşır Listesi<span id="listeGunu"></span></th>
                        </tr>
                </thead>
                <tbody>
                        <tr>
                                <td class="randevussati rezerve">01:00</td>
                                <td class="randevussati musait">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati rezerve">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati rezerve">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati rezerve">10:00</td>
                        </tr>
                        <tr>
                                <td class="randevussati musait">01:00</td>
                                <td class="randevussati rezerve">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati musait">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati musait">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati musait">10:00</td>
                        </tr>
                        <tr>
                                <td class="randevussati rezerve">01:00</td>
                                <td class="randevussati musait">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati rezerve">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati rezerve">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati rezerve">10:00</td>
                        </tr>
                        <tr>
                                <td class="randevussati musait">01:00</td>
                                <td class="randevussati rezerve">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati musait">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati musait">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati musait">10:00</td>
                        </tr>
                        <tr>
                                <td class="randevussati rezerve">01:00</td>
                                <td class="randevussati musait">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati rezerve">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati rezerve">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati rezerve">10:00</td>
                        </tr>
                        <tr>
                                <td class="randevussati musait">01:00</td>
                                <td class="randevussati rezerve">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati musait">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati musait">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati musait">10:00</td>
                        </tr>
                        <tr>
                                <td class="randevussati rezerve">01:00</td>
                                <td class="randevussati musait">02:00</td>
                                <td class="randevussati rezerve">03:00</td>
                                <td class="randevussati musait">04:00</td>
                                <td class="randevussati rezerve">05:00</td>
                                <td class="randevussati rezerve">06:00</td>
                                <td class="randevussati musait">07:00</td>
                                <td class="randevussati rezerve">08:00</td>
                                <td class="randevussati rezerve">09:00</td>
                                <td class="randevussati rezerve">10:00</td>
                        </tr>
                </tbody>
            </table>
        </div>
</body>
</html>