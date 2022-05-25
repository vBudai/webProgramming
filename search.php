<?php
    require_once 'data/dbconnect.php';
    require_once 'header.php';


    if(isset($_POST['searchedAd'])):
        $title = $_POST['searchedAd'];
        $title = trim(strip_tags(stripslashes(htmlspecialchars($title))));
?>




<div class="container-ads">
    <h4>Все объявления по запросу <?php echo $title?>:</h4>
    <div class="ads__grid">
        <?php
        $result=$conn->query("SELECT id, title, price, creationTime, img FROM ad WHERE title LIKE '%$title%'");
        $flag=false;
        while($ad = $result->fetch()){
            $flag = true;
            ?>

            <a class="ads" href="ad.php?id=<?php echo $ad['id'] ?>">
                <img class="ads__img" src="https://bipbap.ru/wp-content/uploads/2017/04/0_7c779_5df17311_orig.jpg">
                <h6 class="text-start ads__title"><?php echo $ad['title'] ?></h6>
                <div class="d-flex justify-content-between" style="margin: 0px 10px -10px">
                    <p style="color:#A3A3A3"><?php echo $ad['creationTime'] ?></p>
                    <p class="fw-bold"><?php echo $ad['price'] ?> ₽</p>
                </div>
            </a>

        <?php }
        if($flag==false) echo '<h6>Нема такого ¯\_(ツ)_/¯</h6>';
        ?> <!--Конец цикла-->
    </div>
</div>
    <div class="push">

    </div>
    <?php
    require_once 'footer.php';

    else:
        $_SESSION['msg'] =  'Запрос не введён';
        header("Location: http://webprogramming/index.php?page=myAds");
        exit();
    endif;
    ?>

