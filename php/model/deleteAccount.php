<?php
    include ("cookies.php");
    include ("fonctions.php");
    include ("DBconnection.php");
    //If account is deleted by an admin
    if(isset($_GET['id']) && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') {
        $sql = "DELETE FROM users WHERE id='".$_GET['id']."'";
        if ($conn->query($sql) === TRUE) {
            $message = "Utilisateur supprimé avec succès";
        } 
        else {
            $message = "Erreur lors de la suppression, rééssayez plus tard";
        }
        header("Location: http:../controller/userManagement.php");
    }

    //If account is deleted by the owner (via his user page)
    else {
        $sql = "DELETE FROM courses_subs WHERE user_id='".$_SESSION['id']."'";
        if ($conn->query($sql) === TRUE) {
            $message = "Inscriptions supprimées avec succès\n";
        } 
        else {
            $message = "Erreur lors de la suppression, rééssayez plus tard\n";
        }

        $sql = "DELETE FROM users WHERE email='".$_SESSION['email']."'";
        if ($conn->query($sql) === TRUE) {
            $message = "Compte supprimé avec succès\n";
        } 
        else {
            $message = "Erreur lors de la suppression, rééssayez plus tard\n";
        }

        header("Location: http:../controller/logout.php");
    }
    $conn->close();
?>


