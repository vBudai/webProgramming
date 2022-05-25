<?php
    require "../data/dbconnect.php";

    //var_dump($_FILES);

    if (isset($_FILES['filename']['tmp_name'])&&$file = fopen($_FILES['filename']['tmp_name'], 'r+')){
        //получение расширения
        $ext = explode('.', $_FILES["filename"]["name"]);
        $ext = $ext[count($ext) - 1];
        $filename = 'file' . rand(100000, 999999) . '.' . $ext;

        $resource = Container::getFileUploader()->store($file, $filename);
        $picture_url = $resource['ObjectURL'];
    }
    else
    {
        $picture_url = "../img/nothing.jpg";
    }
    $id_user = $_SESSION['id'];
    $title = $_POST['title'];
    $info = $_POST['information'];
    $price = $_POST['price'];
    $date = date('d M Y');
    if(trim($title)!=''&&trim($info)!=''&&$price>=0){
        try {
            $sql = 'INSERT INTO ad (id_user, title, information, img, creationTime, price)
                       VALUES (:id_user, :title, :info, :img, :creationTime, :price)';
            $query = $conn->prepare($sql);
            $query->execute(['id_user'=>$id_user, 'title'=>$title, 'info'=>$info, 'img'=>$picture_url, 'creationTime'=>$date, 'price'=>$price]);
            $_SESSION['msg'] = "Объявление размещено";
        } catch (PDOexception $error) {
            $_SESSION['msg'] = "Ошибка создания объявления: " . $error->getMessage();
        }

        try{
            $idAd = $conn->query("SELECT MAX(id) as max_id FROM ad WHERE id_user=$id_user");
            $idAd_row = $idAd->fetch(PDO::FETCH_ASSOC);
            $idAd_max = $idAd_row['max_id'];
        }
        catch (PDOException $error){
            $_SESSION['msg'] = "Ошибка перехода по объялвению: " . $error->getMessage();
            header("Location: http://webprogramming/index.php?page=myAds");
            exit();
        }
        //Перенаправление по новосозданному объявлению
        header("Location: http://webprogramming/ad.php?id=$idAd_max");
        exit();

    }
    $_SESSION['msg'] = 'Неправильный ввод';
    header("Location: http://webprogramming/index.php?page=creationAd");
    exit();