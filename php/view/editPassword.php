<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/connection.css" media="screen" type="text/css" />
        <title>Modification mot de passe</title>
    </head>
    <body>
        <div id="container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h1 class="titre">Modification mot de passe</h1>
                <?= '<p>', htmlspecialchars($errorMessage) ,'</p>';?>
                <input type="password" placeholder="Mot de passe actuel" name="password" required>
                <input type="text" placeholder="Nouveau mot de passe" name="newpassword" required>
                <input type="text" placeholder="Confirmer le nouveau mot de passe" name="newpassword2" required>
                <input type="submit" id='submit' value='Valider'>
            </form>
        </div>
    </body>
</html>
