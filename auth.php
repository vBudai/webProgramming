<?php

    if (isset($_POST["login"]) and $_POST["login"]!='')
    {
        try {
            $sql = 'SELECT id, firstName, lastName, md5Password FROM user WHERE phoneNumber=(:login) OR email=(:login)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':login', $_POST['login']);
            $stmt->execute();
        } catch (PDOexception $error) {
            $msg = "Ошибка аутентификации: " . $error->getMessage();
        }
        // если удалось получить строку с паролем из БД
        if ($row=$stmt->fetch(PDO::FETCH_LAZY))
        {
            if (MD5($_POST["password"])!= $row['md5Password']) $msg = "Неправильный пароль!";
            else {
                // успешная аутентификация
                $_SESSION['login'] = $_POST["login"];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $msg =  "Вход выполнен";
            }
        }
        else $msg = "Неправильный логин!";
    }

    if (isset($_GET["logout"]))
    {
        session_unset();
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header('Location: http://webprogramming');
        exit( );
    }