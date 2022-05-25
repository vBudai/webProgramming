<?php
    require __DIR__."./../header.php";
    require __DIR__."./../data/dbconnect.php";

    try {
        $userId = $_SESSION['id'];
        $id_ad = $_GET['id_ad'];
        $sql = 'INSERT INTO message(id_ad, id_user, messageText, sendTime) 
                            VALUES(:id_ad, :id_user, :messageText, :sendTime)';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id_ad', $id_ad);
        $stmt->bindValue(':id_user', $userId);
        $stmt->bindValue(':messageText', $_POST['messageText']);
        $stmt->bindValue(':sendTime', date("G:i"));

        $stmt->execute();

        $_SESSION['msg'] = "Сообщение добавлено";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка написания сообщения: " . $error->getMessage();
    }
    // Перенаправление обратно
    header("Location: http://webprogramming/ad.php?id=$id_ad");
    exit();