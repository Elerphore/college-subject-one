<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/style/uslugi.css">
	<title></title>
</head>
<body>
	<header>
        <?php
        session_start();
        include "./components/title_bar.php";
        include './server/database_connection.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/admin/helpers.inc.php';
        ?>
    </header>

    <button class="btn btn-primary float-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Записаться</button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Выбор услуги</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php session_start();
            if(isset($_SESSION['name']) and isset($_SESSION['phone'])) { ?>
                <form id="title" action="/check/index.php" method="post">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="specialist" name="specialist">
                            <option selected>Выбор специалиста</option>
                            <?php
                            $query = 'SELECT id, Title FROM specialties';
                            $result = $pdo->query($query);
                            while ($row = $result->fetch()) {
                                echo '<option value="'.$row['id'].'">'.$row['Title'].'</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Выбор специалиста</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="service" name="service">
                            <option selected>Выбор услуги</option>
                            <?php
                            $query = 'SELECT id, Title, Cost FROM service';
                            $result = $pdo->query($query);
                            while ($row = $result->fetch()) {
                                echo '<option value="'.$row['id'].'">'.$row['Title'].'</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Выбор сотрудника</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="staff" name="staff">
                            <option selected>Выбор сотрудника</option>
                            <?php
                            $query = 'SELECT id, Name, Surname FROM staff';
                            $result = $pdo->query($query);
                            while ($row = $result->fetch()) {
                                echo '<option value="'.$row['id'].'">'.$row['Name'].' '.$row['Surname'].'</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Выбор услуги</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="bank_account" name="bank_account">
                        <label for="floatingInput">Номер банковской карты</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-lg btn-primary" name="check_req">Записаться</button>
                    </div>
                </form>
            <?php } else { ?>

                <div class="d-grid gap-2">
                    <a href="components/login.php" type="submit" class="btn btn-lg btn-primary">Авторизация</a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="sidenav">
        <a class="nav-link" href="#manicure">Маникюр</a>
        <a class="nav-link" href="#hair">Укладки прически</a>
        <a class="nav-link" href="#makeup">Макияж</a>
    </div>

    <main class="main-block mt-3">
        <div class="information mt-5">
            <div class="gallery mb-5">
                <h1 id="manicure">Маникюр</h1>
                <div class="main-grid">
                    <div class="services-gallery__item">
                        <img src="assets/style/img/1.jpg" class="man" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/222.jpg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/5.jpeg" class="man" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/7.jpg" class="man" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/55.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/55.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                </div>
            </div>

            <div class="gallery mt-5 mb-5">
                <h1 id="hair">Причёски</h1>
                <div class="main-grid">
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/брашинг.jpeg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/галерея.jpeg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/галерея2.jpeg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/галерея3.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/галерея4.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/галерея5.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/галерея6.png" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/hair/прически.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                </div>
            </div>

            <div class="gallery mt-5 mb-5">
                <h1 id="makeup">Макияж</h1>
                <div class="main-grid">
                    <div class="services-gallery__item">
                        <img src="assets/style/img/makeup/галерея.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/makeup/галерея2.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/makeup/галерея3.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/makeup/галерея4.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/makeup/галерея5.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/makeup/галерея6.jpg" class="services-gallery__item" alt="" width="350" height="350">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</html>
