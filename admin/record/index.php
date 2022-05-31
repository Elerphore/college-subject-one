<?php
if (isset($_GET['add'])) {
    $pageTitle = 'Клиенты ';
    $action = 'addform';
    $id = '';
    $name = '';
    $surname = '';
    $login = '';
    $phone   = '';
    $password ='';
    $button ='Добавить';
    include 'form.html.php';
    exit();
}
if (isset($_GET['addform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/курсовая/includes/connect_db.php';
    try {
        $sql = 'INSERT INTO record SET
		    name = :name,
		    surname = :surname,
		    login = :login,
		    phone  = :phone,
        password =:password';
        $s = $pdo-> prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':surname', $_POST['surname']);
        $s->bindValue(':login', $_POST['login']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->bindValue(':password', $_POST['password']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Ошибка при добавлении записи';
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
//Редактирование
if(isset($_POST['action']) and $_POST['action'] == 'Редактировать') {
    include $_SERVER['DOCUMENT_ROOT'].'/курсовая/includes/connect_db.php';
    try {
        $sql = 'SELECT id, name, surname, login, phone, password FROM record
		    WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Ошибка при извлечении информации.';
        include 'error.php';
        exit();
    }
    $row = $s->fetch();
    $pageTitle = 'Редактировать информацию.';
    $action = 'editform';
    $id = $row['id'];
    $name = $row['name'];
    $surname = $row['surname'];
    $login = $row['login'];
    $phone = $row['phone'];
    $password = $row['password'];
    $button = 'Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/курсовая/includes/connect_db.php';
    try {
        $sql = 'UPDATE record SET
		    name = :name,
        surname = :surname,
		    login = :login,
		    phone = :phone,
        password = :password
		    WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':surname', $_POST['surname']);
        $s->bindValue(':login', $_POST['login']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->bindValue(':password', $_POST['password']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Ошибка при обновлении.';
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
//Удаление
if (isset($_POST['action']) and $_POST['action'] == 'Удалить') {
    include $_SERVER['DOCUMENT_ROOT'].'/курсовая/includes/connect_db.php';
    try {
        $sql = 'DELETE FROM record WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch(PDOException $e) {
        $error = 'Ошибка при удалении.';
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
//Вывод
include $_SERVER['DOCUMENT_ROOT'].'/курсовая/server/database_connection.php';
try {
    $query = 'SELECT id, name, surname, login, phone, password FROM record';
    $result = $pdo->query($query);
}
catch (PDOException $e) {
    echo "Ошибка выполнения запроса: ".$e->getMessage();
    include 'error.php';
    exit();
}
while ($row = $result->fetch()) {
    $prod[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'surname' => $row['surname'],
        'login' => $row['login'],
        'phone' => $row['phone'],
        'password' => $row['password']);
}
include 'record.html.php';
?>
