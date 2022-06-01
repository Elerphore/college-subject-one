<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/style/price.css">
	<title></title>
</head>
<body>
<header><?php include "./components/title_bar.php"?></header>
<section class="mt-3">
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/server/database_connection.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/admin/helpers.inc.php';

    $query = 'SELECT id, Title, Cost, Сode FROM service';
    $result = $pdo->query($query);
    while ($row = $result->fetch()) {
        $prod[] = array(
            'title' => $row['Title'],
            'cost' => $row['Cost']);
    }
    ?>
    <h2>Услуги</h2>
    <table border="1" width="100%" cellpadding="5" class="ceny">
        <tbody>
        <tr>
            <th align="center">Услуга</th>
            <th align="center">Цена</th>
        </tr>

        <?php foreach($prod as $pro):  ?>
            <tr>
                <td><?php echo htmlout($pro['title']); ?></td>
                <td><?php echo htmlout($pro['cost']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
</body>
</html>
