<?php
    //require "menu.php";
    if(!isset($_SESSION['login'])){
        echo "<h2>Вход:</h2>";
        echo "<form method='post'>";
            echo "<input type='text' placeholder='Номер телефона или почта' name='login' /><br>";
            echo "<input type='password' placeholder='Пароль' name='password'/><br>";
            echo "<input type='submit' value='Войти'/>";
        echo "</form>";

        echo "<h2>Регистрация:</h2>";
        echo "<form method='get' action='user/registrationUser.php'>";
            echo "<input placeholder='Имя' type='text' name='firstName'><br/>";
            echo "<input placeholder='Фамилия' type='text' name='lastName'><br/>";
            echo "<input placeholder='Пароль' type='password' name='md5Password'><br/>";
            echo "<input placeholder='Номер телефона' type='text' name='phoneNumber'><br/>";
            echo "<input placeholder='Почта' type='text' name='email'><br/>";
            echo "<input type='submit' value='Зарегистрироваться'>";
        echo "</form>";
    }
    else{
        echo "Привет, " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "<br>";
        echo "<a href='?logout=1'>Выйти из аккаунта</a><br>";
    }


