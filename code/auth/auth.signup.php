<?php 

if(isset($_POST['fname']) && 
   isset($_POST['lname']) && 
   isset($_POST['email']) &&
   isset($_POST['password'])  ){

    include "../src/DB/db_conn.php";

    $fname = strtoupper($_POST['fname']);
    $lname = strtoupper($_POST['lname']);
    $email = $_POST['email'];
    // hashing the password
    $passwordc = $_POST['password'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    if (empty($fname)) {
    	$er = "Le prénom est requis";
    	header("Location: ../signup.php?error=$er");
	    exit;
    }else if(empty($lname)){
    	$er = "Le nom est requis";
        $data = "fname=".$fname;
    	header("Location: ../signup.php?error=$er&$data");
	    exit;
    }else if(empty($email)){
        $er = "E-mail est requis";
        $data = "fname=".$fname."&lname=".$lname;
    	header("Location: ../signup.php?error=$er&$data");
	    exit;
    }else if(empty($passwordc)){
    	$er = "Mot de passe requis";
        $data = "fname=".$fname."&lname=".$lname."&email=".$email;
    	header("Location: ../signup.php?error=$er&$data");
	    exit;
    }
    else {
        $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() !== 0) {
            $er = "Email déjà utilisé";
            $data = "fname=".$fname."&lname=".$lname;
            header("Location: ../signup.php?error=$er&$data");
        }else{
    	$sql = "INSERT INTO users (fname, lname, email, pwd, `role`) VALUES(?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $lname, $email, $password, "student"]);

    	header("Location: ../index.php?success=Votre compte a été créé avec succès");
	    exit;
        }
    }


}else {
	header("Location: ../signup.php");
	exit;
}