<?php
    require_once "data/dbconnect.php";
    if (isset($_POST["login"]) and $_POST["login"]!='')
    {
        try {
            $sql = 'SELECT * FROM user WHERE phoneNumber=(:login) OR email=(:login)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':login', $_POST['login']);
            $stmt->execute();
        } catch (PDOexception $error) {
            $_SESSION['msg'] = "Ошибка аутентификации: " . $error->getMessage();
        }
        // если удалось получить строку с паролем из БД
        if ($row=$stmt->fetch(PDO::FETCH_LAZY))
        {
            if (MD5($_POST["password"])!= $row['md5Password']) $_SESSION['msg'] = "Неправильный пароль!";
            else {
                // успешная аутентификация
                session_start();
                $_SESSION['email'] = $row['email'];
                $_SESSION['phoneNumber'] = $row['phoneNumber'];
                $_SESSION['login'] = $_POST["login"];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['id'] = $row['id'];
            }
        }
        else $_SESSION['msg'] = "Неправильный логин!";
        header('Location: http://webprogramming/index.php?page=profile');
        exit( );
    }

    if (isset($_GET["logout"]))
    {
        session_unset();
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header('Location: http://webprogramming/index.php?page=allAds');
        exit( );
    }