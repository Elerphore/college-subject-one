<?php include "../server/server.php"?>

<script src="https://unpkg.com/vue@3"></script>

<form id="title" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name:
    <input type="text" id="name" name="name">
    Phone:
    <input type="text" id="phone" name="phone">

    <button v-if="isAdmin" type="submit" name="login_adm">Авторизация как админ</button>
    <button v-else  type="submit" name="login">Авторизация</button>

    Зайти как администратор:
    <input v-model="isAdmin" type="checkbox">
</form>

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
