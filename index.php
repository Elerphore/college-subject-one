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
    <link href="/assets/style/bootstrap-min.css" rel="stylesheet">
</head>
<body>
	<header>
        <?php include "./components/title_bar.php"?>
<div class="header">
  <div class="info">
  <h3><a href="#category">В честь открытия салон красоты «Paradise» дарит первым 20 клиентам скидки!.</a></h3>
    <h1>ДОБРО ПОЖАЛОВАТЬ В PARADISE!</h1>	
  </div>
</div>
<section class="content">
<p> У нас в салоне вы можете получить услуги маникюра: консультацию, маникюр на ваш вкус и цвет, самые разные виды маникюра. Визажист предлагает свадебный, вечерний макияж, креативный макияж. У нас в салоне имеется стилист, который сделает вам стрижку, окрашивание, укладку, плетение, свадебную прическу.</p>
<p>Подпишитесь на наши рассылки и вы будете всегда в курсе новых событий и скидок!</p>
  <p align="center"><a href="https://web.telegram.org/z/" class="btn telegram" target="_b">Follow me on Telegram</a></p>
  	<p align="center"><a href="https://vk.com/" class="btn vk" target="_b">Follow me on Vk</a></p>
</section>
</header>
<footer>
	<div class="kurs">
		Курсовой проект.
	</div>
	<div class="fam">ИСП-19-2 Аблюзина Лилия</div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
