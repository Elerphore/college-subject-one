<?php include "../server/server.php"?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name:
    <input type="text" id="name" name="name">
    Surname:
    <input type="text" id="surname" name="surname">
    Patronymic:
    <input type="text" id="patronymic" name="patronymic">
    Phone:
    <input type="text" id="phone" name="phone">
    Address:
    <input type="text" id="address" name="address">
    Service:
    <input type="text" id="service" name="service">
    <button type="submit" name="reg">Регистрация</button>
</form>
