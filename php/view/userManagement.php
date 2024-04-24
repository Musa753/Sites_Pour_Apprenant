<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/table.css">
        <title>Gestion des utilisateurs</title>
    </head>
    <body>
        <?
            include('header.php'); 
            $result = $conn->query("SELECT * FROM users");
            if ($result->num_rows > 0) {
                echo '
                    <table class="user">
                        <tr>
                            <th colspan="6"><h2>Liste des utilisateurs</h2></th>
                        </tr>
                        <tr>
                            <td style="text-align:center;color:var(--light)"><strong>ID</strong></td>
                            <td style="text-align:center;color:var(--light)"><strong>Nom</strong></td>
                            <td style="text-align:center;color:var(--light)"><strong>Prénom</strong></td>
                            <td style="text-align:center;color:var(--light)"><strong>Niveau</strong></td>
                            <td style="text-align:center;color:var(--light)"><strong>Admin</strong></td>
                            <td style="text-align:center;color:var(--light)"><strong>Gestion</strong></td>
                        </tr>
                    ';
                while($row = $result->fetch_assoc()) {
                    echo '
                        <tr>
                            <td style="text-align:center;width:5%;">' . $row["id"] . '</td>
                            <td style="text-align:center;width:30%;">' . $row["lastname"] . '</td>
                            <td style="text-align:center;width:30%;">' . $row["firstname"] . '</td>
                            <td style="text-align:center;width:15%;">' . $row["level"] . '</td>';
                            if($row["admin"] == 1) {
                                echo '<td style="text-align:center;width:10%;"><input type="button" style="width:60px;" name="unset" value="Unset" onclick="unsetAdmin('.$row["id"].')"/></td>';
                            }
                            else {
                                echo '<td style="text-align:center;width:10%;"><input type="button" style="width:60px;" name="set" value="Set" onclick="setAdmin('.$row["id"].')"/></td>';
                            }
                            echo '<td style="text-align:center;width:10%;"><input type="button" style="width:90px;" name="delAccount" value="Supprimer" onclick="delAccount('.$row["id"].')"/></td>';
                        echo '</tr>
                    ';
                    $_POST['msg'] = "";
                }
                echo '</table><br>';
            } 
            else {
                echo "Aucun utilisateur";
            }
            include('footer.php');
        ?>
    </body>
    <script type="text/javascript" src="../../js/functions.js"></script>
</html>


