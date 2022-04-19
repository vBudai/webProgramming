<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require "data/dbconnect.php";
    require "menu.php";
    require "auth.php";

    //require "user/user.php";

    switch ($_GET['page']){
        case 'profile':
            require "profile.php";
            break;
        case 'myAds':
            if(isset($_SESSION['id']))
                require "ad/userAds.php";
            else
                require "profile.php";
            break;
        case 'allAds':
            require "ad/allAds.php";
            break;
    }


    $_SESSION['msg'] = '';