<?php
if (isset($_GET['add'])) {
    $pageTitle = 'Клиенты ';
    $action = 'addform';
    $id = '';
    $date = '';
    $time = '';
    $button ='Добавить';
    include 'form.html.php';
    exit();
}
if (isset($_GET['addform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'INSERT INTO schedule SET
		    Date = :date,
		    Time = :time';
        $s = $pdo-> prepare($sql);
        $s->bindValue(':date', $_POST['date']);
        $s->bindValue(':time', $_POST['time']);
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
        $sql = 'SELECT id, Date, Time FROM schedule WHERE id = :id';
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
    $time = $row['Time'];
    $date = $row['Date'];
    $button = 'Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'UPDATE schedule SET
		    Date = :date,
            Time = :time WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':date', $_POST['date']);
        $s->bindValue(':time', $_POST['time']);
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
        $sql = 'DELETE FROM schedule WHERE id = :id';
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
    $query = 'SELECT id, Date, Time FROM schedule';
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
        'date' => $row['Date'],
        'time' => $row['Time']);
}
include 'schedule.html.php';
?>
