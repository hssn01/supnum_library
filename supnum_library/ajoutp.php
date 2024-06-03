<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(isset($_POST['button'])){
    extract($_POST);
    if(isset($matricule) && isset($id_livre) && isset($date_emprunt)){
        include_once "dv.php";
        
        // Check if the matricule exists in the etudiants table
        $result_etudiant = mysqli_query($conction, "SELECT * FROM etudiants WHERE matricule = '$matricule'");
        if(mysqli_num_rows($result_etudiant) == 0){
            $message = "Le matricule n'existe pas dans la table des étudiants.";
        } else {
            
            // Count the number of loans for the given book ID that have not been returned
            $query_count_loans = "SELECT COUNT(*) AS num_loans FROM emprent WHERE id_livre = '$id_livre' AND date_retour_reel IS NULL";
            $result_count_loans = mysqli_query($conction, $query_count_loans);
            $row_count_loans = mysqli_fetch_assoc($result_count_loans);
            $num_loans = $row_count_loans['num_loans'];
            
            // Get the number of available books (nbrexmp) for the given book ID
            $result_book = mysqli_query($conction, "SELECT nbrexmp FROM livres WHERE id = '$id_livre'");
            $row_book = mysqli_fetch_assoc($result_book);
            $nbrexmp = $row_book['nbrexmp'];
            
            // Check if the book is available for loan
            if ($nbrexmp - $num_loans <= 0) {
                $message = "The book is not available at the moment.";
            } else {
                // Calculate the date_retour_prevus as 7 days after the date_emprunt
                $date_retour_prevus = date('Y-m-d', strtotime($date_emprunt. ' + 7 days'));
                
                // Set date_retour_reel to NULL
                $date_retour_reel = NULL;
                
                // Add the loan to the database
                $req = mysqli_query($conction, "INSERT INTO emprent (matricule, id_livre, date_retour_prevus, date_retour_reel, date_emprunt) VALUES ('$matricule','$id_livre','$date_retour_prevus',NULL,'$date_emprunt')");
                if($req){
                    header("location: emprent.php");
                    exit;
                } else {
                    $message = "Emprunt non ajouté";
                }
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs!";
    }
}
?>


<div class="form">
    <a href="emprent.php" class="back_btn"><img src="images/back.png"> Retour</a>
    <h2>Ajouter un emprunt</h2>
    <p class="erreur_message">
        <?php 
        if(isset($message)){
            echo $message;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>Matricule</label>
        <input type="number" name="matricule">
        <label>ID Livre</label>
        <input type="number" name="id_livre">
        <label>Date d'Emprunt</label>
        <input type="date" name="date_emprunt" value="<?= date('Y-m-d') ?>"> 
        <input type="submit" value="Ajouter" name="button">
    </form>
</div>

</body>
</html>


