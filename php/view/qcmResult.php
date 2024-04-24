<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <title>Résultats du QCM</title>
    </head>
    <body>
        <?php include('header.php');

        if ($ratio > 80) {
            echo '<p style="text-align:center;margin-top:20px;margin-bottom:100px;">Félicitations ! Vous avez réussi ce QCM<br>Si vous n\'etes pas d\'un niveau supérieur, vous obtenez le niveau <i>$difficulty</i><br></p>
            <img src="../../Images/congrats/'.$rand.'.gif" alt="congrats !" style="display:block;margin:100px auto;height:300px;margin-bottom:350px;border-radius:5px;"></img>';
            if($userLevel != "expert") {
                if($userLevel == "confirmed") {
                    if($difficulty == "expert") {
                        $sql = "UPDATE users SET level = 'expert' WHERE id='$_SESSION[id]'";
                        if ($conn->query($sql) === FALSE) {
                            echo "Erreur de modification du niveau";
                        }
                    }
                }
                else if($userLevel == "beginner") {
                    if($difficulty != "beginner") {    
                        $sql = "UPDATE users SET level = '$difficulty' WHERE id='$_SESSION[id]'";
                        if ($conn->query($sql) === FALSE) {
                            echo "Erreur de modification du niveau";
                        }
                    }
                }
            }
        }
        else {
            echo "Vous n'avez pas obtenu un score suffisament élevé pour réussir ce QCM et ainsi obtenir le niveau <i>$difficulty</i><br>Vous
            Entrainez vous puis rééssayez !<br>";
        }

        ?>
        <?php include('footer.php');?>
    </body>
</html>


