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
           if(isset($matricule) && isset($nom) && isset($prenom) && isset($niveau)  && $specialite){
                include_once "dv.php";
                
                $req = mysqli_query($conction , "INSERT INTO etudiants VALUES( '$matricule','$nom', '$prenom','$niveau','$specialite')");
                if($req){
                    header("location: index.php");
                }else {
                    $message = "etudient non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un etudiant</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Matricule</label>
            <input type="text" name="matricule">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Niveaux</label>
            <select name="niveau">
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="l4">S4</option>
                <option value="S5">S5</option>
                <option value="S6">S6</option>
            </select>
            <label>Specialite</label>
            <select name="specialite">
                <option value="TC">TC</option>
                <option value="DSI">DSI</option>
                <option value="RSS">RSS</option>
                <option value="CNM">CNM</option>     
            </select>
            
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>