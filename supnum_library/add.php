<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eudiant</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class ="wper p-5 m-5">
    <div class="d-flex justify-content-between">
        <h2> Ajuoter etudiant </h2>
    <div > <a href=".php"><i class="fa-solid fa-arrow-left"></i></a></div>
    </div>
    <form action="index.php" method="post">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">matircul</label>
  <input type="number" class="form-control" name="matricule" placeholder="Matricule" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nom</label>
  <input type="text" class="form-control" name="nom" placeholder="nom">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">perenom</label>
  <input type="text" class="form-control" name="prenom" placeholder="perenom">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">niveou</label>
  <input type="text" class="form-control" name="niveau" placeholder="niveau">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">specialite</label>
  <input type="text" class="form-control" name="specialite" placeholder="specialite">
</div>
<button type="submit" class="btn btn-primary" name="save">Enregistrer</button>
    </form>
</div>
</div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/ico.js"></script>
    
    <script>
feather.replace();
</script>

 
</body>
</html>