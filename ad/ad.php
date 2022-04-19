<?php
    require __DIR__."./../menu.php";
    require __DIR__."./../data/dbconnect.php";

    //Информация об объявлении
    $id_ad = $_GET['id'];
    $adInfo=$conn->query("SELECT *, ad.id as id_ad
                                   FROM ad, user
                                   WHERE ad.id=$id_ad AND ad.id_user=user.id");
    $adRow = $adInfo->fetch();
    echo '<table border="1">';
    echo '<tr>';
    echo '<td>'.$adRow['id_ad'].'</td>
          <td>'.$adRow['firstName'].' '.$adRow['lastName'].'</td>
          <td>'.$adRow['title'].'</td>
          <td>'.$adRow['information'].'</td>
          <td>'.$adRow['img'].'</td>
          <td>'.$adRow['creationTime'].'</td>
          <td>'.$adRow['price'].'</td>';
    echo '</tr>';
    echo '</table>';

    //Инофрмация о сообщениях
    $messageInfo = $conn->query("SELECT *, message.id as id FROM message, user WHERE message.id_ad=$id_ad AND message.id_user=user.id ORDER BY message.id");
    echo '<table border="1">';
    while ($messageRow = $messageInfo->fetch()) {
        echo '<tr>';
        echo '<td>'.$messageRow['id'].'</td>
              <td>'.$messageRow['firstName'].' '.$messageRow['firstName'].'</td>
              <td>'.$messageRow['messageText'].'</td>
              <td>'.$messageRow['sendTime'].'</td>';
        if($messageRow['id_user'] == $_SESSION['id'] or $adRow['id_user'] == $_SESSION['id']) echo '<td><a href="./../message/deleteMessage.php?m='.$messageRow['id'].'&&ad='.$id_ad.'">Удалить</a></td>';
        echo '</tr>';
    }
echo '</table>';


    echo "<h3>Написать сообщение</h3>";
    echo "<form method='post' action='./../message/creationMessage.php?id_ad=$id_ad'>";
        echo "<input type='text' name='messageText' placeholder='Введите сообщение' >";
        echo "<input type='submit' value='Отправить'>";
    echo "</form>";
