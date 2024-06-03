<?php
include_once "dv.php";

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM etudiants WHERE nom LIKE '%$input%' OR matricule LIKE '%$input%' OR prenom LIKE '%$input%' OR niveau LIKE '%$input%' OR specialite LIKE '%$input%' ";
    $result = mysqli_query($conction, $query);

    if(mysqli_num_rows($result) > 0){
        ?>
        <table id="searchResultTable">
            <tr id="items">
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Niveaux</th>
                <th>Specialite</th>
                <th>Nombre d'emprunt</th>
                <th>Emprunt en cours</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                        <td><?= $row['matricule'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['niveau'] ?></td>
                        <td><?= $row['specialite'] ?></td>
                        <td><?= mysqli_num_rows(mysqli_query($conction, "SELECT * FROM emprent WHERE matricule = '{$row['matricule']}'")) ?></td>
                        <td><?= mysqli_num_rows(mysqli_query($conction, "SELECT * FROM emprent WHERE matricule = '{$row['matricule']}' AND (date_retour_reel IS NULL or date_retour_reel = '0000-00-00')")) ?></td>


                        <td><a href="modifier.php?matricule=<?= $row['matricule'] ?>"><img src="images/pen.png"></a></td>
                        <td><a href="suppeime.php?matricule=<?= $row['matricule'] ?>"><img src="images/trash.gif"></a></td>
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

