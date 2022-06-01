<?php
if (isset($_GET['add'])) {
    $pageTitle = 'Клиенты ';
    $action = 'addform';
    $id = '';
    $name = '';
    $surname = '';
    $patronymic = '';
    $phone   = '';
    $address ='';
    $service ='';
    $button ='Добавить';
    include 'form.html.php';
    exit();
}
if (isset($_GET['addform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'INSERT INTO client SET
		            Name = :name,
		            Surname = :surname,
		            patronymic = :login,
		            Phone  = :phone,
                    Address = :address,
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
        $sql = 'SELECT id, Name, Surname, patronymic, Phone, Address, Service FROM client
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
    $patronymic = $row['patronymic'];
    $phone = $row['Phone'];
    $address = $row['Address'];
    $service = $row['Service'];

    $button = 'Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'UPDATE client SET
		Name = :name,
        Surname = :surname,
		patronymic = :patronymic,
		Phone = :phone,
        Address = :address,
        Service = :service
              WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':surname', $_POST['surname']);
        $s->bindValue(':patronymic', $_POST['patronymic']);
        $s->bindValue(':phone', $_POST['phone']);
        $s->bindValue(':address', $_POST['address']);
        $s->bindValue(':service', $_POST['service']);
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
        $sql = 'DELETE FROM client WHERE id = :id';
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
    $query = 'SELECT id, Name, Surname, patronymic, Phone, Address, Service FROM client';
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
        'patronymic' => $row['patronymic'],
        'phone' => $row['Phone'],
        'address' => $row['Address'],
        'service' => $row['Service']
    );
}
include 'client.html.php';
?>
