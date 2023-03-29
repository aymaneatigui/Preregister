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
                    <form action="./Backend/admin.announce.php" method="post">
                        <div  class="container px-6 mt-10 mx-auto grid">
                            <div class="px-4 py-4 mb-8 rounded-lg shadow-md bg-gray-800">
                                <div class="grid md:grid-cols-2 md:gap-6">
<!-- Title -->
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white focus:border-blue-500 focus:outline-none focus:ring-0  peer border-gray-600" 
                                                type="text"
                                                name="title" 
                                                id="title" 
                                                <?php if ($_SESSION['atitle'] !== "") { ?> 
                                                    value="<?= $_SESSION['atitle']?>"
                                                <?php } ?>
                                                placeholder=" "
                                                />
                                        <label  class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                                for="fname" >
                                                Titre
                                        </label>
                                    </div>

                                </div>
<!-- Text -->
                                <div class="relative z-0 w-full group">
                                        <label  for="text" class="block mb-2 text-sm font-medium  text-gray-400">
                                            Text
                                        </label>
                                        <textarea   class="block p-2.5 w-full text-sm  rounded-lg border  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500  "
                                                    name="text"
                                                    id="text"
                                                    rows="8"  
                                                    placeholder="Écrivez votre text ici ..."><?php
                                                     if ($_SESSION['atext'] !== "") { 
                                                        echo $_SESSION['atext'];
                                                     }?></textarea>
                                    </div>
<!-- LINK -->

                                    <div class="grid md:grid-cols-2 md:gap-6 mt-10">
                                        <div class="relative z-0 mb-6 w-3/4 group">
                                        <input  class=" block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0 peer border-gray-600" 
                                                type="text" 
                                                name="link" 
                                                id="link"       
                                                <?php if ($_SESSION['alink'] !== "") { ?> 
                                                    value="<?= $_SESSION['alink']?>"
                                                <?php } ?>
                                                placeholder=" " 
                                                />
                                        <label for="email" class=" peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Link
                                        </label>
                                        </div>
                                    </div>
                                    <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800"
                                        type="submit" 
                                        name="formbtn">
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