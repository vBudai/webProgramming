<?php
    require "../data/dbconnect.php";

    try {
        $sql = 'INSERT INTO user(firstName, lastName, md5Password, phoneNumber, email) 
                          VALUES(:firstName, :lastName, :md5Password, :phoneNumber, :email)';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':firstName', $_POST['firstName']);
        $stmt->bindValue(':lastName', $_POST['lastName']);
        $stmt->bindValue(':md5Password', MD5($_POST['md5Password']));
        $stmt->bindValue(':phoneNumber', $_POST['phoneNumber']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        $_SESSION['msg'] = "Пользователь успешно добавлен";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления пользователя: " . $error->getMessage();
    }
    // Перенаправление на главную страницу приложения
    header('Location: http://webprogramming');
    exit( );