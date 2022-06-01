<?php
if (isset($_GET['add'])) {
    $pageTitle = 'Клиенты ';
    $action = 'addform';
    $id = '';
    $code = '';
    $date = '';
    $time = '';
    $id_staff   = '';
    $id_service ='';
    $id_client ='';
    $button ='Добавить';
    include 'form.html.php';
    exit();
}
if (isset($_GET['addform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'INSERT INTO record SET
		            name = :name,
		            surname = :surname,
		            login = :login,
		            phone  = :phone,
                    password =:password';

        $s = $pdo-> prepare($sql);
        $s->bindValue(':code', $_POST['code']);
        $s->bindValue(':date', $_POST['date']);
        $s->bindValue(':time', $_POST['time']);
        $s->bindValue(':id_staff', $_POST['id_staff']);
        $s->bindValue(':id_service', $_POST['id_service']);
        $s->bindValue(':id_client', $_POST['id_client']);
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
        $sql = 'SELECT id, Code, Date, Time, id_staff, id_service, id_client FROM record WHERE id = :id';
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
    $code = $row['Code'];
    $date = $row['Date'];
    $time = $row['Time'];
    $id_staff = $row['id_staff'];
    $id_service = $row['id_service'];
    $id_client = $row['id_client'];
    $button = 'Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'UPDATE record SET
		            Code = :code,
                    Date = :date,
		            Time = :time,
		            id_staff = :id_staff,
		            id_service = :id_service,
                    id_client = :id_client WHERE id = :id';

        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':code', $_POST['code']);
        $s->bindValue(':date', $_POST['date']);
        $s->bindValue(':time', $_POST['time']);
        $s->bindValue(':id_staff', $_POST['id_staff']);
        $s->bindValue(':id_client', $_POST['id_client']);
        $s->bindValue(':id_service', $_POST['id_service']);
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
include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
try {
    $query = 'SELECT id, Code, Date, Time, id_staff, id_service, id_client FROM record';
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
        'Code' => $row['Code'],
        'Date' => $row['Date'],
        'Time' => $row['Time'],
        'id_staff' => $row['id_staff'],
        'id_service' => $row['id_service'],
        'id_client' => $row['id_client'],);
}
include 'record.html.php';

