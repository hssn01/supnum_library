<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "dv.php"; // Include your database connection file

// Check if matricule is provided in the URL
if(isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
    // Fetch data for the given matricule
    $req = mysqli_query($conction , "SELECT * FROM etudiants WHERE matricule = $matricule");
    // Check if data is fetched successfully
    if($req) {
        $row = mysqli_fetch_assoc($req);
    } else {
        echo "Error fetching data: " . mysqli_error($conction); // Print error message
        exit; // Terminate script execution
    }
} else {
    echo "Matricule not provided in URL"; // Print error message
    exit; // Terminate script execution
}

$message = ''; // Initialize message variable

// Check if form is submitted
if(isset($_POST['button'])) {
    // Check if all form fields are set
    if(isset($_POST['matricule']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['niveau']) && isset($_POST['specialite'])) {
        // Retrieve form data
        $newMatricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $niveau = $_POST['niveau'];
        $specialite = $_POST['specialite'];

        // Update the record in the database
        $req = mysqli_query($conction, "UPDATE etudiants SET matricule = '$newMatricule', nom = '$nom', prenom = '$prenom', niveau = '$niveau', specialite = '$specialite' WHERE matricule = '$matricule'");
        if($req) {
            header("location: index.php"); // Redirect to index.php
            exit; // Terminate script execution
        } else {
            $message = "Étudiant non modifié"; // Set error message
        }
    } else {
        $message = "Veuillez remplir tous les champs !"; // Set error message
    }
}
?>

<div class="form">
    <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
    <h2>Modifier l'étudiant : <?= isset($row['matricule']) ? $row['matricule'] : '' ?> </h2>
    <p class="erreur_message">
        <?= $message ?>
    </p>
    <form action="" method="POST">
        <label>Matricule</label>
        <input type="text" name="matricule" value="<?= isset($row['matricule']) ? $row['matricule'] : '' ?>">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= isset($row['nom']) ? $row['nom'] : '' ?>">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= isset($row['prenom']) ? $row['prenom'] : '' ?>">
        <label>Niveau</label>
        <input type="text" name="niveau" value="<?= isset($row['niveau']) ? $row['niveau'] : '' ?>">
        <label>Spécialité</label>
        <input type="text" name="specialite" value="<?= isset($row['specialite']) ? $row['specialite'] : '' ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
</body>
</html>
