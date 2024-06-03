<?php
include 'dv.php'; 
if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
    $sql = "DELETE FROM etudiants WHERE matricule  = '$matricule'";
    if (mysqli_query($conction, $sql)) {
        echo "Étudiant supprimé avec succès !";
        header("Location:index.php");
    } else {
        echo "Erreur : " . mysqli_error($conction);
    }
}


?>


