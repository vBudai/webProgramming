<div class="container-ads">
    <h4>Ваши объявления:</h4>
    <div class="ads__grid">
        <?php
        $userId = $_SESSION['id'];
        $result=$conn->query("SELECT *
                              FROM ad
                              WHERE ad.id_user=$userId");
        ?>

        <!--Создание нового объявления-->
        <a class="ads ad__creation" href="index.php?page=creationAd">
            <p style="padding: 7.5em 0">
                Создать новое объявление<br>+
            </p>
        </a>

        <?php while($ad = $result->fetch()){ ?>
            <a class="ads" href="ad.php?id=<?php echo $ad['id'] ?>">
                <img class="ads__img" src="<?php echo $ad['img'] ?>">
                <h6 class="text-start ads__title"><?php echo $ad['title'] ?></h6>
                <div class="d-flex justify-content-between" style="margin: 0px 10px -10px">
                    <p style="color:#A3A3A3"><?php echo $ad['creationTime'] ?></p>
                    <p class="fw-bold" ><?php echo $ad['price'] ?> ₽</p>
                </div>
                <object>
                    <p class="text-end " style="margin: -15px 10px 5px 0;">
                        <a class="ads__delete" href="ad/deleteAd.php?id=<?php echo$ad['id']?>">Удалить</a>
                    </p>
                </object>
            </a>
        <?php } ?> <!--Конец цикла-->

    </div>
</div>

<div class="push"></div>