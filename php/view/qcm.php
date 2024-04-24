<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/table.css">
        <link rel="stylesheet" type="text/css" href="../../css/forum.css">
        <link rel="stylesheet" type="text/css" href="../../css/qcm.css">
        <title>QCM</title>
    </head>
    <body>
        <?php 
            include('header.php');
            if(file_exists($_SERVER['DOCUMENT_ROOT'].'/xml/'.$_GET['name'].'.xml')) {
                $qcm = simplexml_load_file("../../xml/$_GET[name].xml");
                $authorID = $qcm->xpath('//auteurID')[0];
                $author = getUsername($conn, $authorID);
                $author .= " ".$conn->query("SELECT * FROM users WHERE id='$authorID'")->fetch_assoc()['lastname'];

                echo '<h1 style="text-align: center;margin-top:20px;">'.$qcm->xpath('//titre')[0].'</h1>';
                echo '<h5 style="text-align: center;margin-top:20px;">par Moussa TRAORE</h5>';
                echo '<h5 style="text-align: center;margin-top:20px;">Difficulté : '.$qcm->xpath('//difficulte')[0].'</h5>';
                echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'?name='.$_GET['name'].'" method="post">';
                    echo '<div class="questions">';
                    $i = 0;
                    foreach ($qcm->xpath('//question') as $question) {
                        echo '<div class="question q'.$j.'">';
                        echo '<strong>'.$question->libelle.'</strong><br>';
                        $j = 1; 
                        foreach ($question->proposition as $proposition) {
                            echo '<input style="margin:5px;" type="checkbox" name="q'.$i.'p'.$j.'"><span style="color:var(--text2);">'.$proposition."</span></input>"."<br>";
                            $j++;
                        }
                        echo '</div>';
                        $i++;
                    }
                    echo '<input style="margin:10px;width:120px;height:40px;float:right;" type="submit" value="Valider"></input>'; 
                    echo "</div>";
                echo '</form>';
            }
            else {
                echo '<p style="text-align:center;margin-top:20px;margin-bottom:800px;">QCM inexistant !</p>';
            }
            include('footer.php');
        ?>
    </body>
</html>

