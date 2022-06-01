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
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'INSERT INTO staff SET
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
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'SELECT id, Name, Surname, Patronymic, Phone, Address, Experience, id_schedule, id_specialties FROM staff
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
    $name = $row['Name'];
    $surname = $row['Surname'];
    $patronymic = $row['Patronymic'];
    $phone = $row['Phone'];
    $address = $row['Address'];
    $experience = $row['Experience'];
    $id_schedule = $row['id_schedule'];
    $id_specialties = $row['id_specialties'];

    $button = 'Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'UPDATE staff SET
		name = :name,
        surname = :surname,
		login = :login,
		phone = :phone,
        password = :password WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':surname', $_POST['surname']);
        $s->bindValue(':patronymic', $_POST['patronymic']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->bindValue(':address', $_POST['address']);
        $s->bindValue(':experience', $_POST['experience']);
        $s->bindValue(':id_schedule', $_POST['id_schedule']);
        $s->bindValue(':id_specialties', $_POST['id_specialties']);
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
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'DELETE FROM staff WHERE id = :id';
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
include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
try {
    $query = 'SELECT id, Name, Surname, Patronymic, Phone, Address, Experience, id_schedule, id_specialties FROM staff';
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
        'name' => $row['Name'],
        'surname' => $row['Surname'],
        'address' => $row['Address'],
        'patronymic' => $row['Patronymic'],
        'phone' => $row['Phone'],
        'experience' => $row['Experience'],
        'id_schedule' => $row['id_schedule'],
        'id_specialties' => $row['id_specialties'],
    );
}
include 'staff.html.php';
?>
