<?php 
  /* if (isset($_POST['reg'])) 
    {
        $errors = array();
        if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {

          $errors[]='Логин должен содержать только буквы латинского алфавита и цифры!';
          echo '<div style="color:red;">'.array_shift($errors).'</div>';        
        }

        if((strlen($_POST['login']<3) && strlen($_POST['login']>30)))
          {
            $errors[]='Логин должен содержать от 3 до 30 символов!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }
        if ( trim($_POST['psurname']) == '')
          {
              $errors[]='Введите фамилию!';
              echo '<div style="color:red;">'.array_shift($errors).'</div>';

          }

        if ( trim($_POST['pname']) == '')
          {
            $errors[]='Введите имя!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( trim($_POST['patrongmic']) == '')
          {

            $errors[]='Введите отчество!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
            
          }

        if ( trim($_POST['date_of_birth']) == '')
          {
            $errors[]='Введите дату рождения!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( trim($_POST['login']) == '')
          {
            $errors[]='Введите логин!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( trim($_POST['passport']) == '')
          {
            $errors[]='Введите паспорт!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( $_POST['password'] == '')
          {
            $errors[]='Введите пароль!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( $_POST['password1'] == '')
          {
            $errors[]='Введите пароль ещё раз!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( $_POST['issued_by'] == '')
          {
            $errors[]='Введите кем выдан паспорт!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }

        if ( $_POST['date_of_issue'] != $_POST['password'])
          {
            $errors[]='Введите дату выдачи паспорта!';
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
          }
*/
        if (count($errors)==0) 
          {
            $psurname=htmlspecialchars($_POST['psurname']);
            $pname=htmlspecialchars($_POST['pname']);
            $patrongmic=htmlspecialchars($_POST['patrongmic']);
            $date_of_birth=htmlspecialchars($_POST['date_of_birth']);
            $passport=htmlspecialchars($_POST['passport']);
            $issued_by=htmlspecialchars($_POST['issued_by']);
            $date_of_issue=htmlspecialchars($_POST['date_of_issue']);
            $login=htmlspecialchars($_POST['login']);
            $par=htmlspecialchars($_POST['password']);
            $password=htmlspecialchars($_POST['password']);
            $phone=htmlspecialchars($_POST['phone']);

                include $_SERVER['DOCUMENT_ROOT'].'/includes/connect_db.php';
                try
                  {
                    $sql='INSERT INTO passengers SET 
                    psurname=:psurname,
                    pname=:pname,
                    patrongmic=:patrongmic,
                    date_of_birth=:date_of_birth,
                    passport=:passport,
                    issued_by=:issued_by,
                    date_of_issue=:date_of_issue,
                    login=:login,
                    password=:password,
                    phone=:phone';
                    $s=$pdo->prepare($sql);
                    $s->bindValue(':psurname',$_POST['psurname']);
                    $s->bindValue(':pname',$_POST['pname']);
                    $s->bindValue(':patrongmic',$_POST['patrongmic']);
                    $s->bindValue(':date_of_birth',$_POST['date_of_birth']);
                    $s->bindValue(':passport',$_POST['passport']);
                    $s->bindValue(':issued_by',$_POST['issued_by']);
                    $s->bindValue(':date_of_issue',$_POST['date_of_issue']);
                    $s->bindValue(':login',$_POST['login']);
                    $s->bindValue(':password',$_POST['password']);
                    $s->bindValue(':phone',$_POST['phone']);
                    $s->execute();
                  }
                catch (PDOException $e)
                  {
                    $error = 'Ошибка при регистрации пользователя.';
                    include 'error.html.php';
                    exit();
                  }
            }

    //}  
            include 'registr1.html.php';

?>