<?php

    require('../model/cookies.php');
    require('../model/DBconnection.php');

    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') { 
        require('../view/qcmManagement.php');
        $conn->close();
    }
    else {
        require('../view/forbidden.php');
    }
?>