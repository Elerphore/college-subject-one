
<link href="../assets/style/bootstrap-min.css" rel="stylesheet">
<style>
    a {
        text-decoration: none;
    }
</style>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/style/img/2.png" alt="" width="70" height="40" class="d-inline-block align-text-top">
                </a>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">ГЛАВНАЯ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uslugi.html.php">УСЛУГИ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontact.html.php">КОНТАКТЫ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="price.html.php">ПРАЙС</a>
                </li>
            </ul>
            <span class="d-flex navbar-text">
                    <?php
                    session_start();
                    if(isset($_SESSION['name']) and isset($_SESSION['phone'])) {
                        ?>
                        <a href="/?logout='1'" type="button" class="form-control me-2 btn btn-outline-success">Выйти</a>
                        <a href="/account.php" type="button" class="form-control me-2 btn-bg btn btn-outline-success">Кабинет</a>
                        <?php if(isset($_SESSION['experience'])) {?>
                            <a href="/admin/" type="button" class="form-control me-2">Админ Панель</a>
                        <?php } ?>
                        <?php
                    } else {
                        ?>
                        <a class="form-control me-2" href="/components/login.php">Войти</a>
                        <a class="form-control me-2"  href="/components/reg.php">Регистрация</a>
                    <?php } ?>

            </span>
        </div>
    </div>
</nav>