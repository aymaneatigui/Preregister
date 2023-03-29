<?php
session_start();

if (isset($_SESSION['u_fname']) && $_SESSION['role'] = "admin") {
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

    <body>

        <div class="flex h-screen bg-gray-900">
            <?php require './parts/aside.php' ?>
            <div class="flex flex-col flex-1">
                <main class="h-full pb-16 overflow-y-auto">
                    <form action="./Backend/admin.insertdata.php" method="POST" enctype="multipart/form-data">
                        <div id="pdf-content">
                            <div class="container px-6 mx-auto grid mt-10">
                                <div class="px-4 py-4 mb-8 rounded-lg shadow-md bg-gray-800">
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                        <!-- Nom -->
                                        <div class="relative z-0 mb-6 w-1/2 group">
                                            <input class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                    <?php if (isset($_GET['error']) && $_SESSION['u_fname'] == "") { ?>
                                                        border-red-600
                                                    <?php } else { ?>
                                                        border-gray-600
                                                    <?php } ?>
                                                    " type="text" name="fname" id="fname" <?php if ($_SESSION['u_fname'] !== "") { ?> value="<?= $_SESSION['u_fname'] ?>" <?php } ?> placeholder=" " />
                                            <label class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" for="fname">
                                                Prenome
                                            </label>
                                        </div>
                                        <!-- Prenome -->
                                        <div class="relative z-0 mb-6 w-1/2 group">
                                            <input class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                    <?php if (isset($_GET['error']) && $_SESSION['u_lname'] == "") { ?>
                                                        border-red-600
                                                    <?php } else { ?>
                                                        border-gray-600
                                                    <?php } ?>
                                                    " type="text" name="lname" id="lname" <?php if ($_SESSION['u_lname'] !== "") { ?> value="<?= $_SESSION['u_lname'] ?>" <?php } ?> placeholder=" " />
                                            <label for="lname" class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Nom
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                        <!-- Email -->
                                        <div class="relative z-0 mb-6 w-3/4 group">
                                            <input class=" block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0 peer
                                                        <?php if (isset($_GET['error']) && $_SESSION['u_email'] == "") { ?>
                                                            border-red-600
                                                        <?php } else { ?>
                                                            border-gray-600
                                                        <?php } ?>
                                                        " type="text" name="email" id="email" <?php if ($_SESSION['u_email'] !== "") { ?> value="<?= $_SESSION['u_email'] ?>" <?php } ?> placeholder=" " />
                                            <label for="email" class=" peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                E-mail
                                            </label>
                                        </div>

                                    </div>
                                    <!-- Photo -->
                                    <div class="flex">
                                        <label class="block ml-8 w-52 mt-3 text-sm font-medium text-gray-400">
                                            Photo :
                                        </label>
                                        <input class="file:mr-5 file:py-3 file:px-10 file:rounded-l file:border-0 file:text-md file:font-semibold  file:text-white file:bg-gradient-to-r file:from-gray-600 file:to-gray-800 hover:file:cursor-pointer hover:file:opacity-80 block w-full mb-5 text-sm  border rounded-lg cursor-pointer text-gray-400 focus:outline-none  border-gray-600 :placeholder-gray-400" id="fphoto" name="fphoto" accept=".jpg" type="file">
                                    </div>
                                    <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" type="submit" name="formbtn">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
    </html>

<?php
} else {
    header("Location: ../index.php");
}
?>