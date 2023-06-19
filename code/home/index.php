<?php
session_start();
include("../src/DB/db_conn.php");

if (isset($_SESSION['u_fname']) && $_SESSION['role'] == "student") {

    $stmt = $conn->prepare("SELECT atitle, atext, alink FROM announce");
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        $_SESSION['atitle'] = "";
        $_SESSION['atext']  = "";
        $_SESSION['alink']  = "";
    }else{

    $announce = $stmt->fetch();
    $_SESSION['atitle'] = $announce['atitle'];
    $_SESSION['atext']  = $announce['atext'];
    $_SESSION['alink']  = $announce['alink'];
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        <link rel="stylesheet" href="../src/style/style.css">
        <title>Document</title>
    </head>

    <body class="flex h-screen bg-gray-900 w-full">


        <?php require './parts/aside.php' ?>

        
        <div class="px-4 py-4 my-10 w-1/2 mx-auto rounded-lg shadow-md bg-gray-800 flex flex-col align-middle">
            <div class="px-10 n">
                <h1 class="mb-12 mt-5 text-4xl font-extrabold tracking-tight leading-none text-red-500 md:text-4xl lg:text-4xl ">
                <?php if ($_SESSION['atitle'] !== "") {
                     echo $_SESSION['atitle'];
                     }?>
                </h1>
                <p class="mb-10 text-lg font-normal    text-gray-400">
                <?php if ($_SESSION['atext'] !== "") {
                     echo $_SESSION['atext'];}?>
                </p>
                <a href="<?php if ($_SESSION['alink'] !== "") {
                     echo $_SESSION['alink'];}?>" 
                   class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Plus d'information
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

    </body>

    </html>

<?php
} else {
    header("Location: ../index.php");
}
?>