<?php
	include ("cookies.php");
	if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') {
		unlink($_SERVER['DOCUMENT_ROOT'].'/xml/'.$_GET['file']);
		header("Location: http:../controller/qcmManagement.php");
	}
    else {
        header("Location: http:../view/forbidden.php");
    }
?>