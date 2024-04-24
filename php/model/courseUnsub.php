<?php
	include ("cookies.php");
    include ("DBconnection.php");
    if(isset($_SESSION['email'])) {
        $sql = "DELETE FROM courses_subs WHERE course_id='".$_GET['id']."' AND user_id='".$_SESSION['id']."'";
        if ($conn->query($sql) === TRUE) {
            $message = "Désinscription effectuée avec succès";
        } 
        else {
            $message = "Erreur lors de la désinscription, rééssayez plus tard";
        }
        $conn->close();
        echo $message;
        header("Location: http:../controller/courseList.php");
    }
    else {
        header("Location: http:../view/forbidden.php");
    }

?>