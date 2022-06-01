<?php include "../server/server.php"?>

<?php include "../server/server.php"?>

<script src="https://unpkg.com/vue@3"></script>
<link href="/assets/style/bootstrap-min.css" rel="stylesheet">

<div class="container mt-5">
    <form id="title" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="surname" class="col-sm-2 col-form-label">Фамилия</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
        </div>
        <div class="row mb-3">
            <label for="patronymic" class="col-sm-2 col-form-label">Отчество</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="patronymic" name="patronymic">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="col-sm-2 col-form-label">Аддресс</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>
        <div class="row mb-3">
            <label for="service" class="col-sm-2 col-form-label">Услуга</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="service" name="service">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="reg">Регистрация</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
