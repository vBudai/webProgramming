<?php
    require __DIR__."./../data/dbconnect.php";
    try {
        $sql = 'DELETE FROM ad WHERE id=:id';
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Объявление удалено";
    } catch (PDOException $error) {
        $_SESSION['msg'] = "Ошибка удаления объявления: " . $error->getMessage();
    }
    header('Location: http://webprogramming/index.php?page=myAds');
    exit();