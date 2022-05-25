<?php
    require "../data/dbconnect.php";
    $id_ad = $_GET['id'];
    try {
        //Удаление связанных сообщений
        $sql_message = "DELETE FROM message WHERE id_ad=:id";
        $query1 = $conn->prepare($sql_message);
        $query1->execute(['id'=>$id_ad]);

        //Удаление изображения
        $result = $conn->query("SELECT img FROM ad WHERE id=$id_ad");
        $row = $result->fetch();
        try {
            $resource = Container::getFileUploader()->delete($row['img']);
        } catch (S3Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
        }

        //Удаление объявления
        $sql_ad = "DELETE FROM ad WHERE id=:id";
        $query2 = $conn->prepare($sql_ad);
        $query2->execute(['id'=>$id_ad]);
        $_SESSION['msg'] = "Объявление удалено";
    } catch (PDOException $error) {
        $_SESSION['msg'] = "Ошибка удаления объявления: " . $error->getMessage();
        echo $_SESSION['msg'];
    }
    header('Location: http://webprogramming/index.php?page=myAds');
    exit();