<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/connection.css" media="screen" type="text/css" />
        <title>Modification de l'adresse mail</title>
    </head>
    <body>
        <div id="container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h1 class="titre">Modification de l'adresse mail</h1>
                <?= '<p>', htmlspecialchars($errorMessage) ,'</p>';?>
                <input type="text" placeholder="Nouvelle adresse e-mail" name="email" required>
                <input type="text" placeholder="Confirmer la nouvelle adresse e-mail" name="email2" required>
                <input type="password" placeholder="Mot de passe actuel" name="password" required>
                <input type="submit" id='submit' value='Valider'>
            </form>
        </div>
    </body>
</html>
