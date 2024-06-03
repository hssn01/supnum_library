<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "dv.php";

// Check if id_emprent is provided in the URL
if (!isset($_GET['id_emprent'])) {
    // Handle the case where id_emprent is not provided
    echo "ID emprent not provided!";
    exit;
}

$id_emprent = $_GET['id_emprent'];

// Fetch the emprent details based on the provided id_emprent
$req = mysqli_query($conction, "SELECT * FROM emprent WHERE id_emprent = $id_emprent");

// Check if the query was successful and if it returned any rows
if (!$req || mysqli_num_rows($req) == 0) {
    // Handle the case where no emprent with the provided id_emprent is found
    echo "No emprent found with ID: $id_emprent";
    exit;
}

$row = mysqli_fetch_assoc($req);

// Check if the form is submitted
if (isset($_POST['button'])) {
    // Extract form data
    extract($_POST);

    // Validate form data
    if (isset($matricule) && isset($id_livre) && isset($date_retour_prevus) && isset($date_retour_reel) && isset($date_emprunt)) {
        // Update the emprent record in the database
        $req = mysqli_query($conction, "UPDATE emprent SET matricule = '$matricule', id_livre = '$id_livre', date_retour_prevus = '$date_retour_prevus', date_retour_reel = '$date_retour_reel', date_emprunt = '$date_emprunt' WHERE id_emprent = $id_emprent");

        // Check if the query was successful
        if ($req) {
            // Redirect to the emprent list page
            header("location: emprent.php");
            exit;
        } else {
            // Handle the case where the update query fails
            $message = "Emprunt non modifié";
        }
    } else {
        // Handle the case where form fields are not filled
        $message = "Veuillez remplir tous les champs !";
    }
}
?>

<div class="form">
    <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
    <h2>Modifier l'emprunt : <?= $row['id_emprent'] ?> </h2>
    <p class="erreur_message">
        <?= isset($message) ? $message : "" ?>
    </p>
    <form action="" method="POST">
        <label>Matricule</label>
        <input type="number" name="matricule" value="<?= $row['matricule'] ?>">
        <label>ID Livre</label>
        <input type="number" name="id_livre" value="<?= $row['id_livre'] ?>">
        <label>Date de Retour Prévue</label>
        <input type="date" name="date_retour_prevus" value="<?= $row['date_retour_prevus'] ?>">
        <label>Date de Retour Réelle</label>
        <input type="date" name="date_retour_reel" value="<?= $row['date_retour_reel'] ?>">
        <label>Date d'Emprunt</label>
        <input type="date" name="date_emprunt" value="<?= $row['date_emprunt'] ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
</body>
</html>
