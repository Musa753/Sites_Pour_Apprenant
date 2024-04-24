<?php

    include('cookies.php');
	if($_SESSION['theme'] == "bright") {
		$_SESSION['theme'] = "dark";
	}
	else {
		$_SESSION['theme'] = "bright";
	}

	setcookie('theme', $_SESSION['theme'], time() + 365*24*3600, '/');
	header("Location: ../controller/userMenu.php");
?>