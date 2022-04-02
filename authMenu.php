<?php
    if(!isset($_SESSION['login'])){
        echo "<form method='post'>";
            echo "<input type='text' placeholder='Номер телефона' name='login' /><br>";
            echo "<input type='password' placeholder='Пароль' name='password'/><br>";
            echo "<input type='submit' value='Войти'/>";
        echo "</form>";
    }
    else{
        echo "Привет, " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "<br>";
        echo "<a href='?logout=1'>Выйти из аккаунта</a>";
    }

