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
                                <li><a href="/admin/">Главная</a></li>
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
        <div><label for="code"> Code: <input type="text" name="code" value="<?php htmlout($code); ?>"></label></div>
        <div><label for="date">Date: <input type="text" name="date" value="<?php htmlout($date); ?>"></label></div>
        <div><label for="time">Date: <input type="text" name="time" value="<?php htmlout($time); ?>"></label></div>
        <div><label for="id_staff">Time: <input type="text" name="id_staff" value="<?php htmlout($id_staff); ?>"></label></div>
        <div><label for="id_service">id_staff: <input type="text" name="id_service" value="<?php htmlout($id_service); ?>"></label></div>
        <div><label for="id_client">id_client: <input type="text" name="id_client" value="<?php htmlout($id_client); ?>"></label></div>
        <br>
        <div>
            <input type="hidden" name="id" value="<?php htmlout($id);?>">
            <input type="submit" value="<?php htmlout($button);?>" id="knop">
        </div>
    </form>
</div>
</body>
</html>
