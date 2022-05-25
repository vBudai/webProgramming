<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" >
    <title>Частные объявления</title>
</head>

<body>
    <div class="position-sticky bg-dark">
        <div class="container__header">
            <nav class="navbar navbar-dark">
                <!-- Поиск -->
                <form class="d-flex" action="search.php" method="post">
                    <input class="form-control mr-2 search-border" placeholder="Поиск..." name="searchedAd">
                </form>


                <!-- Меню -->
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link underline" href="./../index.php?page=allAds">Объявления</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link underline" href="./../index.php?page=myAds">Мои объявления</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link underline" href="./../index.php?page=profile">Профиль</a>
                    </li>
                    <?php if(isset($_SESSION['login'])):?>
                        <li class="nav-item "><a class="nav-link underline" href="?logout=1">Выйти</a></li>
                    <?php else:?>
                        <li class="nav-item"><a class="nav-link underline" href="./../index.php?page=profile">Войти</a></li>
                    <?php endif?>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>
