<?php include_once $_SERVER['DOCUMENT_ROOT'].'/admin/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тишка</title>
</head>
<body>

<!-- просмотр страницы -->

<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Заголовок-->

<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="main-menu mobile-menu">
                            <ul>
                                <li><a href="/admin/">Главная</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

<!-- Конец заголовка -->

<h1>Сотрудники</h1>
<div id="side_menu">
    <p><a href="?add">Добавить сотрудников</a></p>
    <table border="1" width="100%" cellpadding="5">
        <tr>
            <td align="center">$name</td>
            <td align="center">$surname</td>
            <td align="center">$patronymic</td>
            <td align="center">$phone</td>
            <td align="center">$address</td>
            <td align="center">$experience</td>
            <td align="center">$id_schedule</td>
        </tr>
        <?php foreach($prod as $pro):  ?>
            <tr>
                <td><?php echo htmlout($pro['name']); ?></td>
                <td><?php echo htmlout($pro['surname']); ?></td>
                <td><?php echo htmlout($pro['patronymic']); ?></td>
                <td><?php echo htmlout($pro['phone']); ?></td>
                <td><?php echo htmlout($pro['address']); ?></td>
                <td><?php echo htmlout($pro['experience']); ?></td>
                <td><?php echo htmlout($pro['id_schedule']); ?></td>
                <td>
                    <form action="?" method="POST">
                        <div>
                            <input type="hidden" name="id" value="<?php htmlout($pro['id']); ?>">
                            <input type="submit" name="action" value="Редактировать">
                            <input type="submit" name="action" onClick="return confirm('Вы подтверждаете удаление?');" value="Удалить">
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
