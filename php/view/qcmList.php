<?php
    include('css.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/courseManagement.css"/>
        <link rel="stylesheet" href="../../css/table.css"/>
        <link rel="stylesheet" href="../../css/course.css"/>
        <title>Les QCMs</title>
    </head>
    <body>
        <?php include('header.php');?>
        <table>
            <tr>
                <th colspan="2"><h2>Liste des QCM</h2></th>
            </tr>
            <tr>
                <td style="text-align:center;color:var(--light)">Sujet</td>
                <td style="text-align:center;color:var(--light)">Difficulté</td>
            </tr>
        <?php // Utilisation de <?php au lieu de <?
            $files = scandir('../../xml/');
            foreach($files as $file) {
                if($file != "." && $file != "..") {
                    $qcm = simplexml_load_file("../../xml/$file");
                    echo '
                        <tr>
                            <td style="text-align:center;"><a href="qcm.php?name='.$qcm->xpath('//titre')[0].'">'.$qcm->xpath('//titre')[0].'<a></td>
                            <td style="text-align:center;">'.$qcm->xpath('//difficulte')[0].'</td>
                        </tr>
                    ';
                }
            }
            echo '</table>'; 
            include('footer.php');
        ?>
        <script type="text/javascript" src="../../js/functions.js"></script>
        <script type="text/javascript" src="../../js/cours.js"></script>
    </body>
</html>
