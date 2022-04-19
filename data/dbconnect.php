<?php
    session_start();
    require __DIR__.'./../vendor/autoload.php';
    use Dotenv\Dotenv;
    if(file_exists(__DIR__ . "/.env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

    //Подключение к бд
    try {
        $conn = new PDO("mysql:host=$_ENV[dbhost];dbname=$_ENV[dbname]", $_ENV[dbuser], $_ENV[dbpassword]);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch (PDOException $e){
        $_SESSION['msg'] = "Connection failed: " . $e->getMessage();
    }