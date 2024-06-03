<?php
include_once "dv.php";

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM livres WHERE id LIKE '%$input%' OR isbn LIKE '%$input%' 
     OR hauteur LIKE '%$input%'  OR editeur LIKE '%$input%'  OR titre LIKE '%$input%'  OR nbrpage LIKE '%$input%'
      OR adition LIKE '%$input%'  OR nbrexmp LIKE '%$input%'  OR datepubli LIKE '%$input%' ";
    $result = mysqli_query($conction, $query);

    if(mysqli_num_rows($result) > 0){
        ?>
        <table id="searchResultTable">
            <tr id="items">
                <th>ID</th>
                <th>ISBN</th>
                <th>Auteur</th>
                <th>Éditeur</th>
                <th>Titre</th>
                <th>Nombre de pade</th>
                <th>Edition</th>
                <th>Nombre d'exempilaire</th>
                <th>Date publication</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['isbn']?></td>
                <td><?=$row['hauteur']?></td>
                <td><?=$row['editeur']?></td>
                <td><?=$row['titre']?></td>
                <td><?=$row['nbrpage']?></td>
                <td><?=$row['adition']?></td>
                <td><?=$row['nbrexmp']?></td>
                <td><?=$row['datepubli']?></td>
                <td><a href="modifierl.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                <td><a href="supl.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo "<h6 class='text-danger text-center mt-m3'>Aucun livre trouvé avec ce critère de recherche, veuillez vérifier que vous avez bien tapé le nom ou l'identifiant du livre.</h6>";
    }
}
?>

