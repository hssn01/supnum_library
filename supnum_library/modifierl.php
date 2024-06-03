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

         
          include_once "dv.php";
         
          $id = $_GET['id'];
          
          $req = mysqli_query($conction , "SELECT * FROM livres WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       if(isset($_POST['button'])){
           
           extract($_POST);
           if( isset($isbn) && isset($hauteur) && isset($editeur) && isset($titre) && isset($nbrpage) && isset($adition) && isset($nbrexmp)  && $datepubli){
               $req = mysqli_query($conction, "UPDATE livres SET isbn = '$isbn' , hauteur = '$hauteur' , editeur = '$editeur' , titre = '$titre' , nbrpage = '$nbrpage' , adition = '$adition', nbrexmp = '$nbrexmp', datepubli = '$datepubli' WHERE id = $id");
                if($req){
                    header("location: livre.php");
                }else {
                    $message = "livre non modifié";
                }

           }else {
               
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="livre.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier le livre : <?=$row['titre']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>ISBN</label>
            <input type="number" name="isbn" value="<?=$row['isbn']?>">
            <label>Auteur</label>
            <input type="text" name="hauteur" value="<?=$row['hauteur']?>">
            <label>Éditeur</label>
            <input type="text" name="editeur" value="<?=$row['editeur']?>">
            <label>Titre</label>
            <input type="text" name="titre" value="<?=$row['titre']?>">
            <label>Nombre de page</label>
            <input type="text" name="nbrpage" value="<?=$row['nbrpage']?>">
            <label>Adition</label>
            <input type="number" name="adition" value="<?=$row['adition']?>">
            <label>Nombre exempilaire</label>
            <input type="number" name="nbrexmp" value="<?=$row['nbrexmp']?>">
            <label>Date publie</label>
            <input type="date" name="datepubli" value="<?=$row['datepubli']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>