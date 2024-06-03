<?php
include 'dv.php'; 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM livres WHERE id  = '$id'";
    if (mysqli_query($conction, $sql)) {
        echo "livres supprimé avec succès !";
        header("Location:livre.php");
    } else {
        echo "Erreur : " . mysqli_error($conction);
    }
}


?>


