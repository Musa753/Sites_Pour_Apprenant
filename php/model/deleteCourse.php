<?php
	include ("cookies.php");
    include ("functions.php");
    include ("DBconnection.php");
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') { 
        $thumbnail = $conn->query("SELECT thumbnail FROM courses WHERE id='".$_GET['id']."'")->fetch_assoc()["thumbnail"];
        $sql = "DELETE FROM courses WHERE id='".$_GET['id']."'";
        $sql2= "DELETE FROM courses_subs WHERE course_id = '".$_GET['id']."'";
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
            unlink($_SERVER['DOCUMENT_ROOT'].'/'.$thumbnail);
            $message = "Cours supprimé avec succès";
        } 
        else {
            $message = "Erreur lors de la suppression, rééssayez plus tard";
        }
        $conn->close();
        header("Location: http:../controller/courseManagement.php");
    }
    else {
        header("Location: http:../view/forbidden.php");
    }

?>