<?php
session_start();

if (isset($_SESSION['u_fname']) && $_SESSION['role'] = "admin") {

        include("../src/DB/db_conn.php");
    if (isset($_POST['choix']) && isset($_POST['ne'])) {

        $_SESSION['ne'] = $_POST['ne'];
        $_SESSION['choix'] = $_POST['choix'];
    }

            
    $stmt = $conn->prepare("SELECT u.fname, u.lname, u.email, s.cne, s.nacces, s.choix, s.fbac, s.fnotes, s.fcin
                                FROM students as s JOIN users as u
                                ON u. id = s. id
                                where s. choix = \"". $_SESSION['choix']."\"
                                ORDER BY s.nacces DESC 
                                LIMIT ".$_SESSION['ne']."
        ");

        $stmt->execute();
        $user = $stmt->fetchAll();
        

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        <link rel="stylesheet" href="../src/style/style.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="../src/style/cdn/jquery.dataTables.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"> -->
        <link rel="stylesheet" href="../src/style/cdn/buttons.dataTables.min.css">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
        <script src="../src/style/cdn/jquery-3.5.1.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
        <script src="../src/style/cdn/jquery.dataTables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script> -->
        <script src="../src/style/cdn/dataTables.buttons.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
        <script src="../src/style/cdn/jszip.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
        <script src="../src/style/cdn/pdfmake.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
        <script src="../src/style/cdn/vfs_fonts.js"></script>
        <!-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script> -->
        <script src="../src/style/cdn/buttons.html5.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script> -->
        <script src="../src/style/cdn/buttons.print.min.js"></script>
        <title>Document</title>
    </head>

    <body class="flex h-screen bg-gray-900 w-full">
        <?php require './parts/aside.php' ?>

        <div class="container px-6 mx-auto grid ">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-1">
                </h2>
                <div class="px-4 pb-3 pt-3 mb-2 rounded-lg shadow-md bg-gray-800">
                    <div class="relative z-0  w-full group">
                        <form action="./admin.php" method="post">
                        <div class="grid md:grid-cols-3 md:gap-6 relative z-0 mb-1 w-full group">
                            <label class="block mb-2 text-sm font-medium text-gray-400">
                                <div class="relative z-0 w-3/4 group">
                                    <input  class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white focus:border-blue-500 focus:outline-none focus:ring-0 peer border-gray-600" 
                                            type="number" 
                                            name="ne"
                                            id="ne" 
                                            <?php if ($_SESSION['ne'] !== "") { ?> 
                                                value="<?=$_SESSION['ne'] ?>"
                                            <?php } ?> 
                                            placeholder=" " />
                                    <label class="peer-focus:font-medium absolute text-sm  text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" for="ne">
                                        Entrer un nombre d'étudiants 
                                    </label>
                                </div>
                            </label>

                            <select class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" id="choix" name="choix">
                                <?php
                                include("./parts/choix.php");
                                if ($_SESSION['choix'] !== "") {
                                    $selected = $_SESSION['choix'];
                                } else {
                                    $selected = "GI";
                                }
                                foreach ($choix as $key => $val) {
                                    echo "<option value=\"" . $key . "\"" . ($key == $selected ? " selected=\"selected\">" : ">") . $val . "</option>";
                                }
                                ?>
                            </select>
                            <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" type="submit" name="formbtn">
                                Submit
                            </button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="px-4 mb-8 pb-3 pt-6 rounded-lg shadow-md bg-slate-300">
                <div class="relative z-0 mb-2 w-full group">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Prenome</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CNE</th>
                                <th>Note d'accès</th>
                                <th>Choix</th>
                                <th>Fichier Bac</th>
                                <th>Fichier Notes</th>
                                <th>Fichier CIN</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($user as $row ) {
                                echo "<tr>";
                                echo "<td>" . $row['fname'] . "</td>";
                                echo "<td>" . $row['lname'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['cne'] . "</td>";
                                echo "<td>" . $row['nacces'] . "</td>";
                                echo "<td>" . $row['choix'] . "</td>";
                                echo "<td><a href=\"../src/Users/documents/" . $row['fbac'] . "\"target=\"_blank\">Telecharger</a></td>";
                                echo "<td><a href=\"../src/Users/documents/" . $row['fnotes'] . "\"target=\"_blank\">Telecharger</a></td>";
                                echo "<td><a href=\"../src/Users/documents/" . $row['fcin'] . "\"target=\"_blank\">Telecharger</a></td>";
                                echo "</tr>";
                                
                            }

                    
                            ?>

                        </tbody>

                    </table>


                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        dom: 'Bfrtip',
                        paging: false,
                        "ordering": false,
                        scrollY: 400,
                        "info": false,
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>
    </body>

    </html>
<?php
} else {
    header("Location: ../index.php");
}
?>