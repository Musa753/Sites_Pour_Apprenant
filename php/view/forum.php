<!DOCTYPE html>
<html lang="fr">
    <head>  
        <?php require('css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/table.css">
        <link rel="stylesheet" type="text/css" href="../../css/forum.css">
        <title>Le Forum</title>
    </head>
    <body>
        <?php require('header.php');?>
        <div>
            <?php 
                    if ($allTopics->num_rows > 0) {
                        echo '
                        <table class="tableForum">
                            <tr>
                                <th colspan="2"><h2>Le Forum</h2></th>
                            </tr>';
                        //output data of each row
                        while($row = $allTopics->fetch_assoc()) {
                            $topicAuthor = getUsername($conn, $row["author_id"]);
                            echo '
                            <tr>';
                                if(isAdmin($conn, $row["author_id"]) == 1) {
                                    echo '<td style="width:20%;padding:15px 10px">Topic par <span style="color:#fbc045;">'.$topicAuthor.'</span> le '.$row["creation_date"].'</td>';
                                }
                                else {
                                    echo '<td style="width:20%;padding:15px 10px">Topic par '.$topicAuthor.' le '.$row["creation_date"].'</td>';
                                }
                                
                                echo '<td style="width:80%;padding:15px 10px"><a href="topic.php?id='.$row["id"].'">'.$row["name"].'</a></td>
                            </tr>';
                        }
                        echo '</table>';
                    } 
                    else {
                        echo "Aucun topic sur le forum !";
                    }
                ?>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <?php 
                    if(isset($_SESSION['email'])) {
                        echo '
                        <div class="post">
                            <input type="text" name="title" placeholder="Titre du topic" id="title"></textarea><br><br>
                            <textarea style="width:100%;color:var(--light)" rows="4" name="msg" placeholder="Votre message" id="msg" value="msg" ></textarea><br><br>   
                            <input style="width:100%;padding-top:20px;padding-bottom:20px;font-size:120%;margin:0" type="submit" name="submit" value="Créer le topic"/>
                        </div>';
                    }
                    else {
                        echo '<p class="loginMessage"><strong><a href="connexion.php" style="color:var(--pink);">Connectez-vous </a></strong>pour créer des topics</p>';
                    }
                ?>
            </form>
        </div>
        <?php require('footer.php');?>
    </body>
</html>



