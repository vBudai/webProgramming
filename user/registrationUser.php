<?php
    require __DIR__."./../data/dbconnect.php";
    try {
        $sql = 'INSERT INTO user(firstName, lastName, md5Password, phoneNumber, email) 
                          VALUES(:firstName, :lastName, :md5Password, :phoneNumber, :email)';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':firstName', $_GET['firstName']);
        $stmt->bindValue(':lastName', $_GET['lastName']);
        $stmt->bindValue(':md5Password', MD5($_GET['md5Password']));
        $stmt->bindValue(':phoneNumber', $_GET['phoneNumber']);
        $stmt->bindValue(':email', $_GET['email']);

        $stmt->execute();
        $_SESSION['msg'] = "Пользователь успешно добавлен";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления пользователя: " . $error->getMessage();
    }
    // Перенаправление на главную страницу приложения
    header('Location: http://webprogramming');
    exit( );