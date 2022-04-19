<?php
    require __DIR__."./../data/dbconnect.php";

    try {
        //$time = date('d.M.Y');
        $sql = 'INSERT INTO ad(id_user, title, information, img, creationTime, price) 
                        VALUES(:id_user, :title, :information, :img, :creationTime, :price)';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id_user', $_SESSION['id']);
        $stmt->bindValue(':title', $_GET['title']);
        $stmt->bindValue(':information', $_GET['information']);
        $stmt->bindValue(':img', $_GET['img']);
        $stmt->bindValue(':creationTime', date('d M Y'));
        $stmt->bindValue(':price', $_GET['price']);
        $stmt->execute();

        $_SESSION['msg'] = "Объявление размещено";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка создания объявления: " . $error->getMessage();
    }
    // Перенаправление на главную страницу приложения
    header('Location: http://webprogramming');
    exit();
