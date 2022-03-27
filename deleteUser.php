<?php
    require "dbconnect.php";
    try{
        $sql = 'DELETE FROM user WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        echo("Пользователь усепшно удалён");
    }
    catch (PDOException $error){
        echo ("Ошибка удаления пользователя: ".$error->getMessage());
    }
    header('Location: http://webprogramming');
    exit( );