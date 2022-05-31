<div id="title">
    <img src="assets/style/img/2.png">
    <ul class="js-menu">
        <li class="glav"> <a href="index.php" >ГЛАВНАЯ</a></li>
        <li class="usl"><a href="uslugi.html.php">УСЛУГИ</a></li>
        <li class="cont"><a href="kontact.html.php">КОНТАКТЫ</a></li>
        <li class="price"><a href="price.html.php">ПРАЙС</a></li>
    </ul>
    <div class="knopka">
        <?php
        session_start();
        if(isset($_SESSION['name']) and isset($_SESSION['phone'])) {
            ?>
            <a href="/?logout='1'" type="button" class="button" style="border-radius: 25px;">Выйти</a>
            <span>Логин:<?php echo $_SESSION['name'] ?></span><br>
            <span>Имя:<?php echo $_SESSION['phone'] ?></span><br>
            <div>{{ message }}</div>
            <?php
        } else {
            echo '<a class="button" href="/components/login.php" target="_blank">Войти</a>';
            echo '<a class="button" href="/components/reg.php" target="_blank">Регистрация</a>';
        }
        ?>
    </div>
</div>
