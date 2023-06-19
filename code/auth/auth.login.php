<?php
session_start();
include '../src/DB/db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email)) {
        header("Location: ../index.php?error=L'e-mail est requis");
    } else if (empty($password)) {
        header("Location: ../index.php?error=Mot de passe requisd&email=$email");
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();


            $u_id = $user['id'];
            $u_fname = $user['fname'];
            $u_lname = $user['lname'];
            $u_email = $user['email'];
            $u_pwd = $user['pwd'];
            $u_role = $user['role'];

            if ($email === $u_email) {
                if(password_verify($password,$u_pwd))
                {
                    $_SESSION['u_id'] = $u_id;
                    $_SESSION['u_fname'] = $u_fname;
                    $_SESSION['u_lname'] = $u_lname;
                    $_SESSION['u_email'] = $u_email;


                    $stmt = $conn->prepare("SELECT atitle, atext, alink FROM announce");
                    $stmt->execute(); 
                    $announce = $stmt->fetch();
                    $_SESSION['atitle'] = $announce['atitle'];
                    $_SESSION['atext']  = $announce['atext'];
                    $_SESSION['alink']  = $announce['alink'];


                    if($u_role=="admin"){
                        $_SESSION['role'] = "admin";
                        $_SESSION['fphoto'] = "";
                        $stmt = $conn->prepare("SELECT fphoto FROM admins WHERE id=?");
                        $stmt->execute([$u_id]); 
                        $user = $stmt->fetch();
                        $_SESSION['fphoto'] = $user['fphoto'];
                        $_SESSION['ne'] = 50;
                        $_SESSION['choix'] = "GI";


                        header("Location: ../home/admin.php");
                    }else{
                    $_SESSION['role'] = "student";
                    $_SESSION['u_tele'] = "";
                    $_SESSION['u_cin'] = "";
                    $_SESSION['u_dn'] = "";
                    $_SESSION['u_adresse'] ="";
                    $_SESSION['u_country'] = "";
                    $_SESSION['u_city'] = "";
                    $_SESSION['u_cne'] = "";
                    $_SESSION['u_bactype'] = "";
                    $_SESSION['u_bacregion'] = "";
                    $_SESSION['u_bacprovince'] = "";
                    $_SESSION['u_bacyear'] = "";
                    $_SESSION['u_notereg'] = "";
                    $_SESSION['u_notenat'] = "";
                    $_SESSION['u_notemoy'] = "";
                    $_SESSION['fphoto'] = "";
                    $_SESSION['fcin'] = "";
                    $_SESSION['fbac'] = "";
                    $_SESSION['fnotes'] = "";
                    $_SESSION['u_choix'] = "";

                    $stm = $conn->prepare("SELECT id FROM students WHERE id=?");
                    $stm->execute([$_SESSION['u_id']]);
                    if ($stm->rowCount() === 0) {
                        header("Location: ../home/index.php");
                    }
                    else{
                        $stmt = $conn->prepare("SELECT tele, cin, dn, adresse, country, city, cne, bactype, bacregion, bacprovince, bacyear, notereg, notenat, notemoy, fphoto, fcin, fbac, fnotes, choix FROM students WHERE id=?");
                        $stmt->execute([$u_id]); 
                        $user = $stmt->fetchAll();
                        foreach ($user as $row) {
                            $_SESSION['u_tele'] = $row['tele'];
                            $_SESSION['u_cin'] = $row['cin'];
                            $_SESSION['u_dn'] = $row['dn'];
                            $_SESSION['u_adresse'] = $row['adresse'];
                            $_SESSION['u_country'] = $row['country'];
                            $_SESSION['u_city'] = $row['city'];
                            $_SESSION['u_cne'] = $row['cne'];
                            $_SESSION['u_bactype'] = $row['bactype'];
                            $_SESSION['u_bacregion'] = $row['bacregion'];
                            $_SESSION['u_bacprovince'] = $row['bacprovince'];
                            $_SESSION['u_bacyear'] = $row['bacyear'];
                            $_SESSION['u_notereg'] = $row['notereg'];
                            $_SESSION['u_notenat'] = $row['notenat'];
                            $_SESSION['u_notemoy'] = $row['notemoy'];
                            $_SESSION['fphoto'] = $row['fphoto'];
                            $_SESSION['fcin'] = $row['fcin'];
                            $_SESSION['fbac'] = $row['fbac'];
                            $_SESSION['fnotes'] = $row['fnotes'];
                            $_SESSION['u_choix'] = $row['u_choix'];
                        }
                        header("Location: ../home/index.php");
                    }
                }
                } else {
                header("Location: ../index.php?error=Identifiant ou mot de passe incorrect&email=$email");
                }
            } 
            else {
                header("Location: ../index.php?error=Identifiant ou mot de passe incorrect&email=$email");
            }
        } else {
            header("Location: ../index.php?error=Identifiant ou mot de passe incorrect&email=$email");
        }
    }
} else{
    header("Location: ../index.php");
}
?>