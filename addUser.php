<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO user(firstName, lastName, md5Password, phoneNumber, email) 
                          VALUES(:firstName, :lastName, :md5Password, :phoneNumber, :email)';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':firstName', $_GET['firstName']);
        $stmt->bindValue(':lastName', $_GET['lastName']);
        $stmt->bindValue(':md5Password', $_GET['md5Password']);
        $stmt->bindValue(':phoneNumber', $_GET['phoneNumber']);
        $stmt->bindValue(':email', $_GET['email']);

        $stmt->execute();
        echo ("Пользователь успешно добавлен");
    } catch (PDOexception $error) {
        echo ("Ошибка добавления пользователя: " . $error->getMessage());
    }
    // Перенаправление на главную страницу приложения
    header('Location: http://webprogramming');
    exit( );