<?php
include_once "dv.php";

if(isset($_POST['input'])){
    $searchQuery = $_POST['input'];
}





$sql = "SELECT * FROM emprent WHERE matricule LIKE '%$searchQuery%' OR id_livre LIKE '%$searchQuery%' OR date_retour_prevus LIKE '%$searchQuery%' OR date_retour_reel LIKE '%$searchQuery%' OR date_emprunt LIKE '%$searchQuery%'";

$result = mysqli_query($conction, $sql);

if(mysqli_num_rows($result) > 0){
    ?>
    <table id="searchResultTable">
        <tr id="items">
            <th>Matricule</th>
            <th>ID Livre</th>
            <th>Date d'Emprunt</th>
            <th>Date de Retour prevus</th>
            <th>Date de retour Réelle</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>           
            <td><?=$row['matricule']?></td>
            <td><?=$row['id_livre']?></td>
            <td><?=$row['date_emprunt']?></td>
            <td><?=$row['date_retour_prevus']?></td>
            <td><?=$row['date_retour_reel']?></td>
            <td><a href="modp.php?id_emprent=<?=$row['id_emprent']?>"><img src="images/pen.png"></a></td>
            <td><a href="supp.php?id_emprent=<?=$row['id_emprent']?>"><img src="images/trash.png"></a></td>
            <td>
                            <?php if (empty($row['date_retour_reel']) || $row['date_retour_reel'] == '0000-00-00') {
                                 ?>
                                   
                                <?php echo "non return";?>
                                       
                                <?php }else{
                                    echo "Retourne";
                                }
                                
                                ?>
                            
                            </td>
                            <td>
                            <?php if (empty($row['date_retour_reel']) || $row['date_retour_reel'] == '0000-00-00') {
                                 ?>
                                    
                                    <form action="" method="POST">
                               
                                        <input type="hidden" name="id_emprent" value="<?=$row['id_emprent']?>">
                                        <input type="submit" id="Btn_ret" class="Btn_add" value="retourn" name="return_button">
                                    </form>
                                    <?php } else 
                                    { ?>
                                        <form action="" method="POST">
                                        <input type="hidden" name="id_emprent" value="<?=$row['id_emprent']?>">
                                        <input type="submit" id="Btn_ret" class="Btn_add" value="annuler " name="cancel_return_button">
                                    </form>
                                    <?php } ?>
                                <?php }
                                }
                                    
                                    
                                
                                
                                ?>
                            </td>
        </tr>
        
    </table>
