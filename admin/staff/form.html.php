<?php include_once $_SERVER['DOCUMENT_ROOT'].'/admin/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тишка</title>
</head>
<body>
<!-- просмотр страницы -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Заголовок-->
<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="main-menu mobile-menu">
                            <ul>
                                <li><a href="../../public/index.php">Главная</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

<!-- Конец заголовка -->

<div id="side_menu">
    <h1><?php htmlout($pageTitle); ?></h1>
    <form action="?<?php htmlout($action); ?>" method="POST">
        <div><label for="name"> Имя: <input type="text" name="name" value="<?php htmlout($name); ?>"></label></div>
        <div><label for="surname">Фамилия: <input type="text" name="surname" value="<?php htmlout($surname); ?>"></label></div>
        <div><label for="address">Логин: <input type="text" name="address" value="<?php htmlout($login); ?>"></label></div>
        <div><label for="experience">Телефон: <input type="text" name="experience" value="<?php htmlout($phone); ?>"></label></div>
        <div><label for="id_schedule">Пароль: <input type="text" name="id_schedule" value="<?php htmlout($password); ?>"></label></div>
        <div><label for="id_specialties">Пароль: <input type="text" name="id_specialties" value="<?php htmlout($password); ?>"></label></div>
        <br>
        <div>
            <input type="hidden" name="id" value="<?php htmlout($id);?>">
            <input type="submit" value="<?php htmlout($button);?>" id="knop">
        </div>
    </form>
</div>
</body>
</html>
