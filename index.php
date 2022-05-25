<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require "data/dbconnect.php";
    require_once "header.php";
    require "auth.php";

    if(!isset($_GET['page'])) {
        $_GET['page'] = 'allAds';
    }

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
            require "footer.php";
            break;
        case 'creationAd':
            require "ad/creationAd_form.php";
            break;
    }
    $_SESSION['msg'] = '';
