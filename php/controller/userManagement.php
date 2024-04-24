<?php

    require('../model/cookies.php');
    require('../model/DBconnection.php');

    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') {
        require('../view/userManagement.php');
        $conn->close();
    }
    else {
        header("Location: http:forbidden.php");
    }
?>