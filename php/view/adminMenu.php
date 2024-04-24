<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/php/view/css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/table.css">        
        <title>Page d'administration</title>
    </head>
    <body>
        <?php include('header.php');?>
        <h1 style="text-align:center;margin-top:50px">Bienvenue <?=$_SESSION['firstname']?> !</h1>
        <table style = "margin: 50px auto 500px auto;">
            <tr>
                <th><h2>Ma page d'administration</h2></th>
            </tr>
            <tr>
                <td><a href="courseManagement.php">Gérer les cours</a></th>
            </tr>
            <tr>
                <td><a href="userManagement.php">Gérer les utilisateurs</a></th>
            </tr>
            <tr>
                <td><a href="qcmManagement.php">Gérer les QCMs</a></th>
            </tr>
        </table>
        <?php include('footer.php');?>
    </body>
</html>


