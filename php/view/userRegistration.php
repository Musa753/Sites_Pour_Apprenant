<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>S'inscrire</title>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/connection.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">  
                <h1>Inscription</h1>
                <?= '<p>', htmlspecialchars($errorMessage) ,'</p>'; ?>
                <input type="text" name="lastname" id="lastname" placeholder="Nom" value="" required/>
                <input type="text" name="firstname" id="firstname" placeholder="Prénom" value="" required/>
                <input type="text" name="email" id="email" placeholder="E-mail" value="" required/>
                <input type="password" name="password" id="password" placeholder="Mot de passe" value="" required/> 
                <input type="password" name="password1" id="password1" placeholder="Confirmer le mot de passe" value="" required/>
                <input type="submit" name="submit" placeholder="" value="valider" />
            </form>
        </div>
    </body>
</html>
