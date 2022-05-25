<?php
    require __DIR__ . "/header.php";
    require __DIR__ . "/data/dbconnect.php";

    //Информация об объявлении
    $id_ad = $_GET['id'];
    $adInfo=$conn->query("SELECT *, ad.id as id_ad
                                   FROM ad, user
                                   WHERE ad.id=$id_ad AND ad.id_user=user.id");
    $adRow = $adInfo->fetch();
?>


<div class="ad__area">

    <div class="row">
        <!--Информация об объявлении-->
        <div class="col text-start">
            <div class="ad__information_container">

                <h2 class="ad__h2">
                    <?php echo $adRow['title']?>
                </h2>

                <img class="ad__img" src="<?php echo $adRow['img'] ?>" alt="<?php echo $adRow['title']?>">

                <div class="ad__timeAndPrice">
                    <p class="ad__creationTime"><?php echo $adRow['creationTime']?></p>
                    <p class="ad__price"><?php echo $adRow['price']?> ₽</p>
                </div>

                <p class="ad__information"><?php echo $adRow['information']?></p>

            </div>
        </div>

        <!--Информация о пользователе-->
        <div class="ad__userInfo col text-end">

            <h2 class="ad__h2"><?php echo $adRow['firstName']." ".$adRow['lastName']?></h2>

            <button class="userInfo__contacts"><?php echo$adRow['phoneNumber']?></button>
            <br>
            <button class="userInfo__contacts"><?php echo$adRow['email']?></button>
            <br>

            <form method='post' action='message/creationMessage.php?id_ad=<?php echo $id_ad ?>'>
                <textarea  class="ad__textMessage" name="messageText" placeholder="Добавить сообщение..."></textarea><br>
                <input class="ad__addMessage" type='submit' value='Отправить'>
            </form>

            <p class="ad__messages__header">Обсуждение:</p>

            <div class="ad__messages">
                <?php   $messageInfo = $conn->query("SELECT *, message.id as id FROM message, user WHERE message.id_ad=$id_ad AND message.id_user=user.id ORDER BY message.id");
                        while ($messageRow = $messageInfo->fetch()) { ?>
                    <div class="message">
                        <div class="message__info">
                            <p class="message__userName"><?php echo $messageRow['firstName'].' '.$messageRow['firstName']?></p>
                            <p class="message__time"><?php echo $messageRow['sendTime']?>
                            <?php if($messageRow['id_user'] == $_SESSION['id'] or $adRow['id_user'] == $_SESSION['id']):?>
                                <a class="message__delete" href="./../message/deleteMessage.php?m=<?php echo$messageRow['id']?>&&ad=<?php echo$id_ad?>">X</a>
                            <?php endif;?>
                            </p>
                        </div>
                        <p class="message__text"><?php echo $messageRow['messageText']?></p>
                    </div>
                <?php }?>
            </div>

        </div>
    </div>
</div>
