<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
<link rel="stylesheet" type="text/css" href="css/registr.css">
</head>
<body>

    <div id="login">
        <form action="javascript:void(0);" method="get">
            <fieldset class="clearfix"> 
                <p><span class="fontawesome-user"></span><input type="text" value="Имя" onBlur="if(this.value == '') this.value = 'Имя'" onFocus="if(this.value == 'Имя') this.value = ''" required></p> 
                <p><span class="fontawesome-user"></span><input type="text" value="8 (000) 000-00-00" onBlur="if(this.value == '') this.value = 'Номер'" onFocus="if(this.value == 'Номер') this.value = ''" required></p> 
                <p><span class="fontawesome-user"></span><input type="text" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> 
                <p><span class="fontawesome-lock"></span><input type="password"  value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p> 
                <p><input type="submit" value="ПРОДОЛЖИТЬ"></p>
            </fieldset>
        </form>
    </div>
</body>
</html>