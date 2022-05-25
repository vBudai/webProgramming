<?php
    require __DIR__."./../data/dbconnect.php";
    try {
        $id_m = $_GET['m'];
        $id_ad = $_GET['ad'];
        $sql = "DELETE FROM message WHERE id=:id";
        $query = $conn->prepare($sql);
        $query->execute(['id'=>$id_m]);
        $_SESSION['msg'] = "Сообщение удалено";
    } catch (PDOException $error) {
        $_SESSION['msg'] = "Ошибка удаления сообщения: " . $error->getMessage();
    }
    header("Location: http://webprogramming/ad.php?id=$id_ad");
    exit();
