<?php

    require('../model/cookies.php');
    require('../model/DBconnection.php');
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') { 
        require('../model/courseEdit.php');
        require('../view/courseEdit.php');
    }
    else {
        require('../view/forbidden.php');
    }
?>