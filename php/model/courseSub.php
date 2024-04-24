<?php
	include ("cookies.php");
    include ("DBconnection.php");
    if(isset($_SESSION['email'])) {
        $date = date('Y-m-d');
        $sql ="INSERT INTO courses_subs(user_id, course_id, date)values('$_SESSION[id]','$_GET[id]','$date')";
        if ($conn->query($sql) === TRUE) {
            $message = "Inscription effectuée avec succès";
        } 
        else {
            $message = "Erreur lors de l'inscription, rééssayez plus tard";
        }
        $conn->close();
        echo $message;
        header("Location: http:../controller/courseList.php");
    }
    else {
        header("Location: http:../view/forbidden.php");
    }

?>