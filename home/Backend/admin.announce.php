<?php
session_start();
include "../../src/DB/db_conn.php";
if (
    isset($_POST['title']) &&
    isset($_POST['text']) &&
    isset($_POST['link'])
) {
    $_SESSION['atitle'] = trim($_POST['title']);
    $_SESSION['atext'] = trim($_POST['text']);
    $_SESSION['alink'] = trim($_POST['link']);

    $stmt = $conn->prepare("SELECT atitle, atext, alink FROM announce");
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        $sqlinsert = "INSERT INTO announce (atitle, atext, alink) VALUES(?,?,?)";
        $stmt = $conn->prepare($sqlinsert);
        $stmt->execute([$_SESSION['atitle'], $_SESSION['atext'], $_SESSION['alink']]);
    } else {
        $sqlupdate = ("UPDATE announce SET atitle=?, atext=?, alink=? ");
        $stmt = $conn->prepare($sqlupdate);
        $stmt->execute([$_SESSION['atitle'], $_SESSION['atext'], $_SESSION['alink']]);
    }
    header("Location: ../profile.php");

} else {
    header("Location: ../profile.php");
    exit;
}
