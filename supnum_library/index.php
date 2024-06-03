<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
<nav class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt=""></a>
        </div>

        <div class="input-group">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input class="search form-control" type="text" placeholder="Rechercher" aria-label="Username" aria-describedby="basic-addon1" id="liv" >
        </div>
        <ul class="d-flex gap-4">
            <li><a href="">Acceuil</a></li>
            <li><a href="livre.php">Livre</a></li>
            <li><a href="index.php">Etudiant</a></li>
            <li><a href="emprent.php">Emprunt</a></li>
        </ul> 
<!--  -->
    </nav>
    <div> <div class="container">
    <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
        <button onClick="tableToExcel()" class="Btn_add"><img src="images/excel.gif" alt=""> Exporter</button>
        <div class="" id="searchResult"></div>
        <table class="sa3id" id="originalTable">
            <tr id="items">

                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Niveaux</th>
                <th>Specialite</th>
                <th>Nombre d'emprunt</th>
                <th>Emprunt en cours</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
                include_once "dv.php";
                $start = 0;
                $row_pre_pag= 10;
                $recoed = mysqli_query($conction, "SELECT * FROM etudiants ");
                $num_ros = mysqli_num_rows($recoed);
                $pages = ceil($num_ros / $row_pre_pag);

                if (isset($_GET['page-nr'])) {
                    $page = $_GET['page-nr'] - 1;
                    $start = $page * $row_pre_pag;
                }
                $req = mysqli_query($conction, "SELECT * FROM etudiants limit $start ,$row_pre_pag");
                if (mysqli_num_rows($req) == 0) {
                    echo "Il n'y a pas encore de livre ajouté !";
                } else {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($req)) {
                        $i++;
                ?>
                    <tr>
                        <td><?= $row['matricule'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['niveau'] ?></td>
                        <td><?= $row['specialite'] ?></td>
                        <td><?= mysqli_num_rows(mysqli_query($conction, "SELECT * FROM emprent WHERE matricule = '{$row['matricule']}'")) ?></td>
                        <td><?= mysqli_num_rows(mysqli_query($conction, "SELECT * FROM emprent WHERE matricule = '{$row['matricule']}' AND (date_retour_reel IS NULL or date_retour_reel = '0000-00-00')")) ?></td>


                        <td><a href="modifier.php?matricule=<?= $row['matricule'] ?>"><img src="images/pen.png"></a></td>
                        <td><a href="suppeime.php?matricule=<?= $row['matricule'] ?>"><img src="images/trash.gif"></a></td>
                    </tr>
                    <?php
                }

            }
            ?>


        </table>
        <div aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page-nr=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($contr = 1; $contr <= $pages; $contr++) { ?>
                    <li class="page-item"><a class="page-link" href="?page-nr=<?= $contr; ?>"><?= $contr ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="?page-nr=<?= $pages; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Function to handle keyup event on the search input
        $("#liv").keyup(function() {
            var input = $(this).val().toLowerCase();
            if (input != "") {
                $.ajax({
                    url: "search_etud.php",
                    method: "post",
                    data: { input: input },
                    success: function(data) {
                        $("#originalTable").hide(); // Hide the original table
                        $(".pagination").hide(); // Hide the pagination
                        $("#searchResult").html(data).show(); // Show the search results
                    }
                });
            } else {
                $("#searchResult").hide(); // Hide the search results
                $("#originalTable").show(); // Show the original table
                $(".pagination").show(); // Show the pagination
            }
        });

        // Function to change the number of rows
        function changeRowCount(rows) {
            loadData(rows);
        }

        // Function to load data with the specified number of rows
        function loadData(rows) {
            // Make an AJAX call to load data with the specified number of rows
            $.ajax({
                url: "search_etud.php", // Assuming you have a separate script to load data
                method: "post",
                data: { rows: rows },
                success: function(data) {
                    $("#originalTable").html(data);
                }
            });
        }
    });
</script>



<script src="table2excel.js"></script>
    <script src="ExceJava.js"></script>

</body>
</html>
