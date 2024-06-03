

<?php 
include_once("dv.php");
$ac=false;
if(isset($_POST["save"])){
    $matricule=$_POST["matricule"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $niveau=$_POST["niveau"];
    $speceilit=$_POST["specialite"];
    $add_sql="INSERT INTO `etudiants`(`matricule`, `nom`, `prenom`, `niveau`, `specialite`) VALUES ('$matricule','$nom',' $prenom ','$niveau','$speceilit')";
    $res_add=mysqli_query($conction,$add_sql);
    if(!$res_add){
        die(mysqli_error($conction));
    }
    else{
         $ac= "add";
    }
}
$ajoter_sql="SELECT * FROM etudiants";
$all_user=mysqli_query($conction,$ajoter_sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>etudiant</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dostr.css">

</head>
<body>
<div class="container">
<div class ="wper p-5 m-5">
    <div class="d-flex justify-content-between mp-2">
        <h2>etudiant </h2>
    <div > <a href="add.php"><i class="fa-solid fa-user-plus"></i></a></div>
    
    </div>
    <hr>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">matricule</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">niveau</th>
      <th scope="col">specialite</th>
      <th scope="col">acetchin</th>
    </tr>
    </thead>
    <tbody>

<?php

    while($user = $all_user->fetch_assoc()){ ?>
        <tr>
        <td> <?php   echo $user["matricule"];?></td>
        <td><?php   echo $user["nom"]; ?></td>
        <td><?php   echo $user["prenom"]; ?></td>
        <td><?php   echo $user["niveau"]; ?></td>
        <td><?php   echo $user["specialite"];?></td>
        <td>achion</td>
</tr>
    

<?PHP 

    }
?>
    
    </tbody>
</table>
</div>
</div>
    <script src="js/queri.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="ico.js"></script>
    <script src="js/tostre .js"></script>
    <script src="js/min.js"></script>
    <?php 
   if ($ac != false) {
    if ($ac == "add") {
?>
        <script>
            schow_add();
        </script>
<?php
    }
}

    
    
    ?>
    
    <script>
feather.replace();

</script>
</body>
</html>