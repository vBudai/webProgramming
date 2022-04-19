<h1>Ваши объявления:</h1>
<table border="1">


<?php
    $userId = $_SESSION['id'];
    $result=$conn->query("SELECT *
                                   FROM ad
                                   WHERE ad.id_user=$userId");
    while($row = $result->fetch()){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>
              <td>'.$row['title'].'</td>
              <td>'.$row['information'].'</td>
              <td>'.$row['img'].'</td>
              <td>'.$row['creationTime'].'</td>
              <td>'.$row['price'].'</td>';
        echo '<td><a href="ad/ad.php?id='.$row['id'].'">подробнее...</a></td>';
        echo '<td><a href="ad/deleteAd.php?id='.$row['id'].'">Удалить</a></td>';
        echo '</tr>';
    }
?>
</table>

<h2>Создание объявления:</h2>
    <form method="get" action="ad/creationAd.php">
        <input type="text" name="title" placeholder="Название объявления"><br>
        <textarea type="text" name="information" placeholder="Описание"></textarea><br>
        <input type="img" name="img" placeholder="Изображение"><br>
        <input type="price" name="price" placeholder="Цена"><br>
        <input type="submit" value="Создать">
        <br>
    </form>
