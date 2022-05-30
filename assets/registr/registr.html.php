<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
<link rel="stylesheet" type="text/css" href="css/registr.css">
</head>
<body>

    <div id="login">
        <form action="javascript:void(0);" method="get">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> 
                <p><span class="fontawesome-lock"></span><input type="password"  value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p>
                <p><input type="submit" value="ВОЙТИ"></p>
            </fieldset>
        </form>
        <p>Нет аккаунта? &nbsp;&nbsp;<?php echo ' <a href="registr1.html.php">Регистрация</a>';?><span class="fontawesome-arrow-right"></span></p>
    </div>
</body>
</html>