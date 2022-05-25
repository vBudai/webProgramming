<!doctype html>
<html lang="ru">
<head>
    <title>Профиль</title>

    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" >
</head>


<body>
    <!--Вход-->
    <div class="to-center">
        <?php if(!isset($_SESSION['login'])): ?>
        <h3>Здравствуйте, войдите или зарегистрируйтесь:</h3>
        <div class="profile-container">
            <form method="post" action="auth.php">
                <input  class="profile-input" type='text' placeholder='Номер телефона или почта' name='login' /><br>
                <input  class="profile-input" type='password' placeholder='Пароль' name='password'/><br>
                <input  class="input-btn" type='submit' value='Войти'/>
            </form>
        </div>
        <h3>Регистрация:</h3>
        <div class="profile-container">
            <form method='post' action='user/registrationUser.php'>
                <input class="profile-input" placeholder='Имя' type='text' name='firstName'><br/>
                <input class="profile-input" placeholder='Фамилия' type='text' name='lastName'><br/>
                <input class="profile-input" placeholder='Пароль' type='password' name='md5Password'><br/>
                <input class="profile-input" placeholder='Номер телефона' type='text' name='phoneNumber'><br/>
                <input class="profile-input" placeholder='Почта' type='text' name='email'><br/>
                <input class="input-btn" type='submit' value='Зарегистрироваться'>
            </form>
        </div>
        <?php else: ?>
        <h3><?php echo "Привет, " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "!<br>"?></h3>
        <div class="profile-container">
                <h4>Ваш номер телефона:</h4>
                <input class="profile-input info-text" readonly value="<?php echo $_SESSION['phoneNumber']?>"> <br>
                <h4>Ваша почта:</h4>
                <input class="profile-input info-text" readonly value="<?php echo "".$_SESSION['email']?>"><br>
                <a href="?logout=1"><input class="out-btn" type="submit" value="Выйти"></a>
        </div>
        <?php endif ?>
        <?php require_once "msg.php"?>
    </div>
</body>
</html>
