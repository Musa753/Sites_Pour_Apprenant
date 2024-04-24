<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/table.css">
        <link rel="stylesheet" type="text/css" href="../../css/forum.css">
        <title><?= $topicName ?></title>
    </head>
    <body>
        <?php include('header.php');?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']."?id=$_GET[id]"); ?>" method="post">
                <?php 
                    if ($messages->num_rows > 0) {
                        echo '
                        <table class="tableForum" style="margin: 138px auto 50px auto;">
                            <tr>
                                <th colspan="2"><h2>'.$topicName.'</h2></th>
                            </tr>';
                        //output data of each row
                        while($row = $messages->fetch_assoc()) {
                            $topicAuthor = getUsername($conn, $row["author_id"]);
                            echo '
                            <tr>';
                                if(isAdmin($conn, $row["author_id"]) == 1) {
                                    echo '<td style="width:20%;padding:15px 10px"><span style="color:#fbc045;">'.$topicAuthor.'</span> le '.$row["date"].'</td>';
                                }
                                else {
                                    echo '<td style="width:20%;padding:15px 10px">'.$topicAuthor.' le '.$row["date"].'</td>';
                                }
                                
                                echo '<td style="width:80%;padding:15px 10px">'.$row["message"].'</td>
                            </tr>';
                        }
                        echo '</table>';
                        if(isset($_SESSION['email'])) {
                            echo '
                            <div class="post">
                                <textarea style="width:100%;color:var(--light)" rows="4" name="msg" placeholder="Votre message" id="msg" value="msg" ></textarea><br><br>
                                <input style="width:100%;padding-top:20px;padding-bottom:20px;font-size:120%;margin:0" type="submit" name="submit"  value="Poster"/>
                            </div>';
                        }
                        else {
                            echo '<p class="loginMessage"><strong><a href="userConnection.php" style="color:var(--pink);">Connectez-vous </a></strong>pour poster sur le forum</p>';
                        }
                    } 
                    else {
                        echo '<p style="text-align:center;margin-top:20px;margin-bottom:700px;">Topic vide ou inexistant</p>';
                    }
                ?>
            </form>
        <?php include('footer.php');?>
    </body>
</html>


