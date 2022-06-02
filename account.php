<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/style/price.css">
    <title></title>
</head>
<body>
<header><?php include "./components/title_bar.php"?></header>
<section class="mt-5 container">
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/admin/helpers.inc.php';

    $query =
        'select rc.Date, rc.Time, sr.Title as ServiceTitle, st.Name, st.Surname 
            from record rc 
                inner join service sr on sr.id = id_service
                inner join staff st on st.id = id_staff where id_client = :id;';
    $s = $pdo->prepare($query);
    $s->bindValue(':id', $_SESSION['id']);
    $s->execute();

    while ($row = $s->fetch()) {
        $recs[] = array(
            'date' => $row['Date'],
            'time' => $row['Time'],
            'service' => $row['ServiceTitle'],
            'staff' => $row['Name'].' '.$row['Surname']);
    }
    ?>
    <h2>Записи <?php echo $_SESSION['name']. ' '. $_SESSION['surname'];?></h2>
    <table border="1" width="100%" cellpadding="5" class="table table-striped">
        <tbody>
        <tr>
            <th align="center">Цена</th>
            <th align="center">Время</th>
            <th align="center">Услуга</th>
            <th align="center">Сотрудник</th>
        </tr>

        <?php foreach($recs as $rec):  ?>
            <tr>
                <td><?php echo htmlout($rec['date']); ?></td>
                <td><?php echo htmlout($rec['time']); ?></td>
                <td><?php echo htmlout($rec['service']); ?></td>
                <td><?php echo htmlout($rec['staff']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
</body>
</html>
