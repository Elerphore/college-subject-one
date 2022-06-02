<?php
session_start();
include "database_connection.php";

if(isset($_POST['login'])) {
    try {
        $sql = "SELECT * FROM client 
         WHERE Name=:name and Phone=:phone";

        $s = $pdo-> prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->execute();
        $user = $s->fetch();

        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['surname'] = $user['Surname'];
        $_SESSION['patronymic'] = $user['patronymic'];
        $_SESSION['phone'] = $user['Phone'];
    }
    catch (PDOException $e) {
        echo $e;
        exit();
    }
    header('Location: /');
    exit();
}

if(isset($_POST['login_adm'])) {
    try {

        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM staff 
         WHERE Name=:name and Phone=:phone";

        $s = $pdo-> prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->execute();
        $user = $s->fetch();

        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['phone'] = $user['Phone'];
        $_SESSION['surname'] = $user['Surname'];
        $_SESSION['patronymic'] = $user['Patronymic'];
        $_SESSION['experience'] = $user['Experience'];
    }
    catch (PDOException $e) {
        echo $e;
        exit();
    }
    header('Location: /');
    exit();
}

if(isset($_POST['reg'])) {
    $_SESSION['action'] = 'reg_user';

    try {
        $sql = 'INSERT INTO client SET
		    Name = :name,
		    Surname = :surname,
		    patronymic = :patronymic,
		    Phone = :phone,
		    Address  = :address,
            Service = :service';

        $s = $pdo-> prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':surname', $_POST['surname']);
        $s->bindValue(':patronymic', $_POST['patronymic']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->bindValue(':address', $_POST['address']);
        $s->bindValue(':service', $_POST['service']);
        $s->execute();
    }
    catch (PDOException $e) {
        echo $e;
//        var_dump($_POST['patronymic']);
//        var_dump($_POST);
        exit();
    }
    header('Location: /');
    exit();
}

if(isset($_POST['logout'])) {
    echo "logout";
}

?>
