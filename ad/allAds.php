<table border="1">

<?php
    $result=$conn->query("SELECT * FROM ad");
    while($row = $result->fetch()){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>
              <td>'.$row['title'].'</td>
              <td>'.$row['information'].'</td>
              <td>'.$row['img'].'</td>
              <td>'.$row['creationTime'].'</td>
              <td>'.$row['price'].'</td>
              <td><a href="ad/ad.php?id='.$row['id'].'">подробнее...</a></td>';
        echo '</tr>';
    }
