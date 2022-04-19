<?php
    require __DIR__."./../data/dbconnect.php";
    try {
        $id_m = $_GET['m'];
        $id_ad = $_GET['ad'];
        $sql = "DELETE FROM message WHERE id=$id_m";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id_m);
        $stmt->execute();
        $_SESSION['msg'] = "Сообщение удалено";
    } catch (PDOException $error) {
        $_SESSION['msg'] = "Ошибка удаления сообщения: " . $error->getMessage();
    }
    header("Location: http://webprogramming/ad/ad.php?id=$id_ad");
    exit();
