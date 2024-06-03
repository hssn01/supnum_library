<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des emprunts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    
</head>
<body>

    <nav class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt=""></a>
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
       <div class="tab"><div class="input-group">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input class="search form-control" type="text" placeholder="Rechercher" aria-label="Username" aria-describedby="basic-addon1" id="liv" >
        </div> <div class="h"></div><a href="ajoutp.php" class=""><button><img src="images/plus.png">  </a> Ajouter</button> 
        <button onClick="tableToExcel()" class=""> <img src="images/excel.gif" alt=""> Exporter</button>
        
    </div>
       
    
    <div class="" id="searchResult"></div>
  
        
         
       
        <table class="sa3id" id="originalTable">
            <thead>
                <tr>
                    <th>Matricule Étudiant</th>
                    <th>ID Livre</th>            
                    <th>Date d'Emprunt</th>
                    <th>Date de Retour prevus</th>
                    <th>Date de retour Réelle</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include_once "dv.php";
                $start = 0;
                $row_pre_pag= 10;
                $recoed = mysqli_query($conction, "SELECT * FROM emprent ");
                $num_ros = mysqli_num_rows($recoed);
                $pages = ceil($num_ros / $row_pre_pag);

                if (isset($_GET['page-nr'])) {
                    $page = $_GET['page-nr'] - 1;
                    $start = $page * $row_pre_pag;
                }
                $req = mysqli_query($conction, "SELECT * FROM emprent limit $start ,$row_pre_pag");
                if (mysqli_num_rows($req) == 0) {
                    echo "Il n'y a pas encore d'emprunt enregistré !";
                } else {
                    while ($row = mysqli_fetch_assoc($req)) {
                ?>
                        <tr>
                            <td><?= $row['matricule'] ?></td>
                            <td><?= $row['id_livre'] ?></td>
                            <td><?= $row['date_emprunt'] ?></td>
                            <td><?= $row['date_retour_prevus'] ?></td>
                            <td><?= $row['date_retour_reel'] ?></td>
                            <td><a href="modp.php?id_emprent=<?= $row['id_emprent'] ?>"><img src="images/pen.png"></a>
                            </td>
                            <td><a href="supp.php?id_emprent=<?= $row['id_emprent'] ?>"><img src="images/trash.gif"></a>
                            </td>
                            <td>
                            <?php if (empty($row['date_retour_reel']) || $row['date_retour_reel'] == '0000-00-00') {
                                 ?>
                                   
                                <?php echo "non return";?>
                                       
                                <?php }else{
                                    echo "Retourne";
                                }
                                
                                ?>
                            
                            </td>
                            <td>
                            <?php if (empty($row['date_retour_reel']) || $row['date_retour_reel'] == '0000-00-00') {
                         ?>
                            
                            <form action="" method="POST">
                       
                                <input type="hidden" name="id_emprent" value="<?=$row['id_emprent']?>">
                                <input type="submit" id="Btn_ret" class="Btn_add" value="retourn" name="return_button">
                            </form>
                            <?php } else 
                            { ?>
                                <form action="" method="POST">
                                <input type="hidden" name="id_emprent" value="<?=$row['id_emprent']?>">
                                <input type="submit" id="Btn_ret" class="Btn_add" value="annuler " name="cancel_return_button">
                            </form>
                            <?php } ?>
                        <?php }
                        }
                            
                            
                        
                        
                        ?>
                    </td>
                </tr>
                <?php
            
        
        if(isset($_POST['return_button'])){
            include_once "dv.php";
            
            // Get the current date
            $current_date = date('Y-m-d');
            $id_emprent = $_POST['id_emprent'];
            // Update the date_retour_reel column with the current date
            $req = mysqli_query($conction, "UPDATE emprent SET date_retour_reel = '$current_date' WHERE id_emprent = $id_emprent");
        
            // Check if the update was successful
            if ($req) {
                // Redirect to the emprent list page
                header("Location: emprent.php");
                exit;
            } else {
                $message = "Failed to update date_retour_reel";
            }
        }else if(isset($_POST['cancel_return_button'])){
            include_once "dv.php";
            
            $id_emprent = $_POST['id_emprent'];
            // Update the date_retour_reel column with the current date
            $req = mysqli_query($conction, "UPDATE emprent SET date_retour_reel = NULL WHERE id_emprent = $id_emprent");
        
            // Check if the update was successful
            if ($req) {
                // Redirect to the emprent list page
                header("Location: emprent.php");
                exit;
            } else {
                $message = "Failed to update date_retour_reel";
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
                    url: "search_emprunt.php",
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
                url: "search_emprunt.php", // Assuming you have a separate script to load data
                method: "post",
                data: { rows: rows },
                success: function(data) {
                    $("#originalTable").html(data);
                }
            });
        }
    });
</script>
</script>
-<script src="table2excel.js"></script>
-<script src="ExceJava.js"></script>
-<?php
-    ob_end_flush();
