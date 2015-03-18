<?php include 'inc/head.html';?>
<body>
    <?php include 'inc/banner-menu-yonetici.html'; ?>
    
    <div class="kapsul">
        <h1 class="h1Tag">Kargosu gelen öğrenciye bildirim yolla.</h1>
        <hr class="cetvel" />
        
        <form id="kargoBildir" class="kargoBildir" action="#" method="POST">
            <label for="kargoNo" class="uyelikLabel">Kargosu gelen öğrencinin numarası : </label>
            <input class="inputText"  type="password" name="kargoNo" id="kargoNo" required title="Öğrencinin numarasını girmelisiniz!" />
            <input class="button" type="submit" value="Öğrenciye kargosunun geldiğini bildir." />
        </form>
        
    </div>
</body>
</html>