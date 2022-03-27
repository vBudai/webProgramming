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
        echo '</tr>';
    }
?>
</table>

<h2>Добавление пользователя:</h2>
<form method="get" action="addUser.php">
    <input placeholder="Имя" type="text" name="firstName">
    <input placeholder="Фамилия" type="text" name="lastName">
    <input placeholder="Пароль" type="password" name="md5Password">
    <input placeholder="Номер телефона" type="text" name="phoneNumber">
    <input placeholder="Почта" type="text" name="email">
    <input type="submit" value="Добавить">
</form>

<h2>Удаление пользователя:</h2>
<form method="get" action="deleteUser.php">
    <input placeholder="ID пользователя" type="text" name="id">
    <input type="submit" value="Удалить">
</form>