<?php
session_start();

if (isset($_SESSION['u_fname']) && $_SESSION['role'] == "student") {
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
                    <form   action="./Backend/insertdata.php"
                            method="POST"
                            enctype="multipart/form-data"
                            >
                        <div id="pdf-content">
                        <div  class="container px-6 mx-auto grid">
                        <?php if (isset($_GET['error'])||isset($_GET['errorSIZE'])) { ?>
                            <div class="bg-red-100 rounded-lg py-4 px-8 mt-4 m-auto text-base text-red-700 inline-flex items-center w-96" role="alert">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>

                                <?php if (isset($_GET['error'])) {echo "Vérifier toutes les entrées rouges";} 
                                      else {echo "La taille du fichier est trop grande";}
                                ?>
                                
                            </div>
                        <?php } ?>
                            <h2 class="my-4 text-2xl font-semibold text-gray-200">
                                Personal info :
                            </h2>
                            <div class="px-4 py-4 mb-8 rounded-lg shadow-md bg-gray-800">
                                <div class="grid md:grid-cols-2 md:gap-6">
<!-- Nom -->
                                    <div class="relative z-0 mb-6 w-1/2 group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                    <?php if (isset($_GET['error']) && $_SESSION['u_fname'] == "") { ?>
                                                        border-red-600
                                                    <?php }else{?>
                                                        border-gray-600
                                                    <?php }?>
                                                    " 
                                                type="text"
                                                name="fname" 
                                                id="fname" 
                                                <?php if ($_SESSION['u_fname'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_fname']?> "
                                                <?php } ?>
                                                placeholder=" "
                                                />
                                        <label  class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                                for="fname" >
                                            Prenome*
                                        </label>
                                    </div>
<!-- Prenome -->
                                    <div class="relative z-0 mb-6 w-1/2 group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                    <?php if (isset($_GET['error']) && $_SESSION['u_lname'] == "") { ?>
                                                        border-red-600
                                                    <?php }else{?>
                                                        border-gray-600
                                                    <?php }?>
                                                    " 
                                                type="text"
                                                name="lname"
                                                id="lname" 
                                                <?php if ($_SESSION['u_lname'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_lname']?> "
                                                <?php } ?>
                                                placeholder=" "
                                                />
                                        <label  for="lname"  class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Nom*
                                        </label>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
<!-- Email -->
                                    <div class="relative z-0 mb-6 w-3/4 group">
                                        <input  class=" block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0 peer
                                                        <?php if (isset($_GET['error']) && $_SESSION['u_email'] == "") { ?>
                                                            border-red-600
                                                        <?php }else{?>
                                                            border-gray-600
                                                        <?php }?>
                                                        " 
                                                type="text" 
                                                name="email" 
                                                id="email"       
                                                <?php if ($_SESSION['u_email'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_email']?> "
                                                <?php } ?>  
                                                placeholder=" " 
                                                />
                                        <label for="email" class=" peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Email*
                                        </label>
                                    </div>
<!-- Telephone -->
                                    <div class="relative mb-6 z-0 w-1/2 group">
                                        <input  class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 appearance-none text-white focus:border-blue-500 focus:outline-none focus:ring-0 peer border-gray-600 "
                                                type="text" 
                                                name="tele" 
                                                id="tele" 
                                                <?php if ($_SESSION['u_tele'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_tele']?> "
                                                <?php } ?>
                                                placeholder=" "
                                                />
                                        <label for="tele" class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Telephone
                                        </label>
                                    </div>  
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
<!-- cin -->
                                    <div class="relative z-0 mb-6 w-1/2 group">
                                        <input  class=" block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0 peer
                                                    <?php if (isset($_GET['error']) && $_SESSION['u_cin'] == "") { ?>
                                                        border-red-600
                                                    <?php }else{?>
                                                        border-gray-600
                                                    <?php }?>
                                                    " 
                                                type="text" 
                                                name="cin" 
                                                id="cin"    
                                                <?php if ($_SESSION['u_cin'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_cin']?> "
                                                <?php } ?>     
                                                placeholder=" " 
                                                />
                                        <label for="cin" class=" peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            CIN*
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-center mb-6">
<!-- date de naissance -->
                                        <div class="w-52">
                                            <label for="dn" class=" text-sm text-gray-400 ">
                                                Date de naissance :
                                            </label>
                                        </div>
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-gray-400  focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                        <?php if (isset($_GET['error']) && $_SESSION['u_dn'] == "") { ?>
                                                            border-red-600
                                                        <?php }else{?>
                                                            border-gray-600
                                                        <?php }?>
                                                        " 
                                                type="date"
                                                name="dn"
                                                id="dn" 
                                                <?php if ($_SESSION['u_dn'] !== "") { ?> 
                                                    value="<?=$_SESSION['u_dn']?>"
                                                <?php } ?>
                                                placeholder=" "
                                                />
                                    </div>                              
                                </div>
<!-- Adresse -->
                                <div class="grid md:grid-cols-3 md:gap-6 mt-4">
                                    <div class="relative z-0 w-full group">
                                        <label  for="adresse" class="block mb-2 text-sm font-medium  text-gray-400">
                                            Adresse
                                        </label>
                                        <textarea   class="block p-2.5 w-full text-sm  rounded-lg border  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500  "
                                                    name="adresse"
                                                    id="adresse"
                                                    rows="4"  
                                                    placeholder="Écrivez votre adresse ici ..."><?php
                                                     if ($_SESSION['u_adresse'] !== "") { 
                                                        echo $_SESSION['u_adresse'];
                                                     }?></textarea>
                                    </div>
<!-- country -->
                                    <div class="relative z-0 w-full group">
                                        <label  class="block mb-2 text-sm font-medium text-gray-400">
                                            Pays
                                        </label>
                                        <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                                id="country" 
                                                name="country"
                                                >
                                            <?php 
                                                include("./parts/country.php");
                                                if ($_SESSION['u_country'] !== "") {
                                                   $selected = $_SESSION['u_country'];
                                                }
                                                else{$selected = "MA";}
                                                foreach($country as $key => $val) {
                                                  echo "<option value=\"".$key."\"".($key == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
<!-- ville -->
                                    <div class="relative z-0 w-full group">
                                        <label class="block mb-2 text-sm font-medium text-gray-400">
                                            Ville
                                        </label>
                                        <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                                id="city"
                                                name="city">
                                            <?php 
                                                include("./parts/city.php");
                                                if ($_SESSION['u_city'] !== "") {
                                                   $selected = $_SESSION['u_city'];
                                                }
                                                else{$selected = "Safi";}
                                                foreach($city as $key => $val) {
                                                  echo "<option value=\"".$key."\"".($key == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container px-6 mx-auto grid">
                            <h2 class="my-4 text-2xl font-semibold text-gray-200">
                                Bac :
                            </h2>
                            <div class="px-4 py-4 mb-8 rounded-lg shadow-md bg-gray-800">
<!-- CNE -->
                                <div class="relative z-0 mb-6 w-1/4 group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                    <?php if (isset($_GET['error']) && $_SESSION['u_cne'] == "") { ?>
                                                        border-red-600
                                                    <?php }else{?>
                                                        border-gray-600
                                                    <?php }?>
                                                    " 
                                                type="text"
                                                name="cne"
                                                id="cne" 
                                                <?php if ($_SESSION['u_cne'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_cne']?> "
                                                <?php } ?> 
                                                placeholder=" "
                                                />
                                        <label  for="cne"  class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            CNE*
                                        </label>
                                </div>
<!-- Filiere de Bac -->
                                <div class="grid md:grid-cols-2 md:gap-6 relative z-0 mb-6 w-full group">
                                    <label class="block mb-2 text-sm font-medium text-gray-400">
                                        Filiere de Bac*
                                    </label>
                                    <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                            id="bactype" 
                                            name="bactype">
                                            <?php 
                                                include("./parts/bactype.php");
                                                if ($_SESSION['u_bactype'] !== "") {
                                                   $selected = $_SESSION['u_bactype'];
                                                }
                                                else{$selected = "BPC";}
                                                foreach($bactype as $key => $val) {
                                                  echo "<option value=\"".$key."\"".($key == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
<!-- Bac region -->
                                <div class="grid md:grid-cols-2 md:gap-6 relative z-0 mb-6 w-full group">
                                    <label class="block mb-2 text-sm font-medium text-gray-400">
                                        Region
                                    </label>
                                    <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                            id="bacregion" 
                                            name="bacregion">
                                        <?php 
                                                include("./parts/regions.php");
                                                if ($_SESSION['u_bacregion'] !== "") {
                                                   $selected = $_SESSION['u_bacregion'];
                                                }
                                                else{$selected = "Casablanca-Settat";}
                                                foreach($regions as $key => $val) {
                                                  echo "<option value=\"".$key."\"".($key == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
<!-- BAC Province -->
                                <div class="grid md:grid-cols-2 md:gap-6 relative z-0 mb-6 w-full group">
                                    <label class="block mb-2 text-sm font-medium text-gray-400">Province</label>
                                    <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                            id="bacprovince" 
                                            name="bacprovince">
                                        <?php 
                                                include("./parts/provinces.php");
                                                if ($_SESSION['u_bacprovince'] !== "") {
                                                   $selected = $_SESSION['u_bacprovince'];
                                                }
                                                else{$selected = "Casablanca Sidi Bernoussi";}
                                                foreach($provinces as $key => $val) {
                                                  echo "<option value=\"".$key."\"".($key == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
<!-- Bac Anne -->
                                <div class="grid md:grid-cols-2 md:gap-6 relative z-0 mb-6 w-full group">
                                    <label class="block text-sm font-medium text-gray-400">Anne du Bac</label>
                                    <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                            id="bacyear"
                                            name="bacyear">
                                        <?php
                                            $bacyear = array(date("Y"),date("Y")-1);
                                            if ($_SESSION['u_bacyear'] !== "") {
                                                $selected = $_SESSION['u_bacyear'];
                                             }
                                             else{$selected = date("Y");}
                                             foreach($bacyear as $val) {
                                               echo "<option value=\"".$val."\"".($val == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                             }
                                        ?>
                                    </select>
                                </div>
<!-- Note Regionale -->
                                <div class="grid md:grid-cols-3 md:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                        <?php if (isset($_GET['error']) && $_SESSION['u_notereg'] == "") { ?>
                                                            border-red-600
                                                        <?php }else{?>
                                                            border-gray-600
                                                        <?php }?>
                                                        "
                                                type="number" 
                                                name="notereg" 
                                                id="notereg" 
                                                step="0.001"
                                                min="0"
                                                max="20"
                                                <?php if ($_SESSION['u_notereg'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_notereg']?>"
                                                <?php } ?>
                                                placeholder=" "
                                                />
                                                
                                        <label for="notereg" class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Note Regionale*
                                        </label>
                                    </div>
<!-- Note nationale -->
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                        <?php if (isset($_GET['error']) && $_SESSION['u_notenat'] == "") { ?>
                                                            border-red-600
                                                        <?php }else{?>
                                                            border-gray-600
                                                        <?php }?>
                                                        "
                                                type="number" 
                                                name="notenat" 
                                                id="notenat" 
                                                step="0.001"
                                                min="0"
                                                max="20"
                                                <?php if ($_SESSION['u_notenat'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_notenat']?>"
                                                <?php } ?>
                                                placeholder=" "
                                                />

                                        <label for=" notenat" class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Note nationale*
                                        </label>
                                    </div>
<!-- Note Bac moyen -->
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white  focus:border-blue-500 focus:outline-none focus:ring-0  peer
                                                        <?php if (isset($_GET['error']) && $_SESSION['u_notemoy'] == "") { ?>
                                                            border-red-600
                                                        <?php }else{?>
                                                            border-gray-600
                                                        <?php }?>
                                                        "
                                                type="number"
                                                name="notemoy" 
                                                id="notemoy" 
                                                step="0.001"
                                                min="0"
                                                max="20"
                                                <?php if ($_SESSION['u_notemoy'] !== "") { ?> 
                                                    value="<?= $_SESSION['u_notemoy']?>"
                                                <?php } ?>
                                                placeholder=" "
                                                />

                                        <label for="notemoy" class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Note Bac moyen*
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="container px-6 mx-auto grid">
                            <h2 class="my-4 text-2xl font-semibold text-gray-200">
                                Documents :
                            </h2>
                            <div class="px-4 pb-3 pt-6 mb-8 rounded-lg shadow-md bg-gray-800">
                                <div class="relative z-0  w-full group">
<!-- Photo : -->
                                    <div class="flex">
                                        <label class="block ml-8 w-52 mt-3 text-sm font-medium text-gray-400">
                                            Photo :
                                        </label>
                                        <input  class="file:mr-5 file:py-3 file:px-10 file:rounded-l file:border-0 file:text-md file:font-semibold  file:text-white file:bg-gradient-to-r file:from-gray-600 file:to-gray-800 hover:file:cursor-pointer hover:file:opacity-80 block w-full mb-5 text-sm  border rounded-lg cursor-pointer text-gray-400 focus:outline-none  border-gray-600 :placeholder-gray-400"
                                                id="fphoto"
                                                name="fphoto"
                                                accept=".jpg"
                                                type="file">
                                    </div>
<!-- cin :  -->
                                    <div class="flex">
                                        <label class="block ml-8 w-52 mt-3 text-sm font-medium text-gray-400">
                                            CIN : 
                                        </label>
                                        <input class="file:mr-5 file:py-3 file:px-10 file:rounded-l file:border-0 file:text-md file:font-semibold  file:text-white file:bg-gradient-to-r file:from-gray-600 file:to-gray-800 hover:file:cursor-pointer hover:file:opacity-80 block w-full mb-5 text-sm  border rounded-lg cursor-pointer text-gray-400 focus:outline-none  border-gray-600 :placeholder-gray-400" 
                                                id="fcin" 
                                                name="fcin"
                                                accept=".pdf"
                                                type="file">
                                        <?php if (file_exists("../src/Users/documents/".$_SESSION['u_id']."cin.pdf") == 1){?>

                                        <button class="bg-gray-800 hover:bg-gray-800 text-gray-400 font-bold py-2 px-4 rounded inline-flex items-center">
                                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                            <span><a href="../src/Users/documents/<?=$_SESSION['fcin']?>" target="_blank">Telecharger</a></span>
                                        </button>

                                        <?php }?>
                                    </div>
                                    
<!-- Bac :  -->
                                    <div class="flex">
                                        <label class="block ml-8 w-52 mt-3 text-sm font-medium text-gray-400" >
                                            Bac : 
                                        </label>
                                        <input  class="file:mr-5 file:py-3 file:px-10 file:rounded-l file:border-0 file:text-md file:font-semibold  file:text-white file:bg-gradient-to-r file:from-gray-600 file:to-gray-800 hover:file:cursor-pointer hover:file:opacity-80 block w-full mb-5 text-sm  border rounded-lg cursor-pointer text-gray-400 focus:outline-none  border-gray-600 :placeholder-gray-400" 
                                                id="fbac"
                                                name="fbac"
                                                accept=".pdf"
                                                type="file">
                                                <?php if (file_exists("../src/Users/documents/".$_SESSION['u_id']."bac.pdf") == 1){?>

                                                <button class="bg-gray-800 hover:bg-gray-800 text-gray-400 font-bold py-2 px-4 rounded inline-flex items-center">
                                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                                    <span><a href="../src/Users/documents/<?=$_SESSION['fbac']?>" target="_blank">Telecharger</a></span>
                                                </button>

                                                <?php }?>
                                    </div>
<!-- Releves de Notes :  -->
                                    <div class="flex">
                                        <label  class="block w-52 ml-8  mt-3 text-sm font-medium text-gray-400">
                                            Releves de Notes : 
                                        </label>
                                        <input  class="file:mr-5 file:py-3 file:px-10 file:rounded-l file:border-0 file:text-md file:font-semibold  file:text-white file:bg-gradient-to-r file:from-gray-600 file:to-gray-800 hover:file:cursor-pointer hover:file:opacity-80 block w-full mb-5 text-sm  border rounded-lg cursor-pointer text-gray-400 focus:outline-none  border-gray-600 :placeholder-gray-400" 
                                                id="fnotes" 
                                                name="fnotes"
                                                accept=".pdf"
                                                type="file">
                                                <?php if (file_exists("../src/Users/documents/".$_SESSION['u_id']."notes.pdf") == 1){?>

                                                    <button class="bg-gray-800 hover:bg-gray-800 text-gray-400 font-bold py-2 px-4 rounded inline-flex items-center">
                                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                                        <span><a href="../src/Users/documents/<?=$_SESSION['fnotes']?>" target="_blank">Telecharger</a></span>
                                                    </button>

                                                    <?php }?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="container px-6 mx-auto grid">
                        <h2 class="my-4 text-2xl font-semibold text-gray-200">
                            Choix : 
                        </h2>
                            <div class="px-4 pb-3 pt-6 mb-8 rounded-lg shadow-md bg-gray-800">
                                <div class="relative z-0  w-full group">
                                <div class="grid md:grid-cols-2 md:gap-6 relative z-0 mb-6 w-full group">
                                    <label class="block mb-2 text-sm font-medium text-gray-400">
                                        Choix :
                                    </label> 

                                <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                            id="choix" 
                                            name="choix">
                                            <?php 
                                                include("./parts/choix.php");
                                                if ($_SESSION['u_choix'] !== "") {
                                                   $selected = $_SESSION['u_choix'];
                                                }
                                                else{$selected = "GI";}
                                                foreach($choix as $key => $val) {
                                                  echo "<option value=\"".$key."\"".($key == $selected ? " selected=\"selected\">" : ">").$val."</option>";
                                                }
                                            ?>
                                    </select>

                                </div>
                                </div>
                                <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800"
                                        type="submit" 
                                        name="formbtn">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    <button class="ml-8 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800"
                                        id="btn-generate">
                                    Download Recus
                                </button>
                </main>
            </div>
        </div>
        <script>
	var buttonElement = document.querySelector("#btn-generate");
	buttonElement.addEventListener('click', function() {
		var pdfContent = document.getElementById("pdf-content").innerHTML;
		var windowObject = window.open();

		windowObject.document.write(pdfContent);

		windowObject.print();
		windowObject.close();
	});
</script>
    </body>
    </html>

<?php
} else {
    header("Location: ../index.php");
}
?>