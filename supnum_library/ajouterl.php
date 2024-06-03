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
           if( isset($isbn) && isset($hauteur) && isset($editeur) && isset($titre) && isset($nbrpage) && isset($adition) && isset($nbrexmp)   && $datepubli){
                include_once "dv.php";
                
                $req = mysqli_query($conction , "INSERT INTO livres VALUES( NULL ,'$isbn','$hauteur', '$editeur','$titre','$nbrpage','$adition','$nbrexmp','$datepubli')");
                if($req){
                    header("location: livre.php");
                }else {
                    $message = "livre non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="livre.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un livre</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>ISBN</label>
            <input type="number" name="isbn">
            <label>Auteur</label>
            <input type="text" name="hauteur">
            <label>Éditeur</label>
            <input type="text" name="editeur">
            <label>Titre</label>
            <input type="text" name="titre">
            <label>Nombre de page</label>
            <input type="number" name="nbrpage">
            <label>Edition</label>
            <input type="number" name="adition">
            <label>Nombre exempilaire</label>
            <input type="number" name="nbrexmp">
            <label>Date publication</label>
            <input type="date" name="datepubli">
            
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>