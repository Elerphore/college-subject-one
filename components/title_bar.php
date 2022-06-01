
<link href="../assets/style/bootstrap-min.css" rel="stylesheet">
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
            <a href="/?logout='1'" type="button" class="btn btn-primary" style="border-radius: 25px;">Выйти</a>
            <?php if(isset($_SESSION['experience'])) {?>
            <a href="/admin/" type="button" class="btn btn-primary" style="border-radius: 25px;">Админ Панель</a>
            <?php } ?>
            <?php
        } else {
            echo '<a class="btn btn-primary" href="/components/login.php" target="_blank">Войти</a>';
            echo '<a class="btn btn-primary" href="/components/reg.php" target="_blank">Регистрация</a>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</div>
