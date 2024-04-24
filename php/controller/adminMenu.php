<?php
	include($_SERVER['DOCUMENT_ROOT'].'/php/model/cookies.php');
	include($_SERVER['DOCUMENT_ROOT'].'/php/model/DBconnection.php');
	
	if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') {
		require("../view/adminMenu.php");
	}
	else {
		header("Location: http:../view/forbidden.php");
	}

?>