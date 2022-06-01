<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/style/uslugi.css">
	<title></title>
</head>
<body>
	<header><?php include "./components/title_bar.php"?></header>
    <main class="main-block">
        <button class="btn btn-primary float-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Записаться</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Выбор услуги</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Специалист</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Услуга</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Записаться</button>
                </form>
            </div>
        </div>


    <ul class="side-bar nav flex-column align-content-center">
        Услуги Салона:
        <div class="side-bar-content">
            <li class="nav-item">
                <a class="nav-link" href="#">Маникюр</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Укладки прически</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Макияж</a>
            </li>
        </div>
    </ul>

        <div class="information">
            <div class="manicure">
                <h1>Маникюр</h1>
                <div class="manicure-grid">
                    <div>
                        <p> Классический маникюр</p>
                        <img src="assets/style/img/1.jpg" class="man" width="350" height="350">
                    </div>
                    <div>
                        <p> Аппаратный маникюр</p>
                        <img src="assets/style/img/5.jpeg" class="man" width="350" height="350">
                    </div>
                    <div>
                        <p> Покрытие гель-лак</p>
                        <img src="assets/style/img/7.jpg" class="man" width="350" height="350">
                    </div>
                </div>
            </div>

            <div class="gallery">
                <h1>Галерея Работ</h1>
                <div class="main-grid">
                    <div class="services-gallery__item">
                        <img src="assets/style/img/11.jpg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/222.jpg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/33.jpg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/44.jpeg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/55.jpg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                    <div class="services-gallery__item">
                        <img src="assets/style/img/55.jpg" class="services-gallery__item" alt="" width="300" height="300">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
