<?php

	include ("cookies.php");
    include ("fonctions.php");
    include ("DBconnection.php");

    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') {
        $userID = $_GET['id'];
        if($_GET['admin'] == 1) {
            $sql = "UPDATE users SET admin = 1 WHERE id='$userID'";
        }
        else {
            $sql = "UPDATE users SET admin = 0 WHERE id='$userID'";
        }
        if ($conn->query($sql) === TRUE) {
            $message = "Modification effectuée avec succès";
        } 
        else {
            $message = "Erreur lors de la modification, rééssayez plus tard";
        }
        $conn->close();
        echo $message;
        header("Location: http:../controller/userManagement.php");
    }
    else {
        header("Location: http:../view/forbidden.php");
    }

?>