<?php include "../server/server.php"?>


<script src="../assets/js/vuejs.global.js"></script>
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
            <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                    <input class="form-check-input" v-model="isAdmin" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">Вы админ?</label>
                </div>
            </div>
        </div>
        <button v-if="isAdmin" type="submit" class="btn btn-primary" name="login_adm">Авторизация как админ</button>
        <button v-else type="submit" class="btn btn-primary" name="login">Авторизация</button>
    </form>
</div>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script>
    const { createApp } = Vue

    createApp({
        data() {
            return {
                isAdmin: false
            }
        }
    }).mount('#title')
</script>
