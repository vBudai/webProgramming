<div class="container-ads">
    <h4>Все объявления:</h4>
    <div class="ads__grid">
    <?php
    $result=$conn->query("SELECT id, title, price, creationTime, img FROM ad");
    while($ad = $result->fetch()){
        ?>

        <a class="ads" href="ad.php?id=<?php echo $ad['id'] ?>">
            <img class="ads__img" src="<?php echo $ad['img'] ?>">
            <h6 class="text-start ads__title"><?php echo $ad['title'] ?></h6>
            <div class="d-flex justify-content-between" style="margin: 0px 10px -10px">
                <p style="color:#A3A3A3"><?php echo $ad['creationTime'] ?></p>
                <p class="fw-bold"><?php echo $ad['price'] ?> ₽</p>
            </div>
        </a>

    <?php } ?> <!--Конец цикла-->
    </div>
</div>
<div class="push"></div>