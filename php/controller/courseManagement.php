<?php

    require('../model/cookies.php');
    require('../model/DBconnection.php');
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') { 
        require('../model/courseManagement.php');
        require('../view/courseManagement.php');
        $conn->close();
    }
    else {
        header("Location: http:forbidden.php");
    }
    
?>