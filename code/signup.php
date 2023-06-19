<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="./src/style/style.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

</head>

<body>
    <!--Backgound-->
    <div class=" min-h-screen flex  justify-center py-4 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url('./src/style/images/Site/Background.jpeg');">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-md w-full space-y-8 p-7 bg-white rounded-xl z-10">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">
                Créer un compte!
                </h2>
            </div>
            <!-- ====== Form ======= -->
            <form   class="mt-8 space-y-6" 
                    action="./auth/auth.signup.php" 
                    method="POST">
                <!-- === First Name === -->
                <div class="flex items-center justify-between">
                    <div class="mt-3 mr-4 content-center">
                        <label class="text-sm font-bold text-gray-700 tracking-wide" for="fname">
                                Prénom
                        </label>
                        <input  class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                type="text"
                                id="fname"
                                name="fname"
                                placeholder="First Name"
                                <?php if (isset($_GET['fname'])) { ?> 
                                    value="<?=htmlspecialchars($_GET['fname']) ?> "
                                <?php } ?>
                                maxlength="127">
                    </div>
                <!-- === Last name === -->
                    <div class="mt-3 ml-4 content-center">
                        <label class="text-sm font-bold text-gray-700 tracking-wide" for="lname">
                                Nom 
                        </label>
                        <input  class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" 
                                type="text"
                                id="lname"
                                name="lname"
                                placeholder="Last Name"
                                <?php if (isset($_GET['lname'])) { ?> 
                                    value="<?=htmlspecialchars($_GET['lname']) ?> "
                                <?php } ?>       
                                maxlength="127">
                    </div>
                </div>
                <!-- === Email === -->
                <div class="relative">
                    <label class="text-sm font-bold text-gray-700 tracking-wide" for="email">
                        E-mail
                    </label>
                    <div class="absolute right-0 mt-2">
                    </div>
                    <input  class=" w-full text-base py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                            type="email"
                            id="email"
                            name="email"
                            <?php if (isset($_GET['email'])) { ?> 
                                value="<?=htmlspecialchars($_GET['email']) ?> "
                             <?php } ?>
                            placeholder="mail@gmail.com">
                </div>
                <!-- === Password === -->
                <div class="mt-8 content-center">
                    <label class="text-sm font-bold text-gray-700 tracking-wide" for="password">
                        Mot de passe
                    </label>
                    <input  class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Tapez votre mot de passe">
                </div>

                <div class="text-center">
                    <!-- Handle inpute error -->
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="bg-red-100 rounded-lg py-3 px-6 mt-4 text-base text-red-700 inline-flex items-center w-full" role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                            </svg>
                            <?=htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- === Sign up Button === -->
                <div>
                    <button type="submit" class="w-full flex justify-center bg-indigo-500 text-gray-100 p-4  rounded-full tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg cursor-pointer transition ease-in duration-300">
                    S'inscrire
                    </button>
                </div>
                <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                    <span>Avez vous déjà un compte</span>
                    <a href="./index.php" class="text-indigo-500 hover:text-indigo-800 cursor-pointer transition ease-in duration-300">S'identifier</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>