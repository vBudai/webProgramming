<h1>Пользователи:</h1>
<table border=''1'>
<?php
    $result = $conn->query("SELECT * FROM user");

    while($row = $result->fetch()){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>
              <td>'.$row['firstName'].' '.$row['lastName'].'</td>
              <td>'.$row['isAdmin'].'</td>
              <td>'.$row['md5Password'].'</td>
              <td>'.$row['phoneNumber'].'</td>
              <td>'.$row['email'].'</td>';
        echo '<td><a href=user/deleteUser.php?id='.$row['id'].'>Удалить</a></td>';
        echo '</tr>';
    }
?>
</table>