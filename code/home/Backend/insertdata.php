<?php
session_start();
include "../../src/DB/db_conn.php";



if (
    isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['email']) &&
    isset($_POST['cin']) &&
    isset($_POST['dn']) &&
    isset($_POST['country']) &&
    isset($_POST['city']) &&
    isset($_POST['cne']) &&
    isset($_POST['bactype']) &&
    isset($_POST['bacregion']) &&
    isset($_POST['bacprovince']) &&
    isset($_POST['bacyear']) &&
    isset($_POST['notereg']) &&
    isset($_POST['notenat']) &&
    isset($_POST['notemoy']) &&
    isset($_FILES['fphoto']) &&
    isset($_FILES['fcin']) &&
    isset($_FILES['fbac']) &&
    isset($_FILES['fnotes']) &&
    isset($_POST['choix'])
) {
    $_SESSION['u_fname'] = trim(strtoupper($_POST['fname']));
    $_SESSION['u_lname'] = trim(strtoupper($_POST['lname']));
    $_SESSION['u_email'] = trim($_POST['email']);
    $_SESSION['u_tele'] = trim($_POST['tele']);
    $_SESSION['u_cin'] = trim(strtoupper($_POST['cin']));
    $_SESSION['u_dn'] = $_POST['dn'];
    $_SESSION['u_adresse'] = strtoupper($_POST['adresse']);
    $_SESSION['u_country'] = $_POST['country'];
    $_SESSION['u_city'] = $_POST['city'];
    $_SESSION['u_cne'] = trim(strtoupper($_POST['cne']));
    $_SESSION['u_bactype'] = $_POST['bactype'];
    $_SESSION['u_bacregion'] = $_POST['bacregion'];
    $_SESSION['u_bacprovince'] = $_POST['bacprovince'];
    $_SESSION['u_bacyear'] = $_POST['bacyear'];
    $_SESSION['u_notereg'] =  $_POST['notereg'];
    $_SESSION['u_notenat'] =  $_POST['notenat'];
    $_SESSION['u_notemoy'] =  $_POST['notemoy'];
    $_SESSION['fphoto'] = $_SESSION['u_id'] . "profile.jpg";
    $_SESSION['fcin'] = $_SESSION['u_id'] . "cin.pdf";
    $_SESSION['fbac'] = $_SESSION['u_id'] . "bac.pdf";
    $_SESSION['fnotes'] = $_SESSION['u_id'] . "notes.pdf";
    $_SESSION['u_choix'] = $_POST['choix'];

    global $errorvide;
    $errorvide = 0;
    $inputs = array($_SESSION['u_fname'], $_SESSION['u_lname'], $_SESSION['u_email'], $_SESSION['u_cin'], $_SESSION['u_dn'], $_SESSION['u_cne'], $_SESSION['u_bactype'], $_SESSION['u_notereg'], $_SESSION['u_notenat'], $_SESSION['u_notemoy'], $_SESSION['u_choix']);
    foreach ($inputs as  $value) {
        if ($value === "") {
            $errorvide = 1;
            header("Location: ../form.php?error");
        }
    }

    if ($errorvide !== 1) {
        // Profile
        $fileSize = $_FILES["fphoto"]["size"];
        $tmpName = $_FILES["fphoto"]["tmp_name"];

        if ($fileSize > 5000000) {
            header("Location: ../form.php?errorSIZE");
        } else {
            move_uploaded_file($tmpName, '../../src/Users/profile/' . $_SESSION['u_id'] . "profile.jpg");
        }
        //cin 
        $fileSize = $_FILES["fcin"]["size"];
        $tmpName = $_FILES["fcin"]["tmp_name"];
        if ($fileSize > 5000000) {
            header("Location: ../form.php?errorSIZE");
        } else {
            move_uploaded_file($tmpName, '../../src/Users/documents/' . $_SESSION['u_id'] . "cin.pdf");
        }
        //bac 
        $fileSize = $_FILES["fbac"]["size"];
        $tmpName = $_FILES["fbac"]["tmp_name"];
        if ($fileSize > 5000000) {
            header("Location: ../form.php?errorSIZE");
        } else {
            move_uploaded_file($tmpName, '../../src/Users/documents/' . $_SESSION['u_id'] . "bac.pdf");
        }
        //notes 
        $fileSize = $_FILES["fnotes"]["size"];
        $tmpName = $_FILES["fnotes"]["tmp_name"];
        if ($fileSize > 5000000) {
            header("Location: ../form.php?errorSIZE");
        } else {
            move_uploaded_file($tmpName, '../../src/Users/documents/' . $_SESSION['u_id'] . "notes.pdf");
        }

//nacces

        global $nacces;
        $bt = $_SESSION['u_bactype'];
        $choix = $_SESSION['u_choix'];
        $nm = $_SESSION['u_notemoy'];
        if((($bt == "BPC")||($bt == "BSMA")||($bt == "BSMB")||($bt == "BSTE")) && ($choix == "GI")){
            $nacces = $nm * 1;
        }
        else if((($bt == "BSE")||($bt == "BTGC")) && ($choix == "TM")){
            $nacces = $nm * 1;
        }
        else if(($bt == "BSVT") && ($choix == "TIMQ")){
            $nacces = $nm * 1;
        }
        else if(($bt == "BSTM") && ($choix == "GIM")){
            $nacces = $nm * 1;
        }
        else{
            $nacces = $nm * 0.5;
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

//Tabel Students
        $stm = $conn->prepare("SELECT id FROM students WHERE id=?");
        $stm->execute([$_SESSION['u_id']]);
        if ($stm->rowCount() === 0) {
            $sqlinsert = "INSERT INTO students (id, tele, cin, dn, adresse, country, city, cne, bactype, bacregion, bacprovince, bacyear, notereg, notenat, notemoy, fphoto, fcin, fbac, fnotes, choix, nacces) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sqlinsert);
            $stmt->execute([$_SESSION['u_id'], $_SESSION['u_tele'], $_SESSION['u_cin'], $_SESSION['u_dn'], $_SESSION['u_adresse'], $_SESSION['u_country'], $_SESSION['u_city'], $_SESSION['u_cne'], $_SESSION['u_bactype'], $_SESSION['u_bacregion'], $_SESSION['u_bacprovince'], $_SESSION['u_bacyear'], $_SESSION['u_notereg'], $_SESSION['u_notenat'], $_SESSION['u_notemoy'], $_SESSION['fphoto'], $_SESSION['fcin'], $_SESSION['fbac'], $_SESSION['fnotes'], $_SESSION['u_choix'],$nacces]);
        } else {
            $sqlupdate = ("UPDATE students SET tele=?, cin=?, dn=?, adresse=?, country=?, city=?, cne=?, bactype=?, bacregion=?, bacprovince=?, bacyear=?, notereg=?, notenat=?, notemoy=?, fphoto=?, fcin=?, fbac=?, fnotes=?, choix=?, nacces=? WHERE id=?");
            $stmt = $conn->prepare($sqlupdate);
            $stmt->execute([$_SESSION['u_tele'], $_SESSION['u_cin'], $_SESSION['u_dn'], $_SESSION['u_adresse'], $_SESSION['u_country'], $_SESSION['u_city'], $_SESSION['u_cne'], $_SESSION['u_bactype'], $_SESSION['u_bacregion'], $_SESSION['u_bacprovince'], $_SESSION['u_bacyear'], $_SESSION['u_notereg'], $_SESSION['u_notenat'], $_SESSION['u_notemoy'], $_SESSION['fphoto'], $_SESSION['fcin'], $_SESSION['fbac'], $_SESSION['fnotes'], $_SESSION['u_choix'], $nacces, $_SESSION['u_id']]);
        }
        header("Location: ../index.php");
    }
} else {
    header("Location: ../form.php");
    exit;
}
