<?php
session_start();
include "../../src/DB/db_conn.php";
if (
    isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['email']) &&
    isset($_FILES['fphoto'])
) {
    $_SESSION['u_fname'] = trim(strtoupper($_POST['fname']));
    $_SESSION['u_lname'] = trim(strtoupper($_POST['lname']));
    $_SESSION['u_email'] = trim($_POST['email']);
    $_SESSION['fphoto'] = $_SESSION['u_id'] . "profile.jpg";

    global $errorvide;
    $errorvide = 0;
    $inputs = array($_SESSION['u_fname'], $_SESSION['u_lname'], $_SESSION['u_email']);
    foreach ($inputs as  $value) {
        if ($value === "") {
            $errorvide = 1;
            header("Location: ../profile.php?error");
        }
    }

    if ($errorvide !== 1) {
        // Profile
        $fileSize = $_FILES["fphoto"]["size"];
        $tmpName = $_FILES["fphoto"]["tmp_name"];

        if ($fileSize > 5000000) {
            header("Location: ../form.php?errorSIZE");
        } else {
            move_uploaded_file($tmpName, '../../src/admin/profile/'.$_SESSION['fphoto']);
        }

        //Tabel User
        $stm = $conn->prepare("SELECT id FROM users WHERE id=?");
        $stm->execute([$_SESSION['u_id']]);
        if ($stm->rowCount() === 0) {
            $sqlinsert = "INSERT INTO users (fname, lname, email) VALUES(?,?,?)";
            $stmt = $conn->prepare($sqlinsert);
            $stmt->execute([$_SESSION['u_fname'],$_SESSION['u_name'],$_SESSION['u_email']]);
        } else {
            $sqlupdate = ("UPDATE users SET fname=?, lname=?, email=? WHERE id=?");
            $stmt = $conn->prepare($sqlupdate);
            $stmt->execute([$_SESSION['u_fname'],$_SESSION['u_lname'],$_SESSION['u_email'],$_SESSION['u_id']]);
        }

        //Tabel admin
        $stm = $conn->prepare("SELECT id FROM admins WHERE id=?");
        $stm->execute([$_SESSION['u_id']]);
        if ($stm->rowCount() === 0) {
            $sqlinsert = "INSERT INTO admins (fphoto) VALUES(?)";
            $stmt = $conn->prepare($sqlinsert);
            $stmt->execute([$_SESSION['fphoto']]);
        } else {
            $sqlupdate = ("UPDATE admins SET fphoto=? WHERE id=?");
            $stmt = $conn->prepare($sqlupdate);
            $stmt->execute([$_SESSION['fphoto'], $_SESSION['u_id']]);
        }
        header("Location: ../profile.php");
    }
} else {
    header("Location: ../profile.php");
    exit;
}
