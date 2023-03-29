<?php
    $host = 'localhost'; //HOST NAME.
    $db_name = 'univ'; //Database Name
    $db_username = 'root'; //Database Username
    $db_password = ''; //Database Password

    try
    {
        $conn = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
       echo "Connection failed : ". $e->getMessage();
       die();
    }
?>

