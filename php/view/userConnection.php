<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/connection.css" media="screen" type="text/css" />
        <title>Se connecter</title>
    </head>
    <body>
        <div id="container">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h1>Connexion</h1>
                <?= '<p>', htmlspecialchars($errorMessage) ,'</p>'; ?>
                <input type="text" placeholder="e-mail" name="email" required>
                <input type="password" placeholder="Mot de passe" name="password" required>
                <input type="checkbox" name="stayConnected"> Rester connecté</input>
                <input type="submit" id='submit' value='Se connecter'>
                <a href="userRegistration.php" class="inscriptionButton">Inscription</a>
            </form>
          </div>
      </body>
</html>