<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
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

    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter </a> 
        <button onClick="tableToExcel()" class="Btn_add"> <img src="images/excel.gif" alt=""> Exporter</button>

       <div class="" id="searchResult"></div>
  
        
         
       
        <table class="sa3id" id="originalTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Auteur</th>
                    <th>Éditeur</th>
                    <th>Titre</th>
                    <th>Nombre de page</th>
                    <th>Edition</th>
                    <th>Nombre d'exemplaire</th>
                    <th>Date publication</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include_once "dv.php";
                $start = 0;
                $row_pre_pag= 10;
                $recoed = mysqli_query($conction, "SELECT * FROM livres ");
                $num_ros = mysqli_num_rows($recoed);
                $pages = ceil($num_ros / $row_pre_pag);

                if (isset($_GET['page-nr'])) {
                    $page = $_GET['page-nr'] - 1;
                    $start = $page * $row_pre_pag;
                }
                $req = mysqli_query($conction, "SELECT * FROM livres limit $start ,$row_pre_pag");
                if (mysqli_num_rows($req) == 0) {
                    echo "Il n'y a pas encore de livre ajouté !";
                } else {
                    while ($row = mysqli_fetch_assoc($req)) {
                ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['isbn'] ?></td>
                            <td><?= $row['hauteur'] ?></td>
                            <td><?= $row['editeur'] ?></td>
                            <td><?= $row['titre'] ?></td>
                            <td><?= $row['nbrpage'] ?></td>
                            <td><?= $row['adition'] ?></td>
                            <td><?= $row['nbrexmp'] - mysqli_num_rows(mysqli_query($conction, "SELECT * FROM emprent WHERE id_livre = {$row['id']} AND date_retour_reel IS NULL")) ?></td>
                            <td><?= $row['datepubli'] ?></td>
                            <td><a href="modifierl.php?id=<?= $row['id'] ?>"><img src="images/pen.png"></a></td>
                            <td><a href="supl.php?id=<?= $row['id'] ?>"><img src="images/trash.png"></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div style="margin:50px;" aria-label="Page navigation example">
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
                    url: "search_liv.php",
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
    });
</script>
<script src="table2excel.js"></script>
<script src="ExceJava.js"></script>

</body>

</html>

