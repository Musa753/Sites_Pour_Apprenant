<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" href="../../css/courseManagement.css"/>
        <link rel="stylesheet" href="../../css/table.css"/>
        <link rel="stylesheet" href="../../css/course.css"/>
        <title>Les cours</title>
    </head>
    <body>
        <?php include('header.php');?>
        <?php
            if ($courseList->num_rows > 0) {
                echo '
                    <table>
                        <tr>
                            <th colspan="3"><h2>Liste des cours</h2></th>
                        </tr>
                ';
                while($row = $courseList->fetch_assoc()) {
                    if(isset($_SESSION['email'])) {
                        $courseID=$row['id'];
                        $subscribed = false;
                        $subscribedCourse = $conn->query("SELECT * FROM courses_subs WHERE course_id='$courseID'");
                        while($row2 = $subscribedCourse->fetch_assoc()) {
                            if($row2['user_id'] == $_SESSION['id']) {
                                $subscribed = true;
                            }
                        }
                    }
                    echo '
                        <tr class="cours">';
                        if(isset($_SESSION['email'])) {
                            if($subscribed == true) {
                                echo '<td style="width:5%;"><input type="button" class="unsubscribe button" name="unsubscribe" value="Inscrit.e" onclick="unsubCourse('.$row["id"].')"/></td>';
                            }
                            else {
                                echo '<td style="width:5%;"><input type="button" class="button" name="inscrire" value="S\'inscrire" onclick="subCourse('.$row["id"].')"/></td>';
                            }
                        }
                        echo '
                                <td><div style="width:141px;height:79px;border-radius:5px;overflow:hidden;"><img src="../../'.$row['thumbnail'].'" alt="miniature du cours" class="img" ></div></td>
                                <td style="width:95%;"><span style="font-weight:bold;">'.$row["title"].'</span><br><span style="color:var(--text2);">'.$row["description"].'</span></td>
                            </tr>
                        ';
                    $_POST['msg'] = "";
                }
                echo '</table>';
            } 
            else {
                echo "Aucun cours";
            }  
            include('footer.php');
        ?>
        <script type="text/javascript" src="../../js/functions.js"></script>
        <script type="text/javascript" src="../../js/course.js"></script>
    </body>
</html>
