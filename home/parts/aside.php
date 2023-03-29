<?php
$PageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>

<aside class=" shadow-md bg-gray-800 z-20 w-64 overflow-y-auto flex-shrink-0">
    <div class=" px-6 py-4 bg-gray-800">
        <div class="p-2 mt-0.5 flex items-center rounded-md ">
            <img class="w-12 h-12 rounded-full" src="../src<?php
                 if($_SESSION['role'] == "admin"){echo "/admin";} else {echo "/Users";}
                 ?>/profile/<?=$_SESSION['fphoto']?>" >
            <h1 class=" ml-3 text-l text-gray-200 font-bold">
                <?php echo $_SESSION['u_lname']." ".$_SESSION['u_fname']?>
            <!-- ATIGUI AYMANE -->
            </h1>
        </div>
        <hr class="my-2 h-px border-0 bg-gray-700">
        <ul class="mt-6 space-y-3">
            <li>
                <a href="
                <?php if($_SESSION['role'] == "admin"){echo "admin.php";} 
                      else {echo "index.php";}?>
                " class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 
                <?php if ($PageName == "index.php") { ?>bg-gray-700<?php } ?>
                <?php if ($PageName == "admin.php") { ?>bg-gray-700<?php } ?>

                ">
                    <svg class="flex-shrink-0 w-6 h-6  transition duration-75 text-gray-400 " fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <a href="
                <?php if($_SESSION['role'] == "admin"){echo "profile.php";} 
                      else {echo "form.php";}?>
                " class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700
                    <?php if ($PageName == "form.php") { ?>bg-gray-700<?php } ?>
                    <?php if ($PageName == "profile.php") { ?>bg-gray-700<?php } ?>

                ">
                    <svg class="flex-shrink-0 w-6 h-6  transition duration-75 text-gray-400 " fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        <?php if($_SESSION['role'] == "admin"){echo "Profile";} 
                        else {echo "Form";}?>                        
                    </span>
                </a>
            </li>
            <?php if($_SESSION['role'] == "admin"){?>
                <li>
                <a href="announce.php"
                 class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700
                    <?php if ($PageName == "announce.php") { ?>bg-gray-700<?php } ?>
                ">
                    <svg class="flex-shrink-0 w-6 h-6  transition duration-75 text-gray-400 " fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">
                        Announce                        
                    </span>
                </a>
            </li>
            <?php }?>
            <li>
                <a href="./config/signout.php" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700">
                    <svg class="flex-shrink-0 w-6 h-6  transition duration-75 text-gray-400 " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 6.622v10.623c0 1.113-.714 2.226-1.837 2.63l-5.102 1.923c-.306.1-.612.202-1.02.202-.51 0-1.123-.202-1.633-.506-.204-.202-.51-.404-.612-.607H7.918c-1.53 0-2.857-1.214-2.857-2.833v-1.011c0-.405.306-.81.817-.81.51 0 .816.304.816.81v1.011c0 .709.612 1.214 1.224 1.214h3.368V4.7H7.918c-.714 0-1.224.506-1.224 1.214v1.012c0 .404-.306.81-.816.81a.801.801 0 0 1-.817-.81V5.914a2.84 2.84 0 0 1 2.857-2.833h3.878l.612-.607c.817-.506 1.735-.607 2.653-.303l5.102 1.922C21.183 4.396 22 5.509 22 6.623Z" />
                        <path d="M4.857 14.817a.783.783 0 0 1-.51-.202l-2.04-2.024c-.103-.101-.103-.202-.205-.202 0-.101-.102-.202-.102-.304 0-.1 0-.202.102-.303 0-.101.102-.203.204-.203l2.04-2.023a.806.806 0 0 1 1.123 0 .79.79 0 0 1 0 1.113l-.714.708H8.94c.408 0 .816.304.816.81 0 .505-.408.607-.816.607H4.653l.714.708a.79.79 0 0 1 0 1.113.783.783 0 0 1-.51.202Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sign out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>