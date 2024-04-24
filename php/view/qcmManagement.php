<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/courseManagement.css"/>
        <link rel="stylesheet" href="../../css/table.css"/>
        <link rel="stylesheet" href="../../css/course.css"/>
        <title>Gestion des QCMs</title>
    </head>
    <body>
        <?php include('header.php');?>

        <div class="coursListeDiv">
            <table style="margin-bottom:20px;">
                <tr>
                    <th colspan="4"><h2>Liste des QCM</h2></th>
                </tr>
                <tr>
                    <td colspan="2" style="width:20%;text-align:center;color:var(--light)">Gestion</td>
                    <td style="width:50%;text-align:center;color:var(--light)">Sujet</td>
                    <td style="width:30%;text-align:center;color:var(--light)">Difficulté</td>
                </tr>
            
        <?php
            $files = scandir('../../xml/');
            foreach($files as $file) {
                if($file != "." && $file != "..") {
                    $qcm = simplexml_load_file("../../xml/$file");
                    echo '
                        <tr>
                            <td style="text-align:center;"><input type="button" name="editBtn"  class="editBtn"  value="Modifier" onclick="editQCM(\''.$file.'\')"/></td>
                            <td style="text-align:center;"><input type="button" name="deleteBtn" class="deleteBtn" value="Supprimer" onclick="deleteQCM(\''.$file.'\')"/></td>
                            <td style="text-align:center;">'.$qcm->xpath('//titre')[0].'</td>
                            <td style="text-align:center;">'.$qcm->xpath('//difficulte')[0].'</td>
                        </tr>
                    ';
                }
            }
            echo '</table><a onclick="editQCM(-1)">Ajouter un QCM</a>
            </div>';
            include('footer.php');
        ?>
    </body>
    <script type="text/javascript" src="../../js/functions.js"></script>
</html>


