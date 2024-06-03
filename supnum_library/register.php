<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/loginregister.css">
</head>
<body>
    
        <div class="form">
            <h2>Créer un compte</h2>
            <form action="register" method="post">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required />
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" required />
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required />
                <label for="confirm_password">Confirmez le mot de passe</label>
                <input type="password" name="confirm_password" id="confirm_password" required />
                <input type="submit" name="submit" id="submit" value="Créer un compte" />
            </form>
            <p class="loginhere">
                Déjà un compte ? <a href="log.php" class="loginhere-link">Connectez-vous ici</a>
            </p>
        </div>
   
</body>
</html>

