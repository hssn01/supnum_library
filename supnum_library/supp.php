<?php
include 'dv.php'; 
if (isset($_GET['id_emprent'])) {
    $id_emprent = $_GET['id_emprent'];
    $sql = "DELETE FROM emprent WHERE id_emprent = '$id_emprent'";
    if (mysqli_query($conction, $sql)) {
        echo "emprent supprimé avec succès !";
        header("Location:emprent.php");
    } else {
        echo "Erreur : " . mysqli_error($conction);
    }
}


?>


