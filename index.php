<?php
session_start();
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['phone']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/style/index.css">
	<title></title>
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>
<header><?php include "./components/title_bar.php"?></header>
	<div class="main-block">
        <div class="header mb-5">
            <div class="header">
                <div>
                    <p><a href="#category">В честь открытия салон красоты «Paradise» дарит первым 20 клиентам скидки!.</a></p>
                    <p>ДОБРО ПОЖАЛОВАТЬ В PARADISE!</p>
                </div>
            </div>
        </div>

        <div class="main-text container">
            <p> У нас в салоне вы можете получить услуги маникюра: консультацию, маникюр на ваш вкус и цвет, самые разные виды маникюра. Визажист предлагает свадебный, вечерний макияж, креативный макияж. У нас в салоне имеется стилист, который сделает вам стрижку, окрашивание, укладку, плетение, свадебную прическу.</p>
            <p>Подпишитесь на наши рассылки и вы будете всегда в курсе новых событий и скидок!</p>
            <p align="center"><a href="https://web.telegram.org/z/" target="_b">Follow me on Telegram</a></p>
            <p align="center"><a href="https://vk.com/" target="_b">Follow me on Vk</a></p>
        </div>

        <footer>
            <p class="mt-2">Курсовой проект.</p>
            <p class="mt-1">ИСП-19-2 Аблюзина Лилия</p>
        </footer>
    </div>
</body>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</html>
