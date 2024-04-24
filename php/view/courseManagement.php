<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/courseManagement.css"/>
        <link rel="stylesheet" href="../../css/table.css"/>
        <title>Gestion des cours</title>
    </head>
    <body>
        <? 
            include('header.php');
            if ($myCourses->num_rows > 0) {
                echo '
                    <div class="coursListeDiv">
                        <table style="margin-bottom:20px;" class="courseManagementList">
                            <tr>
                                <th colspan="3"><h2>Liste de mes cours</h2></th>
                            </tr>
                        ';
                while($row = $myCourses->fetch_assoc()) {
                    echo '
                    <tr class="cours">
                        <td style="width:5%;">
                            <input type="button" name="modifierBtn"  class="modifierBtn"  value="Modifier" onclick="courseEdit('.$row["id"].')"/>
                        </td>
                        <td style="width:5%;">
                            <input type="button" name="supprimerBtn" class="supprimerBtn" value="Supprimer" onclick="deleteCourse('.$row["id"].')"/>
                        </td>
                        <td style="width:90%;">'.$row["title"].'</td>
                    </tr>';
                    $_POST['msg'] = "";
                }
                echo '
                        </table>
                        <a onclick="courseEdit(-1)">Ajouter un cours</a>
                    </div>';
            } 
            else {
                echo '<p style="text-align:center;margin-top:50px">Aucun cours</p>';
                echo '<div style="text-align:center;margin-top:50px;margin-bottom:600px;"><a onclick="courseEdit(-1)">Ajouter un cours</a></div>';
            }
            include('footer.php');
        ?>
    </body>
    <script type="text/javascript" src="../../js/functions.js"></script>
</html>


