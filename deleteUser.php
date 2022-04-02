<?php
    require "dbconnect.php";
    try{
        $sql = 'DELETE FROM user WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Пользователь усепшно удалён";
    }
    catch (PDOException $error){
        $_SESSION['msg'] = "Ошибка удаления пользователя: ".$error->getMessage();
    }
    header('Location: http://webprogramming');
    exit( );