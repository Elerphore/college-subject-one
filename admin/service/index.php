<?php
if (isset($_GET['add'])) {
    $pageTitle = 'Клиенты ';
    $action = 'addform';
    $id = '';
    $title = '';
    $cost = '';
    $code = '';
    $button ='Добавить';
    include 'form.html.php';
    exit();
}
if (isset($_GET['addform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'INSERT INTO service SET
		    Title = :title,
		    Cost = :cost,
		    Code = :code';

        $s = $pdo-> prepare($sql);
        $s->bindValue(':title', $_POST['title']);
        $s->bindValue(':cost', $_POST['cost']);
        $s->bindValue(':code', $_POST['code']);
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
        $sql = 'SELECT id, Title, Cost, Code FROM service
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
    $title = $row['title'];
    $cost = $row['cost'];
    $code = $row['code'];
    $button = 'Обновить информацию';
    include 'form.html.php';
    exit();
}
if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    try {
        $sql = 'UPDATE service SET
		    Title = :title,
            Cost = :cost,
		    Code = :code
		    WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':title', $_POST['Title']);
        $s->bindValue(':cost', $_POST['Cost']);
        $s->bindValue(':code', $_POST['Code']);
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
        $sql = 'DELETE FROM service WHERE id = :id';
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
    $query = 'SELECT id, Title, Cost, Сode FROM service';
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
        'title' => $row['Title'],
        'cost' => $row['Cost'],
        'code' => $row['Сode']);
}
include 'service.html.php';
?>
