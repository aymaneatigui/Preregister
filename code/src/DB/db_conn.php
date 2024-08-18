<?php
    $host = getenv('DB_HOST');
    $db_name = 'univ'; //Database Name
    $db_username = 'root'; //Database Username
    $db_password = getenv('DB_PASSWORD'); //Database Password
    $port = '5432'; //Database Port
    $db_url = getenv('DATABASE_URL');
    try
    {
        $conn = new PDO($db_url);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
       echo "Connection failed : ". $e->getMessage();
       die();
    }
?>

